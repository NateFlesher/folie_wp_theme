<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$width = cl_translateColumnWidthToSpan($width);

$css_classes = array(
    'cl_column_inner',
    $width
);

?>

<div class="cl-element <?php echo implode(' ', $css_classes) ?> <?php echo esc_attr( $this->generateClasses('.cl_column_inner') ) ?>" <?php $this->generateStyle('.cl_column_inner', '', true )?>>
	<div class="wrapper <?php echo esc_attr( $this->generateClasses('.cl_column_inner > .wrapper') ) ?>" <?php $this->generateStyle('.cl_column_inner > .wrapper', '', true) ?>>

		<div class="bg-layer <?php echo esc_attr( $this->generateClasses('.cl_column_inner > .wrapper > .bg-layer') ) ?>" <?php $this->generateStyle('.cl_column_inner > .wrapper > .bg-layer', '', true) ?>></div>

        <div class="overlay <?php echo esc_attr( $this->generateClasses('.cl_column_inner > .wrapper > .overlay') ) ?>" <?php $this->generateStyle('.cl_column_inner > .wrapper > .overlay', '', true) ?>></div>
		<div class="col-content">
			<?php echo cl_remove_wpautop($content); ?>
		</div>
	</div>
</div>