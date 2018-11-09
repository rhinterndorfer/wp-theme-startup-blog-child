<?php do_action( 'startup_blog_main_bottom' ); ?>
</section> <!-- .main -->
<?php if ( get_theme_mod( 'sidebar' ) != 'before' ) {
    get_sidebar( 'primary' );
} ?>
<?php do_action( 'startup_blog_after_main' ); ?>
</div> <!-- .max-width -->
</div> <!-- .main-content-container -->
</div><!-- .overflow-container -->

<?php do_action( 'startup_blog_body_bottom' ); ?>

<?php wp_footer(); ?>

</body>
</html>