wp.customize.controlConstructor['kirki-cssbox'] = wp.customize.Control.extend({

	// When we're finished loading continue processing.
	ready: function() {

		'use strict';

		var control = this;
        
		// Save the value
		
		control.container.on( 'input keyup', 'input', function(e) {
		    console.log( control.setting.get() );
			var value = ( _.isObject( control.setting.get() ) ? control.setting.get() : JSON.parse( control.setting.get() ) ),
			    el = jQuery(this).data('name'),
			    new_value = jQuery(this).val();
			
			if ( false === kirkiValidateCSSValue( new_value ) && new_value != '' ) {
				
				jQuery(this).addClass('invalid');
				return;
				
			}else{
				if(!_.isObject(value))
					value = {};

				value = Object.assign({},value);

				jQuery(this).removeClass('invalid')
				value[el] = new_value;
				// Update the value in the customizer.
				control.setting.set( JSON.stringify(value) );
				
				
			}

		});

	}

});