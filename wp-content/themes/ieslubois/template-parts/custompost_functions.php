<?php
/* Escribir campos propios en el backend */

function add_profile_custom_fields($user){
    ?>
    <h2> Redes sociales </h2>
    <table class="form-table">
        <tr>
            <th><label for="custom_field_twitter"> Twitter </label></th>
            <td><input type="text" id="custom_field_twitter" name="custom_field_twitter" class="regular-text code" value="<?php echo get_the_author_meta('custom_field_twitter', $user->ID);?>"/></br>
            <p class="description"> Escriba su dirección de Twitter. </p></td>
        </tr>
        <tr>
            <th><label for="custom_field_facebook"> Facebook </label></th>
            <td><input type="text" id="custom_field_facebook" name="custom_field_facebook" class="regular-text code" value="<?php echo get_the_author_meta('custom_field_facebook', $user->ID);?>"/></br>
            <p class="description"> Escriba su dirección de Facebook. </p></td>
        </tr>
    </table>
<?php
}

add_action('show_user_profile', 'add_profile_custom_fields');
add_action('edit_user_profile', 'add_profile_custom_fields');


function save_profile_custom_fields($user_id){
    if(!current_user_can('edit_user', $user_id)){
        return false;
    }else{
        update_usermeta( $user_id, 'custom_field_twitter', $_POST['custom_field_twitter']);
        update_usermeta( $user_id, 'custom_field_facebook', $_POST['custom_field_facebook']);
    }
}

add_action('personal_options_update', 'save_profile_custom_fields');
add_action('edit_user_profile_update', 'save_profile_custom_fields');


/* Escribir 4 skills en el backend */

function add_profile_skills($user){
    ?>
    <h2> Habilidades </h2>
    <table class="form-table">
        <tr>
            <td><p> Habilidad primera: </p></td>
            <td><input type="text" id="skill1" name="skill1" class="regular-text code" value="<?php echo get_the_author_meta('skill1', $user->ID);?>"/></br>
            <p class="description"> ¿Cual es su habilidad? </p></td>
            <td><input type="number" id="porcentaje_skill1" name="porcentaje_skill1" class="regular-text code" min="0" max="100" value="<?php echo get_the_author_meta('porcentaje_skill1', $user->ID);?>"/></br>
            <p class="description"> ¿En que porcentaje? </p></td>
        </tr>
        <tr>
            <td><p> Habilidad segunda: </p></td>
            <td><input type="text" id="skill2" name="skill2" class="regular-text code" value="<?php echo get_the_author_meta('skill2', $user->ID);?>"/></br>
            <p class="description"> ¿Cual es su habilidad? </p></td>
            <td><input type="number" id="porcentaje_skill2" name="porcentaje_skill2" class="regular-text code" min="0" max="100" value="<?php echo get_the_author_meta('porcentaje_skill2', $user->ID);?>"/></br>
            <p class="description"> ¿En que porcentaje? </p></td>
        </tr>
        <tr>
            <td><p> Habilidad tercera: </p></td>
            <td><input type="text" id="skill3" name="skill3" class="regular-text code" value="<?php echo get_the_author_meta('skill3', $user->ID);?>"/></br>
            <p class="description"> ¿Cual es su habilidad? </p></td>
            <td><input type="number" id="porcentaje_skill3" name="porcentaje_skill3" class="regular-text code" min="0" max="100" value="<?php echo get_the_author_meta('porcentaje_skill3', $user->ID);?>"/></br>
            <p class="description"> ¿En que porcentaje? </p></td>
        </tr>
        <tr>
            <td><p> Habilidad cuarta: </p></td>
            <td><input type="text" id="skill4" name="skill4" class="regular-text code" value="<?php echo get_the_author_meta('skill4', $user->ID);?>"/></br>
            <p class="description"> ¿Cual es su habilidad? </p></td>
            <td><input type="number" id="porcentaje_skill4" name="porcentaje_skill4" class="regular-text code" min="0" max="100" value="<?php echo get_the_author_meta('porcentaje_skill4', $user->ID);?>"/></br>
            <p class="description"> ¿En que porcentaje? </p></td>
        </tr>


    </table>
<?php
}

add_action('show_user_profile', 'add_profile_skills');
add_action('edit_user_profile', 'add_profile_skills');


