<?php get_header(); ?>
<main class="l-main c-background">
  <section class="p-title-area">

  </section>

  <article class="p-archive">
    <div class="c-page-top">
      <a href="#"><i class="fas fa-arrow-up"></i></a>
    </div>
    <div class="p-archive__grid">
      <?php
      if (have_posts()) :
      while (have_posts()) :
      the_post() ?>
      <section class="p-archive__inner p-card">
        <?php the_post_thumbnail(array(330, 210), array('class' => 'p-card--arc__image')); ?>
        <div class="p-card--arc__desc">
          <h3><?php the_title(); ?></h3>
          <p class="p-card--arc__desc__date c-text__date">
            <?php echo get_the_date('Y.n.j'); ?>
          </p>
          <?php
            $check_content = get_the_content();
            if (strpos($check_content, 'more-') !== false) { //moreタグの判定
              the_content('', 'true');
            } else {
              the_excerpt();
            }
            ?>
          <div class="p-card--arc__btn">
            <button class="c-btn__archive"><a href="<?php the_permalink(); ?>">つづきを読む</a></button>
          </div>
          </div>
      </section>
      <?php
      endwhile;
      endif;
      ?>
    </div>

    <div class="p-pagenation">
    <?php wp_pagenavi(); ?>
    </div>
    <ul class="p-archive__widget">
      <li class="p-archive__widget--archive">
        <?php
      if (is_active_sidebar('archive_widget')) :
        dynamic_sidebar('archive_widget');
      ?>
      <?php endif; ?>
      </li>
      <li class="p-archive__widget--category">
      <?php
      if (is_active_sidebar('category_widget')) :
      dynamic_sidebar('category_widget');
      ?>
      <?php endif; ?>
      </li>
    </ul>
  </article>
</main>
<?php get_footer(); ?>