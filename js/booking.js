$(function(){$("#booking-form").validator(),$("#booking-form").on("submit",function(t){if(!t.isDefaultPrevented()){return $.ajax({type:"POST",url:"bookingform.php",data:$(this).serialize(),success:function(t){var e="alert-"+t.type,i=t.message,s='<div class="alert '+e+' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+i+"</div>";e&&i&&($("#booking-form").find(".messages").html(s),$("#booking-form")[0].reset())}}),!1}})});