var $ = require('jquery');
require('materialize-css');

$(function () {
    $('.js-close-toast').each(function (index, object) {
        $(object).on('click', function(){
            $(this.parentElement).fadeOut(300, function(){ $(this).remove();});
        });
    });
});

$('.chips-autocomplete').material_chip({
    autocompleteOptions: {
        data: [],
        limit: 5,
        minLength: 1
    }
});

$('.chips > input').bind('input', function() {

    $val = $(this).val();// get the current value of the input field.
    //Ajax request
    if($val != ""){
        $.ajax({
            type:"POST",
            url : "/mot/" + $('.chips > input').val(),
            success : function(data){

                var result = new Array();
                for (var i = 0; i < data.length; ++i) {
                    result[data[i]._source.name] = null;
                }
                console.log(result);

                $('.chips-autocomplete').material_chip({
                    autocompleteOptions: {
                        data: result,
                        limit: 5,
                        minLength: 1
                    }
                });
            },
            error: function(xhr, status, error) {
                console.log("error");
            }
        });
    }
});