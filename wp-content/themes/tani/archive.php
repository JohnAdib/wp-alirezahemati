<?php get_header(); ?>

<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
<hr/>

<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" id="post-<?php the_ID(); ?>">
			
		
				<div class="title">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
				
					<div class="postmeta">
					<span class="author">ارسال شده توسط <?php the_author(); ?> </span>
					<span class="clock"> در <?php the_time('j - M - Y'); ?></span>
					<span class="comm"><?php comments_popup_link('نظر شما چیست؟', 'یک دیدگاه', '% دیدگاه'); ?></span>
				</div>
				
				<div class="entry">
				
				<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 200,150, true ); //resize & crop the image
				?>
					
				<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>"><img class="blog-image" src="<?php echo $image ?>"/></a>
				<?php endif; ?>
				
				<?php wpe_excerpt('wpe_excerptlength_archive', 'wpe_excerptmore'); ?>
				<div class="clear"></div>
				</div>
			</div>

<?php endwhile; ?>
<?php getpagenavi(); ?>
<?php else : ?>
	<h1 class="title">یافت نشد</h1>
	<p>متاسفیم، ولی شما به دنبال مطلبی هستید که در اینجا نیست.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>