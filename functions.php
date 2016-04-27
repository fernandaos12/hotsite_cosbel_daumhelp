<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php');

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walker
require_once('library/menu-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

// Add Header image
require_once('library/custom-header.php');

// Limite de caracteres
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}



// post thumbnail support
    if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) {
     add_image_size( 'single', 200, 200);

}




// Função de máscara no formulario

add_action('wp_enqueue_scripts', 'wpmidia_enqueue_masked_input');
function wpmidia_enqueue_masked_input(){

     wp_enqueue_script('masked-input', get_template_directory_uri().'/js/jquery.maskedinput.min.js', array('jquery'));

}
add_action('wp_footer', 'wpmidia_activate_masked_input');

function wpmidia_activate_masked_input(){
   if( is_page() ){ //mais uma vez, feito isso, o script abaixo só aparecerá na página Contato.
?>

         <script type="text/javascript">

                jQuery( function($){

                     $(".data").mask("99/99/9999");
                     $(".celular").mask("(99) 99999-9999");
                     $(".fixo").mask("(99) 9999-9999");
                     $(".cpf").mask("999.999.999-99");
                     $(".cep").mask("99.999-999");
                     $(".cnpj").mask("99.999.999/9999-99");

                });

         </script>

<?php 
   }
}

?>
