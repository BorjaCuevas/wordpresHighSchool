<?php get_header();?>

<?php get_template_part('template-parts/nav'); ?>

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(<?php bloginfo('template_url');?>/images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"><?php echo  _e('First Class Prep Results'); ?></h1>
                                    <h2 class="animation animated-item-2"><?php echo  _e('Please find the dates of our open days and evenings in the following table. If these dates aren’t suitable we can arrange a private tour for you to see the school.'); ?></h2>
                                    <a class="btn-slide animation animated-item-3" href="#"><?php echo  _e('Visitis us'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php bloginfo('template_url');?>/images/slider2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"><?php echo  _e('State schools let you down?'); ?></h1>
                                    <h2 class="animation animated-item-2"><?php echo  _e('Consider an outstanding independent option. Admissions Office, North Bridge House School, 65 Rosslyn Hill, Hampstead, London, NW3 5UD'); ?></h2>
                                    <a class="btn-slide animation animated-item-3" href="#"><?php echo  _e('Contact'); ?></a>
                                </div>
                            </div>

                         

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php bloginfo('template_url');?>/images/slider3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"><?php echo  _e('Meet the Head Morning Teas'); ?></h1>
                                    <h2 class="animation animated-item-2"><?php echo  _e('From the early years of education through to A-Level study, North Bridge House stands out from the North London school archetype, swapping hothouse academia for its more nurturing approach'); ?></h2>
                                    <a class="btn-slide animation animated-item-3" href="#"><?php echo  _e('Find out'); ?></a>
                                </div>
                            </div>
                            <!--<div class="col-sm-6 hidden-xs animation animated-item-4">-->
                            <!--    <div class="slider-img">-->
                            <!--        <img src="<?php bloginfo('template_url');?>/images/slider/img3.png" class="img-responsive">-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2><?php echo  _e('Vocational Education and Training'); ?></h2>
                <p class="lead"><?php echo  _e('Professional training refers to all those studies and learning aimed at the insertion, reinsertion<br>and updating of work, whose main objective is to increase and adapt the knowledge<br>and skills of current and future workers throughout their lives.'); ?></p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-desktop"></i>
                            <h2><?php echo  _e('Networked Computer Systems'); ?></h2>
                            <h3><?php echo  _e('Configure, manage and maintain systems.'); ?></h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-desktop"></i>
                            <h2><?php echo  _e('Web Applications Development'); ?></h2>
                            <h3><?php echo  _e('Develop functional web applications.'); ?></h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-desktop"></i>
                            <h2><?php echo  _e('Multiplatform Applications'); ?></h2>
                            <h3><?php echo  _e('Develop multiplatform applications.'); ?></h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-wifi"></i>
                            <h2><?php echo  _e('Telecommunications Systems'); ?></h2>
                            <h3><?php echo  _e('The latest tecnoligias always within our reach'); ?></h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-area-chart"></i>
                            <h2><?php echo  _e('Administration and Finance'); ?></h2>
                            <h3><?php echo  _e('We manage all data without problems'); ?></h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-flask"></i>
                            <h2><?php echo  _e('Laboratory Technician'); ?></h2>
                            <h3><?php echo  _e('We have 5 classrooms and 3 of the best scientists'); ?></h3>
                        </div>
                    </div><!--/.col-md-4-->
                    
                    
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo  _e('Recent Photos'); ?></h2>
                <p class="lead"><?php echo  _e(' We focus on each student as an individual, offering the very best teaching and educational resources.
We aim to build confident students, enabling<br> study at a wide range of degree  courses at top universities.
We are noted for our  friendliness, informality, and we treat our students as young adults.'); ?>
   </p>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale1.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?php echo  _e('A DAY IN A VIRTUAL REALITY'); ?></a> </h3>
                                <p><?php echo  _e('Who kindly provided the Science department with three virtual reality headsets for the day!'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale1.png" rel="prettyPhoto"><i class="fa fa-eye"></i><?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url');?>/images/portfolio/recent/gale2.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?php echo  _e('ALUMNI NETBALL'); ?> </a></h3>
                                <p><?php echo  _e('We had over 25 alumni from that have left the school. The standard of netball was very high considering.'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url');?>/images/portfolio/recent/gale2.png" rel="prettyPhoto"><i class="fa fa-eye"></i><?php echo  _e('View'); ?> </a>
                            </div> 
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url');?>/images/portfolio/recent/gale3.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?php echo  _e('UNIVERSITY 2016 '); ?></a></h3>
                                <p><?php echo  _e('We are proud to confirm the following university destinations for our 2016 leavers.'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url');?>/images/portfolio/recent/gale3.png" rel="prettyPhoto"><i class="fa fa-eye"></i> <?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url');?>/images/portfolio/recent/gale4.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?php echo  _e('GCSE RESULTS'); ?> </a></h3>
                                <p><?php echo  _e('GCSE results for the 2015/16 upper fifth Congratulations to all members of the King’s'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url');?>/images/portfolio/recent/gale4.png" rel="prettyPhoto"><i class="fa fa-eye"></i> <?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>   
                
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale5.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?php echo  _e('THE STARS'); ?></a></h3>
                                <p><?php echo  _e('We were delighted to welcome Dr Leah-Nani Alconcel of Imperial College to talk about her'); ?> </p>
                                <a class="preview" href="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale5.png" rel="prettyPhoto"><i class="fa fa-eye"></i> <?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale6.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"><?php echo  _e('Leavers Day'); ?></a></h3>
                                <p><?php echo  _e('Activities at Kingsway were laid on by staff and included a bucking bronco.'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale6.png" rel="prettyPhoto"><i class="fa fa-eye"></i> <?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale7.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"> <?php echo  _e('Tegan McNicholas'); ?> </a></h3>
                                <p> <?php echo  _e('Tegan McNicholas (current LVI) has been chosen to captain Wales in the home internationals tournament in April'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale7.png" rel="prettyPhoto"><i class="fa fa-eye"></i> <?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale8.png" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#"> <?php echo  _e('Surrey Schools '); ?> </a></h3>
                                <p> <?php echo  _e('Seven King’s pupils represented Merton in the Surrey Schools Cross-Country Championships'); ?></p>
                                <a class="preview" href="<?php bloginfo('template_url'); ?>/images/portfolio/recent/gale8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> <?php echo  _e('View'); ?></a>
                            </div> 
                        </div>
                    </div>
                </div>   
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->
    
    
    <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo  _e('Some of Our Services'); ?></h2>
                <p class="lead"><?php echo  _e('We aim to provide students and parents with as much information as possible. If you require any further information or you require assistance with applications please call us on +44 (0) 20 7935 8411.'); ?></p>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" height="90" width="90" src="<?php bloginfo('template_url'); ?>/images/services/reunion.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo  _e('Teachers Council'); ?></h3>
                            <p><?php echo  _e('A career in teaching means having the chance to make.'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" height="90" width="90" src="<?php bloginfo('template_url'); ?>/images/services/library.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo  _e('Library'); ?></h3>
                            <p><?php echo  _e('College Library is a rare book library of international'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" height="90" width="90" src="<?php bloginfo('template_url'); ?>/images/services/settings.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo  _e('Work Formation'); ?></h3>
                            <p><?php echo  _e('The best training so far in the center'); ?></p>
                        </div>
                    </div>
                </div>  

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" height="90" width="90" src="<?php bloginfo('template_url'); ?>/images/services/brainstorm.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo  _e('Innovation'); ?></h3>
                            <p><?php echo  _e('First center in new technologies'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" height="90" width="90" src="<?php bloginfo('template_url'); ?>/images/services/sprout.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo  _e('Eco-Friendly'); ?></h3>
                            <p><?php echo  _e('We are the most ecological of the clouds.'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" height="90" width="90" src="<?php bloginfo('template_url'); ?>/images/services/compose.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo  _e('Workshops'); ?></h3>
                            <p><?php echo  _e('We have the most specialized workshops.'); ?></p>
                        </div>
                    </div>
                </div>                                                
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->
    
    
    <!-- about-us -->
    <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown">
				<h2><?php echo  _e('Our Installations'); ?></h2></h2>
				<p class="lead"><?php echo  _e('Our modern facilities offer a unique and peaceful atmosphere for our students. Guaranteeing a unique good<br> and pivate. We have great services and amenities'); ?></p>
			</div>
			
			<!-- about us slider -->
			<div id="about-slider">
				<div id="carousel-slider" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				  	<ol class="carousel-indicators visible-xs">
					    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-slider" data-slide-to="1"></li>
					    <li data-target="#carousel-slider" data-slide-to="2"></li>
				  	</ol>

					<div class="carousel-inner">
						<div class="item active">
							<img src="<?php bloginfo('template_url'); ?>/images/slider_one.jpg" class="img-responsive" alt=""> 
					   </div>
					   <div class="item">
							<img src="<?php bloginfo('template_url'); ?>/images/slider_two.jpg" class="img-responsive" alt=""> 
					   </div> 
					   <div class="item">
							<img src="<?php bloginfo('template_url'); ?>/images/slider_three.jpg" class="img-responsive" alt=""> 
					   </div> 
					</div>
					
					<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
						<i class="fa fa-angle-left"></i> 
					</a>
					
					<a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
						<i class="fa fa-angle-right"></i> 
					</a>
				</div> <!--/#carousel-slider-->
			</div><!--/#about-slider-->
			
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class="center wow fadeInDown">
					<h2><?php echo  _e('Guaranteed Success'); ?></h2>
					<p class="lead"><?php echo  _e('All our students, up to 98% of enrolled students get the passed with magnificent notes and an impeccable history'); ?></p>
				</div>
				
				<div class="row">
		
					<div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="joomla-skill">                                   
								<p><em>85%</em></p>
								<p><?php echo  _e('Promotes'); ?></p>
							</div>
						</div>
					</div>
					
					 <div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="html-skill">                                  
								<p><em>95%</em></p>
								<p><?php echo  _e('VET'); ?></p>
							</div>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
							<div class="css-skill">                                    
								<p><em>80%</em></p>
								<p><?php echo  _e('Work'); ?></p>
							</div>
						</div>
					</div>
					
					 <div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
							<div class="wp-skill">
								<p><em>90%</em></p>
								<p><?php echo  _e('University'); ?></p>                                     
							</div>
						</div>
					</div>
					
				</div>
	
            </div><!--/.our-skill-->
			

			<!-- our-team -->
			<div class="team">
				<div class="center wow fadeInDown">
					<h2><?php echo  _e('Team of Corlate'); ?></h2>
					<p class="lead">
<?php echo  _e('Our management team has many years of experience and the best professionals in the high positions of the center, obtaining the fantastic statistics and <br>the great interest of the students by the approved with note'); ?></p>
				</div>

				<div class="row clearfix">
					<div class="col-md-4 col-sm-6">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="<?php bloginfo('template_url'); ?>/images/prof1.png" alt=""></a>
								</div>
								<div class="media-body">
									<h4><?php echo  _e('Rene Reynald'); ?></h4>
									<h5>Principal</h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="#"><?php echo  _e('Science'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Math'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Computing'); ?></a></li>
									</ul>
									<ul class="social_icons">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p><?php echo  _e('Multi-purpose profile, looking for professional stability, interested in joining an organization that allows him to develop as a professional.'); ?></p>
						</div>
					</div><!--/.col-lg-4 -->
					
					
					<div class="col-md-4 col-sm-6 col-md-offset-2">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="<?php bloginfo('template_url'); ?>/images/man2.jpg" alt=""></a>
								</div>
								<div class="media-body">
									<h4><?php echo  _e('Jhon Doe'); ?></h4>
									<h5><?php echo  _e('Vice Principal'); ?></h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="#"><?php echo  _e('History'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('English'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Literature'); ?></a></li>
									</ul>
									<ul class="social_icons">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p><?php echo  _e('Professor of literature and mathematics with more than 10 years of experience and licensed at the University of Texas.'); ?></p>
						</div>
					</div><!--/.col-lg-4 -->					
				</div> <!--/.row -->
				<div class="row team-bar">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="second-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
					<div class="third-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
				</div> <!--skill_border-->       

				<div class="row clearfix">   
					<div class="col-md-4 col-sm-6 col-md-offset-2">	
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="<?php bloginfo('template_url'); ?>/images/man3.jpg" alt=""></a>
								</div>

								<div class="media-body">
									<h4><?php echo  _e('Troy Mclure'); ?></h4>
									<h5><?php echo  _e('Department Manager'); ?></h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="#"><?php echo  _e('Geography'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Languajes'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Biology'); ?></a></li>
									</ul>
									<ul class="social_icons">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p><?php echo  _e('Lover of the geography I have more than 20 years of experience, also specializing in biology and language, always ready to teach'); ?></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-md-offset-2">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="<?php bloginfo('template_url'); ?>/images/man4.jpg" alt=""></a>
								</div>
								<div class="media-body">
									<h4><?php echo  _e('Mary Jane'); ?></h4>
									<h5><?php echo  _e('Studies Coordinator'); ?></h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="#"><?php echo  _e('Economics'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Math'); ?></a></li>
										<li class="btn"><a href="#"><?php echo  _e('Physic'); ?></a></li>
									</ul>
									<ul class="social_icons">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p><?php echo  _e('Economist and lover of numbers I am always willing to teach and explain all my knowledge to my students.'); ?></p>
						</div>
					</div>
				</div>	<!--/.row-->
			</div><!--section-->
		</div><!--/.container-->
    </section><!--/about-us-->
    
    


    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo  _e('Our Partners'); ?></h2>
                <p class="lead"><?php echo  _e('Thanks to them we can enjoy all our facilities in perfect condition and have new technologies for our students.<br> Getting the best benefits for everyone.'); ?></p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="<?php bloginfo('template_url'); ?>/images/partners/partner1.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="<?php bloginfo('template_url'); ?>/images/partners/partner2.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="<?php bloginfo('template_url'); ?>/images/partners/partner3.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="<?php bloginfo('template_url'); ?>/images/partners/partner4.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="<?php bloginfo('template_url'); ?>/images/partners/partner5.png"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->

    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2><?php echo  _e('Have a question or need a custom quote?'); ?></h2>
                            <p><?php echo  _e('Contact us to solve any doubt about the registration in our time or any other question you have, we will always be at your disposal on the phone +0123 456 70 80'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->

    




<?php get_footer();?>