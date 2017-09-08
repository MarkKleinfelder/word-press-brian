/**
 *	jQuery Document Ready
 */
jQuery( document ).ready( function($) {
	// Variables
	var windowWidth = $( window ).width();
	var windowHeight = $( window ).height();
	var containerFluid = $( '.photoplast-lite.container-fluid' );
	var containerFluidWidth = $( containerFluid ).width();
	var blogPosts = $( '.blog-posts' );

	// Align Images
	function alignImages() {
		$( blogPosts ).each( function() {
			var blogPost = $( this ).children( '.col-lg-12' ).children( '.post' );
			var postImage = $( blogPost ).children( '.post-image' );
			var postImageWidth = $( postImage ).width();

			if( $( blogPost ).hasClass( 'photoplast-lite-post-left' ) ) {
				$( postImage ).css({
					'width': postImageWidth + ( ( windowWidth - containerFluidWidth ) / 2 ),
					'margin-left': -( windowWidth - containerFluidWidth ) / 2
				});
			} else if( $( blogPost ).hasClass( 'photoplast-lite-post-right' ) ) {
				$( postImage ).css({
					'width': postImageWidth + ( ( windowWidth - containerFluidWidth ) / 2 ),
					'margin-right': -( windowWidth - containerFluidWidth ) / 2
				});
			}
		});
	}

	// Called Functions
	$( function() {
		alignImages();
	});
});