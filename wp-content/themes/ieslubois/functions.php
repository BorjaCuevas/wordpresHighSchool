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
    return '<a class="more" href="' . get_permalink($post->ID) . '">... Read More </a>';
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

function has_user_photo($user){
    $result = 0;
    $regex = '/http:\/\/localhost\/wp\//';
    $extensions = array('.jpg', '.png', '.gif', '.jpeg');
    
    foreach($extensions as $extend){
        $direccion = get_template_directory_uri().'/fotos/usuarios/'.$user->user_nicename.$extend;
        if(file_exists(preg_replace($regex, './', $direccion))){
            $result = $direccion;
        }
    }
    if($result === 0){
        $result = has_gravatar($user->user_email);
        if(!$result){
            $result = get_template_directory_uri().'/fotos/usuarios/default.png';
        }
    }
    
    return $result;
}

require_once('template-parts/custompost_functions.php');