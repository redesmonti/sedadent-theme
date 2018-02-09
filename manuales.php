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
			  	<div id="content">
					<form id="contact-form" method="post" action="">
						<!-- TODO -->
						<input type="text" id="name" name="nombre" class="form-control" placeholder="Nombre" required aria-required="true">
						<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required aria-required="true">
						<textarea id="f_message" name="content" rows="5" class="form-control" placeholder="Escribe aquí tu consulta" required aria-required="true"></textarea>
						<input type="submit" name="submit" value="Enviar" class="btn btn-default"/>
						<input type="hidden" name="email-submission" value="1" />
					</form>
				</div><!-- /#content -->
			<?php endwhile;
		endif;?>
		<?php echo do_shortcode( '[contact-form-7 id="64" title="Descargables"]' ); ?>
	</div>
</div>

<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = 'http://testmonti.sedadent.cl/wp-content/uploads/2018/01/FICHA_Matrx_Digital_MDM.pdf';
}, false );
</script>
<?php get_footer(); ?>