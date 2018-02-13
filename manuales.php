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

		<div id="accordion" class="panel-group">
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Beneficios de la sedación conciente</a>
		            </h4>
		        </div>
		        <div id="collapse1" class="panel-collapse collapse">
		            <div class="panel-body">
		                <?php echo do_shortcode( '[contact-form-7 id="65" title="Beneficios de la sedación conciente"]' ); ?>
		            </div>
		        </div>
		    </div>
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">¿Que mascara usar?</a>
		            </h4>
		        </div>
		        <div id="collapse2" class="panel-collapse collapse">
		            <div class="panel-body">
		                <?php echo do_shortcode( '[contact-form-7 id="77" title="¿Que mascara usar?"]' ); ?>
		            </div>
		        </div>
		    </div>
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Pauta AAPD N2O</a>
		            </h4>
		        </div>
		        <div id="collapse3" class="panel-collapse collapse">
		            <div class="panel-body">
		                <?php echo do_shortcode( '[contact-form-7 id="87" title="Pauta AAPD N2O"]' ); ?>
		            </div>
		        </div>
		    </div>
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Pautas ADA Sedación</a>
		            </h4>
		        </div>
		        <div id="collapse4" class="panel-collapse collapse">
		            <div class="panel-body">
		                <?php echo do_shortcode( '[contact-form-7 id="89" title="Pautas ADA Sedación"]' ); ?>
		            </div>
		        </div>
		    </div>
		</div>

	</div>
</div>

<?php get_footer(); ?>