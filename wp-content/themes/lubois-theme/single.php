<?php get_header();?>

<body>   

<?php get_template_part('template-parts/nav');?>

    <section id="blog" class="container">
        <div class="center">
            <h2><?php the_title();?></h2>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <?php //echo the_post_thumbnail('full', array( 'class' => 'img-responsive img-hover' )); ?>
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta"> 
                                        <span id="publish_date"><?php echo get_the_date('j, F');?></span>
                                        <span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">
                                            <?php $numeroComentarios = get_comments_number();
                                                if($numeroComentarios == 0):?>
                                                    No Comments
                                                <?php
                                                elseif ($numeroComentarios == 1):?>
                                                    1 Comment
                                                <?php
                                                else:
                                                    echo $numeroComentarios ?> Comments
                                                <?php
                                                endif;
                                            ?></a></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <?php the_post();?>
                                    <p><?php the_content();?></p>

                                    <div class="post-tags">
                                        <?php the_tags('<strong>Tag:</strong> ');?>
                                    </div>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        <?php wp_list_comments(array('style'=>'div'));?>
                    </div><!--/.col-md-8-->

                
                   <?php get_sidebar(); ?>
    					
    				
                

            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->


<?php get_footer();?>l