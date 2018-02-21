$(document).ready(function(){

var findImage = $(this).find('img').attr('alt');

$('img').map(function(){

  var altimage = $(this).attr('alt'); 

  if(altimage == 'www.000webhost.com'){

      $(this).hide();

  }

});

$(".smoothScroll").click(function() {

   var id = $(this).attr('href');

    $('html, body').animate({

        scrollTop: $(id).offset().top

    }, 2000);

});
$(document).keydown(function (event) {
	if (event.keyCode == 123) { // Prevent F12
		return false;
	} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
		return false;
	}
});
$(document).keydown(function(event){
	if(event.keyCode==123){
	    return false;
	} else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
	   return false;
	} 
	if (event.ctrlKey && (event.keyCode === 67 || event.keyCode === 86 || event.keyCode === 85 || event.keyCode === 117)) {
	   //Alt+c, Alt+v will also be disabled sadly.
	    return false;
	}          
});
$(document).on("contextmenu",function(e){        
	e.preventDefault();
});
});