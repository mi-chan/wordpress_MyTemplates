<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.6.0/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
  </head>
  <body>

    <!-- ヘッダー部分 -->
    <header class="jumbotron">
      <div class="container">
        <h1 id="pagetitle" class="text-center"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
        <p class="text-center">日々、興味を持ったことや雑記などを綴っていく日記です</p>
      </div>
    </header>

    <nav class="navbar navbar-inverse" style="top: -30px">
      <div class="navbar-header container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-content">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
        <!--ブランド名 ロゴ名の表示-->
        <a class="navbar-brand" href="#">GM</a>
        <!--トグルボタンの設置-->

      <div id="nav-content" class="collapse navbar-collapse">

        <!--リンクのリスト メニューリスト-->
          <?php
          wp_nav_menu( array (
          'menu' => 'Primary-Menu-Main',
          'theme_location' => 'Primary-Menu-Main',
          'depth' => 2,
          'container' => 'ul',
          'menu_class' => 'nav navbar-nav',
          'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
          'walker' => new wp_bootstrap_navwalker()
          ));
          ?>

  <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" href="">カテゴリ  <b class="caret"></b></a>
          <?php
          wp_nav_menu( array (
          'menu' => 'Primary-Menu-Sub',
          'theme_location' => 'Primary-Menu-Sub',
          'depth' => 2,
          'container' => 'ul',
          'menu_class' => 'dropdown-menu',
          'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
          'walker' => new wp_bootstrap_navwalker()
          ));
          ?>
      </li>
    </ul>
    </div>
    </nav>
