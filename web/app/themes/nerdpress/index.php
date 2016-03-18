<?php get_header() ?>

<div class="col-main" itemscope itemtype="http://schema.org/Blog">

    <meta itemprop="name" content="<?php bloginfo('name') ?>">
    <meta itemprop="description" content="<?php bloginfo('description') ?>">
    <meta itemprop="url" content="<?php bloginfo('url') ?>">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="row post<?php if (is_page()): ?> page<?php endif; ?>" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="seven columns">
                <div class="dim"></div>
                <h2 itemprop="headline">
                    <a href="<?php the_permalink() ?>"><?php echo ucfirst(get_the_title()) ?></a>
                </h2>

                <?php if (!is_page()): ?>

                    <div class="meta">
                        <span class="date"><span itemprop="author"><?php the_author() ?></span>, <span itemprop="datePublished"><?php the_time('Y/m/d H:i') ?></span></span>
                        <span class="clear"></span>
                    </div>

                    <meta itemprop="url" content="<?php the_permalink() ?>">

                <?php endif; ?>


                <div class="content">
                    <?php the_content('&raquo; read more') ?>
                    <?php if (is_home()): ?>
                        <p>
                            <?php comments_popup_link('no comments yet', '1 comment', '% comments', 'more-link'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                </div>
            </div>
            <?php if (is_single() && !is_page()): ?>
                <?php comments_template('', true); ?>
            <?php endif; ?>

        <?php endwhile; ?>

        <?php if (is_home() || is_archive() || is_search()): ?>
            <div class="post pagination row">

                <?php
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged', '%#%');
                } else {
                    $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                        user_trailingslashit('page/%#%/', 'paged');;
                    $paginate_base .= '%_%';
                }

                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 2,
                    'current' => ($paged ? $paged : 1),
                    'type' => 'list',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ));
                ?>


            </div>

        <?php endif; ?>

    <?php endif; ?>

</div>

<?php get_footer() ?>

