<div class="clear"></div>


</div><!-- #main -->
</div><!-- #wrapper -->

<div id="bottom">
	<div class="bottombox">
		<ul>
		<?php if ( !function_exists('dynamic_sidebar')
				|| !dynamic_sidebar("Footer") ) : ?>  
		<?php endif; ?>
		</ul>
		<div class='clear'></div>
	</div>
</div>

<?php if(is_user_logged_in()) { ?>
<a id="nav-admin" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید"><img src="<?php bloginfo('template_directory'); echo"/images/navigate-admin.png"; ?>" alt="انتقال به پنل مدیریت" ></a>
<?php } ?>
	
<div id="footer">
	<div class="fcred">
		<div id="copyright">تمام حقوق این وب سایت برای <a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> محفوظ است.</div>
		<div id="powered-by">
		Designed By <a target="_blank" href="https://ermile.com/fa" title="طراحی شده توسط جواد عوض زاده | ارمایل Ermile" >Ermile &copy;</a> |
		<a href="http://validator.w3.org/check?uri=referer" title='HTML5 Valid' target="_blank"> HTML5 Valid</a>
		</div>
	</div>
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>