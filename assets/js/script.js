var index = 0 , index1 = 0;

jQuery(document).ready(function() {

 	var shrinkHeader = 100;
	jQuery(window).scroll(function() {
		var scroll = getCurrentScroll();
	  	if ( scroll >= shrinkHeader ) {
			jQuery('.navbar.navbar-default').addClass('scrolled');
	    }
	    else {
	        jQuery('.navbar.navbar-default').removeClass('scrolled');
	    }
	});

	sizeTheVideo();

	// Sticky WorkBar
	if(jQuery(".work-navbar").length > 0){

		jQuery(".work-navbar").stick_in_parent({
			offset_top : 50,
		});

		if(jQuery(window).width() < 768){
			jQuery(".work-navbar").trigger("sticky_kit:detach");
		}

	}
	if(jQuery(".select-franchise-location").length > 0){
		jQuery(".select-franchise-location").find('select option:first-child').html('Franchise Location');
	}

    // PRE REGISTER
    // if(jQuery(".pre-register").length > 0){
        // jQuery('.pre-register').on('click', function(){
        //     jQuery('.wpcf7-form .franchise-text').html((jQuery(this).hasClass('custom')) ? 'Preferred Location' : 'Franchise Location');
        //     jQuery('.wpcf7-form input.franchise-location').val(jQuery(this).data('location'));
        // });
	// }

	jQuery('.work-nav ul').onePageNav();

	jQuery("li.fancybox a, .fancybox").fancybox();

	jQuery('.match-height').matchHeight({
        byRow: true,
    });

	jQuery('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = jQuery(this.hash);
		  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
		    jQuery('html,body').animate({
		      scrollTop: target.offset().top - 54
		    }, 1000);
		    return false;
		  }
		}
	});

    jQuery('#site.franchises .teams .team-filter').on('click', 'a', function(e){
        e.preventDefault();
        // Filter
        var filter = jQuery(this).data('filter');
        // Modify active menu
        jQuery('.franchises .team-filter .active').removeClass('active');
        jQuery(this).addClass('active');
        // hide/show teams
        jQuery('.franchises .teams .team').hide();
        jQuery('.franchises .teams .team.'+filter).fadeIn();
    });

	jQuery('header .hamburger').on('click', function(e){
        e.preventDefault();
        if(jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active');
			jQuery("header").removeClass('menuopen');
			//jQuery("body").removeClass('noscroll');
			jQuery(this).parents().find(".nav-area").removeClass('active');
        } else {
            jQuery(this).addClass('active');
			jQuery(this).parents().find(".nav-area").addClass('active');
            jQuery("header").addClass('menuopen');
			//jQuery("body").addClass('noscroll');
        }
    });

	jQuery('.header-left .cta-btn').on('click', function(e){
        e.preventDefault();
        if(jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active');
			//jQuery("body").removeClass('noscroll');
			jQuery(this).parents().find("#register").removeClass('active');
			jQuery(this).html("Register <span>Your Interest</span>");
			jQuery("header").removeClass('registeropen');
        } else {
            jQuery(this).addClass('active');
			jQuery(this).parents().find("#register").addClass('active');
			jQuery(this).html("Exit <span>Registration</span> X");
			jQuery("header").addClass('registeropen');
			//jQuery("body").addClass('noscroll');
        }
    });

	jQuery('.contact-area .contact-left ul.menu li a[href*=#]:not([href=#])').on('click', function(e){
        jQuery(this).removeClass('active');
		jQuery(this).parents(".nav-area").removeClass('active');
		jQuery("header").removeClass('menuopen');
		jQuery('header .hamburger').removeClass('active');
    });


	jQuery(".wpcf7-radio span.wpcf7-list-item").each(function(){
        var checklbl = jQuery(this).find(".wpcf7-list-item-label").text();
        jQuery(this).find('label').append(checklbl);
    });

	jQuery(".wpcf7-checkbox span.wpcf7-list-item").each(function(){
        var checklbl = jQuery(this).find(".wpcf7-list-item-label").text();
        jQuery(this).find('label').prepend(checklbl);
    });

	jQuery('.contact-area .contact-left ul.menu li.menu-item-155').on('click', function(e){
        blink();
    });

	/*
	var viewer = document.querySelector('.my-viewer'),
		frame_count  = 5,
		offset_value = 600;

	// init controller
	var controller = new ScrollMagic.Controller({
		globalSceneOptions: {
			triggerHook: 0,
			reverse: true
		}
	});


	// build pinned scene
	new ScrollMagic.Scene({
		triggerElement: '#my_sticky',
		duration: (frame_count * offset_value) + 'px',
		reverse: true,
		offset: -54
	})
	.setPin('#my_sticky')
	.addIndicators()
	.addTo(controller);

	build step frame scene
	for (var i = 1, l = frame_count; i <= l; i++) {
		new ScrollMagic.Scene({
			triggerElement: '#my_sticky',
			offset: i * offset_value
		})
			.setClassToggle(viewer, 'myframe' + i)
		//.addIndicators()
			.addTo(controller);
	}

	tab click
    jQuery( '.tab-cell ul li' ).click(function(){
        var cur_pos = jQuery( '.scrollmagic-pin-spacer' ).offset().top + ( ( jQuery(this).index()  ) * offset_value ) ;
        jQuery( 'html, body' ).animate({ scrollTop: cur_pos },500);
    }); */

	jQuery( '.tab-cell ul li' ).click(function(){
        var that = jQuery(this);
        var this_index = jQuery(this).index();
        var this_length = jQuery( '.tab-cell ul li' ).length;

        jQuery( '.tab-cell ul li' ).removeClass('active');
        jQuery(this).addClass('active');

        jQuery( '.my-viewer' ).removeClass().addClass('my-viewer');
        for( var i=0; i<=this_index; ++i ){
            jQuery( '.my-viewer' ).addClass('myframe'+i);
        }

		jQuery( '.custom-arrow .right-arrow' ).removeClass('disable')
        jQuery( '.custom-arrow .left-arrow' ).removeClass('disable')
        if(jQuery( '.tab-cell ul li.active' ).index() == jQuery( '.tab-cell ul li' ).length-1){
            jQuery( '.custom-arrow .right-arrow' ).addClass('disable')
        }
        if(jQuery( '.tab-cell ul li.active' ).index() == 0){
            jQuery( '.custom-arrow .left-arrow' ).addClass('disable')
        }

    });


	jQuery( '.custom-arrow .right-arrow' ).click(function(){
	   if( jQuery( '.tab-cell ul li.active' ).index() < jQuery( '.tab-cell ul li' ).length-1) {
		   jQuery( '.tab-cell ul li.active' ).removeClass('active').next('li').addClass('active').trigger('click');
	   }
	});
	jQuery( '.custom-arrow .left-arrow' ).click(function(){
	   if( jQuery( '.tab-cell ul li.active' ).index() > 0) {
		   jQuery( '.tab-cell ul li.active' ).removeClass('active').prev('li').addClass('active').trigger('click');

	   }
	});

    // go bottom click
    jQuery( '.skip-section' ).click(function(){
        var go_bottom = jQuery(this).attr( 'data-rel' ),
            bottom_skip = jQuery( '#' + go_bottom ).offset().top;
        jQuery( 'html, body' ).animate({ scrollTop: bottom_skip },500);
    });

	if (jQuery('#scene').length > 0){
		var scene = document.getElementById('scene');
		var parallax = new Parallax(scene,{
			hoverOnly: true,
            selector: '.layer',
            relativeInput: true,
            clipRelativeInput: true,
            pointerEvents: true
		});
	}

	// if( (jQuery('#teams').length > 0) && (jQuery(window).width() < 768) ) {
	// 	jQuery('#teams').slick({
    //         autoplay: true,
    //         autoplaySpeed: 10000,
	// 		centerMode: true,
    //         centerPadding: '75px',
    //         slidesToShow: 1,
	// 		infinite: true,
	// 		arrows: false,
	// 		dots: true,
	// 		adaptiveHeight: true,
    //         responsive: [
    //         {
    //             breakpoint: 641,
    //             settings: {
    //                 centerPadding: '50px',
    //             }
    //         }
    //         ]
	// 	});
	// }

    if(jQuery('.helmet-mobile-slider').length > 0) {
		jQuery('.helmet-mobile-slider').slick({
			fade: true,
			cssEase: 'linear',
			arrows: false,
			dots: false,
			slidesToShow: 1,
			adaptiveHeight: true,
			speed: 0,
			infinite: false,
		});
	}

	// Video Library
	jQuery('.videos').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  prevArrow :  '<i class="prev"></i>',
	  nextArrow :  '<i class="next"></i>',
	  responsive: [
		    {
		      breakpoint: 900,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});

});

