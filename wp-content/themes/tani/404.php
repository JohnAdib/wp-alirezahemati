<?php get_header(); ?>

<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
<hr/>
<div id="content">
<div class="post">
<div class="title-404">
<h2>یافت نشد!</h2>
</div>
<div class="entry">
	<p>مطلبی در این آدرس وجود ندارد. دوباره تلاش کرده و یا از جستجو استفاده کنید</p>
	
	
		<h2>بایگانی ماهانه</h2>
		<ul>
		<?php wp_get_archives("type=monthly"); ?>
		</ul>
		
		<h2 class="widgettitle">دسته بندی ها</h2>
		<ul>
		<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 'TRUE', 'title_li' => '', 'number' => '10' ) ); ?>
		</ul>
			
		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>