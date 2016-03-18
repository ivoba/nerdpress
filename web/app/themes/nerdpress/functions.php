<?php

register_sidebars(3);

add_filter( 'auto_update_plugin', '__return_true' );

function np_get_author_name($id) {

  global $wpdb;

  $querystr = "	SELECT display_name
					FROM wp_users 
					WHERE id = {$id}
					LIMIT 1";

  $author = $wpdb->get_results($querystr, OBJECT);

  return $author[0]->display_name;
}

function np_get_authors_by_activity() {
  global $wpdb;

  $querystr = "
					SELECT post_author as user_id, ID as post_id, count(post_author) as total 
					FROM wp_posts 
					WHERE post_parent = 0 AND post_status = 'publish' 
					GROUP BY post_author 
					ORDER BY total DESC";
  $authorPosts = $wpdb->get_results($querystr, OBJECT);

  $authors = array();
  foreach ($authorPosts as $authorPost) {
    $authors[] = get_userdata($authorPost->user_id);
  }

  return $authors;
}

function np_get_authors_latest_posts($author_id) {
  global $wpdb;
  $querystr = "	SELECT *
					FROM wp_posts 
					WHERE post_status = 'publish' AND post_parent = 0 AND post_author = {$author_id}
					ORDER BY post_date DESC 
					LIMIT 3";

  return $wpdb->get_results($querystr, OBJECT);
}

?>
