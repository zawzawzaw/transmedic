<?php
/**
 * Template Name: Cars JSON page
 * Description: Outputs the list of cars as JSON
 *
 */
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1, // all
  'order' => 'ASC'
);
 
$query = new WP_Query( $args );
 
$posts = array();
$news = array();
 
while( $query->have_posts() ) : $query->the_post();

  $posttags = get_the_tags();
  foreach ($posttags as $key => $posttag) {
    $tag_names[] = $posttag->name;  
  }

  if(in_array("news", $tag_names)):

    $post_categories = get_the_category();
    $post_categories_name_arr = explode(' ',trim($post_categories[0]->name));  

    $posts[] = array(
      'tag' => mb_strtolower($post_categories_name_arr[0]),
      'category' => $post_categories[0]->name,
      'date' => get_the_date('d M Y'),
      'title' => get_the_title(),
      'link' => get_permalink()
    );

  endif;  
 
endwhile;
 
wp_reset_query();

$news['news'] = $posts;
 
echo json_encode( $news );
?>