var $ = require('jquery');
require('materialize-css');

var wordArray;
var relationArray;
var wordSelected;
var relationSelected;
var verrou = false;

$(function () {
    $('.js-close-toast').each(function (index, object) {
        $(object).on('click', function () {
            $(this.parentElement).fadeOut(300, function () {
                $(this).remove();
            });
        });
    });

    $('ul.tabs').tabs({
        /*onShow: function (tab) {
            console.log(tab);
        }*/
        //swipeable: true
    });

    $('input.js-autocomplete-word').bind('input', function () {
        wordSelected = null;
        var val = $(this).val();// get the current value of the input field.
        $('input.js-autocomplete-word').val(val);
        if (val === '') {
            $('label.js-first-input').removeClass('active');
            wordArray = null;
        }
        //Ajax request
        else {
            $('label.js-first-input').addClass('active');

            if(val.length > 1){
                return;
            }
            wordAutocompletion(val, function (value, result) {
                wordArray = result;
                var elements = [];
                $(result).each(function (index, object) {
                    elements[object['text']] = null;
                });
                if(result.length === 0){
                    return;
                }

                $('input.js-autocomplete-word').autocomplete({
                    data: elements,
                    onAutocomplete: function (val) {

                        $('input.js-autocomplete-word').val(val);

                        for (var i in wordArray) {
                            if (wordArray[i]['text'] === val) {
                                wordSelected = wordArray[i];
                                relationTypeAutocompletion(wordSelected);
                                break;
                            }
                        }
                    },
                    limit: 5// The max amount of results that can be shown at once. Default: Infinity.
                });
            })
        }
    });

    $('input.js-autocomplete-relation').bind('input', function () {
        relationSelected = null;
        var val = $(this).val();// get the current value of the input field.
        $('input.js-autocomplete-relation').val(val);
        if (val === '') {
            $('label.js-second-input').removeClass('active');
        }
        else {
            $('label.js-second-input').addClass('active');
        }
    });

    $('.js-submit').on('click', function () {
        submitInput();
    });

    $('input.js-last-input').on('keydown', function (event) {
        if (event.keyCode === 13) {
            submitInput();
        }
    });

    $('.js-reset').on('click', function () {
        $('input.autocomplete').val('');
        $('label').removeClass('active');
        wordSelected = null;
        relationSelected = null;
    });
});


function wordAutocompletion(value, callback) {
    $.ajax({
        type: "POST",
        url: "/mot/" + value,
        success: function (data) {
            var result = new Array();
            for (var i = 0; i < data.length; ++i) {
                var name = data[i]._source.formattedName;
                if( name === "" || !name){
                    name = data[i]._source.name
                }
                result.push({
                    id: data[i]._source.id,
                    text: name
                });
            }
            callback(value, result);
        },
        error: function (xhr, status, error) {
            console.log("error");
        }
    });
}

function relationTypeAutocompletion(word) {
    $.ajax({
        type: "POST",
        url: "/mot/" + word.id + '/relationTypes',
        success: function (data) {
            var result = new Array();
            for (var i = 0; i < data.length; ++i) {
                result.push({
                    id: data[i].id,
                    text: data[i].code
                });
            }
            relationArray = result;
            var elements = [];
            $(result).each(function (index, object) {
                elements[object['text']] = null;
            });
            $('input.js-autocomplete-relation').autocomplete({
                data: elements,
                onAutocomplete: function (val) {
                    $('input.js-autocomplete-relation').val(val);

                    for (var i in relationArray) {
                        if (relationArray[i]['text'] === val) {
                            relationSelected = relationArray[i];
                        }
                    }
                },
                limit: 5
            })
        },
        error: function (xhr, status, error) {
            console.log("error");
        }
    });
}

function wordRelationExist(word, relation, callback) {
    $.ajax({
        type: "POST",
        url: '/exist/' + word + '/' + relation,
        success: function (data) {
            callback(data);
        },
        error: function (xhr, status, error) {
            console.log("error");
        }
    });
}

