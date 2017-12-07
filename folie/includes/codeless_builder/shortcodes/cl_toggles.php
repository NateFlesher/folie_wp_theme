<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$toggles_id = 'cl_toggles_' . uniqid();

?>

<div id="<?php echo esc_attr( $toggles_id ) ?>" class="cl-element cl_toggles <?php echo esc_attr( $this->generateClasses('.cl_toggles') ) ?>" <?php $this->generateStyle('.cl_toggles', '', true) ?>>

	<div class="toggles_wrapper">

		<?php echo cl_remove_wpautop($content); ?>

	</div><!-- .toggles_wrapper -->

</div><!-- .cl_toggles -->