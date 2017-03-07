    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo  _e('School'); ?></h3>
                        <ul>
                            <li><a href="#"><?php echo  _e('About us'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Meet the teachers'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Copyright'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Terms of use'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Privacy policy'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Contact us'); ?></a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo  _e('Support'); ?></h3>
                        <ul>
                            <li><a href="#"><?php echo  _e('Faq'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Blog'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Forum'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Documentation'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Student grant'); ?></a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo  _e('Education'); ?></h3>
                        <ul>
                            <li><a href="#"><?php echo  _e('Android Development'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Web Development'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Computing System'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Telecommunications'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Administration'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Laboratory'); ?></a></li>
                            <li><a href="#"><?php echo  _e('International Trade'); ?></a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><?php echo  _e('Our Partners'); ?></h3>
                        <ul>
                            <li><a href="#"><?php echo  _e('Adipisicing Elit'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Eiusmod'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Tempor'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Veniam'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Exercitation'); ?></a></li>
                            <li><a href="#"><?php echo  _e('Ullamco'); ?></a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Lubois HighSchool</a>. All Rights Reserved.
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
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.eventCalendar.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.eventCalendar.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/moment.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/my-script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/plantillas.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/actividad.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/location.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/drawings.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/profesor.js" defer></script>
    <script src="<?php bloginfo('template_url'); ?>/js/calendar.js" ></script>
    
    <!--        Api de Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    
    
    <?php wp_footer(); ?>
    
</body>
</html>