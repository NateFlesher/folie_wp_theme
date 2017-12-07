wp.customize.controlConstructor['kirki-switch'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control       = this,
		    checkboxValue = control.setting._value;

		// Save the value
		this.container.on( 'change', 'input', function() {
			console.log('here');
			checkboxValue = ( jQuery( this ).is( ':checked' ) ) ? true : false;
			
			control.setting.set( checkboxValue );
			
		});

	}
 
});
