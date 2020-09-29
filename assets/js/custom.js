"use strict";

/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */
jQuery(document).ready(function ($) {
  /*
  *
  *	Current Page Active
  *
  ------------------------------------*/
  $("[href]").each(function () {
    if (this.href == window.location.href) {
      $(this).addClass("active");
    }
  });
  /*
  *
  *	Responsive iFrames
  *
  ------------------------------------*/

  var $all_oembed_videos = $("iframe[src*='youtube']");
  $all_oembed_videos.each(function () {
    $(this).removeAttr('height').removeAttr('width').wrap("<div class='embed-container'></div>");
  });
  /*
  *
  *	Flexslider
  *
  ------------------------------------*/

  $('.flexslider').flexslider({
    animation: "slide"
  }); // end register flexslider

  /*
  *
  *	Colorbox
  *
  ------------------------------------*/

  $('a.pop').colorbox({
    rel: 'gal',
    width: '80%',
    inline: true
  });
  /*
  *
  *	Isotope with Images Loaded
  *
  ------------------------------------*/

  var $container = $('#container').imagesLoaded(function () {
    $container.isotope({
      // options
      itemSelector: '.item',
      masonry: {
        gutter: 15
      }
    });
  });
  /*
  *
  *	Smooth Scroll to Anchor
  *
  ------------------------------------*/

  $('a').click(function () {
    $('html, body').animate({
      scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
    }, 500);
    return false;
  });
  /*
  *
  *	Sticky Nav
  *
  ------------------------------------*/

  $(function () {
    $('.sticker').stickyNavbar();
  }); // var header = $("#site-navigation");
  //  	$(window).scroll(function() {    
  //    var scroll = $(window).scrollTop();
  //       if (scroll >= 1) {
  //          header.addClass("fix-nav");
  //        } else {
  //          header.removeClass("fix-nav");
  //        }
  // });	

  /*
  *
  *	Equal Heights Divs
  *
  ------------------------------------*/

  $('.js-blocks').matchHeight();
  /*
  *
  *	Wow Animation
  *
  ------------------------------------*/

  new WOW().init();
}); // END #####################################    END