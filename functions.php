<?php

function sedadent_styles(){
	wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
	//wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrapjs', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array('jquery'), true);
  wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '', true );

  //CSS Slider
  wp_enqueue_style('custom-slider', get_stylesheet_directory_uri() . '/css/custom-slider.css');
  wp_enqueue_style('styleNoJS-slider', get_stylesheet_directory_uri() . '/css/styleNoJS-slider.css');
  wp_enqueue_style('style-slider', get_stylesheet_directory_uri() . '/css/style-slider.css');

  //Slider jquery
  wp_enqueue_script('jquery.ba-cond.min',  get_stylesheet_directory_uri() . '/js/jquery.ba-cond.min.js', array('jquery'), true);
  wp_enqueue_script('jquery.slitslider',  get_stylesheet_directory_uri() . '/js/jquery.slitslider.js', array('jquery'), true);
  wp_enqueue_script('modernizr.custom.79639',  get_stylesheet_directory_uri() . '/js/modernizr.custom.79639.js', array('jquery'), true);

  //Fin Slider

  wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
  wp_enqueue_style('slider', get_stylesheet_directory_uri() . '/css/slider.css');
  wp_enqueue_script('jquery');
  wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css');
  wp_enqueue_style('style', get_stylesheet_uri()); //usa el style.css, debe ser la ultima hoja de estilos
}
add_action('wp_enqueue_scripts', 'sedadent_styles'); //Hook para llamar al la funcion en wordpress

//* Enqueue script to activate WOW.js
add_action('wp_enqueue_scripts', 'sk_wow_init_in_footer');
function sk_wow_init_in_footer() {
  add_action( 'print_footer_scripts', 'wow_init' );
}
//* Add JavaScript before </body>
function wow_init() { ?>
  <script type="text/javascript">
    new WOW().init();
  </script>
<?php }


//Insertar javascripts
add_action("wp_enqueue_scripts", "incrustar_js");
function incrustar_js(){
 if ( !is_admin() ) { // para que solo haga la carga si no es el área de admin
    // registra la ubicación, dependencias y versión de su script.
    wp_register_script('slider',
        get_template_directory_uri() . '/js/slider.js',
        array('jquery'),
        '1.0' );

    wp_register_script('modernizr.custom.79639',
        get_template_directory_uri() . '/js/modernizr.custom.79639.js',
        array('jquery'),
        '1.0' );

    
    wp_register_script('jquery.ba-cond.min',
        get_template_directory_uri() . '/js/jquery.ba-cond.min.js',
        array('jquery'),
        '1.0' );
    // pone en cola es script
    wp_enqueue_script('slider');
    wp_enqueue_script('modernizr.custom.79639');
    wp_enqueue_script('jquery.ba-cond.min');
 }
}

/*Menus*/

require_once('wp-bootstrap-navwalker.php');
//Permite agregar los menus
function mis_menus() {
  register_nav_menus(
    array(
      'navigation' => __( 'Menú de navegación de sedadent'),
    )
  );
}
add_action( 'after_setup_theme', 'mis_menus' );

/*Añadir imagen destacada*/
add_theme_support( 'post-thumbnails' );

?>