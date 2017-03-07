<?php get_header();?>
<?php get_template_part('template-parts/nav'); ?>

<section id="blog" class="container">
        <div class="blog">
            <div class="center">
            <div class="blog-item">
            <?php /*PRIMER LOOP PARA SACAR EL PRIMER POST*/
                $args = array(
                    'posts_per_page' => 1,
                    'post_type' => array('post', 'board_game_post'),
                    'tax_query' => array(
                        array(                
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => array( 
                                'post-format-audio',
                                'post-format-gallery',
                                'post-format-image',
                                'post-format-link',
                                'post-format-quote',
                                'post-format-video'
                            ),
                            'operator' => 'NOT IN'
                        ),
                    ),
                );
                $custom_query = new WP_Query($args);
                if($custom_query->have_posts()) :
                    while($custom_query->have_posts()) :
                        $custom_query->the_post();
                
                        $defaults = array('fields' => 'names');
                        $mis_categorias = wp_get_post_categories($post->ID, $defaults);
            ?>
            <?php get_template_part('template-parts/content',get_post_format());?>
            </div>
        </div>
            <div class="row">
                 <div class="col-md-8">
                   
                    <div class="blog-item">
                   <?php
                   
                        $post_destacado_ID = $post->ID;
                        
                    endwhile; 
                    else:
                    endif;
             $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                        /*SEGUNDO LOOP PARA SACAR EL RESTO DE POSTS*/
                        $args = array(
                        'nopaging' => false,
                        'post_type' => array('post', 'board_game_post'),
                        'post__not_in' => array($post_destacado_ID),
                        'paged' => $paged,
                        );
                        $custom_query = new WP_Query($args);
                        if($custom_query->have_posts()) :
                            while($custom_query->have_posts()) :
                                $custom_query->the_post(); 
                        
                    ?>
                    
                    <?php get_template_part('template-parts/content',get_post_format());

                        endwhile; else:
                        endif;
                     ?>
              
                    </div><!--/.blog-item-->
                     
                    
                    
                  
                         <?php echo   get_paginate_page_links(); ?>
                       
                    
                </div><!--/.col-md-8-->

               <?php get_sidebar(); ?>
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->



<?php get_footer();?>