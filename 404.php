<?php get_header(); ?>

<div class="l-main">
 <div class="c-main__section">
  <div class="l-section__main">
  <h2>Nothing to see here</h2>
<p>We can't find this page / 404 error/</p>
<p>You might mistake type this page URL ：
<span class="error_msg">
http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?>
</span></p>
<p><a href="<?php echo esc_url(home_url()); ?>">HOME</a></p>
  </div>
 </div>	
</div>
</article>	

<?php get_footer(); ?>