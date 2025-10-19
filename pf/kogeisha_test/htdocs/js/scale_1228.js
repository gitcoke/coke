
$(function(){
    $(".food").hover(function(){
        $(this).animate({
            width : 230,
            height : 680
        },
		
	function(){
            /*$(this).animate({
            width : 230,
            height : 160
        });*/
        });
    })
})

$(function(){
    $(".food").mouseout(function(){
        $(this).animate({
            width : 230,
            height : 280
        },
		
	function(){
            /*$(this).animate({
            width : 230,
            height : 160
        });*/
        });
    })
})

$(function(){
    $(".food1").hover(function(){
        $(this).animate({
            width : 230,
            height : 1560
        },500,null,
		
	function(){
            /*$(this).animate({
            width : 230,
            height : 160
        });*/
        });
    })
})

$(function(){
    $(".food1").mouseout(function(){
        $(this).animate({
            width : 230,
            height : 280
        },
		
	function(){
            /*$(this).animate({
            width : 230,
            height : 160
        });*/
        });
    })
})


/*$(function(){
    $(".info").fadeOut(0.1);
    $(".food").hover(function(){
        $(this).animate({
            width : 230,
            height : 2000
        },
        500,null,
		
		
		
		
        function(){
            $(this).parent().find(".info").fadeIn(500);
        });
    },function(){
        $(this).parent().find(".info").fadeOut(200,
            function(){
                $(this).parent().find("").animate({
                    width : 100,
                    height : 40
                }, 200);
            }
        );
    });
});*/
// JavaScript Document



/*ƒiƒr—pscript


$(function(){
    $("ul.menu li").hover(function(){
        $(">ul:not(:animated)",this).slideDown("fast")
    },
    function(){
        $(">ul",this).slideUp("fast");
    })
})
*/