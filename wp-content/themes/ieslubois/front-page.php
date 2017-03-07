 <?php get_header() ?>

<body>
    <div class="container-fluid">

    <?php get_template_part('template-parts/nav');?>
    
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/img/slider-1.jpg'; ?>);"></div>
                <div class="carousel-caption">
                    <h2>Welcome</h2>
                    <h3>2016 - 2017<br>Course news</h3>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/img/slider-2.jpg'; ?>);"></div>
                <div class="carousel-caption">
                    <h2>Welcome</h2>
                    <h3>2016 - 2017<br>Course news</h3>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/img/slider-3.jpg'; ?>);"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                    <h3>Subcaption</h3>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <!--<div class="container">-->

        <!-- Marketing Icons Section -->
        <div class="row seccion-1">
            <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Lubois High School
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src=""/>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Free &amp; Open Source</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                 <h2 class="page-header"> Ultimos Posts </h2>
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'tax_query' => array(
                        array(                
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => array( 
                                'post-format-audio',
                                'post-format-gallery',
                                'post-format-image',
                                'post-format-link',
                                'post-format-quote',
                                'post-format-video'
                            ),
                            'operator' => 'NOT IN'
                        ),
                    ),
                );
                $custom_query = new WP_Query($args);
                $total_results = $custom_query->post_count;
                $contador = 0;
                if($custom_query->have_posts()) :
                    while($custom_query->have_posts() && $contador < 3) :
                        $custom_query->the_post(); 
                        $contador++;

            ?>            
            <div class="flexible col-lg-4">
                <a href="<?php the_permalink();?>" class="col-lg-12">
                    <figure class="noticias">
                        <img <?php echo get_first_image_by_post_id($post);?>/>
                        <figcaption class="leyenda">
                            <span><?php echo the_title();?></span></br>
                            <span class="fa fa-comments-o"> 
                                <?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?> 
                            </span></br>
                            <span class="fa fa-user"> 
                                <?php the_author();?>                        
                            </span></br>
                        </figcaption>
                    </figure>
                    
                </a> 
            </div>
            <?php 
        endwhile; else:
        endif;
            ?>
                </div>
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Modern Business Features</h2>
            </div>
            <div class="col-md-6">
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li><strong>Bootstrap v3.3.7</strong>
                    </li>
                    <li>jQuery v1.11.1</li>
                    <li>Font Awesome v4.2.0</li>
                    <li>Working PHP contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                    <li>17 HTML pages</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>

        <hr>

       <?php 
        
        get_footer();?>