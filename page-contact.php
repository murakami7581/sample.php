<?php get_header(); ?>
<main class="l-main c-background">
  <section class="p-title-area">
    <div class="p-title-area__background">
      <div class="p-title-area__icon">
        <?php get_template_part('sns') ?>
      </div>
    </div>
    <div class="p-title-area__container">

    </div>
  </section>
  <section class="p-contact">
    <div class="c-page-top"><a href="#"><i class="fas fa-arrow-up"></i></a></div>
    <div class="p-contact__top">
      <p class="p-contact__top__text">お問い合わせは下記フォームもしくはLINEからどうぞ</p>
    </div>
    <div class="p-contact__content--sp">
      <button class="p-contact__btn c-line-btn--w278__contact"><span
          class="c-line-btn--w278__contact__icon"></span><span
          class="c-line-btn--w278__contact__label">でお問い合わせする</span></button>
    </div>
    <div class="p-contact__content--pc">
      <div class="p-contact__content--pc__left">
        <p>公式LINEはこちら→</p>
      </div>
      <div class="p-contact__content--pc__right">
        <img src="<?php echo esc_url( get_template_directory_uri() . "/images/LINE_QR.svg" ); ?>"
          alt="LINEのQRコード"></img>
      </div>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="p-contact__form">
      <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>

  </section>
</main>
<?php get_footer(); ?>