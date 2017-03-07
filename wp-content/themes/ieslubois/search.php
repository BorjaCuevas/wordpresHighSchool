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
                            }elseif($total_results == 1){
                                echo $total_results." POST";
                            }else{
                                echo "SIN RESULTADOS";
                            }
                         
};?></div>
                    <div class="buscar">
                        <h2> Buscar </h2>
                        <?php get_search_form();?>
                    </div>
                    
                    <?php if(have_posts()): ?>
                    <h2 class="title"><?php printf(__('Resultados de búsqueda: %s'), '<span class="palabra_busqueda">' . esc_html(get_search_query()) . '<span>');?></h2>
                        <?php while (have_posts()) : the_post();?>
                            <table>
                                <?php get_template_part('template-parts/content', 'list'); ?>
                            </table>
                        <?php endwhile;                        
                    else:
                        get_template_part('template-parts/content', 'none'); endif;?>
                </div>
                <div class="col-lg-4"><?php //endif; get_sidebar(); ?></div>
            </div>
            

        </div>
    </body>
   
<?php get_footer(); ?>