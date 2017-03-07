<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">Lubois High School</div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo get_settings('home');?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo get_page_link(get_page_by_title('about')->ID);?>">About</a>
                </li>
                <li>
                    <a href="<?php echo get_page_link(get_page_by_title('news')->ID);?>">News</a>
                </li>
                <li>
                    <a href="<?php echo get_page_link(get_page_by_title('activities')->ID);?>">Activities</a>
                </li>
                <li>
                    <a href="<?php echo get_page_link(get_page_by_title('contact')->ID);?>">Contact</a>
                </li>
                <li>
                    <a href="#">Teacher access</a>
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>