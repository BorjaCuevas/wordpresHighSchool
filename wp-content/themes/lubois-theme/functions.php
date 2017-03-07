<?php
/* Hook de acción (add_action añade)*/

/*add_action('wp_head','show_template');
function show_template() {
    global $template;
    print_r($template);
}

/* Encolar jQuery al tema */

function textdomain_jquery_enqueue(){//Hace que los puntos suspensivos siga escribiendo
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js", 'false', null);
    wp_enqueue_script('jquery');
}
if(!is_admin()){//el gancho
    add_action('wp_enqueue_scripts', 'textdomain_jquery_enqueue', 11);
}

/* Hook de filtro (add_filter(nombre_gancho, nombre_funcion)) */
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more){
    global $post;
    return '...';
}

add_filter('the_content', 'add_img_responsive');
function add_img_responsive($content){
    if($content){//Por si está vacío
        $post_format = get_post_format();
        switch($post_format){
            case 'quote':
                $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="quote">', $content, 1);
                $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="quote_author">', $content, 2);
                return $content;
                break;
            case 'link':
                $content = preg_replace('/<p><a href=[^>]+>/', '', str_replace('</a></p>', '', $content));
                return $content;
                break;
        }
        // convertimos el contenido en codificación UTF-8
        $content = mb_convert_encoding($content, "HTML-ENTITIES", "UTF-8");
        $document = new DOMDocument();
        // desabilitamos los errores, necesario porque solo es un trozo del documento, faltan etiquetas
        libxml_use_internal_errors(true);
        // fusionamos el texto plano ocn la instancia de Document, para que tenga estructura del DOM
        $document->loadHTML(utf8_decode($content));
        // seleccionamos todos los img y les cambiamos la clase
        $imgs = $document->getElementsByTagName('img');
        foreach($imgs as $img){
            $img->setAttribute('class', 'img-responsive');
        }
        // se guarda y se devuelve porque está en la RAM
        $html = $document->saveHTML();
        return $html;
    }
}

/*Funcion para coger la primera imagen solo*/

function get_first_image_by_post_id($post) { 
	$content = $post->post_content;
	$regex = '/src="([^"]*)"/';
	preg_match_all( $regex, $content, $matches );
	return($matches[0][0]);
}
    
//// Para quitar el width y height de los div padres
//
//add_filter('the_content', 'none_style_img_responsive');
//function none_style_img_responsive($content){
//    $imgs = $document->getElementsByClassName('img-responsive');
//    foreach($imgs as $img){
//        if($img.parentNode.)
//        $img->setAttribute('class', 'img-responsive');
//    }
//    // se guarda y se devuelve porque está en la RAM
//    $html = $document->saveHTML();
//    return $html;
//}

/*Sacar las dos categorias separadas con un & en String */

function monta_categorias($array){
    $tamanio_array = count($array);
    
    if($tamanio_array == 0) return '';
    
    if($tamanio_array >= 2){
        $salida = $array[0] . ' & ' . $array[1];
    }else{
        $salida = "" . $tamanio_array[0];
    }
    return $salida;
}


/*Registrar widgets*/

