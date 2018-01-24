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
                        <h1 class="slide-content-text"><p>{{ slide.headlineFirstLine }}</p><p>{{ slide.headlineSecondLine }}</p></h1><a class="slide-content-cta">Call To Action</a></div>
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
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nombre">
				<input type="text" class="form-control" placeholder="E-mail">
				<input type="text" class="form-control" placeholder="Clínica">
				<input type="text" class="form-control" placeholder="Título">
				<textarea class="form-control" rows="5" id="comment"></textarea>
				<button> Enviar </button>
			</div>
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
	    	<div class="col-md-7 fotos">
	    		<div class="maquina wow fadeInUp">
	    			<div class="texto-imagen">
	    				<h3>Equipos</h3>
	    			</div>
	    			<img src="<?php echo get_template_directory_uri(); ?>/assets/equipo_imagen_producto.png" alt="...">
	    		</div>
	    		<div>
	    			<div class="accesorio wow fadeInUp">
	    			<div class="texto-imagen">
	    				<h3>Accesorios</h3>
	    			</div>
	    			<img src="<?php echo get_template_directory_uri(); ?>/assets/p1_0.png" alt="...">	
	    		</div>
	    		<div class="repuestos wow fadeInUp">
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
	 		<div class="col-md-6 imagen"></div>
	 		<div class="col-md-6 textos">
	 			<h1 class="wow fadeInRight">Conozca más sobre la</h1>
	 			<h1 class="wow fadeInRight">Sedación Consciente</h1>
	 			<p class="wow fadeInRight">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro inventore eius eligendi nam! Dolorum numquam beatae, facilis vero ab molestias blanditiis cumque repudiandae, libero qui velit tenetur aperiam voluptates eum?</p>
	 			<button class="wow fadeInRight">Leer más</button>
	 			<div class="iconos">
	 				<i class="fa fa-heart" aria-hidden="true"></i>
	 				<i class="fa fa-plus" aria-hidden="true"></i>
	 			</div>
	 		</div>
	 	</div> 		
 	</section>

<?php get_footer(); ?>