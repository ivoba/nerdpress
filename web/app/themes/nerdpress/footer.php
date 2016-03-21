</div>

<div class="footer row">
    <div class="five columns">
        <ul class="sidebar sidebar-1">
            <?php dynamic_sidebar(1) ?>
        </ul>
    </div>
    <div class="three columns">
        <ul class="sidebar sidebar-2">
            <?php dynamic_sidebar(2) ?>
        </ul>
    </div>
    <div class="three columns">
        <ul class="sidebar sidebar-3">
            <?php dynamic_sidebar(3) ?>
        </ul>
    </div>
</div>
</div>

<?php wp_footer() ?>

<?php if(WP_ENV == 'production'): ?>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-1359972-13', 'auto');
    ga('send', 'pageview');
</script>
<?php endif; ?>
</body>
</html>

