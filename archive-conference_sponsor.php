<?php
/**
 * The template for displaying all sponsors.
 *
 */
get_header();
	$freesiaempire_settings = freesiaempire_get_theme_options();
	global $freesiaempire_content_layout;
	if( $post ) {
		$layout = get_post_meta( $post->ID, 'freesiaempire_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) { //Settings from customizer
		if(($freesiaempire_settings['freesiaempire_sidebar_layout_options'] != 'nosidebar') && ($freesiaempire_settings['freesiaempire_sidebar_layout_options'] != 'fullwidth')){ ?>

<div id="primary">
<?php }
	}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="primary">
	<?php }
	}?>
	<main id="main" class="site-main clearfix">
	<?php global $freesiaempire_settings;
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
			<?php $format = get_post_format(); ?>
			<article <?php post_class('post-format'.' format-'.$format); ?><?php  ?> id="post-<?php the_ID(); ?>">
				<?php	if( has_post_thumbnail() ) { ?>
				
								<figure class="post-featured-image sponsor-logo">
								<?php the_post_thumbnail('sponsor_logo'); ?>
								</figure>
							
						<?php }
					 ?>
				<div class="sponsor-details">
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
				</div>
				<div class="entry-content">
				<?php the_content();
					wp_link_pages( array( 
						'before'			=> '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'freesia-empire' ),
						'after'			=> '</div>',
						'link_before'	=> '<span>',
						'link_after'	=> '</span>',
						'pagelink'		=> '%',
						'echo'			=> 1
					) ); ?>
				</div> <!-- .end entry-content -->
				
			</article>
			<div class="clearfix"></div>
	<?php }
		}
	else { ?>
	<h1 class="entry-title"> <?php _e( 'No Sponsors Found.', 'freesia-empire' ); ?> </h1>
	<?php } ?>
	</main> <!-- #main -->
	<?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($freesiaempire_settings['freesiaempire_sidebar_layout_options'] != 'nosidebar') && ($freesiaempire_settings['freesiaempire_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}else{ // for page/post
	if(($layout != 'no-sidebar') && ($layout != 'full-width')){
		echo '</div><!-- #primary -->';
	}
}
get_sidebar();
get_footer(); ?>