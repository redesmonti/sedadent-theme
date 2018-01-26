<?php 
/*
Template Name: Manuales
*/
?>
<?php get_header(); ?>

<div class="formulario">
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype="" method="post" >
        <p>Nombre:</p>
        <input name="name" type="text" placeholder="ingrese su nombre" required />
        <p>Correo Electrónico:</p>
        <input name="email" type="email" placeholder="Ingrese su correo electrónico" required />
        <p>Contenido:</p>
        <textarea class="textareacontent" name="content" rows="8" placeholder="Ingrese el contenido de su mensaje" required></textarea>
        <br>
                <br>
        <input type="submit" value="Enviar" />
    </form>    		
</div>
<?php get_footer(); ?>