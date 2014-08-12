/*
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
*/

function likemessage(val)
{
var subject_id = val;
//alert("hello"+subject_id);
var dataString = 'like_id='+ subject_id ;

//$(".like_show"+subject_id).fadeIn(200).html('<img src="ajax-loader.gif" />');

$.ajax({
   type: "POST",
   url: "message_like.php",
   data: dataString,
   cache: false,

   success: function(html)
   {
   $(".like_show"+subject_id).html(html);
   if ($("#"+subject_id).html()=="Like") {
      $("#"+subject_id).html("Unlike");
   }
   else{
      $("#"+subject_id).html("Like");
   }
  }  });
   
}