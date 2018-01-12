var $ = require('jquery');
require('materialize-css');
var pagenumberIn = 2;
var pagenumberOut = 2;

$(function () {

    $('.button-collapse').sideNav({
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
    });

    //Recherche d'un autre mot quand on est dejà sur un mot
    $('i.material-icons').click(function(){
        if($('input#autocomplete-input').val() == "") {
            alert("Vous ne recherchez pas de mots");
        } else {
            document.location.href= $('input#autocomplete-input').val()
        }
    });
    $('#autocomplete-input').keypress(function(e) {
        if(e.which == 13) {
            if($('input#autocomplete-input').val() == "") {
                alert("Vous ne recherchez pas de mots");
            } else {
                document.location.href= $('input#autocomplete-input').val()
            }
        }
    });

    $('.scrollspy').scrollSpy(1000);

    $('.tooltipped').tooltip({delay: 50});

    $(".accordion").each(function(){
        $(this).click(function(){
            $(this).toggleClass("hidden");
            $(this.nextElementSibling).toggle(0);
        });
    });

});