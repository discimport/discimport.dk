<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  <?php language_attributes(); ?>>
    <head>
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <meta name="verify-v1" content="5sVlwrz5kabk/OZGtea26qVEGzwl+M7PCWLEer2JquM=" >
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="verify-v1" content="upUixQlh700P5wulYcNRxw8ZHjz/cC8CTdrVc2LzrQk=" />
        <!--<link rel="alternate" type="application/rss+xml" title="Discimport.dk: Alle produkter" href="/shop/rss.php" />-->
        <link href="/css/reset.css" rel="stylesheet" media="screen, projection" type="text/css" />
        <link href="http://www.intraface.dk/demo/shop.css" rel="stylesheet" media="screen, projection" type="text/css" />
        <link href="/css/main.css" rel="stylesheet" media="screen, projection" type="text/css" />
        <link href="/css/print.css" rel="stylesheet" media="print" type="text/css" />
        <link href="/css/blog.css" rel="stylesheet" media="screen, projection" type="text/css" />
        <!--[if lte IE 7]>
        <link href="/css/iecss.css" rel="stylesheet"  media="screen,projection" type="text/css" />
        <![endif]-->
        <!--[if IE 8]>
        <link href="/css/ie8.css" rel="stylesheet"  media="screen,projection" type="text/css" />
        <![endif]-->
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>">
    <div id="outer">
    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?><em></em></a></h1>
    <p class="logo"><a href="#"><img src="/images/logo.jpg" alt="<?php bloginfo('description'); ?>" width="169" height="169" /></a></p>
    <!-- start main columns -->
    <div class="main">
