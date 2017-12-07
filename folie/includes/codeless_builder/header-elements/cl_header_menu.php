<?php

extract($element['params']);
global $cl_from_element;

if( !isset( $hamburger ) )
	$hamburger = false;

if( $hamburger ):
	$cl_from_element['cl_menu_hamburger'] = $hamburger;
	$cl_from_element['cl_menu_hamburger_style'] = $hamburger_style;
	$cl_from_element['cl_menu_hamburger_overlay_text'] = $hamburger_overlay_text;
	$cl_from_element['cl_menu_hamburger_half_overlay_width'] = $hamburger_half_overlay_width;
endif;

if( isset($item_animation) ):
	$cl_from_element['cl_menu_item_animation'] = $item_animation;
	$cl_from_element['cl_menu_item_animation_speed'] = $animation_speed;
	$cl_from_element['cl_menu_item_animation_delay'] = $animation_delay;
endif;

?>
<?php if( ! $hamburger ): ?>

	<div id="navigation" class="">

	        <nav>
	            <?php 
	                $args = array("theme_location" => "main", "container" => true, "fallback_cb" => 'codeless_default_menu');
	                wp_nav_menu($args);  
	            ?> 
	        </nav>
	</div>

	<div class="cl-mobile-menu-button cl-color-<?php echo esc_attr( codeless_get_mod('header_mobile_menu_hamburger_color', 'dark') ) ?>">
			<span></span>
			<span></span>
			<span></span>
		</div> 
	

<?php endif; ?>

<?php if( $hamburger ): ?>

	<div class="cl-hamburger-menu style-<?php echo esc_attr($hamburger_style) ?> active-color-<?php echo esc_attr($hamburger_overlay_text) ?>">
		<span></span>
		<span></span>
		<span></span>
	</div>

	<?php

		$class = '';

		if( $vertical_menu ){
			$class = "vertical-menu";
		}
		
	?>

	<?php if( $hamburger_style == 'overlay' ): ?>

		<div class="cl-fullscreen-overlay-menu cl-overlay-menu <?php echo esc_attr($hamburger_overlay_text) ?>" style="<?php echo 'background-color: ' . esc_attr($hamburger_overlay_bg) ?>;">
			<div class="wrapper">
				<div class="inner-wrapper">
					<div id="navigation" class="<?php echo esc_attr( $class ); ?>">
					        <nav class="cl-dropdown-inline">
					            <?php 
					                $args = array("theme_location" => "main", "container" => true, "fallback_cb" => 'codeless_default_menu');
					                wp_nav_menu($args);  
					            ?> 
					        </nav>
					</div>
				</div><!-- .inner-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .cl-fullscreen-overlay-menu -->

	<?php endif; ?>


	<?php if( $hamburger_style == 'half_overlay' ): ?>

		<div class="cl-half-overlay-menu  cl-overlay-menu <?php echo esc_attr($hamburger_overlay_text) ?>" style="<?php echo 'background-color: ' . esc_attr($hamburger_overlay_bg) ?>; width: <?php echo esc_attr( $hamburger_half_overlay_width ) ?>%;">
			<div class="wrapper">
				<div class="inner-wrapper">
					<div id="navigation" class="vertical-menu">
					        <nav class="cl-dropdown-inline">
					            <?php 
					                $args = array("theme_location" => "main", "container" => true, "fallback_cb" => 'codeless_default_menu');
					                wp_nav_menu($args);  
					            ?> 
					        </nav>
					</div>
				</div><!-- .inner-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .cl-half-overlay-menu -->

		<div class="cl-mobile-menu-button cl-color-<?php echo esc_attr( codeless_get_mod('header_mobile_menu_hamburger_color', 'dark') ) ?>">
			<span></span>
			<span></span>
			<span></span>
		</div> 
	<?php endif; ?>

<?php endif; ?>
