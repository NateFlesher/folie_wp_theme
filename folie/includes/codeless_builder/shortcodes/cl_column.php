<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$width = cl_translateColumnWidthToSpan($width);

$css_classes = array(
    'cl_column',
    $width,
    $extra_class
);

?>

<div class="cl-element <?php echo implode(' ', $css_classes) ?> <?php echo esc_attr( $this->generateClasses('.cl_column') ) ?>" <?php $this->generateStyle('.cl_column', '', true) ?>>
    
    <div class="cl_col_wrapper <?php echo esc_attr( $this->generateClasses('.cl_column > .cl_col_wrapper') ) ?>" <?php $this->generateStyle('.cl_column > .cl_col_wrapper', '', true) ?>>
    	
        <div class="bg-layer '.$this->generateClasses('.cl_column > .cl_col_wrapper > .bg-layer').'" <?php $this->generateStyle('.cl_column > .cl_col_wrapper > .bg-layer', '', true) ?>></div>

        <div class="overlay <?php echo esc_attr($this->generateClasses('.cl_column > .cl_col_wrapper > .overlay') ) ?>" <?php $this->generateStyle('.cl_column > .cl_col_wrapper > .overlay', '', true) ?>></div>

    	<div class="col-content">
        	<?php echo cl_remove_wpautop($content); ?>
        </div><!-- .col-content -->

        <?php if( $custom_link != '#' && $custom_link != '' ): ?>
            <a href="<?php esc_url( $custom_link ) ?>" class="column_link"></a>
        <?php endif; ?>
    </div><!-- .cl_col_wrapper -->
</div><!-- .cl_column -->