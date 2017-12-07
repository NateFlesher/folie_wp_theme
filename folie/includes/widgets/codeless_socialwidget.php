<?php 

class CodelessSocialWidget extends WP_Widget{


    function __construct(){

        $options = array('classname' => 'social_widget', 'description' => 'Add a social widget', 'customize_selective_refresh' => true );

        parent::__construct( 'social_widget', THEMENAME.' Social Widget', $options );

    }


    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

        echo wp_kses_post( $before_widget );

        

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

        $style = empty($instance['style']) ? '' : $instance['style'];
        
        $facebook = empty($instance['facebook']) ? '' : $instance['facebook'];
        $twitter = empty($instance['twitter']) ? '' : $instance['twitter'];
        $google_plus = empty($instance['google_plus']) ? '' : $instance['google_plus'];
        $instagram = empty($instance['instagram']) ? '' : $instance['instagram'];
        $linkedin = empty($instance['linkedin']) ? '' : $instance['linkedin'];
        $pinterest = empty($instance['pinterest']) ? '' : $instance['pinterest'];
        $youtube = empty($instance['youtube']) ? '' : $instance['youtube'];
        $soundcloud = empty($instance['soundcloud']) ? '' : $instance['soundcloud'];
        $slack = empty($instance['slack']) ? '' : $instance['slack'];
        $skype = empty($instance['skype']) ? '' : $instance['skype'];
        $github = empty($instance['github']) ? '' : $instance['github'];
        $dribbble = empty($instance['dribbble']) ? '' : $instance['dribbble'];
        $behance = empty($instance['behance']) ? '' : $instance['behance'];
        $email = empty($instance['email']) ? '' : $instance['email'];



        
        if(!empty($title))
            echo wp_kses_post( $before_title . $title . $after_title );
     


        echo '<ul class="social-icons-widget '.esc_attr($style).'">';
            
            if( !empty($facebook) )
               echo '<li class="facebook"><a href="'.esc_url($facebook).'"><i class="cl-icon-facebook"></i></a></li>';
            if( !empty($twitter) )
                echo '<li class="twitter"><a href="'.esc_url($twitter).'"><i class="cl-icon-twitter"></i></a></li>';
            if( !empty($google_plus) )
                echo '<li class="google"><a href="'.esc_url($google_plus).'"><i class="cl-icon-google-plus"></i></a></li>';
            if( !empty($dribbble) )
                echo '<li class="dribbble"><a href="'.esc_url($dribbble).'"><i class="cl-icon-dribbble"></i></a></li>';
            if( !empty($linkedin) )
                echo '<li class="foursquare"><a href="'.esc_url($linkedin).'"><i class="cl-icon-linkedin"></i></a></li>';
            if( !empty($pinterest) )
                echo '<li class="pinterest"><a href="'.esc_url($pinterest).'"><i class="cl-icon-pinterest"></i></a></li>';
            if( !empty($youtube) )
                echo '<li class="youtube"><a href="'.esc_url($youtube).'"><i class="cl-icon-youtube"></i></a></li>';
            if( !empty($email) )
                echo '<li class="email"><a href="'.esc_url($email).'"><i class="cl-icon-mail"></i></a></li>';
            if( !empty($instagram) )
                echo '<li class="email"><a href="'.esc_url($instagram).'"><i class="cl-icon-instagram"></i></a></li>';
            if( !empty($github) )
                echo '<li class="email"><a href="'.esc_url($github).'"><i class="cl-icon-github"></i></a></li>';
            if( !empty($skype) )
                echo '<li class="email"><a href="'.esc_url($skype).'"><i class="cl-icon-skype"></i></a></li>';
            if( !empty($soundcloud) )
                echo '<li class="email"><a href="'.esc_url($soundcloud).'"><i class="cl-icon-soundcloud"></i></a></li>';
            if( !empty($slack) )
                echo '<li class="email"><a href="'.esc_url($slack).'"><i class="cl-icon-slack></i></a></li>';
            if( !empty($behance) )
                echo '<li class="email"><a href="'.esc_url($behance).'"><i class="cl-icon-behance"></i></a></li>';

        echo '</ul>';


