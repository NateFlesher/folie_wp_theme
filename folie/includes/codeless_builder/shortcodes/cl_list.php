<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$list_id = 'cl_list_' . uniqid();

global $cl_from_element;

$cl_from_element['list_distance'] = $distance;
?>

<div id="<?php echo esc_attr( $list_id ) ?>" class="cl-element cl_list <?php echo esc_attr( $this->generateClasses('.cl_list') ) ?>" <?php $this->generateStyle('.cl_list', '', true) ?>>

	<<?php echo esc_attr($type) ?> class="list-wrapper">

		<?php echo cl_remove_wpautop($content); ?>

	</<?php echo esc_attr( $type ) ?>><!-- .list-wrapper -->

</div><!-- .cl_list -->