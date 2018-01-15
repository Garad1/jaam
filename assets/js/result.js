var $ = require('jquery');
require('materialize-css');
var sortedByWeigth = true;

$(function () {

  function sortNumber(a,b) {
    return b - a;
  }

  $("#changeSort").click(function(){

    var blockCote = $('.blockquote-in , .blockquote-out');

    if (sortedByWeigth){
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
      sortedByWeigth = false;
    }else{
      $(blockCote).each(function (index, block) {
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
      sortedByWeigth = true;
    }




  });

});