function verificationTab(word, relation, endWord, callback) {
    $.ajax({
        type: "POST",
        url: '/exist/' + word + '/' + relation + '/' + endWord,
        success: function (data) {
            callback(data);
        },
        error: function (xhr, status, error) {
            console.log("error");
        }
    });
}

function submitInput() {

    if (isLocked()) {
        return;
    }
    var activeTabId = $('.tab > a.active').attr('href');

    var inputs = $(activeTabId + ' input');
    var emptyInput = false;

    $(inputs).each(function (index, object) {
        if ($(object).val() === '') {
            // TODO : Mettre en rouge les champs qui ne sont pas rempli
            emptyInput = true;
        }
    });

    if (emptyInput) {
        return;
    }

    switch (inputs.length) {
        case 1:
            window.location.href = '/' + $(inputs[0]).val();
            break;

        case 2:
            if (!wordSelected || !relationSelected) {
                var inputWord = $(inputs[0]).val();
                var inputRelation = $(inputs[1]).val();
                lock();

                showLoader($(inputs[0].parentNode.nextElementSibling));
                showLoader($(inputs[1].parentNode.nextElementSibling));

                wordRelationExist(inputWord, inputRelation, function (data) {
                    if (data.idWord) {
                        showLoaderSuccess($(inputs[0].parentNode.nextElementSibling));
                        wordSelected = {
                            id: data.idWord,
                            text: inputWord
                        };
                        if (!data.existRelation) {
                            relationTypeAutocompletion(wordSelected);
                        }
                    }
                    else {
                        showLoaderError($(inputs[0].parentNode.nextElementSibling));
                    }
                    if (data.existRelation) {
                        showLoaderSuccess($(inputs[1].parentNode.nextElementSibling));
                        relationSelected = {
                            id: data.idRelation,
                            text: inputRelation
                        };
                        window.location.href = '/mot/' + wordSelected.id + "/relationType/" + relationSelected.id + '/weight';
                    }
                    else {
                        unlock();
                        showLoaderError($(inputs[1].parentNode.nextElementSibling));
                    }
                });
            }
            else {
                window.location.href = '/mot/' + wordSelected.id + "/relationType/" + relationSelected.id + '/weight';
            }
            break;

        case 3:
            lock();

            showLoader($(inputs[0].parentNode.nextElementSibling));
            showLoader($(inputs[1].parentNode.nextElementSibling));
            showLoader($(inputs[2].parentNode.nextElementSibling));

            verificationTab($(inputs[0]).val(), $(inputs[1]).val(), $(inputs[2]).val(),
                function (data) {
                    if (data.existWord) {
                        showLoaderSuccess($(inputs[0].parentNode.nextElementSibling));
                    }
                    else {
                        showLoaderError($(inputs[0].parentNode.nextElementSibling));
                    }

                    if (data.existRelation) {
                        showLoaderSuccess($(inputs[1].parentNode.nextElementSibling));
                    }
                    else {
                        showLoaderError($(inputs[1].parentNode.nextElementSibling));
                    }

                    if (data.existEndWord) {
                        showLoaderSuccess($(inputs[2].parentNode.nextElementSibling));
                    }
                    else {
                        showLoaderError($(inputs[2].parentNode.nextElementSibling));
                    }
                    unlock();
                });
            break;
    }
}

function lock() {
    verrou = true;
}

function isLocked() {
    return verrou;
}

function unlock() {
    verrou = false;
}

function showLoader(element){
    $(element[0].children[0].children[1]).fadeOut(0);
    $(element[0].children[0].children[2]).fadeOut(0);
    $(element[0].children).addClass('active');
    $(element[0].children[0].children[0]).fadeIn('slow');
    $(element).fadeIn();
}

function showLoaderSuccess(element){
    $(element[0].children).removeClass('active');
    $(element[0].children[0].children[0]).fadeOut(0);
    $(element[0].children[0].children[1]).fadeIn('slow');
}

function showLoaderError(element){
    $(element[0].children).removeClass('active');
    $(element[0].children[0].children[0]).fadeOut(0);
    $(element[0].children[0].children[2]).fadeIn('slow');
}
