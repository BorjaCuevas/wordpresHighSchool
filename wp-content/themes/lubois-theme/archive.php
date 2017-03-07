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