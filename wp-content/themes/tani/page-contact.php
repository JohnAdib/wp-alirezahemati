<?php
/*
	Template Name: Contact
*/
?>
<?php get_header(); ?>
<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
<hr/>
<div id="content" >
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="entry">
<?php the_content('بیشتر بخوانید &raquo;'); ?>
<div class="clear"></div>
</div>
</div>
<?php endwhile; endif; ?>
</div>		
<?php get_sidebar(); ?>
<?php get_footer(); ?>