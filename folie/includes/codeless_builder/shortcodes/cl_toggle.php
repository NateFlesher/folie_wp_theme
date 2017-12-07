<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$toggle_id = 'cl_toggle_' . uniqid();

?>

<div id="<?php echo esc_attr( $toggle_id ) ?>" class="cl-element cl_toggle <?php echo esc_attr( $this->generateClasses('.cl_toggle') ) ?>" <?php $this->generateStyle('.cl_toggle', '', true) ?>>

	<h6 class="title <?php echo esc_attr( $this->generateClasses('.cl_toggle .title') ) ?>"><?php echo esc_attr( wp_strip_all_tags( $title ) ) ?></h6>

	<div class="toggle_wrapper">

		<?php echo cl_remove_wpautop($content); ?>

	</div><!-- .toggle_wrapper -->

</div><!-- .cl_toggle -->