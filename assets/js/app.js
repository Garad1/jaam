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
        var div = $("#relationIn");
        console.log(pagenumberIn);

        var myUrl = $(location).attr('href') +'/in/' + pagenumberIn;
        console.log(myUrl);

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
                        a.textContent = element.name;
                        div.append(a);
                        div.append('&nbsp;');
                    } else {
                        var a = document.createElement('a');
                        a.href = '/' + element.name;
                        a.textContent = element.formattedName;
                        div.append(a);
                        div.append('&nbsp;');
                    }
                    
                    //console.log(element);
                });

                if(!json.isMoreToLoad) {
                    $("#readMoreIn").hide();
                }
            }
        });
        pagenumberIn++;
    });

  $("#readMoreOut").click(function(){
    var div = $("#relationIn");
    alert("I am an alert box!");
    console.log(pagenumberOut);
    //$("blockquote#relationIn");
    //$("blockquote#relationOut");
    $.ajax({
      type : 'POST',
      url : $(location).attr('href') +'/out/' + pagenumberOut,
      dataType : 'json', // On désire recevoir du json
      success : function(json, statut){ // code_html contient le HTML renvoyé
        console.log(json); //Manipule ton objet comme ca :D
        if(json.isMoreToLoad) {
          json.in.forEach(function(element) {
            console.log(element);
          });
        }
      }
    });
    pagenumberOut++;
  });

});