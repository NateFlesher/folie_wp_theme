
    
    <?php
    
    if( ! function_exists('codeless_header_logo_helper') ){
        function codeless_header_logo_helper(){

            $logo_url = codeless_get_mod('logo');
            $logo_light_url = codeless_get_mod('logo_light');
                    
            
            if( codeless_get_mod('logo_type', 'image') == 'image' )
            {
                $logo = ''; 
                $logo_light = '';
                
                if(!empty($logo_url))
                    $logo = "<img class='dark' src=\"".esc_url($logo_url)."\" alt='' />";
                if(!empty($logo_light_url))
                    $logo_light = "<img class='light' src=\"".esc_url($logo_light_url)."\" alt='' />";
                $logo = '<div id="logo" class="logo_'.codeless_get_mod("logo_type").'">' . "<a href='".esc_url(home_url('/'))."'>".$logo.$logo_light."</a>" . "</div>";
            }
            elseif(codeless_get_mod('logo_type') == 'font')
            {   
                $logo = codeless_get_mod('logo_font_text', get_bloginfo('name'));
                $logo = "<a href='".esc_url(home_url('/'))."' class=\"logo_font cl-responsive_color_".esc_attr( codeless_get_mod( 'logo_font_responsive_color', 'dark' ) )."\">".$logo."</a>";
            }

            return $logo;
        }
    }
            
    echo codeless_header_logo_helper();
            
    ?>
