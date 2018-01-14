var $ = require('jquery');
require('materialize-css');

var wordArray;
var relationArray;
var wordSelected;
var relationSelected;

$(function () {
    $('.js-close-toast').each(function (index, object) {
        $(object).on('click', function(){
            $(this.parentElement).fadeOut(300, function(){ $(this).remove();});
        });
    });

    $('ul.tabs').tabs({
        /*onShow: function (tab) {
            console.log(tab);
        }*/
        //swipeable: true
    });

    $('input.js-autocomplete-word').bind('input', function() {
        wordSelected = null;
        var val = $(this).val();// get the current value of the input field.
        $('input.js-autocomplete-word').val(val);
        if(val === ''){
            $('label.js-first-input').removeClass('active');
        }
        //Ajax request
        else{
            $('label.js-first-input').addClass('active');
            wordAutocompletion(val, function(value, result){
                wordArray = result;
                var elements = [];
                $(result).each(function(index, object){
                    elements[object['text']] = null;
                });

                $('input.js-autocomplete-word').autocomplete({
                    data: elements,
                    onAutocomplete: function(val) {

                        $('input.js-autocomplete-word').val(val);

                        for(var i in wordArray){
                            if(wordArray[i]['text'] === val){
                                wordSelected = wordArray[i];
                                relationTypeAutocompletion(wordArray[i], function(result){
                                    relationArray = result;
                                    var elements = [];
                                    $(result).each(function(index, object){
                                        elements[object['text']] = null;
                                    });
                                    $('input.js-autocomplete-relation').autocomplete({
                                        data: elements,
                                        onAutocomplete: function (val) {
                                            $('input.js-autocomplete-relation').val(val);

                                            for(var i in relationArray){
                                                if(relationArray[i]['text'] === val){
                                                    relationSelected = relationArray[i];
                                                }
                                            }
                                        },
                                        limit: 5
                                    })
                                });
                                break;
                            }
                        }
                    },
                    limit: 5// The max amount of results that can be shown at once. Default: Infinity.
                });
            })
        }
    });

    $('input.js-autocomplete-relation').bind('input', function(){
        relationSelected = null;
        var val = $(this).val();// get the current value of the input field.
        $('input.js-autocomplete-relation').val(val);
        if(val === ''){
            $('label.js-second-input').removeClass('active');
        }
        else{
            $('label.js-second-input').addClass('active');
        }
    });

    $('.js-submit').on('click', function(){
        submitInput();
    });

    $('#multipleInput').on('keydown', function(event){
        console.log(event);
        if(event.keyCode == 13){
            submitInput();
        }
    });

    $('.js-reset').on('click', function () {
        $('input.autocomplete').val('');
    });
});


function wordAutocompletion(value, callback){
    $.ajax({
        type:"POST",
        url : "/mot/" + value,
        success : function(data){
            var result = new Array();
            for (var i = 0; i < data.length; ++i) {
                result.push({
                    id : data[i]._source.id,
                    text : data[i]._source.name
                });
            }
            callback(value, result);
        },
        error: function(xhr, status, error) {
            console.log("error");
        }
    });
}

function relationTypeAutocompletion(word, callback){
    $.ajax({
        type:"POST",
        url : "/mot/" + word.id + '/relationTypes',
        success : function(data){
            var result = new Array();
            for (var i = 0; i < data.length; ++i) {
                result.push({
                    id : data[i].id,
                    text : data[i].code
                });
            }

            callback(result);
        },
        error: function(xhr, status, error) {
            console.log("error");
        }
    });
}

function wordRelationExist(word, relation, callback){
    $.ajax({
        type:"POST",
        url : '/exist/' + word + '/' + relation,
        success : function(data){
            callback(data);
        },
        error: function(xhr, status, error) {
            console.log("error");
        }
    });
}

function verificationTab(word, relation, endWord, callback){
    $.ajax({
        type:"POST",
        url : '/exist/' + word + '/' + relation + '/' + endWord,
        success : function(data){
            callback(data);
        },
        error: function(xhr, status, error) {
            console.log("error");
        }
    });
}

function submitInput(){
    var activeTabId = $('.tab > a.active').attr('href');

    var inputs = $(activeTabId + ' input');
    switch(inputs.length){
        case 1:
            window.location.href = '/' + $(inputs[0]).val();
            $('.progress').show();
            break;

        case 2:
            if(!wordSelected || !relationSelected){
                wordRelationExist($(inputs[0]).val(), $(inputs[1]).val(), function(data){
                    console.log(data);
                    if(data.idWord){
                        wordSelected = {
                            id: data.isWord,
                            text: $(inputs[0]).val()
                        }
                    }
                    if(data.existRelation){
                        relationSelected = {
                            id: data.idRelation,
                            text: $(inputs[1]).val()
                        };
                        window.location.href = '/mot/' + wordSelected.id + "/relationType/" + relationSelected.id;
                    }
                    else{
                        // Mettre erreur sur le champ relation
                    }
                });
                // Penser au chargement
                // Penser à modifier l'autocomplete pour les relations
            }
            else{
                window.location.href = '/mot/' + wordSelected.id + "/relationType/" + relationSelected.id;
                $('.progress').show();
            }
            break;

        case 3:
            verificationTab($(inputs[0]).val(), $(inputs[1]).val(), $(inputs[2]).val(), function (data) {
               console.log(data);
            });
            break;
    }
}