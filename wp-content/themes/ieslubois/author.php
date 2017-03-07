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
                <div class="col-lg-7">
                    <?php
                while(have_posts()) : the_post();?>
                        <a class="titulo_otros" href="<?php the_permalink();?>"><?php echo the_title();?></a><br>
                        <div class="col-lg-5"><?php echo
                    '<img class="post_first_image"' . get_first_image_by_post_id($post->ID) . ' /></br>';?></div><!-- IMAGENE PRIMERA DE CADA POST -->
                        <div class="col-lg-7"><?php echo the_excerpt();?>
                            <p><span class="fa fa-comments-o"> <?php comments_number('Sin comentarios', '1 comentario', '% comentarios');?></span></p>
                        </div>
                <?php endwhile;?>
                </div>
                <div class="col-lg-5" id="sidebar">
                    <div>
                        <img src="<?php echo has_user_photo($curauth);?>" width="450px" sizes="(max-width: 300px) 100px, 300px"/>
                        </br></br>
                        <p>
                            <?php echo $curauth->description;?>
                        </p>
                    </div>
                    <div>
                        <a href="<?php echo get_the_author_meta('custom_field_facebook', $curauth->ID);?>"><img id="facebook" src="<?php echo get_template_directory_uri().'/fotos/icono/Facebook.png';?>"></a>
                        <a href="<?php echo get_the_author_meta('custom_field_twitter', $curauth->ID);?>"><img id="twitter" src="<?php echo get_template_directory_uri().'/fotos/icono/Twitter.png';?>"></a>
                    </div>
                    <div id="author_grafico_habilidad" style="min-height: 400px"></div>
                    <div>
                        <h2> Buscar </h2>
                        <?php get_search_form();?>
                    </div>
                    <div class="autores">
                        <h2> Autores </h2>
                        <?php wp_list_authors('show_fullname=1&hide_empty=0&optioncount=1&orderby=post_count');?>
                    </div>
                    <div class="menu">
                        <h2> Páginas </h2>
                        <?php get_pages('title_li=&sort_column=menu_order');?>
                    </div>
                <script language='javascript'>
var habilidades = [];
    habilidades.push('<?php echo get_the_author_meta('skill1', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('porcentaje_skill1', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('skill2', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('porcentaje_skill2', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('skill3', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('porcentaje_skill3', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('skill4', $curauth->ID);?>');
    habilidades.push('<?php echo get_the_author_meta('porcentaje_skill4', $curauth->ID);?>');

var completo = true;                    
                    
        var grafico = function (habilidades) {
            $(function () {
                Highcharts.chart('author_grafico_habilidad', {
                    chart: {
                        type: 'bar'
                    },
                    exporting: { 
                        enabled: false
                    },
                    title: {
                        text: 'Habilidades'
                    },
                    xAxis: {
                        categories: [''],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        labels: {
                            overflow: 'justify',
                            formatter: function() {
                            return this.value + ' %';
                            }
                        }
                    },
                    tooltip: {
                        valueSuffix: ' %',
                        padding: 20
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                formatter: function() {
                                    return this.value + ' %';
                                },
                                enabled: false
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        x: 0,
                        y: 0,
                        floating: false,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: false
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                        name: habilidades[0],
                        data: [parseInt(habilidades[1])]
                    }, {
                        name: habilidades[2],
                        data: [parseInt(habilidades[3])]
                    }, {
                        name: habilidades[4],
                        data: [parseInt(habilidades[5])]
                    }, {
                        name: habilidades[6],
                        data: [parseInt(habilidades[7])]
                    }]
                });
            });
        };

                    
window.onload = function(){
    for(var habilidad in habilidades){
        if(!(habilidades[habilidad] != "" && habilidad != "" )){
            completo = false;
            break;
        }           
    }                             
    if(completo){
        grafico(habilidades);
    }else{
       var author_grafico = document.getElementById("author_grafico_habilidad"); author_grafico.parentElement.removeChild(author_grafico);
    }
};

</script>
                
                
                </div>
            </div>            
        </div>
    </body>

<?php get_footer();?>