var $ = require('jquery');
require('materialize-css');
require('materialize-autocomplete');

$(function () {
    $('.js-close-toast').each(function (index, object) {
        $(object).on('click', function(){
            $(this.parentElement).fadeOut(300, function(){ $(this).remove();});
        });
    });


    var multiple = $('#multipleInput').materialize_autocomplete({
        limit: 5,
        multiple: {
            enable: true,
            maxSize: 3,

            onAppend: function (item) {
                console.log('append done');
                multiple.resultCache = [];
            },

            onRemove: function (item) {
                console.log('remove done');
                multiple.resultCache = [];
            }
        },
        appender: {
            el: '.ac-users'
        },
        dropdown: {
            el: '#multipleDropdown'
        },
        ignoreCase: false,

        getData: function (value, callback) {
            switch(multiple.value.length){
                case 1:
                    relationTypeAutocompletion(multiple.value[0], value, callback);
                    break;

                default:
                    wordAutocompletion(value, callback);
                    console.log(multiple);
                    break;
            }
        }
    });

    $('.js-submit').on('click', function(){
        var url = window.location.protocol + '//' + window.location.host+ '/';
        switch(multiple.value.length){
            case 1:
                window.location.href = url + multiple.value[0].text;
                break;

            case 2:
                break;

            case 3:
                break;

            default:
                var value = $('input#multipleInput').val();
                if(value){
                    window.location.href = url + value;
                }
                else{
                    Materialize.toast('Le champ de recherche est vide', 4000)
                }
                break;
        }
    });

    $('.js-reset').on('click', function () {
        var tab = multiple.value;
        for(index in tab){
            multiple.remove(tab[index]);
        }
       $('input#multipleInput').val('');
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

function relationTypeAutocompletion(word, value, callback){
    $.ajax({
        type:"POST",
        url : "/mot/" + word.id + '/relationTypes',
        success : function(data){
            console.log(data);
            var result = new Array();
            for (var i = 0; i < data.length; ++i) {
                if(data[i].code.includes(value)){
                    result.push({
                        id : data[i].id,
                        text : data[i].code
                    });
                }
            }
            callback(value, result);
        },
        error: function(xhr, status, error) {
            console.log("error");
        }
    });
}