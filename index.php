<?php get_header(); ?>
<!-- Contenido de página de inicio -->


  <section>
  	<div class="container">
  		<div class="contenedor-entradas">
        <div class="col-md-12 fondo-blanco-entradas">
        <div class="triangulo"></div>
        <?php if ( have_posts() ) : the_post(); ?>
          <div class="col-md-6">
            <h1><?php the_title(); ?></h1>
            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
          </div>
          <div class="col-md-6 justificado-content">
            <?php the_content(); ?> 
          </div>  
          </div>
          <div class="col-md-12 navegacion-noticias">
            <?php previous_post_link('%link', '<i class="fa fa-arrow-left"></i> Atras '); ?><!--hacia atras-->
            <?php next_post_link('%link', ' Siguiente <i class="fa fa-arrow-right"></i>'); ?><!--hacia adelante-->
          </div>
        </div>
  		</div>
      
      <?php endif; ?>
  	</div>
  </section>


    
<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>
