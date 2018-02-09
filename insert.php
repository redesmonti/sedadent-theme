<?php 
/*
Template Name: Insert data
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>
<?php get_header(); ?>
<?php


if ($conn->query($sql) === TRUE) {
    echo "datos enviados correctamente";
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

    mail($para, $asunto, utf8_decode($mensaje), $header);?>

    <div class="container">
    	<div class="contenedor-paginas">
	    	<h2> Gracias por su mensaje!</h2>
	    	<h2><a href="http://testmonti.sedadent.cl">Llevame al inicio</a></h2>
	    </div>
    </div>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<?php get_footer(); ?>