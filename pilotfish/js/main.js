///////////////////////////////		
// Mobile Detection
///////////////////////////////

function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}

///////////////////////////////
// Parallax Scrolling
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
  }

///////////////////////////////
// Initialize Parallax 
///////////////////////////////	

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

///////////////////////////////
// Slide Down Comment Forms
///////////////////////////////
	
jQuery(document).ready(function(){
	jQuery( '#commentform label' ).hide();
	jQuery( '.comment-notes').hide();
	jQuery( '#commentform .required' ).hide();
	jQuery( '#comment-form-author' ).hide();
	jQuery( '#comment-form-email' ).hide();
	jQuery( '#comment-form-url' ).hide();
	jQuery( '#commentform .form-submit' ).hide();
	
	jQuery( '.comment-form-comment' ).click(function(){
		if( jQuery('#comment-form-author').is(':hidden') ) {
			jQuery( '#comment-form-author' ).slideDown();
			jQuery( '#comment-form-email' ).slideDown();
			jQuery( '#comment-form-url' ).slideDown();
			jQuery( '#commentform .form-submit' ).slideDown();
		}
	});
});

///////////////////////////////
// Remove Title of Images
///////////////////////////////

/* The first line waits until the page has finished to load and is ready to manipulate */
$(document).ready(function(){
    /* remove the 'title' attribute of all <img /> tags */
    $("img").removeAttr("title");
});
