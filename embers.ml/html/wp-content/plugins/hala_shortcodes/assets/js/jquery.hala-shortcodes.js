/**
* jquery.hala-shortcodes.js
*
* Author: motivoweb
* Author URI: http://motivoweb.com
* Email: info@motivoweb.com
* Version: 1.0.0
*/

! ( function( $ ) {

	/**
	* jQuery Hover3d
	* 
	* Version: 1.0.0
	* Docs: http://ariona.github.io/hover3d
	* Repo: http://github.com/ariona/hover3d
	* Issues: http://github.com/ariona/hover3d/issues
	*/

	$.fn.hover3d = function( options ){
		
		var settings = $.extend({
			selector      : null,
			perspective   : 1000,
			sensitivity   : 20,
			invert        : false,
			shine         : false,
			hoverInClass  : "hover-in",
			hoverOutClass : "hover-out",
			hoverClass    : "hover-3d"
		}, options);
		
		return this.each(function(){
			
			var $this = $(this),
				$card = $this.find(settings.selector);

			if( settings.shine ){
				$card.append('<div class="shine"></div>');
			}
			var $shine = $(this).find(".shine");

			// Set perspective and transformStyle value
			// for element and 3d object
			$this.css({
				perspective: settings.perspective+"px",
				transformStyle: "preserve-3d"
			});
			
			$card.css({
				perspective: settings.perspective+"px",
				transformStyle: "preserve-3d",
			});

			$shine.css({
				position  : "absolute",
				top       : 0,
				left      : 0,
				bottom    : 0,
				right     : 0,
				"z-index" : 9
			});
			
			// Mouse Enter function, this will add hover-in
			// Class so when mouse over it will add transition
			// based on hover-in class
			function enter(){
				$card.addClass(settings.hoverInClass+" "+settings.hoverClass);
				
				setTimeout(function(){
					$card.removeClass(settings.hoverInClass);
				}, 1000);
			}
			
			// Mouse movement Parallax effect
			function move(event){
				var w      = $this.innerWidth(),
					h      = $this.innerHeight(),
					ax 	   = settings.invert ?  ( w / 2 - event.offsetX)/settings.sensitivity : -( w / 2 - event.offsetX)/settings.sensitivity,
					ay     = settings.invert ? -( h / 2 - event.offsetY)/settings.sensitivity :  ( h / 2 - event.offsetY)/settings.sensitivity;
					dy     = event.offsetY - h / 2,
					dx     = event.offsetX - w / 2,
					theta  = Math.atan2(dy, dx),
					angle  = theta * 180 / Math.PI - 90;
					
				if (angle < 0) {
					angle  = angle + 360;
				}
				

				$card.css({
					perspective    : settings.perspective+"px",
					transformStyle : "preserve-3d",
					transform      : "rotateY("+ax+"deg) rotateX("+ay+"deg)"
				});

				$shine.css('background', 'linear-gradient(' + angle + 'deg, rgba(255,255,255,' + event.offsetY / h * .5 + ') 0%,rgba(255,255,255,0) 80%)');
			}
			
			// Mouse leave function, will set the transform
			// property to 0, and add transition class
			// for exit animation
			function leave(){
				$card.addClass(settings.hoverOutClass+" "+settings.hoverClass);
				$card.css({
					perspective    : settings.perspective+"px",
					transformStyle : "preserve-3d",
					transform      : "rotateX(0) rotateY(0)"
				});
				setTimeout( function(){
					$card.removeClass(settings.hoverOutClass+" "+settings.hoverClass);
				}, 1000 );
			}
			
			// Mouseenter event binding
			$this.on( "mouseenter", function(){
				return enter();
			});
			
			// Mousemove event binding
			$this.on( "mousemove", function(event){
				return move(event);
			});
			
			// Mouseleave event binding
			$this.on( "mouseleave", function(){
				return leave();
			});
			
		});
		
	};
	
	/* clear array */
	// Array.prototype.bsclean = function( deleteValue ) {
	//   	for ( var i = 0; i < this.length; i++ ) {
	//     	if ( this[i] == deleteValue ) {         
	//       		this.splice( i, 1 );
	//       		i--;
	//     	}
	//   	}

	//   	return this;
	// };

	var bsclean = function( arr, deleteValue ) {
		for ( var i = 0; i < arr.length; i++ ) {
	    	if ( arr[i] == deleteValue ) {         
	      		arr.splice( i, 1 );
	      		i--;
	    	}
	  	}

	  	return arr;
	}

	/* bsAnimation */
	var bsAnimation = {};
	bsAnimation.slideUp = function( el, callback, time ) {
		dynamics.css( 
			el, 
			{ translateY: $( el ).innerHeight(), opacity: 0 } );

		dynamics.animate(
			el, 
			{ 
				translateY: 0, 
				opacity: 1 }, 
			{ 
				type: dynamics.bezier, 
				duration: 327, 
				points: [{"x":0,"y":0,"cp":[{"x":0.153,"y":0.787}]},{"x":1,"y":1,"cp":[{"x":0.237,"y":1.067}]}], 
				delay: time,
				complete: function() {
					if( callback ) callback.call( this, el );
				}
			} 
		)
	}
	bsAnimation.slideDown = function( el, callback, time ) {
		dynamics.css( 
			el, 
			{ translateY: 0 } );

		dynamics.animate(
			el, 
			{ 
				translateY: $( el ).innerHeight()
			}, 
			{ 
				type: dynamics.bezier, 
				duration: 327, 
				points: [{"x":0,"y":0,"cp":[{"x":0.153,"y":0.787}]},{"x":1,"y":1,"cp":[{"x":0.237,"y":1.067}]}], 
				delay: time,
				complete: function() {
					if( callback ) callback.call( this, el );
				}
			} 
		)
	}

	/**
	 * tbbs_owlReinit
	 *
	 */
	function tbbs_owlReinit( owlObj, opts ) {
		owlObj.trigger( 'destroy.owl.carousel' ).removeClass( 'owl-carousel owl-loaded' );
		owlObj.html( owlObj.find('.owl-stage-outer').html() );
		owlObj.owlCarousel( opts );

		return owlObj;
	}

	/**
	 * tbbs_shortcodes
	 *
	 */
	function tbbs_shortcodes() {
		this.init();
	}

	tbbs_shortcodes.prototype = {
		init: function() {
			/* #code */
			this.hover3Handle();
			this.textillateHandle();
		},
 		hover3Handle: function() {
 			$( '[data-hover3]' ).each( function() {
 				var $this = $( this ),
 					opts = $this.data( 'hover3' );

 				$this.hover3d( opts );
 			} )
 		},
 		
 		textillateHandle: function() {
 			$( '[data-textillate-handle]' ).each( function() {
 				var $this = $( this );
 					opts = $this.data( 'textillate-handle' );
 				
 				try{
 					$this.textillate( opts );
 					if( opts.autoStart == false ) {
 						$this.data( 'play', false );
 						$( window ).on( 'scroll.playTextillate', function() {
 							if( 
 								$this.data( 'play' ) == false && 
 								$( this ).height() + $( this ).scrollTop() > $this.offset().top 
 							) {
 								$this.textillate( 'start' ).data( 'play', true );
 							}
 						} ).trigger( 'scroll.playTextillate' );
 					}
 				} catch ( e ) {
 					console.log( e )
 				}
 			} )
 		},
 		quickviewHandle: function() {

 			this.quickviewHandle.buildModal = function() {
 				var $modal = $( '<div>', { 
 					class: 'tbbs-modal-quickview-wrap loading', 
 					html: '<div class="tbbs-modal-container"><a href="#" class="tbbs-modal-close" title="Close"><i class="ion-ios-close-empty"></i></a><div class="tbbs-modal-body"></div></div>' } );

 				$modal.on( {
 					close: function() {
 						$modal.find( '.tbbs-modal-container' ).animate( {
 							top: '-600px',
 							opacity: 0,
 						}, 300, function() {
 							$modal.fadeOut( 'slow', function() {
	 							$( this ).remove();
	 						} )
 						} )

 						
 					},
 					pushContent: function( e, content ) {
 						$modal.removeClass( 'loading' );
 						$modal.find( '.tbbs-modal-body' ).append( content );
 					}
 				} )

 				$modal.on( 'click', function( e ) {
 					if( $( e.target ).hasClass( 'tbbs-modal-quickview-wrap' ) )
 						$modal.trigger( 'close' );
 				} )

 				/* close modal */
 				$modal.find( '.tbbs-modal-close' ).on( 'click', function( e ) {
 					e.preventDefault();

 					$modal.trigger( 'close' );
 				} )

 				$( 'body' ).append( $modal );
 				return $modal;
 			}

 			var self = this;
 			$( 'body' ).on( 'click', '.tbbs-quickview-handle', function( e ) {
 				e.preventDefault();

 				var $this = $( this ),
 					pid = $this.data( 'pid' ),
 					layout = $this.data( 'layout' ),
 					$modal = self.quickviewHandle.buildModal();

 				$.ajax( {
 					type: 'POST',
 					url: bsObj.ajaxurl,
 					data: { action: 'tbbs_quickviewAjaxHandle', layout: layout, pid: pid },
 					success: function( result ) {
 						$modal.trigger( 'pushContent', [result] );
 						if( $modal.find( '[data-slick-carousel]' ).length > 0 ) {
 							$modal.find( '[data-slick-carousel]' ).each( function() {
 								var $this = $( this ),
 									opts = $this.data( 'slick-carousel' );

 								$this.slick( opts );
 							} )
 						}
 					},
 					error: function( e ) {
 						alert( JSON.stringify( e ) );
 						console.log( e );
 					}
 				} )
 			} )
 		}
	};
	/* DOM Ready */
	$( function() {
		/* #code */
		new tbbs_shortcodes();
	} )
} )( jQuery )