<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$tabs_id = 'cl_tabs_' . uniqid();

// Extract tab titles
preg_match_all( '/cl_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}

$tabs_nav = '';
$tabs_nav .= '<ul class="cl-nav-tabs" role="tablist">';

foreach ( $tab_titles as $tab ) {
	$tab_atts = shortcode_parse_atts( $tab[0] );

	if ( isset( $tab_atts['title'] ) ) {
		$tabs_nav .= '<li id="' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '-tab"><a role="tab" href="#' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '" data-toggle="tab"><span>' . $tab_atts['title'] . '</span></a></li>';
	}
}

$tabs_nav .= '</ul>';

?>

<div id="<?php echo $tabs_id ?>" class="cl-element cl_tabs <?php echo $this->generateClasses('.cl_tabs') ?>" <?php echo $this->generateStyle('.cl_tabs') ?>>

	<?php echo $tabs_nav ?>
	<!-- Tab panes -->
  	<div class="tab-content">

		<?php echo cl_remove_wpautop($content); ?>

	</div><!-- .tab-content -->

</div><!-- .cl_tabs -->