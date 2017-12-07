<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl_progress_bar cl-element <?php echo esc_attr( $this->generateClasses('.cl_progress_bar') ) ?>" <?php $this->generateStyle('.cl_progress_bar', '', true) ?>>
	<div class="labels">
		<div class="title"><?php echo cl_remove_wpautop( $title ) ?></div>
		<div class="percentage"><?php echo cl_remove_wpautop( $percentage ) ?>%</div>
	</div>
	<div class="progress"><div class="bar" <?php $this->generateStyle('.cl_progress_bar .bar', '', true) ?>></div></div>
</div>