var $ = require('jquery');
require('materialize-css');


$(function () {



  $("#changeSort").click(function(){

    var blockCote = $('.blockquote-in, .blockquote-out');

    $(blockCote).each(function (index, block) {
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

/*
    blockCote = $('.blockquote-out');


    $(blockCote).each(function (index, block) {
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

/*
    var rowRelation = $('#rowRelation');
    var test = rowRelation.getElementsByTagName('card');
    console.log(test);

    var card = rowRelation('.card');

    $(card).each(function (index, object) {
        var cardIn = object('.blockquote-in > a')
    });

    var elements = [];
    $(a).each(function (index, object) {
      console.log(object);
      console.log(index);
      console.log(a[index]);
      //var elem = elements.innerText || elements.textContent;
      //elements.push(a[index].text);
    });
    //console.log(elements);
    //console.log(a); */


  });

});