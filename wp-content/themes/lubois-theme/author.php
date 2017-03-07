<?php get_header(); ?>

<?php get_template_part('template-parts/nav'); ?>
    
    <?php
        // Obtener el current author
        $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    ?>
    
    
    <div class="container">
        <div class="admin-profile">
            
            <!-- Imagen del autor -->
            <div class="lb-author-pic">
                <?php
                // Preguntar si tiene gravatar
                if(has_gravatar($curauth->url_email())){
                    echo 'Tiene gravatar';
                }else {
                    // Preguntar si tiene imagen en la carpeta img
                    $file_profile_img = has_user_photo($curauth->user_nicename);
                    if( $file_profile_img !== '0'){

                    ?> <img alt="" src="<?php echo $file_profile_img ?>" class="avatar"> <?php   

                    }else {
                        // Si no tiene imagen muestra por defecto
                        echo get_avatar($curauth->ID);
                    }
                } 
                ?>
            </div>
            
            <!-- Informacion del autor -->
            <div class="lb-author-admin-info">
                <!-- Nomrbe completo del autor -->
                <h2 class="lb-author-admin-name">
                    <?php echo $curauth->first_name . ' ' . $curauth->last_name; ?>
                </h2>
                <h3>
                    <?php the_author_meta('ocupation', $curauth->ID); ?>
                </h3>
                <!-- Descripcion del autor -->
                <p class="lead">
                    <?php echo $curauth->description; ?>
                </p>
                
                <!-- Iconos redes sociales -->
            <div class="lb-author-social">
                <ul class="list-inline text-center">
                    <li>
                        <!-- Icono facebook -->
                        <a href="<?php the_author_meta('facebook', $curauth->ID); ?>">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <!-- Icono twitter -->
                        <a href="<?php the_author_meta('twitter', $curauth->ID); ?>">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
                
                
            </div>  
            
            
        <!-- Fin class profile -->    
        </div>

        <div class="center wow fadeInDown">
			<h2>Knowledges</h2>
			<br>
			 skills 
            <div class="cb-admin-skills">
                
                
    
                <div class="cb-skill">
                    <canvas class="gauge" width="200" height="100" data-text="<?php the_author_meta('skill_one_value', $curauth->ID); ?>"></canvas>             
                    <p><?php the_author_meta('skill_one', $curauth->ID); ?></p>
                </div>
    
                <div class="cb-skill">
                    <canvas class="gauge" width="200" height="100" data-text="<?php the_author_meta('skill_two_value', $curauth->ID); ?>"></canvas>             
                    <p><?php the_author_meta('skill_two', $curauth->ID); ?></p>
                </div>
    
                <div class="cb-skill">
                    <canvas class="gauge" width="200" height="100" data-text="<?php the_author_meta('skill_three_value', $curauth->ID); ?>"></canvas>             
                    <p><?php the_author_meta('skill_three', $curauth->ID); ?></p>
                </div>
    
                <div class="cb-skill">
                    <canvas class="gauge" width="200" height="100" data-text="<?php the_author_meta('skill_four_value', $curauth->ID); ?>"></canvas>             
                    <p><?php the_author_meta('skill_four', $curauth->ID); ?></p>
                </div>
    
            </div>
		</div>

        


        <!-- post del autor -->
    
        <div class="center wow fadeInDown">
			<h2><?php echo $curauth->first_name; ?> Posts</h2>
			<br>
                <?php if ( have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts/content',get_post_format());?>
                    <?php endwhile;?>
                    <?php else: ?>
                        <p>
                            <?php _e('No hay entradas. Intenta crear una.'); ?>
                        </p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>  
            </div>
        </div>
        
    </div>
</div>
        
        
        <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Navigation</h3>
                        <ul class="">
                            <li>
                                <a href="<?php echo get_option('Home'); ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo get_page_link(get_page_by_title('Reviews')->ID); ?>">Reviews</a>
                            </li>
                            <li>
                                <a href="<?php echo get_option('Home'); ?>#pager">News</a>
                            </li>
                            <li>
                                <a href="<?php echo get_page_link(get_page_by_title('Billboard')->ID); ?>">Billboard</a>
                            </li>
                            <li>
                                <a href="<?php echo get_page_link(get_page_by_title('Contact')->ID); ?>">Contact</a>
                            </li>
                        </ul>   
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Archives</h3>
                        <ul>
                            <?php wp_get_archives(); ?>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Authors</h3>
                        <ul>
                            <?php
                                $args = array(
                                    'hide_empty' => false,
                                    'exclude' => $curauth->ID,
                                );

                                wp_list_authors($args);
                            ?>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
                
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Search</h3>
                        <?php get_search_form(); ?>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
            </section>
            
            
           
<?php get_footer('simple'); ?>