<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }


    if( isset($_POST['register']) && $_POST['register'])
        $o = cl_backpanel::cl_registerproduct($_POST['code']);

    if( isset($_POST['remove']) && $_POST['remove'])
        $o = cl_backpanel::cl_removeproduct();


?>
<div class="wrapper postbox">

     <?php if (get_option('add_purchase_code') ){ ?>

            <img src="<?php echo get_template_directory_uri() ?>/includes/codeless_theme_panel/assets/img/success.png" class="success" />

            <h2>Now you are part of Codeless!</h2>

            <div class="description success">Now you are ready to start install templates and build your next website!</div>

    <?php } else{ ?>

            <img src="<?php echo get_template_directory_uri() ?>/includes/codeless_theme_panel/assets/img/unlock.png" />

            <h2>Welcome, you're almost finished!</h2>

            <div class="description">By activate your Folie WordPress Theme you will able to use any theme feature. You can install demos and activate our plugins.</div>

            <div class="form">
                <p>
                    <input name="email" placeholder="Email Address" type="email" />
                </p>

                <p>
                    <input  name="purchase-code" placeholder="Purchase Code" type="text" />
                </p>
                
                <p>
                    <input id="registerBtn" type="button" class="button-primary  codeless-hint-qtip" value="<?php esc_html_e( 'Register', 'folie' ); ?>" />
                </p>
                        
            </div>
    <?php } ?>        
          
</div>