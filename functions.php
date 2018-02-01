<?php

function sedadent_styles(){
	wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
	//wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_script('jquery');
 
  wp_enqueue_script( 'index', get_stylesheet_directory_uri() . '/js/index.js', array(), '', true );//jquery.slitslider.js
  wp_enqueue_script('vue', "https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.8/vue.min.js", array('jquery'), true);
  
  
  wp_enqueue_script('bootstrapjs', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array('jquery'), true);
  wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '', true );

  wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
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


/*Formulario*/

function my_theme_send_email() {
  global $reg_errors;
  $reg_errors = new WP_Error;

  /*Nuevo tipo Mail*/
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $contenido = $_POST['content'];

  if ( isset( $_POST['email-submission'] ) && '1' == $_POST['email-submission'] ) {

    //Parte de enviar mail
    $header = 'From: ' . $email . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $mensaje = "Este mensaje fue enviado por: " . $nombre . " \r\n";
    $mensaje .= "Su correo electronico es: " . $email . " \r\n";
    $mensaje .= "Mensaje: " . $_POST['content'] . " \r\n";
    $mensaje .= "Enviado el " . date('d/m/Y', time());

    $para = 'carlosmellaneira@gmail.com';
    $asunto = 'Mensaje en la pagina web';

    mail($para, $asunto, utf8_decode($mensaje), $header);

    if (count($reg_errors->get_error_messages()) == 0) {
      $attachment_location = "http://testmonti.sedadent.cl/wp-content/uploads/2018/01/FICHA_Matrx_Digital_MDM.pdf";
      if (file_exists($attachment_location)) {
        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Cache-Control: public"); // needed for internet explorer
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:".filesize($attachment_location));
        header("Content-Disposition: attachment; filename=FICHA_Matrx_Digital_MDM.pdf");
        readfile($attachment_location);
        die();
      }else {
        die("Error: No se encontro el archivo.");
      }
    }
    header('Location:http://testmonti.sedadent.cl/manuales-de-uso/');

  } // end if

} // end my_theme_send_email
add_action( 'init', 'my_theme_send_email' );


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