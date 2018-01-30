<?php get_header(); ?>
<!-- Contenido de página de inicio -->


  <section>
  	<div class="container">
  		<div class="contenedor-paginas">
        <div class="col-md-8 fondo-blanco">
          <div class="titulo">
            <?php if ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
            <p class="justificado-content"><?php the_content(); ?></p>
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
