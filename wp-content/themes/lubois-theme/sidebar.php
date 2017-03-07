<aside class="col-md-4">
    <div class="widget search">
	    <?php get_search_form();?>
    </div><!--/.search-->
	<div class="widget categories">
        <h3><?php echo  _e('Recent Posts'); ?></h3>
        <div class="row">
            <div class="single_comments">
                <?php $args = array(
                    'nopaging' => false,
                    'posts_per_page' => 5,
                    );
                    $custom_query = new WP_Query($args);
                    if($custom_query->have_posts()) :
                        while($custom_query->have_posts()) :
                            $custom_query->the_post(); 
                    
                ?>
                <div class="col-sm-12">
                     <?php echo
                        '<img class="img-sidebar"' . get_first_image_by_post_id($post) . ' /></br>';?>
                    <span><?php the_title();?></span><br/>
                    <div class="entry-meta small muted">
                        <span>By <a href="#"><?php the_author();?></a></span> <span>On <a href="#"><?php the_time();?></a></span>
                    </div>
                </div>
                <?php endwhile; endif;?>
            </div>
        </div>                     
    </div><!--/.recent comments-->
     

    <div class="widget categories">
        <h3><?php echo  _e('Categories'); ?></h3>
        <div class="row">
            <div class="col-sm-6">
                <ul class="blog_category">
                    <?php wp_list_categories('title_li=&show_count=1');?>
                </ul>
            </div>
        </div>                     
    </div><!--/.categories-->
	
	<div class="widget archieve">
        <h3><?php echo  _e('Archieve'); ?></h3>
        <div class="row">
            <div class="col-sm-12">
                <ul class="blog_archieve">
                    <?php 
                        $args = array(
                            'format' => 'custom',
                            'before' => '<span class="fa fa-angle-double-right"> ',
                            'show_post_count' => 0,
                            'after' => '</span></br>');
                        wp_get_archives($args);?>
                </ul>
            </div>
        </div>                     
    </div><!--/.archieve-->
	
    <div class="widget tags">
        <h3><?php echo  _e('Tag Cloud'); ?></h3>
        <ul class="tag-cloud">
            <?php $args = array(
                    'nopaging' => false,
                    'posts_per_page' => 5,
                    );
                    $custom_query = new WP_Query($args);
                    if($custom_query->have_posts()) :
                        while($custom_query->have_posts()) :
                            $custom_query->the_post(); 
                
            echo get_the_tag_list('<li>', '</li><li>', '</li>');
            
            endwhile; endif;?>
        </ul>
    </div><!--/.tags-->
</aside>  