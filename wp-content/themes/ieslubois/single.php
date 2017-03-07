<?php get_header();?>

<body>   

<?php get_template_part('template-parts/nav');?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="titulo_post">
                    <?php echo 'titulo'.the_title();?></span>
                </div>
            <?php the_post();?>
                <div class="content"><?php the_content();?></div><br>                
                <div class="categorias col-lg-8">
                    <p><span class="fa fa-sitemap"> Categorias:  <?php the_category(', ');?></span></p>
                    <span class="fa fa-tags"> <?php the_tags();?></span></div>
                <div class="datos col-lg-4">    
                    <span class="fa fa-user"> <?php the_author();?></span>
                    <span class="fa fa-calendar"> <?php echo get_the_date();?></span>
                </div>
            <div class="row"></div>
            <div class="row"><?php comments_template();?></div>
        
                <div class="commentlist">
        <?php wp_list_comments(array('style'=>'div'));?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</body>
