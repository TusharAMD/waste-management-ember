/* ------------------------------------- */
/*  TABLE OF CONTENTS
/* ------------------------------------- */
/*   Preloader                           */
/*   WOW                                 */
/*   Menu                                */
/*   progress bars                       */
/*   counter                             */
/*   owl-carousel                        */
/*   isotope                             */
/*   pricing table                       */
/*   Lightbox popup                      */
(function ($) {
	
    "use strict";
    $(window).load(function () {
        /* ------------------------------------- */
        /*   Preloader
         /* ------------------------------------- */
        $("#loading").delay(100).fadeOut("slow");
        /* ------------------------------------- */
        /*   wow
         /* ------------------------------------- */
        new WOW().init();
    });
    /* ------------------------------------- */
    /*   Menu
     /* ------------------------------------- */
    //open navigation clicking the menu icon
    $('.cd-nav-trigger').on('click', function (event) {
        event.preventDefault();
        toggleNav(true);
    });
    //close the navigation
    $('.cd-close-nav, .cd-overlay').on('click', function (event) {
        event.preventDefault();
        toggleNav(false);
    });
    //select a new section
    $('.cd-nav li').on('click', function (event) {
        var target = $(this),
            //detect which section user has chosen
            sectionTarget = target.data('menu');
        if (!target.hasClass('cd-selected')) {
            //if user has selected a section different from the one alredy visible
            //update the navigation -> assign the .cd-selected class to the selected item
            target.addClass('cd-selected').siblings('.cd-selected').removeClass('cd-selected');
            //load the new section
            loadNewContent(sectionTarget);
        } else {
            // otherwise close navigation
            toggleNav(false);
        }
    });
    function toggleNav(bool) {
        $('.cd-nav-container, .cd-overlay').toggleClass('is-visible', bool);
        $('main').toggleClass('scale-down', bool);
    }
    function loadNewContent(newSection) {
        //create a new section element and insert it into the DOM
        var section = $('<section class="cd-section ' + newSection + '"></section>').appendTo($('main'));
        //load the new content from the proper html file
        section.load(newSection + '.html .cd-section > *', function (event) {
            //add the .cd-selected to the new section element -> it will cover the old one
            section.addClass('cd-selected').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                //close navigation
                toggleNav(false);
            });
            section.prev('.cd-selected').removeClass('cd-selected');
        });
        $('main').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
            //once the navigation is closed, remove the old section from the DOM
            section.prev('.cd-section').remove();
        });
        if ($('.no-csstransitions').length > 0) {
            //if browser doesn't support transitions - don't wait but close navigation and remove old item
            toggleNav(false);
            section.prev('.cd-section').remove();
        }
    }
    /* Menu color effect */
    $(window).scroll(function () {
        var navbarHeight = $('.hero').outerHeight();
        if ($(this).scrollTop() > navbarHeight && !$('.navigation').hasClass('nav-up')) {
            $('.navigation').addClass('nav-up');
        } else if ($(this).scrollTop() <= navbarHeight) {
            $('.navigation').removeClass('nav-up');
        }
    });
    /* ------------------------------------- */
	/*  Open the hide menu
	/* ------------------------------------- */		
	function HalaOpenTheHideMenu() {
		if ($('.mo-header-v3 .mo-toggle-menu').length) {
			$('.mo-header-v3 .mo-toggle-menu').on('click', function() {
				var $menu = $('#mo_header .mo-menu-list');
				
				$(this).toggleClass('active');
				$menu.toggleClass('active');
				
				$menu.on( {
					'menu.open': function( e ) {
						var $li_items = $( this ).find( '> ul > li' );
						$li_items.each( function() {
							var index = $( this ).index();
							btAnimation.slideUp( this, index * 80 );
						} )
					},
					'menu.hidden': function( e ) {
						var $li_items = $( this ).find( '> ul > li' );
						$li_items.each( function() {
							var index = $( this ).index();
							btAnimation.slideDown( this, index * 80 );
						} )
					}
				} )
				
				if( $menu.hasClass('active') )
					$menu.trigger( 'menu.open' )
				else 
					$menu.trigger( 'menu.hidden' )
			});
		}
	}
	HalaOpenTheHideMenu();
	/* Open the hide mini search */
	function HalaOpenMiniSearchSidebar() {
		$('.mo-search-header > a').on('click', function() {
			$(this).toggleClass('active');
			$('.mo-cart-header > a.mo-icon').removeClass('active');
			$('#mo_header .header_search').toggle();
			$('.mo-cart-content').hide();
		});
	}
	HalaOpenMiniSearchSidebar();
	
	function HalaOpenMiniCartSidebar() {
			$('.mo-cart-header > a.mo-icon').on('click', function() {
				$(this).toggleClass('active');
				$('.mo-search-sidebar > a').removeClass('active');
				$('.mo-cart-content').toggle();
				$('.header_search').hide();
			});
		}
	HalaOpenMiniCartSidebar();
	
	/* Open the hide menu */
	function HalaOpenMenu() {
		$('#mo-header-icon').on('click', function() {
			$(this).toggleClass('active');
			$('.mo-menu-list').toggleClass('hidden-xs');
			$('.mo-menu-list').toggleClass('hidden-sm'); 
		});
	}
	HalaOpenMenu();
	/* Mobile Menu Dropdown Icon Header V1, V2, V3 */
	function HalaMobileMenuDropdown() {
		var hasChildren = $('.mo-header-v1 .mo-menu-list ul li.menu-item-has-children, .mo-header-v2 .mo-menu-list ul li.menu-item-has-children, .mo-header-v3 .mo-menu-list ul li.menu-item-has-children, .mo-header-v4 .mo-menu-list ul li.menu-item-has-children');
		
		hasChildren.each( function() {
			var $btnToggle = $('<a class="mb-dropdown-icon hidden-lg hidden-md" href="#"></a>');
			$( this ).append($btnToggle);
			$btnToggle.on( 'click', function(e) {
				e.preventDefault();
				$( this ).toggleClass('open');
				$( this ).parent().children('ul').toggle('slow'); 
			} );
		} );
	}
	HalaMobileMenuDropdown();
	/* Menu Dropdown Icon Header Canvas, Header Canvas Border */
	function HalaMenuCanvasDropdown() {
		var hasChildren = $('.mo-header-canvas .mo-menu-list ul li.menu-item-has-children, .mo-header-canvas-border .mo-menu-list ul li.menu-item-has-children');
		
		hasChildren.each( function() {
			var $btnToggle = $('<a class="mb-dropdown-icon" href="#"></a>');
			$( this ).append($btnToggle);
			$btnToggle.on( 'click', function(e) {
				e.preventDefault();
				$( this ).toggleClass('open');
				$( this ).parent().children('ul').toggle('slow'); 
			} );
		} );
	}
	HalaMenuCanvasDropdown();
	/* Header Stick */
	function HalaHeaderStick() {
		if($( '.mo-header-v1, .mo-header-v2, .mo-header-v3, .mo-header-v4' ).hasClass( 'mo-header-stick' )) {
			var header_offset = $('#mo_header .mo-header-menu').offset();
		
			if ($(window).scrollTop() > header_offset.top) {
				$('body').addClass('mo-stick-active');
			} else {
				$('body').removeClass('mo-stick-active');
			}
			$(window).on('scroll', function() {
				if ($(window).scrollTop() > header_offset.top) {
					$('body').addClass('mo-stick-active');
				} else {
					$('body').removeClass('mo-stick-active');
				}
			});
			
			$(window).on('load', function() {
				if ($(window).scrollTop() > header_offset.top) {
					$('body').addClass('mo-stick-active');
				} else {
					$('body').removeClass('mo-stick-active');
				}
			});
			$(window).on('resize', function() {
				if ($(window).scrollTop() > header_offset.top) {
					$('body').addClass('mo-stick-active');
				} else {
					$('body').removeClass('mo-stick-active');
				}
			});
		}
	}
	HalaHeaderStick();
    /* Smooth scroll function */
    $(document).on('click', '#menu-one-page-menu a , .scroll-down-link , .to-top', function (e) {
        if ($(e.target).is('a[href*="#"]:not([href="#"]')) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        }
    });
	
    $(document).ready(function () {
		/* ------------------------------------- */
        /*  counter
        /* ------------------------------------- */
         $('.counter').counterUp({delay:10,time:1000});
		/* ------------------------------------- */
        /*  fixed footer 
        /* ------------------------------------- */
		  var footerFixed = $('.footer-fixed').outerHeight();
		  if($(document).width() > 991) {
			$('.main-content').css('margin-bottom',footerFixed);
		  }
         /* ------------------------------------- */
         /*  owl-carousel
         /* ------------------------------------- */
		 /*OWL Carousel*/
		function HalathemesOwlCaousel($elem) {
			$elem.owlCarousel({
				items:$elem.data( "col_lg" ),
				margin:$elem.data( "item_space" ),
				loop:$elem.data( "loop" ),
				autoplay: $elem.data( "autoplay" ),
				smartSpeed: $elem.data( "smartspeed" ),
				dots:$elem.data( "dots" ),
				nav:$elem.data( "nav" ),
				navText: ['<span class="prev"></span>', '<span class="next"></span>'],
				responsive:{
					0:{
						items:$elem.data( "col_xs" ),
						nav:false,
						dots:false,
					},
					768:{
						items:$elem.data( "col_sm" ),
						nav:false,
						dots:false,
					},
					992:{
						items:$elem.data( "col_md" ),
					},
					1200:{
						items:$elem.data( "col_lg" ),
					}
				}
			});
		}
		
		/* Active carousel */
		if ($('.owl-carousel').length) {
			$('.owl-carousel').each(function() {
				new HalathemesOwlCaousel($( this ));
			});
		}
		/* Active testimonial carousel */
		if ($('.testimonial-carousel').length) {
			$('.testimonial-carousel').each(function() {
				new HalathemesOwlCaousel($( this ));
			});
		}
		/* Active images carousel */
		if ($('.image-carousel').length) {
			$('.image-carousel').each(function() {
				new HalathemesOwlCaousel($( this ));
			});
		}
		/*  post carousel */
		$(".carousel-post").owlCarousel({
            items: 1,
            autoplay: true,
            stopOnHover: true,
            dots: true,
        });
		 
		$(".search-submit").after('<i class="fa fa-search"></i>');
		$(".submit-newsletter").after('<i class="fa fa-long-arrow-right submit-newsletter-icon"></i>');
        /* ------------------------------------- */
        /*   portfolio-filter
         /* ------------------------------------- */
        // filter items on button click
        $('.portfolio-filter').on('click', 'a', function(e) {
            e.preventDefault();
            var filterValue = $(this).attr('data-filter');
            $container.isotope({
                filter: filterValue
            });
            $('.portfolio-filter a').removeClass('active');
            $(this).closest('a').addClass('active');
        });
        // isotope Masonry
        var $container = $('.masonry');
        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: '.masonry-item',
                layoutMode: 'masonry',
                resizesContainer: false,
                percentPosition: true,
                masonry: {
                    columnWidth: '.masonry-img',
                }
            });
        });
        $('.masonry-posts').isotope({
            masonry: {
                itemSelector: '.masonry-post',
                percentPosition: true,
            }
        });
        /* ------------------------------------- */
        /*   pricing table
        /* ------------------------------------- */
        $('.pricing').waypoint(function () {
            $('.pricing-best').addClass('depth');
        });
		/* ------------------------------------- */
        /*  Lightbox popup
        /* ------------------------------------- */
		jQuery('.lightbox-gallery').each(function() {
			jQuery(this).magnificPopup({
				type:'image',
				image: {
					titleSrc: 'title',
					verticalFit: true
				},
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0, 1]
				},
			});
		});
		jQuery('.lightbox-video').each(function() {
			jQuery(this).magnificPopup({
				type:'iframe',
				iframe: {
					patterns: {
						youtube: {
							index: 'youtube.com/',
							id: 'v=',
							src: 'http://www.youtube.com/embed/%id%?autoplay=1'
						},
						vimeo: {
						  index: 'vimeo.com/',
						  id: '/',
						  src: '//player.vimeo.com/video/%id%?autoplay=1'
						}
					}
				}
			});
		}); 
      /* ------------------------------------- */
      /*  woocommerce
      /* ------------------------------------- */ 
		/* Add Product Quantity Up Down icon */
        $('form.cart .quantity, .product-quantity .quantity').each(function() {
            $(this).prepend('<span class="qty-minus"><i class="fa fa-minus"></i></span>');
            $(this).append('<span class="qty-plus"><i class="fa fa-plus"></i></span>');
        });
        /* Plus Qty */
        $(document).on('click', '.qty-plus', function() {
            var parent = $(this).parent();
            $('input.qty', parent).val( parseInt($('input.qty', parent).val()) + 1);
        })
        /* Minus Qty */
        $(document).on('click', '.qty-minus', function() {
            var parent = $(this).parent();
            if( parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val( parseInt($('input.qty', parent).val()) - 1);
            }
        })
		/* Single image gallery */
		if($('.mo-slick-slider').length > 0) {
			$('.mo-slick-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
				nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
				fade: true,
				asNavFor: '.mo-slick-slider-nav'
			});
		}
		if($('.mo-slick-slider-nav').length > 0) {
			$('.mo-slick-slider-nav').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
				asNavFor: '.mo-slick-slider',
				centerMode: true,
				focusOnSelect: true
			});
		}
    });
})(jQuery);