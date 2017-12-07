<?php

extract($element['params']);

$output = '';


$output = '';
$text_id = 'cl_text_' . uniqid();


if( (int) $margin_paragraphs != 10 ){ ?>

	<style type="text/css">
		#<?php echo esc_attr( $text_id ) ?> p{ margin-top: <?php echo esc_attr( $margin_paragraphs ) ?>; margin-bottom:<?php echo esc_attr( $margin_paragraphs ) ?>; }
	</style>
	
<?php } ?>


<div id="<?php echo esc_attr( $text_id ) ?>" class="cl-text <?php echo esc_attr( $this->generateClasses('.cl-text') ) ?>" <?php $this->generateStyle('.cl-text', true ) ?>>
	<?php echo cl_remove_wpautop($content, true); ?>
</div>