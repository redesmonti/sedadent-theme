<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <?php wp_head(); ?>
</head>
<body><!--se cierra en footer.php-->
	<header class="site-header">
	    <nav class="navegacion navbar-fixed-top" id="navbarjs" role="navigation">
			<!--<div class="zona-contactos">
				<button class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <strong>Tel: </strong>  +56 2 2604 74 59</button>
				<button class="tel"><i class="fa fa-envelope" aria-hidden="true"></i> <strong>Mail:</strong>  contacto@sedadent.cl</button>
			</div>-->
	        <div class="container">
	          <div class="navbar-header"> 
	            <div class="navbar-brand">
	              <a href="<?php bloginfo('url'); ?>">
	              	<h3><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="..."></h3>
	              </a>  
	            </div> 
	            <button type="button" class="navbar-toggle smooth-scroll" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
	              <span class="sr-only">Toggle navigation</span> 
	              <span class="icon-bar"></span> 
	              <span class="icon-bar"></span> 
	              <span class="icon-bar"></span> 
	            </button>  
	          </div>
	          <div class="smooth-scroll collapse navbar-collapse navbar-right navbar-ex1-collapse">
	            <?php wp_nav_menu( array( 
	              'theme_location' => 'navigation',
	              'depth' => 2,
	              'container' => false,
	              'container_id' => 'navbar',
	              'container_class' => 'collapse navbar-collapse', 
	              'menu_class' => 'nav navbar-nav navbar-left',
	              'walker' => new WP_Bootstrap_Navwalker() ) ); ?>    
	          </div>
	        </div>        
	    </nav><!-- fin navegacion-->
	</header>

<!-- botoneras redes sociales -->
	<div class="social">
		<ul>
			<li><a href="#" target="_blank" class="icon-facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
			<li><a href="callto:+56226047459" target="_blank" class="icon-googleplus"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
			<li><a href="mailto:contacto@sedadent.cl" class="icon-mail"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
		</ul>
	</div>