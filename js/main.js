///////////////////////////////		
// Mobile Detection
///////////////////////////////

function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}



///////////////////////////////
// Parallax
///////////////////////////////

// Calcualte the home banner parallax scrolling
  function scrollBanner() {
    //Get the scoll position of the page
    scrollPos = jQuery(this).scrollTop();

    //Scroll and fade out the banner text
    jQuery('h1.featured-title').css({
      'margin-top' : -(scrollPos/3)+"px",
      'opacity' : 1-(scrollPos/300)
    });
	
    //Scroll the background of the banner
    /*jQuery('#featured').css({
      'background-position' : 'center ' + (-scrollPos/8)+"px"
    }); */   
  }


///////////////////////////////
// Initialize
///////////////////////////////	
	
//jQuery.noConflict();
jQuery(document).ready(function(){
	if(!isMobile()) {
		jQuery(window).scroll(function() {	      
	       		scrollBanner();	      
		});
	}
	else {
		jQuery('.featured-title').css({
			'position': 'relative',
			'text-align': 'center',
			'margin': 'auto',
			'padding': '0',
			'top':'0'
		});
	}
});

