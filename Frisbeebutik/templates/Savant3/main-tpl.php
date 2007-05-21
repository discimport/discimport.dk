<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" lang="da">
    <head>
        <title><?php echo $this->title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="verify-v1" content="upUixQlh700P5wulYcNRxw8ZHjz/cC8CTdrVc2LzrQk=" />
        <link rel="alternate" type="application/rss+xml" title="Discimport.dk: Alle produkter" href="http://www.frisbeebutik.dk/shop/rss.php" />
        <style type="text/css">
            @import "layout.css";
        </style>
        <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    </head>

    <body>
    <div id="container">

        <div id="branding">
            <h1><a href="/">Discimport.dk - Butikken</a></h1>
        </div>

        <div id="content">

            <div id="navigation-main">

                <form action="products.php" method="get">
                    <fieldset>
                        <input type="text" name="q" value="<?php if (!empty($_GET['q'])) echo htmlspecialchars($_GET['q']); ?>" />
                        <input type="submit" value="Søg" />
                    </fieldset>
                </form>


                <ul>
                    <li><a href="index.php">Forside</a></li>
                    <li><a href="products.php">Produkter</a></li>
                    <li><a href="basket.php">Vis indkøbskurv</a></li>
                    <li><a href="handelsbetingelser.php">Handelsbetingelser</a></li>
                    <li><a href="firmainfo.php">Kontakt</a></li>
                    <li><a href="help.php">Hjælp</a></li>
                    <li><a href="http://www.discimport.dk/">Discimport.dk</a></li>
                </ul>


            </div>

            <div id="content-main">
                <?php echo $this->content_main; ?>
            </div>
        </div>

    </div>

<script type="text/javascript">
    _uacct = "UA-793671-3";
    urchinTracker();
</script>

    </body>
</html>