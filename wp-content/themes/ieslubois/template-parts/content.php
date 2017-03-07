    
        <div class="col-lg-12 index_post">
            <a class="titulo_otros" href="<?php the_permalink();?>"><?php echo the_title();?></a><br>
            <div class="col-lg-5">
                <?php echo
                '<img class="post_first_image"' . get_first_image_by_post_id($post) . ' /></br>';?>
            </div><!-- IMAGEN PRIMERA DE CADA POST -->
            <div class="index_post_excerpt col-lg-7"><?php echo the_excerpt();?>
                <p>
                    <span class="fa fa-comments-o"> <?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?> </span>
                </p>
                <p>
                    <span class="fa fa-user"> 
                        <?php the_author();?>                        
                    </span>
                </p>
                <p>
                    <span class="fa fa-sitemap"> 
                        Categorias:  <?php the_category(', ');?>
                    </span>
                </p>
                <p>
                    <span class="fa fa-tags"> 
                        <?php the_tags();?>
                    </span>
                </p>
            </div>
        </div>
