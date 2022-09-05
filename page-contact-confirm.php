<?php get_header(); ?>
<main class="l-main c-background">
  <section class="p-title-area">
    <div class="p-title-area__background">
      <div class="p-title-area__icon">
        <?php get_template_part('sns') ?>
      </div>
    </div>
  </section>
  <section class="p-contact">
    <div class="c-page-top"><a href="#"><i class="fas fa-arrow-up"></i></a></div>
    <div class="p-contact__top">
      <p class="p-contact__top__text">以下の内容で送信してよろしいでしょうか？</p>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="p-contact__form">
      <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>

  </section>
</main>
<?php get_footer(); ?>