<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main>


<footer id="colophon" class="site-footer">
    <?php
    if(is_front_page() ) {
         // no footer
    } elseif( is_page_template('template-flex-page-helpline.php') ) {
        get_template_part( 'parts/footer/helpline-footer' );
    } else {
        get_template_part( 'parts/footer/corporate-footer' );
    }
    ?>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
