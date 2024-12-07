<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rifa
 */

$rifa_blog_btn = get_theme_mod( 'rifa_blog_btn', 'Read More' );
$rifa_blog_btn_switch = get_theme_mod( 'rifa_blog_btn_switch', true );

?>

<?php if ( !empty( $rifa_blog_btn_switch ) ): ?>
<div class="postbox__read-more">
    <a href="<?php the_permalink();?>" class="ft-btn"><?php print esc_html( $rifa_blog_btn );?></a>
</div>
<?php endif;?>