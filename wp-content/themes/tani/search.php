<?php get_header(); ?>

<div class="topnav">	
	<?php
		$mySearch =& new WP_Query("s=$s & showposts=-1");
		$num = $mySearch->post_count;
		echo $num.' نتیجه برای جستجوی عبارت '; the_search_query();
	?> در <?php  get_num_queries(); ?> <?php timer_stop(1); ?> ثانیه پیدا شد.
</div>
<hr/>
<div id="content" >
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" id="post-<?php the_ID(); ?>">
			
		
				<div class="title">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
				
				<div class="entry">
					
				<?php wpe_excerpt('wpe_excerptlength_archive', 'wpe_excerptmore'); ?>
				<div class="clear"></div>
				</div>
			</div>

<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

<div class="post">
<div class="title">
		<h2>نتیجه ای برای جستجوی عبارت - <?php the_search_query();?> - در این وب سایت یافت نشد.</h2>
</div>


<div class="entry">

<p>پیشنهادات:</p>
<ul>
   <li>  املای تمام کلمات را بررسی نمایید.</li>
   <li>  از کلمات کلیدی دیگری استفاده نمایید.</li>
   <li>  از کلمات کلیدی عمومی تری استفاده نمایید.</li>
</ul>
</div></div>


<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>