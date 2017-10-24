<?php
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1, // all
  // 'orderby' => 'date',
  // 'order' => 'DESC'
);
 
$query = new WP_Query( $args );
 
$posts = array();
$news = array();
 
while( $query->have_posts() ) : $query->the_post();

  $posttags = get_the_tags();

  if(isset($posttags) && !empty($posttags)) {
    foreach ($posttags as $key => $posttag) {
      $tag_names[] = $posttag->name;  
    }
  } else {
    $tag_names = [];
  }

  if(in_array("Main News Index", $tag_names) || in_array("news", $tag_names)):

    $post_categories = get_the_category();
    $post_categories_name_arr = explode(' ',trim($post_categories[0]->name));  

    $posts[] = array(
      'tag' => mb_strtolower($post_categories_name_arr[0]),
      'category' => html_entity_decode($post_categories[0]->name),
      'date' => get_the_date('d M Y'),
      'title' => html_entity_decode(get_the_title()),
      'link' => get_permalink()
    );

  endif;  
 
endwhile;
 
wp_reset_query();

$news['news'] = $posts;
 
echo json_encode( $news );
?>