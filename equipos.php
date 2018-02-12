<?php 
/*
Template Name: Equipos
*/
?>
<?php 

get_header(); ?>

<div class="container-fluid">

	<div class="contenedor-paginas">
  <h1 class="titulo-principal">Equipos</h1>
		<div class="">
          <?php 
              $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1 ; //cuenta el numero de post y si no existen vuelve a la primera pagina
              global $wp_query;
              $original_query = $wp_query;
              $args = array(
                'post_per_page'=> '5', 
                'showposts' => '5', //numero de noticias que treara
                'category_name' => 'equipo',
                'paged' => $currentPage ,
                'orderby' => 'date', 
                'order' => 'DESC', 
              );      
              $custom_post_type = new WP_Query( $args );
              $wp_query = $custom_post_type;
              if ( $custom_post_type->have_posts() ) : ?>
                <?php $i = 1; while ( $custom_post_type->have_posts() ) : $custom_post_type->the_post(); ?>
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <?php if(!empty($url)){ ?>
                <div class="col-md-6 wow fadeIn">
                <div class="space row">
                <div class="triangulo"></div>
                  <div class="imagen col-md-6">
                  <h1 class="titulo"><?php the_title(); ?></h1>
                      <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
                    </div>
                    <div class="info-espacio col-md-6">
                      
                      <div class="descripcion"><?php the_excerpt(); ?></div>
                      <hr>
                      <a href="<?php the_permalink(); ?>" class="" role="button" aria-pressed="true"><i class="fa fa-search" aria-hidden="true"></i> Ver producto</a>
                    </div>
                </div>
                    
                       
                </div>
            <?php } ?>
          <?php $i++;endwhile; endif; ?>
          <div class="col-md-8">
            <?php 
            the_posts_pagination(
              array(
                  'mid_size' => 2,
                  'screen_reader_text'=> '&nbsp;',//poner texto sobre paginacion
                  'prev_text' => __( '<i class="fa fa-arrow-left"></i>', 'textdomain' ),
                  'next_text' => __( '<i class="fa fa-arrow-right"></i>', 'textdomain' ),
              )
            ); 
            wp_reset_postdata();
            $wp_query = $original_query;
            ?>
          </div>
    	</div>
	</div>
</div>

<?php get_footer(); ?>