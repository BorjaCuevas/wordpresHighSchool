<aside class="col-md-4">
    <div class="widget search" id="buscador">
        <input type="text" class="buscador form-control search_box" placeholder="Search here">
    </div><!--/.search-->
    <div class="widget order" id="ordenacion">
        <h2>Choose what you want to se first:</h2>
        <label> By Name: <input type="radio" name="ordenacion" value="nombre" class="rigth" checked/></label></br>
        <label> By Date: <input type="radio" name="ordenacion" value="fecha" class="rigth"></label></br>
        <label> By Departament: 
        <select id="actvDepart" class="na-departamento na-select rigth" name="departamento">
            <option value="" class="select-default-option">All Departaments</option>'
            <option value="Computing">Computing</option>
            <option value="Sports">Sports</option>
            <option value="Languajes">Languajes</option>
            <option value="Science">Science</option>
            <option value="Art">Art</option>
            <option value="History">History</option>
            <option value="Literature">Literature</option>
            <option value="Math">Math</option>
        </select>
    </div>
	<div class="widget categories">
        <h3>Recent Posts</h3>
        <div class="row">
            <div class="single_comments" id="ultimas-actividades">
                
            </div>
        </div>                     
    </div><!--/.recent comments-->
     

    <div class="widget categories">
        <h3>Calendar:</h3>
        <div class="row" id="calendar">
            
        </div>                     
    </div><!--/.categories-->
	
	<div class="widget archieve">
        <h3>Archieve</h3>
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
        <h3>Tag Cloud</h3>
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