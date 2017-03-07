<form role="search" method="get" class="searchform group" action="<?php echo home_url('/');?>">
    <div class="formulario">
        <input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Buscar:', 'label')?>" />

        <button class="search-button">
            <img class="submitbutton" alt="Submit search query" src="<?php echo get_template_directory_uri();?>/fotos/icono/search.png">
        </button>
    </div>
</form>