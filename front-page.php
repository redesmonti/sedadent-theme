<?php get_header(); ?>
	

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
    
	<!-- formulario contacto-->
	<?php include_once( 'contacto.php' ); ?>		
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