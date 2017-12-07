<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div role="tabpanel" class="tab-pane fade" id="<?php echo $tab_id ?>">
	
	<div class="tab_panel_content">

	<?php echo cl_remove_wpautop($content); ?>

	</div>

</div>