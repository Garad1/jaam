var $ = require('jquery');
require('materialize-css');
require('lodash');

$(function () {
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