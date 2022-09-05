<footer class="p-footer">
  <?php wp_nav_menu(
    [
      'menu'  => 'footer-menu', //メニュー管理画面で登録したメニュー名
      'container' => '',
      'container_id' => '',
      'container_class' => '',
      'menu_id' => '',
      'menu_class' => 'footer-menu ', //もし自身のクラス名でこのメニューカテゴリーを装飾したかったら入れる
      'walker'  => new custom_walker_nav_menu,
      'theme_location' => 'footer-menu'
    ]
  ); ?>
  <?php get_template_part('sns'); ?>

</footer>
<?php wp_footer(); ?>
</body>

</html>