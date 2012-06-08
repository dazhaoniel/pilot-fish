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
	
    //Scroll the background of the banner
    /*jQuery('#featured').css({
      'background-position' : 'center ' + (-scrollPos/8)+"px"
    }); */   
  }

///////////////////////////////
// Initialize Parallax 
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

///////////////////////////////
// Slide Down Comment Forms
///////////////////////////////
	
jQuery(document).ready(function(){
	var input = document.createElement( 'input' ),
	    comment = jQuery( '#comment' );

	if ( 'placeholder' in input ) {
		comment.attr( 'placeholder', jQuery( '.comment-textarea label' ).remove().text() );
	}

	// Expando Mode: start small, then auto-resize on first click + text length
	jQuery( '.comment-notes' ).hide();
	jQuery( '.comment-form-author' ).hide();
	jQuery( '.comment-form-email' ).hide();
	jQuery( '.comment-form-url' ).hide();
	jQuery( '#commentform .form-submit' ).hide();

	comment.css( { 'height':'10px' } ).one( 'focus', function() {
		var timer = setInterval( HighlanderComments.resizeCallback, 10 )
		jQuery( this ).animate( { 'height': HighlanderComments.initialHeight } ).delay( 100 ).queue( function(n) { clearInterval( timer ); HighlanderComments.resizeCallback(); n(); } );
		
	jQuery( '.comment-form-author' ).slideDown();
	jQuery( '.comment-form-email' ).slideDown();
	jQuery( '.comment-form-url' ).slideDown();
	jQuery( '#commentform .form-submit' ).slideDown();
	});
});
