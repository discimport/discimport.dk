<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" lang="da">
    <head>
        <title><?php e($this->document->title); ?></title>
        <meta name="Keywords" content="<?php e($this->document->keywords); ?>" />
        <meta name="Description" content="<?php e($this->document->description); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=<?php e($this->document->encoding); ?>" />
        <meta name="verify-v1" content="upUixQlh700P5wulYcNRxw8ZHjz/cC8CTdrVc2LzrQk=" />
        <link rel="alternate" type="application/rss+xml" title="Discimport.dk: Alle produkter" href="http://www.frisbeebutik.dk/shop/rss.php" />
        <style type="text/css">
            @import "<?php e('http://www.intraface.dk/demo/shop.css'); ?>";
            @import "<?php e(url('/layout.css')); ?>";
        </style>
    </head>

    <body>
    <div id="container">

        <div id="branding">
            <h1><a href="<?php e(url('/')); ?>">Discimport.dk - Butikken</a></h1>
        </div>

        <div id="content">

            <div id="navigation-main">

                <form action="<?php e(url('/shop/products')); ?>" method="get">
                    <fieldset>
                        <input type="text" name="q" value="<?php if (!empty($this->GET['q'])) e($this->GET['q']); ?>" />
                        <input type="submit" value="Søg" />
                    </fieldset>
                </form>


                <ul>
                    <li><a href="<?php e(url('/')); ?>">Forside</a></li>
                    <li><a href="<?php e(url('/shop/products')); ?>">Produkter</a></li>
                    <li><a href="<?php e(url('/shop/catalogue')); ?>">Kategorier</a></li>
                    <li><a href="<?php e(url('/shop/basket')); ?>">Vis indkøbskurv</a></li>
                    <li><a href="<?php e(url('/handelsbetingelser')); ?>">Handelsbetingelser</a></li>
                    <li><a href="<?php e(url('/kontakt')); ?>">Kontakt</a></li>
                    <li><a href="<?php e(url('/help')); ?>">Hjælp</a></li>
                </ul>


            </div>

            <div id="content-main">
                <?php
                    echo $content;
                ?>
            </div>
        </div>

    </div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-4137633-1");
pageTracker._trackPageview();
} catch(err) {}</script>

    </body>
</html>