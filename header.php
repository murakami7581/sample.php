<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <!-- 電話番号っぽくてもリンクにするな！という意味 -->
  <meta name="description" content="WordPress theme development static data of sho_project">
  <meta name="keywords" content="WordPress, Theme, development,sho_project">
  <?php wp_head(); ?>
  <!-- WordPressログイン時のみ適用されるCSS -->
  <!-- アドミンバーとヘッダーの重なりを防止する記述 -->
  <!-- <?php if (is_user_logged_in()) : ?>
    <style type="text/css">
      .p-header,
      .p-hamburger {
        margin-top: 29px;
      }

      @media screen and (max-width: 780px) {

        .p-header,
        .p-hamburger,
        .p-header-menu {
          margin-top: 43px;
        }
      }

      @media screen and (max-width: 600px) {
        #wpadminbar {
          position: fixed !important;
        }
      }
    </style>
  <?php endif; ?>
  <!--font-awesomeのCDN読み込み一先ずこちらへ  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- functionsのKaku-fontが反映されない一時処置 -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap">
</head>

<body <?php body_class("u-menu-filter u-overflowX"); ?>>
  <!--bodyタグに独自クラスを追加 -->
  <?php wp_body_open(); ?>
  <header class="p-header">
    <h1 class="p-header__title">
      sample
    </h1>

    <?php wp_nav_menu(
      [
        'menu'  => 'header-menu', //メニュー管理画面で登録したメニュー名
        'container' => '',
        'container_id' => '',
        'container_class' => '',
        'menu_id' => '',
        'menu_class' => 'p-header-menu', //もし自身のクラス名でこのメニューカテゴリーを装飾したかったら入れる
        'walker'  => new custom_walker_nav_menu,
        'theme_location' => 'header-menu'
      ]
    ); ?>
  </header>