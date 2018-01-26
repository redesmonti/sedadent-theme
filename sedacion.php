<?php
/*
Template Name: Sedacion
*/
?>
<?php get_header(); ?>

<div class="container">
	<div class="contenedor-especialidades">
		<div class="col-md-8 fondo-blanco">
			<div class="titulo">
				<h1><?php the_title(); ?></h1>
				<hr>
			</div>
			<div>
				<?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
			</div>
			<div class="texto">
				<p>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</p>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>