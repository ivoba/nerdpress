<?php
/*
  Template Name: Authors
 */
?>

<?php echo get_header(); ?>


<div class="post">
  <h2>
    Who is Nerdpress.org?
  </h2>
  <div class="content" style="padding: 0">
    <p>
      It is a blog emerged from a Cologne based Stammtisch of web aficionados and developers.
    </p>
    <p>
      This is who we are:
    </p>
  </div>
</div>

<?php
$querystr = "SELECT post_author as user_id, ID as post_id, count(post_author) as total FROM wp_posts WHERE post_parent = 0 AND post_status = 'publish' GROUP BY post_author ORDER BY total DESC";
$authorPosts = $wpdb->get_results($querystr, OBJECT);


foreach ($authorPosts as $authorPost) {

  if( $authorPost->total < 5 ) continue; 
  //The Query
  query_posts('p=' . $authorPost->post_id);

  //The Loop
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      ?>
      <div class="post author">
        <div class="dim"></div>
        <?php $userData = get_userdata($authorPost->user_id) ?>

        <h2>
          <?php echo ucwords($userData->first_name); ?> <?php echo ucwords($userData->last_name); ?>
        </h2>

        <div class="content">

          <?php if (!empty($userData->description)): ?>
            <p>
              <?php echo nl2br( $userData->description ) ?>
            </p>
          <?php endif; ?>

          <?php if (!$userData->user_url == '') : ?>
            <p>
              <a href="<?php echo $userData->user_url ?>"> <?php echo $userData->user_url ?></a>
            </p>
          <?php endif; ?>

          <p>
            <a href="/author/<?php print_r($userData->user_nicename) ?>">
              <?php if ($authorPost->total > 1): ?>
                <?php echo $authorPost->total ?> posts
              <?php else: ?>
                <?php echo $authorPost->total ?> post
              <?php endif; ?>
            </a>
          </p>

          <?php $latestPosts = np_get_authors_latest_posts($authorPost->user_id); ?>
          <p>
            <?php if (count($latestPosts) > 1): ?>
              latest <?php echo count($latestPosts) ?> posts:
            <?php else: ?>
              latest post:
            <?php endif; ?>
          </p>


          <p>
            <?php foreach ($latestPosts as $latestPost): ?>

              <a href="<?php echo get_permalink($latestPost->ID) ?>">
                &raquo; <?php echo $latestPost->post_title ?>
              </a>
              <br />
            <?php endforeach; ?>

          </p>
          <div class="clear"></div>
        </div>

      </div>
      <?php
    endwhile;

  endif;

  //Reset Query
  wp_reset_query();
}
?>

<?php echo get_footer(); ?>