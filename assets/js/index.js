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
            maxSize: 3
        },
        appender: {
            el: '.ac-users'
        },
        dropdown: {
            el: '#multipleDropdown'
        },
        ignoreCase: false,
        getData: function (value, callback) {
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
    });

    $('.js-submit').on('click', function(){
        switch(multiple.value.length){
            case 1:
                console.log(window.location.hostname);
                window.location.href = window.location.protocol + '//' + window.location.host+ '/' + multiple.value[0].text;
                break;

            case 2:
                break;

            case 3:
                break;

            default:
                break;
        }
    });
});
