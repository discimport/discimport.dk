<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>


<p><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
</p>
 </div>

        <!-- end content -->
        <!-- start left column sidebar -->
        <div id="sidebar">
            <form id="form1" method="get" action="/shop/products">
                <div class="search">
                    <input class="searchtext" type="text" name="q"  />
                    <input class="searchbutton" type="submit" name="searchbutton"  value="Søg" />
                </div>
            </form>
            <ul id="nav">
                <!-- use classs=current if you want this to remain a link <li class="current"><a href="forside.htm">Forside</a></li>-->
                    <li><a href="/">Forside</a></li>
                    <li><a href="/shop/products">Produkter</a></li>
                    <li><a href="/shop/catalogue">Kategorier</a></li>
                    <li><a href="/shop/basket">Vis indkøbskurv</a></li>
                    <li><a href="/handelsbetingelser">Handelsbetingelser</a></li>
                    <li><a href="/kontakt">Kontakt</a></li>
                    <li><a href="/help">Hjælp</a></li>
            </ul>

 <?php get_sidebar(); ?>
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

<?php wp_footer(); ?>

    </body>
</html>