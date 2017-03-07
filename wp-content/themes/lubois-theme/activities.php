<?php 
     /* Template name: activities*/
?>

<?php get_header(); ?>
<?php get_template_part('template-parts/nav'); ?>

<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-xs-12 col-sm-8">
                <div id="rellenarPrincipal" class="blog-item">
                </div>
            </div>
            <?php get_template_part('template-parts/sidebar', 'activities');?>
        </div>
    </div>
</section>
            
                
<?php get_footer();?>