<?php get_header(); ?>
	<!-- botoneras redes sociales -->
	<div class="social">
		<ul>
			<li><a href="#" target="_blank" class="icon-facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
			<li><a href="#" target="_blank" class="icon-googleplus"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
			<li><a href="#" class="icon-mail"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
		</ul>
	</div>

	<!-- slider pesado -->
	<section id="slider" class="scroll">
		<div id="app" class="wrapper" v-cloak v-bind:class="{'is-previous': isPreviousSlide, 'first-load': isFirstLoad}">
            <div class="slide-wrapper" 
                 v-on:mouseover="stopRotation"
         		 v-on:mouseout="startRotation"
                 v-for="(slide, index) in slides" 
                 v-bind:class="{ active: index === currentSlide }"
                 v-bind:style="{ 'z-index': (slides.length - index), 'background-image': 'url(' + slide.bgImg + ')' }">
                <div class="slide-inner">
                    <div class="slide-bg-text">
                        <p>{{ slide.headlineFirstLine }}</p>
                        <p>{{ slide.headlineSecondLine }}</p>
                    </div>
                    <div class="slide-rect-filter">
                        <div class="slide-rect" v-bind:style="{'border-image-source': 'url(' + slide.rectImg + ')'}"></div>
                    </div>
                    <div class="slide-content">
                        <h1 class="slide-content-text"><p>{{ slide.headlineFirstLine }}</p><p>{{ slide.headlineSecondLine }}</p></h1></div>
                    <h2 class="slide-side-text"><span>{{ slide.sublineFirstLine }} / </span><span>{{ slide.sublineSecondLine }}</span></h2></div>
            </div>
        <div class="controls-container">
            <button class="controls-button" 
            		v-on:mouseover="stopRotation"
         		 	v-on:mouseout="startRotation"
                    v-for="(slide, index) in slides"
                    v-bind:class="{ active: index === currentSlide }"
                    v-on:click="updateSlide(index)">{{ slide.headlineFirstLine }} {{ slide.headlineSecondLine }}</button>
        </div>
        <div class="pagination-container">
            <span class="pagination-item"
            	  v-on:mouseover="stopRotation"
         		  v-on:mouseout="startRotation"
                  v-for="(slide, index) in slides"
                  v-bind:class="{ active: index === currentSlide }"
                  v-on:click="updateSlide(index)"></span>
        </div>
    </div>
    
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
		 
		                //Si no hay errores enviamos el formulario
		                if (count($reg_errors->get_error_messages()) == 0) {
		                  //Destinatario
		                  $recipient = "redes.momti@gmail.com";
		 
		                  //Asunto del email
		                  $subject = 'Formulario de contacto ' . get_bloginfo( 'name' );
		 
		                  //La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
		                  $headers = "Reply-to: " . $f_name . " <" . $f_email . ">\r\n";
		 
		                  //Montamos el cuerpo de nuestro e-mail
		                  $message = "Nombre: " . $f_name . "<br>";
		                  $message .= "E-mail: " . $f_email . "<br>";
		                  $message .= "Clínica: " . $clinica . "<br>";
		                  $message .= "Título: " . $titulo . "<br>";
		                  $message .= "Mensaje: " . nl2br($f_message) . "<br>";
		                                   
		                  //Filtro para indicar que email debe ser enviado en modo HTML
		                  add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		                                    
		                  //Por último enviamos el email
		                  $envio = wp_mail( $recipient, $subject, $message, $headers, $attachments);
		 
		                  //Si el e-mail se envía correctamente mostramos un mensaje y vaciamos las variables con los datos. En caso contrario mostramos un mensaje de error
		                  if ($envio) {
		                    unset($f_name);
		                    unset($f_email);
		                    unset($clinica);
		                    unset($titulo);
		                    unset($f_message);?>
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
		 
		              <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-default">Enviar</button>
		            </form>
		</div>		
	</section>


    <!-- contenedor equipos -->
    <section id="equipos" class="scroll">
	    <div class="container-fluid contenedor-equipos">
	    	<div class="col-md-5 texto-equipos">
	    		<h1 class="wow fadeInLeft">Conozca Nuestros</h1>
	    		<h1 class="wow fadeInLeft">Equipos y Accesorios</h1>
	    		<h1 class="wow fadeInLeft">de sedación consciente</h1>
	    		<p class="wow fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident excepturi ut repellat quae fugit illum obcaecati aliquid iste recusandae porro magni, facere quia, dignissimos aspernatur maxime blanditiis expedita commodi qui.</p>
	    		<div class="botones">
	    			<button class="wow fadeInLeft"><i class="fa fa-search" aria-hidden="true"></i> Ver Equipos</button>
	    			<button class="wow fadeInLeft"><i class="fa fa-search" aria-hidden="true"></i> Ver Accesorios</button>
	    		</div>
	    	</div>
	    	<div class="col-md-7 col-xs-12">
	    		<div class="col-md-6 contenedor-fotos-equipos">
					<div class="maquina wow fadeInUp">
		    			<div class="texto-imagen">
		    				<h3>Equipos</h3>
		    			</div>
		    			<img src="<?php echo get_template_directory_uri(); ?>/assets/equipo_imagen_producto.png" alt="...">
		    		</div>	    			
	    		</div>
	    		<div class="col-md-6 contenedor-fotos-equipos">
	    			<div class="col-md-12 accesorio wow fadeInUp">
		    			<div class="texto-imagen">
		    				<h3>Accesorios</h3>
		    			</div>
		    			<img src="<?php echo get_template_directory_uri(); ?>/assets/p1_0.png" alt="...">	
	    			</div>
	    			<div class="col-md-12 repuestos wow fadeInUp">
		    			<div class="texto-imagen">
		    				<h3>Repuestos</h3>
		    			</div>
		    			<img src="<?php echo get_template_directory_uri(); ?>/assets/1.jpg" alt="...">
	    			</div>
	    		</div>    		
	    	</div>
	    </div>
    </section>


 	<!-- contenedor conozca más sedación consciente -->
 	<section id="sedacion" class="scroll">
	 	<div class="container-fluid contenedor-sedacion">
	 		<div class="col-md-6 imagen wow fadeIn">
	 		</div>
	 		<div class="col-md-6 textos">
	 			<h1 class="wow fadeInRight">Conozca más sobre la</h1>
	 			<h1 class="wow fadeInRight">Sedación Consciente</h1>
	 			<h1 class="wow fadeInRight">con Óxido Nitroso y sus beneficios</h1>
	 			<p class="wow fadeInRight">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro inventore eius eligendi nam! Dolorum numquam beatae, facilis vero ab molestias blanditiis cumque repudiandae, libero qui velit tenetur aperiam voluptates eum?</p>
	 			<button class="wow fadeInRight">Leer más</button>
	 			<div class="iconos">
	 				<i class="fa fa-heart" aria-hidden="true"></i>
	 				<i class="fa fa-plus" aria-hidden="true"></i>
	 			</div>
	 		</div>
	 	</div> 		
 	</section>
 	<section id="testimonios">
 		<div class="container-fluid">
 		<h1>Experiencia con Óxido Nitroso</h1>
 			<div class="col-md-4">
 				<div class="tarjeta-testimonio wow fadeInUp">
 					<i class="fa fa-quote-left" aria-hidden="true"></i>
 					<img src="<?php echo get_template_directory_uri(); ?>/assets/doctor1.png" alt="...">
 					<h4>Nombre</h4>
 					<hr>
 					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat atque perspiciatis consequatur praesentium officia sed laboriosam tempore, id? Soluta, amet libero deleniti minus nam labore sequi praesentium molestias recusandae!</p>
 				</div>
 			</div>
 			<div class="col-md-4">
 				<div class="tarjeta-testimonio wow fadeInUp">
 					<i class="fa fa-quote-left" aria-hidden="true"></i>
 					<img src="<?php echo get_template_directory_uri(); ?>/assets/doctor1.png" alt="...">
 					<h4>Nombre</h4>
 					<hr>
 					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat atque perspiciatis consequatur praesentium officia sed laboriosam tempore, id? Soluta, amet libero deleniti minus nam labore sequi praesentium molestias recusandae!</p>
 				</div>
 			</div>
 			<div class="col-md-4">
 				<div class="tarjeta-testimonio wow fadeInUp">
 					<i class="fa fa-quote-left" aria-hidden="true"></i>
 					<img src="<?php echo get_template_directory_uri(); ?>/assets/doctor1.png" alt="...">
 					<h4>Nombre</h4>
 					<hr>
 					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat atque perspiciatis consequatur praesentium officia sed laboriosam tempore, id? Soluta, amet libero deleniti minus nam labore sequi praesentium molestias recusandae!</p>
 				</div>
 			</div>
 		</div>
 	</section>

 	<section id="mapa container">
		<div class="col-md-4 info">
			<h2 class=" wow fadeInLeft">Estamos ubicados en</h2>
			<p class=" wow fadeInLeft"><i class="fa fa-map-marker" aria-hidden="true"></i> Hernando de Aguirre 194, of 52 Providencia, Región Metropolitana</p>
		</div>
		<div class="col-md-8 iframe-mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.1280659260196!2d-70.60294118480147!3d-33.41990538078271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf6b099266c1%3A0x6a106e064621b665!2sHernando+de+Aguirre+194%2C+Providencia%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1517230099682" frameborder="0" width="100%" height="345" style="border:0" allowfullscreen></iframe>
		</div>
 	</section>

<?php get_footer(); ?>