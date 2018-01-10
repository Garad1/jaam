var $ = require('jquery');
require('materialize-css');

$(function () {
    $('.js-close-toast').each(function (index, object) {
        $(object).on('click', function(){
            $(this.parentElement).fadeOut(300, function(){ $(this).remove();});
        });
    });
});


$('input.autocomplete').bind('input', function() {

    $val = $(this).val();// get the current value of the input field.
    //Ajax request
    if($val != ""){
        $.ajax({
            type:"POST",
            url : "/mot/" + $('input.autocomplete').val(),
            success : function(data){

                var result = new Array();
                for (var i = 0; i < data.length; ++i) {
                    result[data[i]._source.name] = null;
                }
                console.log(result);

                $('input.autocomplete').autocomplete({
                    data: result,
                    limit: 5,// The max amount of results that can be shown at once. Default: Infinity.
                });
            },
            error: function(xhr, status, error) {
                console.log("error");
            }
        });
    }
});