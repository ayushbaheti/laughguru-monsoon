$(function() {

$(".like_button").click(function() 
{

var subject_id = $(this).attr("id");
alert("hello");
var dataString = 'like_id='+ subject_id ;

$(".like_show"+subject_id).fadeIn(200).html('<img src="ajax-loader.gif" />');

$.ajax({
   type: "POST",
   url: "message_like.php",
   data: dataString,
   cache: false,

   success: function(html)
   {
   $(".like_show"+subject_id).html(html);
   //$(".like_button").html("h");
  }  });
   

return false;
	});

});