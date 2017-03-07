<div class="blog-item">
    <div class="row">
         <div class="col-sm-2 text-center">
            <div class="entry-meta"> 
                <span id="publish_date"><?php echo get_the_date('j, F');?></span>
                <span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author();?></a></span>
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
        <div class="col-sm-10 blog-content">
            <a href="<?php the_permalink();?>"> <?php echo the_post_thumbnail('full', array( 'class' => 'img-responsive img-hover' )); ?></a>
            <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
            <h3><?php the_excerpt();?></h3>
            <a class="btn btn-primary readmore" href="<?php the_permalink();?>">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</div><!--/.blog-item-->