function generaltheme_widgets_init(){
    register_sidebar(array(
        'name' => __('Header Widgets Area'),
        'id' => 'header',
        'description' => __('widgets header'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Sidebar Widgets'),
        'id' => 'sidebar',
        'description' => __('Sidebar Widgets Area'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widgets Area'),
        'id' => 'footer',
        'description' => __('widgets footer'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
    ));
}

add_action('widgets_init', 'generaltheme_widgets_init');


/*Etiqueta para las categorias*///IMPORTANTE ------------------------------

function filter_get_pages($pages){
    foreach($pages as $page){
        $link = get_page_link($page->ID);
        if($page->post_title == 'Nuevas adquisiciones'){
            echo '<li><a href="'.esc_url(home_url()).'#Cartelera">'.$page->post_title.'</a></li>';
        }else{
            echo '<li><a href="'.$link.'">'.$page->post_title.'</a></li>';
        }
    }
    return $pages;
}
add_filter('get_pages', 'filter_get_pages', 10, 2);

function filter_resto_front_page($excerpt){
    if(is_front_page()){
        $excerpt = '<p class="resto">'.$excerpt;
    }
    return $excerpt;
}

add_filter( 'get_the_excerpt', 'filter_resto_front_page' );

/*Filtra la longitud del excerpt, es para la ventana search*/
function filter_short_the_excerpt($length){
    if(!is_home() && !is_front_page() && !is_author()){
        return 20;
    } else {
        return $length;
    }
}
add_filter('excerpt_length', 'filter_short_the_excerpt', 999);


/* Función que devuelve si tiene gravatar o no*/

function has_gravatar($email){
    //Ciframos la cuenta de email
    $hash = md5(strtolower(trim($email)));
    //Generamos la supuesta uri del gravatar si existiese
    $uri = 'http://www.gravatar.com/avatar/'.$hash.'?d=404';
    //Recuperamos todas las cabeceras enviadas por el servido en respueta a una petción HTTP
    $headers = @get_headers($uri);
    //Si tiene gravatar debe aparecer un 200 en la uri
    if(!preg_match("|200|", $headers[0])){
        $has_valid_avatar = FALSE;
    }else{
        $has_valid_avatar = TRUE;
    }return $has_valid_avatar;
}

/*Función para ver si tiene foto */

// function has_user_photo($user){
//     $result = 0;
//     $regex = '/http:\/\/localhost\/wp\//';
//     $extensions = array('.jpg', '.png', '.gif', '.jpeg');
    
//     foreach($extensions as $val){
//         $img_url = get_template_directory_uri() . '/images/' . $user . $val;
//         if(file_exists($img_url)){
//             $result = $img_url;
//         }
//     }
//     if($result === 0){
//         $result = has_gravatar($user);
//         if(!$result){
//             $result = get_template_directory_uri() . '/images/default.png';
//         }
//     }
    
//     return $result;
// }

function has_user_photo($user){
    return $img_url = get_template_directory_uri() . '/images/' . $user . '.png';
}

//Añadir filtro para el wp_lists_categories y así que el número que salga esté en span y con la categoría
//que traía el tema.
function filter_number_categories($output, $args){
    $output = str_replace('</a> (', '</a> <span class="badge">', $output);
    $output = str_replace(')', '</span>', $output);
    
    return $output;
}

add_filter('wp_list_categories', 'filter_number_categories', 10, 2);




// FUNCIÓN QUE DEVUELVA SI EL USUARIO TIENE FOTO O NO 
function has_author_image($name){
    $result = false;
    $extensions = array('jpg', 'png', 'jpeg');
    foreach($extensions as $val){
        $img_url = get_template_directory_uri() . '/img/' . $name . '.' . $val;
        if(file_exists($img_url)){
            $result = $img_url;
        }
    }
    return $result;
}

// Añadir campos personalizados en el perfil del usuario.
function add_custom_fields($user){ ?>
    
    <h3>Ocupation</h3>
    <table class="form-table">
        <tr>
            <th><label for="ocupation">Ocupation</label></th>
            <td>
                <input id="ocupation" name="ocupation" type="text" value="<?php echo esc_attr( get_the_author_meta( 'ocupation', $user->ID ) ); ?>"/>
                <br/>
                <span class="description">Input your ocupation.</span>
            </td>
        </tr>
    </table>
    
    <h3>Social Media</h3>
    <table class="form-table">
        <tr>
            <th><label for="facebook">Facebook</label></th>
            <td>
                <input id="facebook" name="facebook" type="text" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>"/>
                <br/>
                <span class="description">Input your Facebook account.</span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter">Twitter</label></th>
            <td>
                <input id="twitter" name="twitter" type="text" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>"/>
                <br/>
                <span class="description">Input your Twitter account.</span>
            </td>
        </tr>
    </table>

    <h3>Habilidades</h3>
    <table class="form-table">
        <tr>
            <th><label for="skill_one">Knowledge 1</label></th>
            <td>
                <span class="description">Name</span>
                <input id="skill_one" name="skill_one" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_one', $user->ID ) ); ?>"/>
                <span class="description">%</span>
                <input id="skill_one_value" name="skill_one_value" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_one_value', $user->ID ) ); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="skill_two">Knowledge 2</label></th>
            <td>
                <span class="description">Name</span>
                <input id="skill_two" name="skill_two" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_two', $user->ID ) ); ?>"/>
                <span class="description">%</span>
                <input id="skill_two_value" name="skill_two_value" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_two_value', $user->ID ) ); ?>"/>
                
            </td>
        </tr>
        <tr>
            <th><label for="skill_three">Knowledge 3</label></th>
            <td>
                <span class="description">Name</span>
                <input id="skill_three" name="skill_three" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_three', $user->ID ) ); ?>"/>
                <span class="description">%</span>
                <input id="skill_three_value" name="skill_three_value" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_three_value', $user->ID ) ); ?>"/>
                
            </td>
        </tr>
        <tr>
            <th><label for="skill_one">Knowledge 4</label></th>
            <td><span class="description">Name</span>
                <input id="skill_four" name="skill_four" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_four', $user->ID ) ); ?>"/>
                <span class="description">%</span>
                <input id="skill_four_value" name="skill_four_value" type="text" value="<?php echo esc_attr( get_the_author_meta( 'skill_four_value', $user->ID ) ); ?>"/>
        
            </td>
        </tr>      
    </table>



<?php } 

add_action('show_user_profile', 'add_custom_fields');
add_action('edit_user_profile', 'add_custom_fields');

function save_custom_fields($user_id){
    /*
    if(!current_user_can('edit_user', $user_id)){
         return false;
    }*/
    update_usermeta($user_id, 'ocupation', $_POST['ocupation']);
    update_usermeta($user_id, 'facebook', $_POST['facebook']);
    update_usermeta($user_id, 'twitter', $_POST['twitter']);
    
    update_usermeta($user_id, 'skill_one', $_POST['skill_one']);
    update_usermeta($user_id, 'skill_one_value', $_POST['skill_one_value']);
    
    update_usermeta($user_id, 'skill_two', $_POST['skill_two']);
    update_usermeta($user_id, 'skill_two_value', $_POST['skill_two_value']);
    
    update_usermeta($user_id, 'skill_three', $_POST['skill_three']);
    update_usermeta($user_id, 'skill_three_value', $_POST['skill_three_value']);
    
    update_usermeta($user_id, 'skill_four', $_POST['skill_four']);
    update_usermeta($user_id, 'skill_four_value', $_POST['skill_four_value']);    
}

add_action('personal_options_update', 'save_custom_fields');
add_action('edit_user_profile_update', 'save_custom_fields');


// para la paguinacion----------------
//creamos la sigueinte funcion
//la llamamos dentro del loop justo al acabar el while

function controll_page($type = 'plain' , $endsize = 1 , $midsize=1){
        echo get_controll_page($type, $endsize, $midsize);
    }

    //Funcion para obtener los controles de la paginacion
    function get_controll_page($type = 'plain' , $endsize = 1 , $midsize=1){
        global $wp_query, $wp_rewrite;
        
        $current = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
        
        if(! in_array($type, array('plain','list', 'array'))) $type = 'plain' ;
        
        $endsize = absint($endsize);
        $midsize = absint($midsize);
        
        $pagination = array(
                    'base' => @add_query_arg('paged' , '%#%'),
                    'format' => '',
                    'total' => $wp_query->max_num_pages,
                    'current' => $current,
                    'show_all' => false,
                    'end_size' => $endsize,
                    'mid_size' => $midsize,
                    'prev_next' => true,
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                    'type' => $type 
        );
        
        //Re-construimos la url segun el tipo de pag
        if($wp_rewrite->using_permalinks()){
            $pagination['base'] = user_trailingslashit (trailingslashit( remove_query_arg('s', get_pagenum_link(1) ) ).'page/%#%/', paged);
        }
        
        if( ! empty ($wp_query->query_vars['s'])){
            $pagination['add_args'] = array ('s' => get_query_var);
        }
        
        return paginate_links($pagination);
    }



//Paginación del index 
function get_paginate_page_links( $type ='list', $endsize = 1, $midsize = 1){
global $wp_query, $wp_rewrite;

$current  = get_query_var('paged') > 1 ? get_query_var('paged') : 1;    
    
if(! in_array($type, array('plain', 'list', 'array'))) $type = 'plain';    
    
$endsize = absint($endsize);    
$midsize = absint($midsize);
    
    
$pagination = array(
    'base' => @add_query_arg('paged', '%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'show_all' => false,
    'end_size' => $endsize,
    'mid_size' => $midsize,
    'type' => $type,
    'prev_text' => '<li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>',
    'next_text' => '<li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>',
//    'after_page_number' => '<li>',
//    'before_page_number' => '</li>'
);

if($wp_rewrite->using_permalinks()){
    
    $pagination['base'] = user_trailingslashit( trailingslashit(remove_query_arg('s', get_pagenum_link(1))).'page/%#%', 'paged');
    
}

if(!empty( $wp_query->query_vars['s'])){
    $pagination['add_args'] = array( 's' => get_query('s') );
}
    return paginate_links($pagination);

}





?>