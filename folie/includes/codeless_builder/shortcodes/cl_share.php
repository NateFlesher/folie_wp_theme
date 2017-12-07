<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$share = codeless_share_buttons( true );

?>

<div class="cl_sharediv <?php echo esc_attr( $this->generateClasses('.cl_sharediv') ) ?>"  <?php $this->generateStyle('.cl_sharediv', '', true);?>>
	<?php if($add_facebook){?>		

	<div class="cl_share cl-element <?php echo esc_attr( $this->generateClasses('.cl_share') ) ?>"  <?php  $this->generateStyle('.cl_share', '', true);?>><a href="<?php echo esc_url($share['facebook']['link']) ?>" target="<?php echo esc_attr( $target ) ?>"  <?php $this->generateStyle('.cl_share > a', '', true);?>  <?php if(!empty($hover)){ ?> onMouseOver="this.style.color='<?php echo esc_attr( $hover ) ?>'" onMouseOut="this.style.color='<?php echo esc_attr( $color ) ?>'" <?php } ?> > <i class="cl-icon-facebook" <?php $this->generateStyle('.cl_share i', '', true);?> ></i></a></div> 	
	<?php } ?>


	<?php if($add_twitter){ ?>
	<div class="cl_share cl-element <?php echo esc_attr( $this->generateClasses('.cl_share') ) ?>"  <?php  $this->generateStyle('.cl_share', '', true);?> ><a href="<?php echo esc_url($share['twitter']['link']) ?>" target="<?php echo esc_attr($target) ?>"  <?php $this->generateStyle('.cl_share > a', '', true);?>  <?php if(!empty($hover)){ ?> onMouseOver="this.style.color='<?php echo esc_attr( $hover ) ?>'" onMouseOut="this.style.color='<?php echo esc_attr( $color ) ?>'" <?php } ?> > <i class="cl-icon-twitter" <?php $this->generateStyle('.cl_share i', '', true);?> ></i></a></div> 
	<?php } ?>


	<?php if($add_linkedin){ ?>
	<div class="cl_share cl-element <?php echo esc_attr( $this->generateClasses('.cl_share')) ?>"  <?php $this->generateStyle('.cl_share', '', true);?>><a href="<?php echo esc_url($share['linkedin']['link']) ?>" target="<?php echo esc_attr( $target ) ?>"  <?php $this->generateStyle('.cl_share > a', '', true);?>  <?php if(!empty($hover)){ ?> onMouseOver="this.style.color='<?php echo esc_attr( $hover ) ?>'" onMouseOut="this.style.color='<?php echo esc_attr( $color ) ?>'" <?php } ?> > <i class="cl-icon-linkedin" <?php  $this->generateStyle('.cl_share i', '', true);?> ></i></a></div> 
	<?php } ?>

	<?php if($add_pinterest){ ?>
	<div class="cl_share cl-element  <?php echo esc_attr( $this->generateClasses('.cl_share') ) ?>"  <?php $this->generateStyle('.cl_share', '', true);?>><a href="<?php echo esc_url($share['pinterest']['link']) ?>" target="<?php echo esc_attr( $target ) ?>"   <?php  $this->generateStyle('.cl_share > a', '', true);?>  <?php if(!empty($hover)){ ?> onMouseOver="this.style.color='<?php echo esc_attr( $hover ) ?>'" onMouseOut="this.style.color='<?php echo esc_attr( $color ) ?>'" <?php } ?> > <i class="cl-icon-pinterest" <?php  $this->generateStyle('.cl_share i', '', true);?> ></i></a></div> 
	<?php } ?>
    
    <?php if($add_google_plus){ ?>
	<div class="cl_share cl-element  <?php echo esc_attr( $this->generateClasses('.cl_share') ) ?>"  <?php $this->generateStyle('.cl_share', '', true);?>><a href="<?php echo esc_url($share['google']['link']) ?>" target="<?php echo esc_attr( $target ) ?>"  <?php  $this->generateStyle('.cl_share > a', '', true);?>  <?php if(!empty($hover)){ ?> onMouseOver="this.style.color='<?php echo esc_attr( $hover ) ?>'" onMouseOut="this.style.color='<?php echo esc_attr( $color ) ?>'" <?php } ?> > <i class="cl-icon-google-plus" <?php $this->generateStyle('.cl_share i', '', true);?> ></i></a></div> 
	<?php } ?>

	<?php if($add_whatsapp){ ?>
	<div class="cl_share cl-element  <?php echo esc_attr( $this->generateClasses('.cl_share') ) ?>"  <?php $this->generateStyle('.cl_share', '', true);?>><a href="<?php echo esc_ulr( $share['whatsapp']['link'] ); ?>" target="<?php echo esc_attr( $target ) ?>"  <?php  $this->generateStyle('.cl_share > a', '', true);?>  <?php if(!empty($hover)){ ?> onMouseOver="this.style.color='<?php echo esc_attr( $hover ) ?>'" onMouseOut="this.style.color='<?php echo esc_attr( $color ) ?>'" <?php } ?> > <i class="cl-icon-whatsapp" <?php $this->generateStyle('.cl_share i', '', true);?> ></i></a></div> 
	<?php } ?>




	
</div>