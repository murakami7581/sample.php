<?php get_header(); ?>
<main class="l-main">
  <section class="p-title-area">

  </section>
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post(); ?>
  <article class="p-single" id="post-<?php the_ID(); ?>">
    <?php the_post_thumbnail('large', ['class' => 'p-single__thumb']); ?>
    <article class="p-single__art">
      <div class="p-single__title-block">
        <h2 class="p-single__title"><?php the_title(); ?></h2>
        <span class="p-single__date"><?php echo get_the_date('Y.n.j'); ?></span>
      </div>
      <article class="p-single__post">
        <?php the_content(); ?>
      </article>
      <?php endwhile; ?>
      <?php endif; ?>

      <div class="p-single__paginations">
        <?php if (get_previous_post()) : ?>
        <div class="p-single__pagination p-single__pagination--left">
          <?php previous_post_link('%link', '<img src="' . get_template_directory_uri() . '/images/arrow_left.svg"/> 前の記事へ'); ?>
        </div>
        <?php endif; ?>
        <?php if (get_next_post()) : ?>
        <div class="p-single__pagination p-single__pagination--right">
          <?php next_post_link('%link', '次の記事へ <img src="' . get_template_directory_uri() . '/images/arrow_right.svg"/> '); ?>
        </div>
        <?php endif; ?>
      </div>
    </article>
  </article>
  <?php get_template_part('support'); ?>
</main>
<?php get_footer(); ?>