  <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- front-page -->
                        <li class="<?php if(is_front_page()){echo 'active';} ?>"><a href="<?php echo get_option('home'); ?>"><?php echo  _e('Home'); ?></a></li>
                        <!-- link inside-page -->
                        <li><a id="ancla-about" href="<?php echo get_option('home');?>/#about-us"><?php echo  _e('About Us'); ?></a></li>
                        <!-- blog / home -->
                        <li class="<?php if(is_home()){echo 'active';} ?>"><a href="<?php echo get_page_link(get_page_by_title('News')->ID); ?>"><?php echo  _e('News'); ?></a></li>
                        <!-- pagina estatica -->
                        <li class="<?php if(is_page('Activities')){echo 'active';} ?>"><a href="<?php echo get_page_link(get_page_by_title('Activities')->ID); ?>"><?php echo  _e('Activities'); ?></a></li>
                        <!-- pagina estatica -->
                        <li class="<?php if(is_page('Contact')){echo 'active';} ?>"><a href="<?php echo get_page_link(get_page_by_title('Contact')->ID); ?>"><?php echo  _e('Contact'); ?></a></li>
                        <!-- acceso al backend -->
                        <li><a href="https://proyectoies-imochon7.c9users.io/proyectoajax/index.php"><?php echo  _e('Teacher access'); ?></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->