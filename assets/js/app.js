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
    $('i.material-icons').css( 'cursor', 'pointer' );
    $('i.material-icons').click(function(){
        if($('input#autocomplete-input').val() == "") {
            alert("Vous ne recherchez pas de mots");
        } else {
            document.location.href= $('input#autocomplete-input').val()
        }
    });
    $(document).keypress(function(e) {
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

    //RelationType.html.twig
    $("#readMoreIn").click(function(){

        var readMore = document.getElementById("readMoreIn");
        var div = document.getElementById("relationIn");

        var myUrl = $(location).attr('href') +'/in/' + pagenumberIn;

        $.ajax({
            type : 'POST',
            url : myUrl,
            dataType : 'json', // On désire recevoir du json
            success : function(json, statut){ // code_html contient le HTML renvoyé
                console.log(json); //Manipule ton objet comme ca :D
                json.in.forEach(function(element) {
                    if(element.formattedName == "") {
                        var a = document.createElement('a');
                        a.href = '/' + element.name;
                        a.textContent = element.name + " ";
                        a.className = "tooltipped";
                        a.setAttribute("data-tooltip", "weight: " + element.weight);
                        a.setAttribute("data-position","top");
                        readMore.parentNode.insertBefore(a,readMore);
                    } else {
                        var a = document.createElement('a');
                        a.href = '/' + element.name;
                        a.textContent = element.formattedName + " ";
                        a.className = "tooltipped";
                        a.setAttribute("data-tooltip", "weight: " + element.weight);
                        a.setAttribute("data-position","top");
                        readMore.parentNode.insertBefore(a,readMore);
                    }
                });
                $('.tooltipped').tooltip({delay: 50});

                if(!json.isMoreToLoad) {
                    $("#readMoreIn").hide();
                }
            }
        });
        pagenumberIn++;
    });

    $("#readMoreOut").click(function(){

        var readMore = document.getElementById("readMoreOut");
        var div = document.getElementById("relationIn");

        $.ajax({
          type : 'POST',
          url : $(location).attr('href') +'/out/' + pagenumberOut,
          dataType : 'json', // On désire recevoir du json
          success : function(json, statut){ // code_html contient le HTML renvoyé
              console.log(json);
              json.out.forEach(function(element) {
                  if(element.formattedName == "") {
                      var a = document.createElement('a');
                      a.href = '/' + element.name;
                      a.textContent = element.name + " ";
                      a.className = "relation tooltipped";
                      a.setAttribute("data-position","top");
                      a.setAttribute("data-tooltip", "weight: " + element.weight);
                      readMore.parentNode.insertBefore(a,readMore);
                      //div.insertBefore(a,'&nbsp;');
                  } else {
                      var a = document.createElement('a');
                      a.href = '/' + element.name ;
                      a.textContent = element.formattedName + " ";
                      a.className = "relation tooltipped";
                      a.setAttribute("data-tooltip", "weight: " + element.weight);
                      a.setAttribute("data-position","top");
                      readMore.parentNode.insertBefore(a,readMore);
                      //div.insertBefore(a,'&nbsp;');
                  }
              });
              $('.tooltipped').tooltip({delay: 50});
              if(!json.isMoreToLoad) {
                  $("#readMoreOut").hide();
              }
          }
        });
        pagenumberOut++;
    });
});