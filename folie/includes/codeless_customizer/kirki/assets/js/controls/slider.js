wp.customize.controlConstructor['kirki-slider'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this,
			value,
			thisInput,
			inputDefault;

		// Update the text value
		this.container.on( 'change input', 'input[type=range], input[type=text]', function() {
			value = jQuery( this ).attr( 'value' );
			
			jQuery( this ).closest( 'label' ).find( '.kirki_range_value .value' ).attr( 'value', value );
			control.setting.set( value );
			
		});

		// Handle the reset button
		jQuery( '.kirki-slider-reset' ).click( function() {
			thisInput    = jQuery( this ).closest( 'label' ).find( 'input' );
			inputDefault = thisInput.data( 'reset_value' );
			thisInput.val( inputDefault );
			thisInput.change();
			jQuery( this ).closest( 'label' ).find( '.kirki_range_value .value' ).attr( 'value',  value );
		});

		// Save changes.
	
	}

});
