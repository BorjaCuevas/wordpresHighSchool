<?php

    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));


    /*wp_list_authors('show_fullname=1&include=' . $curauth->ID);
    //$curauth -> user_nicename;

     get_avatar($curauth->ID);
    has_user_photo($curauth).'</br>';

get_template_directory_uri().'/fotos/usuarios/'.$curauth->user_nicename.'.jpg';



get_the_author_meta('custom_field_facebook', $curauth->ID);*/


get_header(); ?>


    <body>
        <?php get_template_part('template-parts/nav');?>
        <div class="container">
            <div class="row"></div>
            <div class="row"> 
                <div class="col-lg-5">
                    <img src="<?php echo has_user_photo($curauth);?>" width="450px" sizes="(max-width: 300px) 100px, 300px"/>
                </div>
                </br></br>
                <div class="col-lg-7"><?php echo $curauth->description;?></div>
                <div class="col-lg-5">
                    <a href="<?php echo get_the_author_meta('custom_field_facebook', $curauth->ID);?>"><img id="facebook" src="<?php echo get_template_directory_uri().'/fotos/icono/Facebook.png';?>"></a>
                    <a href="<?php echo get_the_author_meta('custom_field_twitter', $curauth->ID);?>"><img id="twitter" src="<?php echo get_template_directory_uri().'/fotos/icono/Twitter.png';?>"></a>
                </div>
            </div>
            <div class="row">
                <div id="author_grafico_habilidad1" class="col-lg-3" style="min-height: 400px"></div>
                <div id="author_grafico_habilidad2" class="col-lg-3" style="min-height: 400px"></div>
                <div id="author_grafico_habilidad3" class="col-lg-3" style="min-height: 400px"></div>
                <div id="author_grafico_habilidad4" class="col-lg-3" style="min-height: 400px"></div>
                <?php //get_template_part('template-parts/grafico', 'author-admin');?>  
                <script language='javascript'>
var habilidades = {
    '<?php echo get_the_author_meta('skill1', $curauth->ID);?>' : '<?php echo get_the_author_meta('porcentaje_skill1', $curauth->ID);?>',
    
    '<?php echo get_the_author_meta('skill2', $curauth->ID);?>' : '<?php echo get_the_author_meta('porcentaje_skill2', $curauth->ID);?>',
    
    '<?php echo get_the_author_meta('skill3', $curauth->ID);?>' : '<?php echo get_the_author_meta('porcentaje_skill3', $curauth->ID);?>',
    
    '<?php echo get_the_author_meta('skill4', $curauth->ID);?>' : '<?php echo get_the_author_meta('porcentaje_skill4', $curauth->ID);?>'
    
};
var numero = 0;
                    
        var grafico = function (habilidades, habilidad) {
            var donde = 'author_grafico_habilidad' + numero;
            Highcharts.chart(donde, {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                }, 
                exporting: { 
                    enabled: false
                },
                title: {
                    text: habilidad,
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 80
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
                    padding: 20
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%']
                    }
                },
                series: [{
                    type: 'pie',
                    name: habilidad,
                    innerSize: '50%',
                    data: [
                        ["", parseInt(habilidades[habilidad])],
                        {
                            name: '',
                            y: 100 - parseInt(habilidades[habilidad]),
                            dataLabels: {
                                enabled: true
                            }
                        }
                    ]
                }]
            });
        };
                    
window.onload = function(){
    for(var habilidad in habilidades){
        numero++;
        if(habilidades[habilidad] != "" && habilidad != "" ){
            grafico(habilidades, habilidad);

        }            
    }
    limpiar();
};


var limpiar = function(){
    var cuantos = 0;
    for(var i = 1; i<5; i++){
        var div = document.getElementById('author_grafico_habilidad' + i);
        if(div.textContent != ""){
            cuantos++;
        }else{
            div.parentElement.removeChild(div);            
        }
    };

    if(cuantos == 4){
        for(var i = 1; i<cuantos; i++){
            var div = document.getElementById('author_grafico_habilidad' + i);
            div.setAttribute("class", "col-lg-3");
        }
    }else if(cuantos == 3){
        for(var i = 1; i<cuantos; i++){
            var div = document.getElementById('author_grafico_habilidad' + i);
            div.setAttribute("class", "col-lg-4");
        }
    }else if(cuantos == 2){
        for(var i = 1; i<cuantos; i++){
            var div = document.getElementById('author_grafico_habilidad' + i);
            div.setAttribute("class", "col-lg-6");
        }
    }else if(cuantos == 1){
        for(var i = 1; i<cuantos; i++){
            var div = document.getElementById('author_grafico_habilidad' + i);
            div.setAttribute("class", "col-lg-12");
        }
    }else{
        for(var i = 1; i<cuantos; i++){
            var div = document.getElementById('author_grafico_habilidad' + i);
            div.parentElement.removeChild(div);
        }
    }    
}

</script>
                
                

            </div>
            <div class="row">
                <?php
            while(have_posts()) : the_post();?>
                <div class="row">
                    <a class="titulo_otros" href="<?php the_permalink();?>"><?php echo the_title();?></a><br>
                    <div class="col-lg-5"><?php echo
                '<img class="post_first_image"' . get_first_image_by_post_id($post->ID) . ' /></br>';?></div><!-- IMAGENE PRIMERA DE CADA POST -->
                     <div class="index_post_excerpt col-lg-7"><?php echo the_excerpt();?>
                        <p>
                            <span class="fa fa-comments-o"> <?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?> </span>
                        </p>
                        <p>
                            <span class="fa fa-sitemap"> 
                                Categorias:  <?php the_category(', ');?>
                            </span>
                        </p>
                        <p>
                            <span class="fa fa-tags"> 
                                <?php the_tags();?>
                            </span>
                        </p>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </body>

<?php get_footer();?>