<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" lang="da">
    <head>
        <title><?php e($this->document->title); ?></title>
        <meta name="verify-v1" content="5sVlwrz5kabk/OZGtea26qVEGzwl+M7PCWLEer2JquM=" />
        <meta name="Keywords" content="<?php e($this->document->keywords); ?>" />
        <meta name="Description" content="<?php e($this->document->description); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=<?php e($this->document->encoding); ?>" />
        <meta name="verify-v1" content="upUixQlh700P5wulYcNRxw8ZHjz/cC8CTdrVc2LzrQk=" />
        <link rel="shortcut icon" href="<?php e(url('favicon.ico')); ?>" type="image/vnd.microsoft.icon" />

        <!--<link rel="alternate" type="application/rss+xml" title="Discimport.dk: Alle produkter" href="/shop/rss.php" />-->
        <link href="<?php e(url('/css/reset.css')); ?>" rel="stylesheet" media="screen, projection" type="text/css" />
        <link href="<?php e('http://www.intraface.dk/demo/shop.css'); ?>" rel="stylesheet" media="screen, projection" type="text/css" />
        <link href="<?php e(url('/css/main.css')); ?>" rel="stylesheet" media="screen, projection" type="text/css" />
        <link href="<?php e(url('/css/print.css')); ?>" rel="stylesheet" media="print" type="text/css" />
        <!--[if lte IE 7]>
        <link href="<?php e(url('/css/iecss.css')); ?>" rel="stylesheet"  media="screen,projection" type="text/css" />
        <![endif]-->
        <!--[if IE 8]>
        <link href="<?php e(url('/css/ie8.css')); ?>" rel="stylesheet"  media="screen,projection" type="text/css" />
        <![endif]-->
    </head>

    <body class="<?php e($this->document->body_class); ?>">
    <div id="outer">
    <h1><a href="<?php e(url('/')); ?>">Discimport: Frisbees Til Sport Og Leg<em></em></a></h1>
    <p class="logo"><a href="<?php e(url('/')); ?>"><img src="<?php e(url('/images/logo.jpg')); ?>" alt="Discimport.dk" width="169" height="169" /></a></p>
    <!-- start main columns -->
    <div class="main <?php e($this->document->main_class); ?>">
        <!-- #content is main right column -->
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- end content -->
        <!-- start left column sidebar -->
        <div id="sidebar">
            <form id="form1" method="get" action="<?php e(url('/shop/products')); ?>">
                <div class="search">
                    <input class="searchtext" type="text" name="q"  />
                    <input class="searchbutton" type="submit" name="searchbutton"  value="Søg" />
                </div>
            </form>
            <ul id="nav">
                <!-- use classs=current if you want this to remain a link <li class="current"><a href="forside.htm">Forside</a></li>-->
                    <li><a href="<?php e(url('/')); ?>">Forside</a></li>
                    <li><a href="<?php e(url('/shop/products')); ?>">Produkter</a></li>
                    <li><a href="<?php e(url('/shop/catalogue')); ?>">Kategorier</a></li>
                    <li><a href="<?php e(url('/shop/basket')); ?>">Vis indkøbskurv</a></li>
                    <li><a href="<?php e(url('/handelsbetingelser')); ?>">Handelsbetingelser</a></li>
                    <li><a href="<?php e(url('/kontakt')); ?>">Kontakt</a></li>
                    <li><a href="<?php e(url('/nyhedsbrev')); ?>">Nyhedsbrev</a></li>             <li><a href="<?php e(url('/help')); ?>">Hjælp</a></li>
                    <li><a href="<?php e(url('/blog')); ?>">Blog</a></li>
            </ul>
        </div>
        <!-- end sidebar -->
    </div>
    <!-- end main -->
    <div class="base"></div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-4137633-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</div>
    </body>
</html>