function getCurrentScroll() {
	return window.pageYOffset || document.documentElement.scrollTop;
}

var t = null;

function blink() {
    var obj = jQuery('input, textarea')
    obj.addClass("blink-class");
    t = setTimeout(function () {
        obj.removeClass("blink-class");
        // t = setTimeout(function () {
        //     blink();
		// 	return false;
        // }, 500);
    }, 500);
}

document.addEventListener('DOMContentLoaded', function(){

    Typed.new("#typed", {
        stringsElement: document.getElementById('typed-strings'),
        typeSpeed: 60,
        backDelay: 500,
        loop: true,
        contentType: 'html', // or text
        // defaults to null for infinite loop
        loopCount: null,
        callback: function(){ foo(); },
        resetCallback: function() { newTyped(); }
    });

    var resetElement = document.querySelector('.reset');
    if(resetElement) {
        resetElement.addEventListener('click', function() {
            document.getElementById('typed')._typed.reset();
        });
    }

});

function newTyped(){ /* A new typed object */ }
function foo(){ ; }

/* Script on scroll
------------------------------------------------------------------------------*/
jQuery(window).scroll(function() {
	sizeTheVideo();
});

function sizeTheVideo(){
  // - 1.78 is the aspect ratio of the video
// - This will work if your video is 1920 x 1080
// - To find this value divide the video's native width by the height eg 1920/1080 = 1.78
  var aspectRatio = 1.78;

    var video = jQuery('#video iframe');
    var videoHeight = video.outerHeight();
    var newWidth = videoHeight*aspectRatio;
		var halfNewWidth = newWidth/2;

  //Define the new width and centrally align the iframe
  video.css({"width":newWidth+"px","left":"50%","margin-left":"-"+halfNewWidth+"px"});
}
