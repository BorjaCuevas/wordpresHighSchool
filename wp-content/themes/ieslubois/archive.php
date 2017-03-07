<?php
/*
Template Name: Archives
*/
get_header(); ?>

    <body>
        <?php get_template_part('template-parts/nav');?>
        <div class="container">
            <div class="row"> 
                <div class="col-lg-8">
                    <div><?php if(have_posts()){
                            $total_results = $wp_the_query->post_count;
                            if($total_results > 1){
                                echo $total_results. " POSTS";
                            }else{
                                echo $total_results." POST";
                            }
                         ;?>
                    </div>
                    <div><?php if(is_category()){
                        printf(__('... Fecha de Archivos: %s', 'shape'), '<span>'.single_cat_title('', false).'...</span>');
                    }elseif(is_tag()){
                        printf(__('... Etiqueta: %s', 'shape'), '<span>'.single_tag_title('', false).'...</span>');
                    }elseif(is_author()){
                        the_post();
                        printf(__('... Autor: %s', 'shape'), '<span  class="vcard">'/*'<a class="url fn n" href="'.get_author_posts_url(get_the_author_meta("ID")).'"title='.esc_attr(get_the_author()).'" rel="me">'.get_the_author().'</a>*/ .wp_list_authors('show_fullname=1&include=' . get_the_author_id()).'...</span>');

                        rewind_posts();
                    }elseif(is_day()){
                             printf(__('... Dia: %s', 'shape'), '<span>' . get_the_date(). '... </span>');
                    }elseif(is_month()){
                             printf(__('... Mes: %s', 'shape'), '<span>' . get_the_date('F Y'). '... </span>');
                    }elseif(is_year()){
                             printf(__('... Año: %s', 'shape'), '<span>' . get_the_date('Y'). '... </span>');
                    }else{
                             _e('... Archives ...', 'shape');
                         }
};?></div>
                    <?php
            while(have_posts()) : the_post();?>
                    <a class="titulo_otros" href="<?php the_permalink();?>"><?php echo the_title();?></a><br>
                    <div class="col-lg-5"><?php echo
                '<img class="post_first_image"' . get_first_image_by_post_id($post->ID) . ' /></br>';?></div><!-- IMAGENE PRIMERA DE CADA POST -->
                    <div class="col-lg-7"><?php echo the_excerpt();?>
                        <p><span class="fa fa-comments-o"> <?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?></span></p>
                    </div>
            <?php endwhile;?>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </body>
   
<?php get_footer(); ?>