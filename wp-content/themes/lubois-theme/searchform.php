<form role="form" method="get"  action="<?php echo home_url('/');?>">
    <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Buscar:', 'label')?>">
</form>