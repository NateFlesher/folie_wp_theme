<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$list_distance = codeless_get_from_element('list_distance', '0');

$style = '';
if( $list_distance != '0' ){
	$style = 'style="padding-top:'.$list_distance.'px; padding-bottom:'.$list_distance.'px;"';
}

?>

<li class="cl-element cl_list_item  <?php echo esc_attr( $this->generateClasses('.cl_list_item') ) ?>" <?php echo cl_remove_wpautop($style) ?> <?php $this->generateStyle('.cl_list_item', '', true) ?>>
	<?php if( (int) $custom_icon ): ?>
		<i class="<?php echo esc_attr( $this->generateClasses('.cl_list_item > i') ) ?>"></i>
	<?php endif; ?>

	<span class="text"><?php echo cl_remove_wpautop($content) ?></span>
</li><!-- .cl_list_item -->