<div id="sidebar">
    <section class="buscar">
        <h2> Buscar </h2>
        <?php get_search_form();?>
    </section>
    <section class="widgetarea">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets')) : ?>
        <div class="warning">No existen widgets instalados, intalalos desde el Back-End</div>
        <?php endif;?>    
    </section>
    <section class="entradas">
        <h2> Últimas entradas </h2>
        <?php 
        $args = array(
            'type' => 'postbypost',
            'limit' => 5,
            'format' => 'custom',
            'before' => '<span class="fa fa-bookmark"> ',
            'after' => '</span></br>');

        wp_get_archives($args);
        ;?>
    </section>
    <section class="archivos">
        <h2> Archivos por fecha </h2>
        <?php 
        $args = array(
            'format' => 'custom',
            'before' => '<span class="fa fa-calendar"> ',
            'show_post_count' => 1,
            'after' => '</span></br>');
        wp_get_archives($args);?>
    </section>
    <section class="categorias">
        <h2> Categorías </h2>
        <?php wp_list_categories('title_li=&show_count=1');?>
    </section>
    <section class="autores">
        <h2> Autores </h2>
        <?php wp_list_authors('show_fullname=1&hide_empty=0&optioncount=1&orderby=post_count');?>
    </section>
    <section class="menu">
        <h2> Páginas </h2>
        <?php get_pages('title_li=&sort_column=menu_order');?>
    </section>
</div>