        echo wp_kses_post( $after_widget );

    }



    function update($new_instance, $old_instance){

        $instance = array();

        $instance['title'] = $new_instance['title'];

        $instance['style'] = $new_instance['style'];

        $instance['facebook'] = $new_instance['facebook'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['google_plus'] = $new_instance['google_plus'];
        $instance['behance'] = $new_instance['behance'];
        $instance['instagram'] = $new_instance['instagram'];
        $instance['email'] = $new_instance['email'];
        $instance['youtube'] = $new_instance['youtube'];
        $instance['soundcloud'] = $new_instance['soundcloud'];
        $instance['dribbble'] = $new_instance['dribbble'];
        $instance['slack'] = $new_instance['slack'];
        $instance['github'] = $new_instance['github'];
        $instance['pinterest'] = $new_instance['pinterest'];
        $instance['skype'] = $new_instance['skype'];
        $instance['linkedin'] = $new_instance['linkedin'];

        return $instance;

    }


    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'style' => '', 'facebook' => '', 'twitter' => '', 'google_plus' => '', 'behance' => '', 'instagram' => '', 'email' => '', 'youtube' => '', 'soundcloud' => '', 'dribbble' => '', 'slack' => '', 'github' => '', 'pinterest' => '', 'skype' => '', 'linkedin' => '') );

        $title = isset($instance['title']) ? $instance['title']: "";

        $style = isset($instance['style']) ? $instance['style']: "";

        $facebook = !isset($instance['facebook']) ? '' : $instance['facebook'];
        $twitter = !isset($instance['twitter']) ? '' : $instance['twitter'];
        $google_plus = !isset($instance['google_plus']) ? '' : $instance['google_plus'];
        $instagram = !isset($instance['instagram']) ? '' : $instance['instagram'];
        $linkedin = !isset($instance['linkedin']) ? '' : $instance['linkedin'];
        $pinterest = !isset($instance['pinterest']) ? '' : $instance['pinterest'];
        $youtube = !isset($instance['youtube']) ? '' : $instance['youtube'];
        $soundcloud = !isset($instance['soundcloud']) ? '' : $instance['soundcloud'];
        $slack = !isset($instance['slack']) ? '' : $instance['slack'];
        $skype = !isset($instance['skype']) ? '' : $instance['skype'];
        $github = !isset($instance['github']) ? '' : $instance['github'];
        $dribbble = !isset($instance['dribbble']) ? '' : $instance['dribbble'];
        $behance = !isset($instance['behance']) ? '' : $instance['behance'];
        $email = !isset($instance['email']) ? '' : $instance['email'];

        ?>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('title') ); ?>">Title: 

            <input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('style') ); ?>">Style: 

            <select id="<?php echo esc_attr( $this->get_field_id('style') ); ?>" name="<?php echo esc_html( $this->get_field_name('style')); ?>" value="<?php echo esc_attr($style); ?>">
                <?php $values = array('Simple', 'Circle'); ?>
                <?php foreach($values as $v): ?>
                    <?php $selected = ''; if(strtolower($v) == esc_attr($style) ) $selected = 'selected="selected"'; ?>
                    <option value="<?php echo strtolower($v) ?>" <?php echo wp_kses_post( $selected ) ?> ><?php echo wp_kses_post( $v ) ?></option>
                <?php endforeach; ?>
            </select>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('facebook') ); ?>">Facebook: 

            <input id="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>" name="<?php echo esc_html( $this->get_field_name('facebook') ); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('twitter') ); ?>">Twitter: 

            <input id="<?php echo esc_attr($this->get_field_id('twitter') ); ?>" name="<?php echo esc_html( $this->get_field_name('twitter') ); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('google_plus') ); ?>">Google Plus: 

            <input id="<?php echo esc_attr( $this->get_field_id('google_plus') ); ?>" name="<?php echo esc_html( $this->get_field_name('google_plus')  ); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('instagram') ); ?>">Instagram: 

            <input id="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>" name="<?php echo esc_html( $this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('youtube') ); ?>">Youtube: 

            <input id="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>" name="<?php echo esc_html( $this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" /></label>

        </p>
        <p>

            <label for="<?php echo esc_html( $this->get_field_id('behance') ); ?>">Behance: 

            <input id="<?php echo esc_attr( $this->get_field_id('behance') ); ?>" name="<?php echo esc_html( $this->get_field_name('behance')); ?>" type="text" value="<?php echo esc_attr($behance); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('linkedin') ); ?>">Linkedin: 

            <input id="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>" name="<?php echo esc_html( $this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('soundcloud') ); ?>">Soundcloud: 

            <input id="<?php echo esc_attr( $this->get_field_id('soundcloud') ); ?>" name="<?php echo esc_html( $this->get_field_name('soundcloud')); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('email') ); ?>">Email: 

            <input id="<?php echo esc_attr( $this->get_field_id('email') ); ?>" name="<?php echo esc_html( $this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('slack') ); ?>">Slack: 

            <input id="<?php echo esc_attr( $this->get_field_id('slack') ); ?>" name="<?php echo esc_html( $this->get_field_name('slack')); ?>" type="text" value="<?php echo esc_attr($slack); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('pinterest') ); ?>">Pinterest: 

            <input id="<?php echo esc_attr( $this->get_field_id('pinterest') ); ?>" name="<?php echo esc_html( $this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('skype') ); ?>">Skype: 

            <input id="<?php echo esc_attr( $this->get_field_id('skype') ); ?>" name="<?php echo esc_html( $this->get_field_name('skype')); ?>" type="text" value="<?php echo esc_attr($skype); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('github') ); ?>">Github: 

            <input id="<?php echo esc_attr( $this->get_field_id('github') ); ?>" name="<?php echo esc_html( $this->get_field_name('github')); ?>" type="text" value="<?php echo esc_attr($github); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_html( $this->get_field_id('dribbble') ); ?>">Dribbble: 

            <input id="<?php echo esc_attr( $this->get_field_id('dribbble') ); ?>" name="<?php echo esc_html( $this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" /></label>

        </p>

        <?php

    }

}
?>