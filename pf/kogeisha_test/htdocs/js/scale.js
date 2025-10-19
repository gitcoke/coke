/*
$(function(){
    $(".food").hover
	(function(){
        $(this).animate({
            width : 230,
            height : 680
        },
		
	function(){
        (this).animate({
            width : 230,
            height : 280
        }
		);
    });*/



$(function(){
$(".food1").hover(
function(){
this.style.backgroundColor = "yellow";
},
function(){
this.style.backgroundColor = "white";
}
);
});