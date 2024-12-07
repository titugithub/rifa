<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rifa
 */
?>

 <footer>
 <div class="footer__area footer-section">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="footer-bottom">
                     <div class="text-center">
                         <p> <?php print rifa_copyright_text(); ?></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</footer>
<?php

wp_footer();?>
    </body>
</html>
