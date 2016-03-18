<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <meta http-equiv="content-language" content="en" />
    <link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet" type="text/css" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head() ?>
  </head>
  <body>

    <div class="wrap">
      <a href="http://greensta.de" target="_blank" class="sponsor">
        <img src="<?php bloginfo('template_url') ?>/images/sponsor.png" alt="Klimafreundliches Webhosting - Webserver mit garantiert 100% Ökostrom - GREENSTA Öko Webhosting" />
      </a>

      <a href="<?php bloginfo('rss2_url') ?>" class="rss"><img src="<?php bloginfo('template_url') ?>/images/icon_rss.png" alt="RSS Feed" /></a>

      <div class="header">
        <span class="date"><?php bloginfo('description') ?></span>
        <div class="headline">
          <h1>
            <a href="<?php bloginfo('url') ?>"><?php bloginfo('title') ?></a>
          </h1>
        </div>
        <?php get_search_form() ?>

        <?php wp_nav_menu(array('menu' => 'Main')); ?>
      </div>

      <div class="main">