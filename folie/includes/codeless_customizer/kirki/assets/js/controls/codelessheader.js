wp.customize.controlConstructor['kirki-codelessheader'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

	},


	setValue: function( newValue, refresh ) {

		'use strict';

		var newValueSerialized = newValue ;
		this.setting.set( newValueSerialized );

		// Update the hidden field
		//this.settingField.val( newValueSerialized );

		if ( refresh ) {

			// Trigger the change event on the hidden field so
			// previewer refresh the website on Customizer
			//this.settingField.trigger( 'change' );

		}

	},
	
	dropped: function(data){
		"use strict";
		this.setValue(data, false); 
		
	}

});
