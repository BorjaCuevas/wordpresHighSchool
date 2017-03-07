<?php get_header();?>
<div id="404">
    <div class="col-lg-8" id="dori"></div>
    <div class="wrapper row">
        <div class="not_found col-lg-8">
            <h1>404 error</h1></br>
            <p>Page not found</p>
        </div>
        <div class="row error_action">
            <?php get_search_form();?>
            <div class="button">
                <a href="<?php echo get_settings('home');?>"> Inicio </a>
            </div>
            <div class="button">
                <a href="javascript:window.history.back();"> Pagina anterior </a>
            </div>
        </div>
            <p> Sigue nadando, nadando, nadando....</p>
    </div>
</div>

<?php get_footer;?>