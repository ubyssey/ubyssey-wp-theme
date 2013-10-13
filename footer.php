<?php
/*
 * The footer for The Ubyssey 2012 theme.
 * Closes .l-content and #page.
 */
?>

    </div><!-- .l-content -->

    <footer class="l-primaryfooter l-contained primaryfooter">
        <nav class="secondary-nav">
            <ul>
                <li class="hide-desktop"><h3>Sections</h3></li>
                <li><a href="/news/">News</a></li>
                <li><a href="/culture/">Culture</a></li>
                <li><a href="/opinion/">Opinion</a></li>
                <li><a href="/features/">Features</a></li>
                <li><a href="/sports/">Sports</a></li>
                <li><a href="/video/">Video</a></li>
                <li><a href="/photos/">Photos</a></li>
                <li><a href="/theblog/">Blog</a></li>
            </ul>
        </nav>
        <nav class="link-farm clearfix">
            <ul class="contact">
                <li class="hide-desktop"><h3>Links</h3></li>
                <li><a href="/contact/">Contact</a></li>
                <li><a href="/advertise-with-us/">Advertise</a></li>
                <li><a href="/volunteer/">Volunteer</a></li>
                <li><a href="/staff/">Staff</a></li>
                <li class="hide-tablet"><a href="/corrections/">Corrections</a></li>
            </ul>
            <ul class="other">
                <li><a href="/about/">About</a></li>
                <li class="hide-tablet"><a href="<?php bloginfo('rss2_url'); ?>">Feed</a></li>
                <?php /* @TODO: How to do archives page? */ ?>
                <li><a href="/archive/">Archives</a></li>
                <?php /* @TODO: Find out what 1 links to add */ ?>
                <li><a href="/link-img/">Link</a></li>
            </ul>
            <ul class="other2 hide-mobile hide-tablet">
                <li><a href="https://www.facebook.com/ubyssey/">Facebook</a></li>
                <li><a href="https://twitter.com/Ubyssey/">Twitter</a></li>
                <li><a href="http://ubyssey.tumblr.com/">Tumblr</a></li>
            </ul>
        </nav>
        <div class="search-form clearfix">
            <?php get_search_form(); ?>
        </div>
        <div class="dingbat"><a href="/" class="dingbat">U</a></div>
        <div class="copyright">Copyright The Ubyssey 2013 - Site by <a href="http://rileytomasek.com">Riley Tomasek</a></div>
    </footer><!-- .l-primaryfooter -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
