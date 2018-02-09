		<footer id="myFooter" class="fixed-bottom">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-2">
	                    <img class="img-footer" src="<?php echo get_template_directory_uri(); ?>/assets/logo-blanco.png" alt="">
	                </div>
	                <div class="col-sm-5">
	                    <h5>Sedadent</h5>
	                    <ul>
	                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Hernando de Aguirre 194, of 52 Providencia, Región Metropolitana</li>
	                        <li><i class="fa fa-phone" aria-hidden="true"></i> +56 2 2604 7459</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>  contacto@sedadent.cl</li>
                            <li><i class="fa fa-whatsapp"></i>  +56 9 4407 2907</li>
	                    </ul>
	                </div>
	            </div>
			</div>
			<?php wp_footer(); ?>
		</footer>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">	
			$(function() {

                var Page = (function() {

                    var $nav = $( '#nav-dots > span' ),
                        slitslider = $( '#slider' ).slitslider( {
                            onBeforeChange : function( slide, pos ) {

                                $nav.removeClass( 'nav-dot-current' );
                                $nav.eq( pos ).addClass( 'nav-dot-current' );

                            }
                        } ),

                        init = function() {

                            initEvents();

                        },
                        initEvents = function() {

                            $nav.each( function( i ) {

                                $( this ).on( 'click', function( event ) {

                                    var $dot = $( this );

                                    if( !slitslider.isActive() ) {

                                        $nav.removeClass( 'nav-dot-current' );
                                        $dot.addClass( 'nav-dot-current' );

                                    }

                                    slitslider.jump( i + 1 );
                                    return false;

                                } );

                            } );

                        };

                        return { init : init };

                })();

                Page.init();

                /**
                 * Notes: 
                 * 
                 * example how to add items:
                 */

                /*

                var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');

                // call the plugin's add method
                ss.add($items);

                */

            })
		</script>
	</body>
</hmtl>