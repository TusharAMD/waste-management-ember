/**
 * jquery.hala_core.admin.js
 * Author: hala
 * Author Uri: http://hala.com
 * Email: hala@gmail.com
 * Version: 1.0
 */

! ( function( $ ) {
	'use strict';

	var halaAPI = function() {
		this.init();
	}

	halaAPI.prototype = {
		init: function() {
			this.accordionHandle();
			this.backupdatabaseHandle();
		},
		accordionHandle: function() {
			$( '.hala-block-accordion-wrap' ).each( function() {
				var $accordionWrap = $( this );

				$accordionWrap.find( '.hala-block-accordion-body' ).slideUp( 0 );
				$accordionWrap.find( '.hala-block-accordion' ).first().find( '.hala-block-accordion-body' ).slideDown( 'slow' );

				$accordionWrap.on( 'click', '.hala-block-accordion > .title', function() {
					var $accordionItem = $( this ).parent( '.hala-block-accordion' );
					$accordionWrap.find( '.hala-block-accordion-body' ).slideUp( 'slow' );
					$accordionItem.find( '.hala-block-accordion-body' ).slideDown( 'slow' );
				} )
			} )
		},
		backupdatabaseHandle: function() {
			$( 'body' ).on( 'click', '#hala-backupdatabase-handle', function( e ) {
				e.preventDefault();
				var $this = $( this ),
					path = $( this ).data( 'path' ),
					uri = $( this ).data( 'uri' );

				$this.addClass( 'hala-ajax-loading' );

				$.ajax( {
					type: 'POST',
					url: hala_object.ajax_url,
					data: { action: 'hala_backupDatabase_handle', path: path, uri: uri },
					success: function( result ) {
						// console.log( result );
						$this.removeClass( 'hala-ajax-loading' );
						$this.parents( '.hala-block-accordion-body' ).append( $( result ).css( 'display', 'none' ).fadeIn( 'slow' ) );
					},
					error: function( e ) {
						alert( JSON.stringify( e ) );
						console.log( e )
					}
				} )
			} )

			/* Restore */
			$( 'body' ).on( 'click', 'a.hala-restore-database', function( e ) {
				e.preventDefault();

				var $this = $( this ),
					$rowElem = $( this ).parents( '.table-row' ),
					file = $( this ).data( 'file' ),
					ask = confirm( 'Do you want RESTORE database?' );

				if( ask == true ) {
				    $rowElem.addClass( 'hala-ajax-loading' );

				    $.ajax( {
						type: 'POST',
						url: hala_object.ajax_url,
						data: { action: 'hala_restoreDatabase_handle', file: file },
						success: function( result ) {
							alert( result );
							$rowElem.removeClass( 'hala-ajax-loading' );
							console.log( result );
						},
						error: function( e ) {
							alert( JSON.stringify( e ) );
							console.log( e )
						}
					} )
				}
			} )

			/* Delete */
			$( 'body' ).on( 'click', 'a.hala-delete-database', function( e ) {
				e.preventDefault();

				var $rowElem = $( this ).parents( '.table-row' ),
					file = $( this ).data( 'file' ),
					ask = confirm( 'Do you want DELETE this file?' );

				if( ask == true ) {
				    $rowElem.addClass( 'hala-ajax-loading' );

				    $.ajax( {
						type: 'POST',
						url: hala_object.ajax_url,
						data: { action: 'hala_deleteDatabase_handle', file: file },
						success: function( result ) {
							alert( result );
							$rowElem.fadeOut( 'slow', function() { $( this ).remove() } );
							console.log( result );
						},
						error: function( e ) {
							alert( JSON.stringify( e ) );
							console.log( e )
						}
					} )
				}
			} )
		}
	}

	/* DOM Reaady */
	$( function() {

		/* use halaAPI */
		new halaAPI();
	} ) 
} )( jQuery )
