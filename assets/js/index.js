var $ = require('jquery');
require('materialize-css');

var wordArray;
var relationArray;
var wordSelected;
var relationSelected;
var verrou = false;

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

    $('input.js-last-input').on('keydown', function(event){
        if(event.keyCode === 13){
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

function relationTypeAutocompletion(word){
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

    if(isLocked()){
        return;
    }
    console.log('je passe');
    var activeTabId = $('.tab > a.active').attr('href');

    var inputs = $(activeTabId + ' input');
    var emptyInput = false;

    $(inputs).each(function(index, object){
        if($(object).val() === ''){
            // TODO : Mettre en rouge les champs qui ne sont pas rempli
            emptyInput = true;
        }
    });

    if(emptyInput){
        return;
    }

    switch(inputs.length){
        case 1:
            window.location.href = '/' + $(inputs[0]).val();
            $('.progress').show();
            break;

        case 2:
            if(!wordSelected || !relationSelected){
                var inputWord = $(inputs[0]).val();
                var inputRelation = $(inputs[1]).val();
                lock();
                wordRelationExist(inputWord, inputRelation, function(data){
                    console.log(data);
                    if(data.idWord){
                        // TODO : Mettre validation champs word
                        wordSelected = {
                            id: data.idWord,
                            text: inputWord
                        };
                        if(!data.existRelation){
                            relationTypeAutocompletion(wordSelected);
                        }
                    }
                    else{
                        // TODO : Mettre Erreur champs word
                    }
                    if(data.existRelation){
                        // TODO : Mettre validation champ Relation
                        relationSelected = {
                            id: data.idRelation,
                            text: inputRelation
                        };
                        window.location.href = '/mot/' + wordSelected.id + "/relationType/" + relationSelected.id;
                    }
                    else{
                        unlock();
                        // TODO : Mettre erreur sur le champ relation
                    }
                });
                // TODO : Penser au chargement
            }
            else{
                window.location.href = '/mot/' + wordSelected.id + "/relationType/" + relationSelected.id;
                $('.progress').show();
            }
            break;

        case 3:
            lock();
            verificationTab($(inputs[0]).val(), $(inputs[1]).val(), $(inputs[2]).val(), function (data) {
                // TODO : Ajouter les loaders
                if(data){
                   //TODO : réponse positive
                    alert('c est vrai :D');
               }
               else{
                   //TODO : réponse négative
                    alert('c est faux :(');
               }
               unlock();
            });
            break;
    }
}

function lock(){
    verrou = true;
}

function isLocked(){
    return verrou;
}

function unlock(){
    verrou = false;
}