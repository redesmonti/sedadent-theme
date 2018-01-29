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
		      <div class="row">
		        <div class="col-md-12">
		          <article id="post-<?php the_ID();?>" <?php post_class();?>>
		            <!-- Imprimimos primero el título de la página y el contenido -->
		            <h1><?php the_title();?></h1>
		 
		            <div class="entry-content">
		              <?php the_content();?>
		            </div>
		 
		            <form id="contact-form" name="contact-form" action='<?php bloginfo('url'); ?>/insertar-datos/' method="post">
		              <?php //Comprobamos si el formulario ha sido enviado
		              if (isset( $_POST['btn-submit'] )) {
		                //Creamos una variable para almacenar los errores
		                global $reg_errors;
		                $reg_errors = new WP_Error;
		 
		                //Recogemos en variables los datos enviados en el formulario y los sanitizamos.
		                //Si detectamos algún error, podremos más abajo rellenar los campos del formulario con los datos enviados para no tener que empezar el formulario de cero
		                $nombre = sanitize_text_field($_POST['name']);
		                $email = sanitize_email($_POST['email']);
		                $content = sanitize_text_field($_POST['content']);
		 
		                //El campo Nombre es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $nombre ) ) {
		                  $reg_errors->add("empty-name", "El campo nombre es obligatorio");
		                }
		                //El campo Email es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $email ) ) {
		                  $reg_errors->add("empty-email", "El campo e-mail es obligatorio");
		                }
		                if ( !is_email( $email ) ) {
		                  $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
		                }
		                //El campo Mensaje es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $content ) ) {
		                  $reg_errors->add("empty-content", "El campo consulta es obligatorio");
		                }
		 
		                //Si no hay errores enviamos el formulario
		                if (count($reg_errors->get_error_messages()) == 0) {
		                  //Destinatario
		                  $recipient = "carlosmellaneira@gmail.com";
		 
		                  //Asunto del email
		                  $subject = 'Formulario de contacto ' . get_bloginfo( 'name' );
		 
		                  //La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
		                  $headers = "Reply-to: " . $nombre . " <" . $email . ">\r\n";
		 
		                  //Montamos el cuerpo de nuestro e-mail
		                  $content = "Nombre: " . $nombre . "<br>";
		                  $content .= "E-mail: " . $email . "<br>";
		                  $content .= "Mensaje: " . nl2br($content) . "<br>";
		                                   
		                  //Filtro para indicar que email debe ser enviado en modo HTML
		                  add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		                                    
		                  //Por último enviamos el email
		                  $envio = wp_mail( $recipient, $subject, $content, $headers, $attachments);
		 
		                  //Si el e-mail se envía correctamente mostramos un mensaje y vaciamos las variables con los datos. En caso contrario mostramos un mensaje de error
		                  if ($envio) {
		                    unset($nombre);
		                    unset($email);
		                    unset($content);?>
		                    <div class="alert alert-success alert-dismissable">
		                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                      El formulario ha sido enviado correctamente.
		                    </div>
		                  <?php }else {?>
		                    <div class="alert alert-danger alert-dismissable">
		                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                      Se ha producido un error enviando el formulario. Puede intentarlo más tarde o ponerse en contacto con nosotros escribiendo un mail a "destinatario@email.com"
		                    </div>
		                  <?php }
		                }
		              }?>
		 
		              <div class="form-group">
		                <input type="text" id="name" name="name" class="form-control" value="<?php echo $nombre;?>" placeholder="Nombre" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Nombre
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_content("empty-name")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_content("empty-name");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <div class="form-group">
		                <input type="email" id="email" name="email" class="form-control" value="<?php echo $email;?>" placeholder="E-mail" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo E-mail
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_content("empty-email")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_content("empty-email");?></p>
		                  </div>
		                  <?php }
		                }
		 
		                //Comprobamos si hay errores en el formato del campo E-mail
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_content("invalid-email")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-warning alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_content("invalid-email");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>

		              <div class="form-group">
		                <textarea id="content" name="content" rows="5" class="form-control" placeholder="Escribe aquí tu consulta" required aria-required="true"><?php echo $content;?></textarea>
		 
		                <?php //Comprobamos si hay errores en la validación del campo Mensaje
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_content("empty-content")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_content("empty-content");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-default">Enviar</button>
		            </form>
		          </article>
		        </div>
		      </div>
		    <?php endwhile;
		  endif;?>
		</div>
	</div>
<?php get_footer(); ?>