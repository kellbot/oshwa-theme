<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
/**************************** Display Header Title ***********************************/
function oshwa_header_title() {
	$format = get_post_format();
	if( is_archive() ) {
		if ( is_category() ) :
			$freesiaempire_header_title = single_cat_title( '', FALSE );
		elseif ( is_tag() ) :
			$freesiaempire_header_title = single_tag_title( '', FALSE );
		elseif ( is_author() ) :
			the_post();
			$freesiaempire_header_title =  sprintf( __( 'Author: %s', 'freesia-empire' ), '<span class="vcard">' . get_the_author() . '</span>' );
			rewind_posts();
		elseif ( is_day() ) :
			$freesiaempire_header_title = sprintf( __( 'Day: %s', 'freesia-empire' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			$freesiaempire_header_title = sprintf( __( 'Month: %s', 'freesia-empire' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) :
			$freesiaempire_header_title = sprintf( __( 'Year: %s', 'freesia-empire' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		elseif ( $format == 'audio' ) :
			$freesiaempire_header_title = __( 'Audios', 'freesia-empire' );
		elseif ( $format =='aside' ) :
			$freesiaempire_header_title = __( 'Asides', 'freesia-empire');
		elseif ( $format =='image' ) :
			$freesiaempire_header_title = __( 'Images', 'freesia-empire' );
		elseif ( $format =='gallery' ) :
			$freesiaempire_header_title = __( 'Galleries', 'freesia-empire' );
		elseif ( $format =='video' ) :
			$freesiaempire_header_title = __( 'Videos', 'freesia-empire' );
		elseif ( $format =='status' ) :
			$freesiaempire_header_title = __( 'Status', 'freesia-empire' );
		elseif ( $format =='quote' ) :
			$freesiaempire_header_title = __( 'Quotes', 'freesia-empire' );
		elseif ( $format =='link' ) :
			$freesiaempire_header_title = __( 'links', 'freesia-empire' );
		elseif ( $format =='chat' ) :
			$freesiaempire_header_title = __( 'Chats', 'freesia-empire' );
		elseif ( class_exists('WooCommerce') && (is_shop() || is_product_category()) ):
  			$freesiaempire_header_title = woocommerce_page_title( false );
  		elseif ( is_post_type_archive() ) :
  			$freesiaempire_header_title = post_type_archive_title('', f);
		else :
			$freesiaempire_header_title = __( 'Archives', 'freesia-empire' );
		endif;
	} elseif (is_home()){
		$freesiaempire_header_title = get_bloginfo( 'description' );
	} elseif (is_404()) {
		$freesiaempire_header_title = __('Page NOT Found', 'freesia-empire');
	} elseif (is_search()) {
		$freesiaempire_header_title = __('Search Results', 'freesia-empire');
	} elseif (is_page_template()) {
		$freesiaempire_header_title = get_the_title();
	} else {
		$freesiaempire_header_title = get_the_title();
	}
	return $freesiaempire_header_title;
}
