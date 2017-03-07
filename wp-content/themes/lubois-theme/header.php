<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?php wp_title('&raquo;','true','right'); ?>
            <?php bloginfo('name'); ?>
    </title>
	
	
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />
    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-57-precomposed.png">
    
    <?php wp_head(); ?>
    
</head><!--/head-->

<body class="homepage">