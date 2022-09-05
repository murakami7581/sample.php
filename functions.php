<?php

add_theme_support('title-tag'); //タイトルタグサポートの許可
add_theme_support('post-thumbnails'); //アイキャッチ画の取り扱い許可
add_theme_support('automatic-feed-links');
add_editor_style('editor-style.css');

//headerとfooterにおけるメニュー取り扱い許可記述
function register_my_menu()
{
  register_nav_menus([
    'header-navigation' => 'ヘッダーメニュー',
    'footer-navigation' => 'フッターメニュー',
  ]);
}
add_action('after_setup_theme', 'register_my_menu');

//タイトル出力記述-------------------------------------------
// "shoproject"という名前はlocalディレクトリ直下のディレクトリ名
function shoproject_title($title)
{
  if (is_front_page() && is_home()) { //トップページなら
    $title = get_bloginfo('name', 'display');
  } elseif (is_singular()) { //シングルページなら
    $title = single_post_title('', false);
  }
  return $title;
}
add_filter('pre_get_document_title', 'shoproject_title');

//もともと<head>で読み込んでたファイルの読み込み---------------
function shoproject_script()
{
  wp_enqueue_style('ZenMaruGothic', '//fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap', array());
  wp_enqueue_style('ZenKakuGothic', '//fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap', array());
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), '3.6.0');
  wp_enqueue_script('js-file', get_template_directory_uri() . '/js/index.js', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'shoproject_script');


//カスタムウォーカー編集(カスタムメニューのulに勝手につくsub-menuを退かしたいため記述)
class custom_walker_nav_menu extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth = 0, $args = array())
  {
    $output .= '<ul class="p-sidebar__list"">';
  }
  function end_lvl(&$output, $depth = 0, $args = array())
  {
    $output .= '</ul>';
  }
}

//wp-pagenaviの設定---------------------------------------

// function custom_wp_pagenavi($html)
// {
//   $out = '';
//   $out = str_replace("<div", "", $html);
//   $out = str_replace("class='wp-pagenavi'>", "", $out);
//   $out = str_replace("<a", "<li><a", $out);
//   $out = str_replace("</a>", "</a></li>", $out);
//   $out = str_replace("<span", "<li><span", $out);
//   $out = str_replace("</span>", "</span></li>", $out);
//   $out = str_replace("</div>", "", $out);
//   return '<nav class="p-pagination"><ul class="p-pagination__list"' . $out . '</ul></nav>';
// }
// add_filter('wp_pagenavi', 'custom_wp_pagenavi');

//ウィジェット追加
function shoproject_widgets_init()
{
  register_sidebar(
    array(
      'name'          => 'カテゴリーウィジェット',
      'id'            => 'category_widget',
      'description'   => 'カテゴリー用ウィジェットです',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
      'after_title'   => "</h2>\n",
    )
  );
}
add_action('widgets_init', 'shoproject_widgets_init');

function shoproject_archive_init()
{
  register_sidebar(
    array(
      'name'          => 'アーカイブウィジェット',
      'id'            => 'archive_widget',
      'description'   => 'アーカイブ用ウィジェットです',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
      'after_title'   => "</h2>\n",
    )
  );
}
add_action('widgets_init', 'shoproject_archive_init');


// アーカイブページの表示件数
function change_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query())
    return;

  /* ブログ一覧(archive.php)の表示件数を4件にセット */
  if ($query->is_archive()) {
    $query->set('posts_per_page', '4');
  }
  /* お知らせページ(category-notice)の表示件数を5件にセット */
  if ($query->is_category_notice()) {
    $query->set('posts_per_page', '5');
  }
}
add_action('pre_get_posts', 'change_posts_per_page');

function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'archive'; //任意のスラッグ名
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );