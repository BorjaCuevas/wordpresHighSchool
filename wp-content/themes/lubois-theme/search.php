<?php get_header();?>
<?php get_template_part('template-parts/nav'); ?>
<section id="blog" class="container">
        <div class="blog">
            
            <div class="row">
                 <div class="col-md-8">
                   
                    <div class="blog-item">
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


 <?php if(have_posts()): ?>
                    <h2 class="title"><?php printf(__('Resultados de búsqueda: %s'), '<span class="palabra_busqueda">' . esc_html(get_search_query()) . '<span>');?></h2>
                        <?php while (have_posts()) : the_post();?>
                            <table>
                                <?php get_template_part('template-parts/content', 'list'); ?>
                            </table>
                        <?php endwhile;                        
                    else:
                        get_template_part('template-parts/buscador'); endif;?>
                   
                   
                   
                    </div><!--/.blog-item-->
                        
                   
                </div><!--/.col-md-8-->

               <?php get_sidebar(); ?>
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
<?php get_footer();?>