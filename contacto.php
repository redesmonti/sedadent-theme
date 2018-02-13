<!-- formulario -->
		<div class="formulario wow fadeIn">
			<h2>Pida Información rellenando este formulario</h2>
			<div class="contenedor-icon">
				<hr>
				<i class="fa fa-user" aria-hidden="true"></i>
				<hr>
			</div>
			<form id="contact-form" name="contact-form" action="<?php echo ('http://testmonti.sedadent.cl/');?>#contact-form" method="post">
		              <?php //Comprobamos si el formulario ha sido enviado
		              if (isset( $_POST['btn-submit'] )) {
		                //Creamos una variable para almacenar los errores
		                global $reg_errors;
		                $reg_errors = new WP_Error;
		 
		                //Recogemos en variables los datos enviados en el formulario y los sanitizamos.
		                //Si detectamos algún error, podremos más abajo rellenar los campos del formulario con los datos enviados para no tener que empezar el formulario de cero
		                $f_name = sanitize_text_field($_POST['f_name']);
		                $f_email = sanitize_email($_POST['f_email']);
		                $clinica = sanitize_text_field($_POST['clinica']);
		                $titulo = sanitize_text_field($_POST['titulo']);
		                $f_message = sanitize_text_field($_POST['f_message']);
		 
		                //El campo Nombre es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $f_name ) ) {
		                  $reg_errors->add("empty-name", "El campo nombre es obligatorio");
		                }
		                //El campo Email es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $f_email ) ) {
		                  $reg_errors->add("empty-email", "El campo e-mail es obligatorio");
		                }
		                //El campo Clinica es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $clinica ) ) {
		                  $reg_errors->add("empty-clinica", "El campo clínica es obligatorio");
		                }
		                //Comprobamos que el dato tenga formato de e-mail con la función de WordPress "is_email" y en caso contrario creamos un registro de error
		                if ( !is_email( $f_email ) ) {
		                  $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
		                }
		                //El campo Mensaje es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $f_message ) ) {
		                  $reg_errors->add("empty-message", "El campo consulta es obligatorio");
		                }
		 
		                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                          //your site secret key
                          $secret = '6LdDUkQUAAAAAIqH2gwuP9XE3ov8rtwgbvlgi84-';
                          //get verify response data
                          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                          $responseData = json_decode($verifyResponse);
                          if($responseData->success){
                              //Si no hay errores enviamos el formulario
                              if (count($reg_errors->get_error_messages()) == 0) {
                                //Destinatario
                                $recipient = "carlosmellaneira@gmail.com";
               
                                //Asunto del email
                                $subject = 'Formulario de contacto ' . get_bloginfo( 'name' );
               
                                //La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
                                $headers = "Reply-to: " . $f_name . " <" . $f_email . ">\r\n";
               
                                //Montamos el cuerpo de nuestro e-mail
                                $message = "Nombre: " . $f_name . "<br>";
                                $message .= "E-mail: " . $f_email . "<br>";
                                $message .= "Teléfono: " . $telefono . "<br>";
                                $message .= "Mensaje: " . nl2br($f_message) . "<br>";
                                                 
                                //Filtro para indicar que email debe ser enviado en modo HTML
                                add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
                                                  
                                //Por último enviamos el email
                                $envio = wp_mail( $recipient, $subject, $message, $headers, $attachments);
               
                                //Si el e-mail se envía correctamente mostramos un mensaje y vaciamos las variables con los datos. En caso contrario mostramos un mensaje de error
                                if ($envio) {
                                  unset($f_name);
                                  unset($f_email);
                                  unset($telefono);
                                  unset($f_message);?>
                                  <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Su Mensaje a sido enviado con éxito
                                  </div>
                                <?php }else {?>
                                  <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Debes comnfirmar que eres un humano rellenado el captcha
                                  </div>
                                <?php }
                              }
                          }else{
                                
                              $errMsg = 'Algo raro paso, por favor intentalo mas tarde';
                              echo "$errMsg";
                          }
                        }else{
                          ?>
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Debes comnfirmar que eres un humano haciendo click en el captcha.
                            </div>
                          <?php
                          }
		              }?>
		 
		              <div class="form-group">
		                <input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo $f_name;?>" placeholder="Nombre" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Nombre
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-name")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-name");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <div class="form-group">
		                <input type="email" id="f_email" name="f_email" class="form-control" value="<?php echo $f_email;?>" placeholder="E-mail" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo E-mail
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-email")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-email");?></p>
		                  </div>
		                  <?php }
		                }
		 
		                //Comprobamos si hay errores en el formato del campo E-mail
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("invalid-email")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-warning alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("invalid-email");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>

		              <div class="form-group">
		                <input type="text" id="clinica" name="clinica" class="form-control" value="<?php echo $clinica;?>" placeholder="Clínica" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Clinica
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-clinica")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-clinica");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <div class="form-group">
		                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $titulo;?>" placeholder="Título" required>
		              </div>
		 
		              <div class="form-group">
		                <textarea id="f_message" name="f_message" rows="5" class="form-control" placeholder="Escribe aquí tu consulta" required aria-required="true"><?php echo $f_message;?></textarea>
		 
		                <?php //Comprobamos si hay errores en la validación del campo Mensaje
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-message")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-message");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 			  <div class="g-recaptcha" data-sitekey="6LdDUkQUAAAAAIoj9XjYz9tOXiy0eO-8C5KR6KiM" style="transform:scale(0.85);-webkit-transform:scale(0.85);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
		              <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-default">Enviar</button>
		            </form>
		</div>
