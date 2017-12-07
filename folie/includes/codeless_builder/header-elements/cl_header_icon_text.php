<?php

extract($element['params']); 

?>
<div class="cl-icon-text <?php echo esc_attr( $this->generateClasses('.cl-icon-text') ) ?>" <?php $this->generateStyle('.cl-icon-text', true ) ?>>
	
	<i class="<?php echo esc_attr( $this->generateClasses('.cl-icon-text i') ) ?>" <?php $this->generateStyle('.cl-icon-text i', true ) ?> ></i>

	<span class="title <?php echo esc_attr( $this->generateClasses('.cl-icon-text .title') ) ?>" <?php $this->generateStyle('.cl-icon-text .title', true ) ?> ><?php echo wp_kses_post( cl_remove_wpautop( $text_title ) ) ?></span>

</div>