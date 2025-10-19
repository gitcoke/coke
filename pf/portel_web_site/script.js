// JavaScript Document
$(function(){
    $("ul.sub").hide();
    $("ul.menu li").hover(function(){
            $("ul:not(:animated)",this).slideDown("fast")
        },
        function(){
            $("ul",this).slideUp("fast");
    })
})

//$(function(){
//    $("ul.sub").hide();
//    $("ul.menu li").hover(function(){
//            $("ul:not(:animated)",this).fadeOut("slow")
//        },
//        function(){
//            $("ul",this).fadeOut("normal");
//    })
//})