<?php 
/*
Template Name: Manuales
*/
?>
<?php 

get_header(); ?>

<div class="container">
	<div class="contenedor-paginas">
		<?php if (have_posts()) :
		    while (have_posts()) : the_post();?>
		    <!-- Imprimimos primero el título de la página y el contenido -->
		        <h1><?php the_title();?></h1>
		 
		        <div class="entry-content">
		            <?php the_content();?>
		        </div>
			<?php endwhile;
		endif;?>
	</div>
</div>

<?php get_footer(); ?>