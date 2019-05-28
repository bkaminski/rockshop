var $ = jQuery.noConflict();

//MatchHeight for easy flexboxing
$(function() {
	$(".main-event-desc").matchHeight();
	$(".main-event-title").matchHeight();
});

//DISALLOW ILLEGAL CHARS IN INPUTS
$(document).ready(function(){
  $("#s, #yourName, #yourSubject, #quiz").keypress(function(e){
    var keyCode = e.which;
    // Not allow special 
    if ( !( (keyCode >= 48 && keyCode <= 57) 
      ||(keyCode >= 65 && keyCode <= 90) 
      || (keyCode >= 97 && keyCode <= 122) ) 
      && keyCode != 8 && keyCode != 32) {
      e.preventDefault();
    }
  });
});
