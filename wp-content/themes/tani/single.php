<?php get_header(); ?>
<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
<hr/>
<div id="content" >
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post clearfix" id="post-<?php the_ID(); ?>">

<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک مستقیم به<?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="postmeta">
		<span class="author">نوشته شده توسط <?php the_author(); ?> </span> 
		<span class="clock"> در <?php the_time('j - M - Y'); ?> </span>
		<span class="comm"><?php comments_popup_link('نظر شما چیست؟', 'یک دیدگاه', '% دیدگاه'); ?></span>
</div>

<div class="entry">
<?php
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
		$image = aq_resize( $img_url, 700, 400, true ); //resize & crop the image
?>
	
<?php if($image) : ?>
	<a href="<?php echo $image ?>" rel="lightbox"><img class="post-image aligncenter"  src="<?php echo $image ?>" alt="<?php the_title(); ?>"/></a>
<?php endif; ?>


	<?php the_content('بیشتر بخوانید &raquo;'); ?>
	<div class="clear"></div>
	<?php wp_link_pages(array('before' => '<p><strong>صفحه: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<div class="postmeta">
<span class="categori">دسته: <?php the_category(', '); ?> </span>
<div class="tags">کلیدواژه <?php the_tags(', '); ?></div>
</div>

</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>

		<h1 class="title">یافت نشد</h1>
		<p>متاسفیم، ولی شما به دنبال مطلبی هستید که در اینجا نیست. با جستجو پیدایش کنید</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>