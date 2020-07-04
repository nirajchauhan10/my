<?php

/* 
 Template Name: page_one
 * 
 *  */


$custom_terms = get_terms('types');



foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'courses',
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );
  

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
        endwhile;
     }
}
