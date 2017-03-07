

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#"><?php echo  _e('Home'); ?></a></li>
                        <li><a href="#"><?php echo  _e('About Us'); ?></a></li>
                        <li><a href="#"><?php echo  _e('Faq'); ?></a></li>
                        <li><a href="#"><?php echo  _e('Contact Us'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <?php wp_enqueue_scripts(); ?>
    <!--<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>-->
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.isotope.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/my-script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/plantillas.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/actividad.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/location.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/drawings.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/profesor.js" defer></script>
    
    <!--        Api de Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    
    
    <?php wp_footer(); ?>
    
</body>
</html>