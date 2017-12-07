<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$map_id = 'cl_map_' . uniqid();


if( ! isset($lat_lon) || empty($lat_lon) || strpos($lat_lon, ',') === false )
	return;

$lat_lon = explode(',', $lat_lon);
$lat = trim($lat_lon[0]);
$lon = trim($lat_lon[1]);

wp_enqueue_script( 'google-maps-api', esc_url( add_query_arg( array( 'key' => $api_key, 'callback' => 'initGMAP' ), '//maps.googleapis.com/maps/api/js' ) ), array('codeless-main'), false, true );
?>

<div id="<?php echo esc_attr( $map_id ) ?>" class="cl_map cl-element <?php echo esc_attr( $this->generateClasses('.cl_map') ) ?>" data-lat="<?php echo esc_attr( $lat ) ?>" data-lon="<?php echo esc_attr( $lon ) ?>" <?php $this->generateStyle('.cl_map', '', true); ?>>
	<div class="cl-map-element" <?php $this->generateStyle('.cl-map-element', '', true); ?>></div>
</div>  