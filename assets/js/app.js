var $ = require('jquery');
require('materialize-css');
require('lodash');

$(function () {

    $('.js-link-relation-type').click(function(){
        var idMot = $('.searched-word').attr('id');
        var idRelation = $(this)[0].parentNode.parentNode.parentNode.parentNode.id;
        var sort;
        switch ($('.sort .active').attr('id')){
            case 'js-sort-lexico':
                sort = 'lexico';
                break;
            default:
                sort = 'weight';
                break;
        }
        window.location.href = '/mot/' + idMot + '/relationType/' + idRelation + '/' + sort;
    });

    $('.button-collapse').sideNav({
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
    });

    //Recherche d'un autre mot quand on est dejà sur un mot
    $('.search-wrapper i.material-icons').click(function(){
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

    /**
     *  Partie sorting
     */
    var sortedByWeigth = true;
    var blockquote = $('.blockquote-in , .blockquote-out');

    $("#js-sort-weight").click(function () {
        if(sortedByWeigth){
            return;
        }
        $("#js-sort-weight").addClass('active');
        $("#js-sort-lexico").removeClass('active');
        sortByWeight(blockquote);
        sortedByWeigth = true;
    });

    $("#js-sort-lexico").click(function () {
        if(!sortedByWeigth){
            return;
        }
        $("#js-sort-weight").removeClass('active');
        $("#js-sort-lexico").addClass('active');
        sortLexico(blockquote);
        sortedByWeigth = false;
    });

});

function sortLexico(blockquote){
    $(blockquote).each(function (index, block) {
        var links = block.getElementsByTagName('a');
        var content = [];
        var map = new Map();

        $(links).each(function (index, link) {
            var contentLink = link.innerText || link.textContent;
            content.push(contentLink);
            map.set(contentLink, link);
        });

        var linksSorted = content.sort(function(a, b) { return a.localeCompare(b); });
        block.append('');

        $(linksSorted).each(function (index, value) {
            block.append(map.get(value));
        });

    });
}

function sortByWeight(blockquote){
    $(blockquote).each(function (index, block) {
        var links = block.getElementsByTagName('a');
        var map = [];

        $(links).each(function (index, link) {
            var contentLink = $(link).data("tooltip");
            contentLink = contentLink.substr('weight : '.length);
            map.push({weight: contentLink, content: link})
        });

        var linksSorted = map.sort(function(a, b){ return b.weight - a.weight});
        block.append('');

        $(linksSorted).each(function (index, value) {
            block.append(value.content);
        });

    });
}