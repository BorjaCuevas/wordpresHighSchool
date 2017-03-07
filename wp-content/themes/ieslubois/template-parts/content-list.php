<tr>
    <td class="fechatd">
        <span class ="fa fa-calendar-o"></span>
        <?php the_time('Y-m-d');?>
    </td>
    <td class="authortd">
        <?php
        if($post->post_type == 'page'){
            echo '<span class=""></span>';
        }else{
            echo '<span class=""></span>';
            the_author();
        }
        ?>
    </td>
    <td class="posttd">
        <?php
        if($post->post_type != 'page'){
            the_title( sprintf('<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>');
            the_excerpt();
        }else{
            the_title();
            echo '<span> Page </span>';
        };?>
    </td>
</tr>