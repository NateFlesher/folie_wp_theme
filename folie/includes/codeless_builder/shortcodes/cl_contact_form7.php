<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$contact_id = 'cl_contact_form_' . uniqid();

?>

<div id="<?php echo esc_attr( $contact_id ) ?>" class="cl-element cl_contact_form7 <?php echo esc_attr( $this->generateClasses('.cl_contact_form7') ) ?>" <?php $this->generateStyle('.cl_contact_form7', '', true) ?>>

	<?php echo cl_remove_wpautop(do_shortcode('[contact-form-7 id="'.$id.'"]')); ?>
</div>