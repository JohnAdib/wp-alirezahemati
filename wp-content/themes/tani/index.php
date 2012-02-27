<?php get_header(); ?>
<?php get_template_part( 'slide', 'index' ); ?>


<div id="service-widget-area">
	
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Services') ) : else : ?>
	<?php endif; ?>
	<div class="clear"></div>
</div>		

<div id="full-content">
	<div class="caroselhead"> 
		<h2>آخرین نوشته ها</h2>
		<a id="next2" class="prev" href="#"> قبلی </a>
		<a id="prev2" class="next" href="#"> بعدی </a>
	</div>
<div id="carslide">

<?php $the_query = new WP_Query('posts_per_page=9' );
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<div class="post slidepost" id="post-<?php the_ID(); ?>">

		<?php
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
			$image = aq_resize( $img_url, 300, 150, true ); //resize & crop the image
		?>
		
		<?php if($image) : ?>
			<a href="<?php the_permalink(); ?>"><img class="slide-image" src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
		<?php endif; ?>

	 <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h3>
	<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>
	<div class="clear"></div>

</div> <!-- post end -->

<?php endwhile; ?>
<div class="clear"></div>
<?php wp_reset_postdata(); ?>
</div> 
</div>

<?php get_footer(); ?>