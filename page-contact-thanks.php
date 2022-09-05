<?php get_header(); ?>
<main class="l-main c-background--adj">
  <section class="p-title-area">

  </section>
  <section class="p-contact">
    <div class="c-page-top"><a href="#"><i class="fas fa-arrow-up"></i></a></div>
    <div class="p-contact__top">
      <p class="p-contact__top__text u-margin--150">お問い合せありがとうございます！
        <br>
        返信いたしますのでしばらくお待ちください。
      </p>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="p-contact__form">
      <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>

  </section>
</main>
<?php get_footer(); ?>