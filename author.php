<?php
/**
 * The template for authors' pages
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */
?>

<?php
	get_header();
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>

<div class="box archive-meta">
	<h3 class="title-meta"><?php echo $curauth->display_name; _e("'s Posts", 'quench'); ?></h3>
	<?php if ( $curauth->description ) echo '<div class="desc-meta"><span class="top">◆</span>'.$curauth->description.'</div>'; ?>
</div>

<?php
	if( have_posts() ){
		while ( have_posts() ){
			the_post();
			get_template_part( 'inc/post-format/content', get_post_format() );
		}
	}
?>

<?php if($wp_query->max_num_pages > 1 ) { ?>
    <div class="pagination clearfix">
       <?php pagenavi($range = 3);?>
    </div>
<?php } ?>

</div></div>

<?php
get_sidebar();
get_footer();
?>