function save_profile_skills($user_id){
    if(!current_user_can('edit_user', $user_id)){
        return false;
    }else{
        update_usermeta( $user_id, 'skill1', $_POST['skill1']);
        update_usermeta( $user_id, 'skill2', $_POST['skill2']);
        update_usermeta( $user_id, 'skill3', $_POST['skill3']);
        update_usermeta( $user_id, 'skill4', $_POST['skill4']);
        
        update_usermeta( $user_id, 'porcentaje_skill1', $_POST['porcentaje_skill1']);
        update_usermeta( $user_id, 'porcentaje_skill2', $_POST['porcentaje_skill2']);
        update_usermeta( $user_id, 'porcentaje_skill3', $_POST['porcentaje_skill3']);
        update_usermeta( $user_id, 'porcentaje_skill4', $_POST['porcentaje_skill4']);
    }
}

add_action('personal_options_update', 'save_profile_skills');
add_action('edit_user_profile_update', 'save_profile_skills');

function reg_post_type_board_games(){
    $supports = array(
        'title',
        'editor', 
        'author', 
        'thumbnail', 
//        'excerpt', 
        'custom-fields', 
        'comments', 
        'revisions', 
        'post-formats',
    
    );
    $labels = array(
        'name' => _x('BoardGames', 'plural'),//Nombre
        'singular_name' => _x('BG', 'singular'),//Nombre pequeño
        'menu_name' => _x('BoardGames', 'admin menu'), //Nombre menu
        'name_admin_bar' => _x('BoardGame', 'admin bar'),//No se
        'add_new' => _x('Add New', 'add new'),//Boton add new
        //
        'add_new_item' => __('Add New BoardGame'),
        'new_item' => __('New BoardGame'),
        'edit_item' => __('Edit BoardGame'),
        'view_item' => __('View BoardGame'),
        'all_itmes' => __('All BoardGames'),
        'search_items' => __('Search BoardGames'),
        'not_found' => __('No BoardGames Found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'board_game_post'),
        'has_archive' => true,
        'hierarchical' => flase,
        'menu_position' => 5,
        'taxonomies' => array( 'category' ),
    );
    register_post_type('board_game_post', $args);//hay k poner el nombre las dos cosas porque una solo sería error de tipo y el otro sería como todos los post
}
add_action('init', 'reg_post_type_board_games');//init: inicio wordpress, cargando


/*Para meter thumbnails (imágenes destacadas)*/

add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('image', 'gallery', 'audio', 'video', 'link', 'quote'));





function excursion_meta_box_callback( $post ) {
    /* Añadimos un campo 'nonce' (mientras tanto) que es usado para validar que el contenido de
       la petición del formulario viene del sitio actual y no de ningún otro sitio. Es un campo oculto
       que será chequeado más tarde para tal misión. 
       
       <?php wp_nonce_field( $action, $name, $referer, $echo ) ?>
       
       Los campos $action y $name son opcionales pero se especifican para una mayor seguridad
       - El nombre del campo field oculto es el que queramos, una vez que el formulario es enviado es accesible vía $_POST
       - El valor es el que establece la propia función
       - La acción que vamos a especificar será una función que se encargue de guardar los datos en la BBDD
    */
    wp_nonce_field( 'excursion_save_meta_box_data', 'excursion_meta_box_nonce' );

    /*
     * Usamos get_post_meta() para recoger un valor existente
     * en la BBDD y se o asignamos en el form al campo correspondiente
     */
    $value1 = get_post_meta( $post->ID, 'excursion_price', true );
    $value2 = get_post_meta( $post->ID, 'excursion_from', true );    
    $value3 = get_post_meta( $post->ID, 'excursion_to', true );
    $value4 = get_post_meta( $post->ID, 'excursion_places', true );

    /*
     * Dibujamos los campos del formulario que irán en el metabox
     *  
     */
    echo '<label for="excursion_price">';
    _e( 'Price', 'excursion_textdomain' );
    echo '</label> ';
    echo '<input type="text" id="excursion_price" name="excursion_price" value="' . esc_attr( $value1 ) . '" size="25" />';

    echo '<label for="excursion_from">';
    _e( 'From:', 'excursion_textdomain' );
    echo '</label> ';
    echo '<input type="date" id="excursion_from" name="excursion_from" value="' . esc_attr( $value2 ) . '" size="25" />';



    echo '<label for="excursion_to">';
    _e( 'To:', 'excursion_textdomain' );
    echo '</label> ';
    echo '<input type="date" id="excursion_to" name="excursion_to" value="' . esc_attr( $value3 ) . '" size="25" />';


    echo '<label for="excursion_places">';
    _e( 'Number of places:', 'excursion_textdomain' );
    echo '</label> ';
    echo '<input type="number" id="excursion_places" name="excursion_places" value="' . esc_attr( $value4 ) . '" size="25" />';
}

?>