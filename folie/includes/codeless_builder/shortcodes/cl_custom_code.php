<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl-element cl_custom_code">
	<?php echo cl_remove_wpautop( $code ) ?>
</div>