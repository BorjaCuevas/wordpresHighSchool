 <?php get_header() ?>

<body>

    <?php get_template_part('template-parts/nav');?>
    <?php /*
        if(have_posts()):while(have_posts()):the_post(); //Capturar los post del index
            the_title();
            echo "<br />";
            the_title();
            echo "<br />";
            the_author();
            echo "<br />";
            the_category();
            echo "<br />";
            the_excerpt();
            echo "<br />";
            the_tags();
        endwhile; else:
            echo ('No hay post');
        endif;*/
    ?>
    
    <?php /*PRIMER LOOP PARA SACAR EL PRIMER POST*/
    get_template_part('nav');
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
    
    <!-- Header Carousel -->
    <header id="myCarousel2" class="carousel slide">
                <div id="fotoprincipal" class="fill" style="background-image:url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] ?>');">
                <p id="titulofoto"><?php echo monta_categorias($mis_categorias);?></p>
            </div>
    </header>
    
    
    

    <!-- Page Content -->
    <div class="fondoblanco">
        <section class="reserva_hueco"></section>
    <div class="container" cols="col-lg-12">
        <div class="row">
            <div class="col-lg-2">
                <?php $mes = get_the_time(F);
                    $dia_semana = get_the_time(l);
                    $dia = get_the_time(j);
                ?>
                <time datetime="2014-09-02" class="icon">
                    <em><?php echo $dia_semana?></em>
                    <strong><?php echo $mes?></strong>
                    <span><?php echo $dia?></span>
                </time>
            </div>
            <div class="col-lg-10">
                <div class="titulo"> <a href="<?php the_permalink();?>"><?php echo the_title();?></a></div>
                <div class="excerpt"><?php echo the_excerpt();?></div>
                <p>
                    <span class="col-lg-2 fa fa-comments-o"> <?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?> </span>
                    <span class="col-lg-3 fa fa-user"> 
                        <?php the_author();?>                        
                    </span>
                </p>
            </div>
            
        </div>
        <div class="row"></div>
        <div class="row">
            <div class="col-lg-9">
            
        <?php
            $post_destacado_ID = $post->ID;
                
            endwhile; 
            else:
            endif;

            /*SEGUNDO LOOP PARA SACAR EL RESTO DE POSTS*/
            $args = array(
            'nopaging' => false,
            'post_type' => array('post', 'board_game_post'),
            'post__not_in' => array($post_destacado_ID),
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
            </div>
            <aside class="col-lg-3">
                <?php get_sidebar(); ?>
            </aside><!-- LATERAL -->  
        </div>
        </a>

    </div>
    </div>

       <?php get_footer() ?>