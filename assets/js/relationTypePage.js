var $ = require('jquery');
require('materialize-css');
var pagenumberIn = 2;
var pagenumberOut = 2;

$(function () {

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
                json.in.forEach(function(element) {
                    if(element.node.formattedName == "" && element.node.formattedName == false) {
                        var a = document.createElement('a');
                        a.href = '/' + element.node.name;
                        a.textContent = element.node.name + " ";
                        a.className = "tooltipped";
                        a.className += " relation";
                        a.setAttribute("data-tooltip", "weight: " + element.weight);
                        a.setAttribute("data-position","top");
                        readMore.parentNode.insertBefore(a,readMore);
                    } else {
                        var a = document.createElement('a');
                        a.href = '/' + element.node.name;
                        a.textContent = element.node.formattedName + " ";
                        a.className = "tooltipped";
                        a.className += " relation";
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
                json.out.forEach(function(element) {
                    if(element.node.formattedName == "" && element.node.formattedName == false) {
                        var a = document.createElement('a');
                        a.href = '/' + element.node.name;
                        a.textContent = element.node.name + " ";
                        a.className = "tooltipped";
                        a.className += " relation";
                        a.setAttribute("data-position","top");
                        a.setAttribute("data-tooltip", "weight: " + element.weight);
                        readMore.parentNode.insertBefore(a,readMore);
                        //div.insertBefore(a,'&nbsp;');
                    } else {
                        var a = document.createElement('a');
                        a.href = '/' + element.name ;
                        a.textContent = element.formattedName + " ";
                        a.className = "tooltipped";
                        a.className += " relation";
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