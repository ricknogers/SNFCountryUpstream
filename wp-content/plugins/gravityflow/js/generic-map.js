var GravityFlowGenericMap = function( options ) {
	
	var self = this;
	
	self.options = options;
	self.UI = jQuery( '#gaddon-setting-row-'+ self.options.fieldName );
	
	self.init = function() {
		
		self.bindEvents();
		
		self.setupData();
		
		self.setupRepeater();
					
	};
	
	self.bindEvents = function() {
		
		self.UI.on( 'change', 'select[name="_gaddon_setting_'+ self.options.keyFieldName +'"]', function() {

			var $select = jQuery( this ),
				$input  = $select.next( '.custom-key-container' );

			if( $select.val() != 'gf_custom' ) {
				return;
			}

			$select.fadeOut( function() {
				$input.fadeIn().focus();
			} );

		} );

		self.UI.on( 'change', 'select[name="_gaddon_setting_'+ self.options.valueFieldName +'"]', function() {

			var $select = jQuery( this ),
				$input  = $select.next( '.custom-value-container' );

			if( $select.val() != 'gf_custom' ) {
				return;
			}

			$select.fadeOut( function() {
				$input.fadeIn().focus();
			} );

		} );
		
		self.UI.on( 'click', 'a.custom-key-reset', function( event ) {

			event.preventDefault();

			var $reset  = jQuery( this ),
				$input  = $reset.parents( '.custom-key-container' ),
				$select = $input.prev( 'select.key' );

			$input.fadeOut( function() {
				$input.find( 'input' ).val( '' ).change();
				$select.fadeIn().focus().val( '' );
			} );

		} );

		self.UI.on( 'click', 'a.custom-value-reset', function( event ) {

			event.preventDefault();

			var $reset  = jQuery( this ),
				$input  = $reset.parents( '.custom-value-container' ),
				$select = $input.prev( 'select.value' );

			$input.fadeOut( function() {
				$input.find( 'input' ).val( '' ).change();
				$select.fadeIn().focus().val( '' );
			} );

		} );
		
		self.UI.closest( 'form' ).on( 'submit', function( event ) {
			
			jQuery( '[name^="_gaddon_setting_'+ self.options.fieldName +'_"]' ).each( function( i ) {
				
				jQuery( this ).removeAttr( 'name' );
				
			} );
			
		} );
		
	};
	
	self.setupData = function() {
		
		self.data = jQuery.parseJSON( jQuery( '#' + self.options.fieldId ).val() );
		
		if ( ! self.data ) {
			self.data = [ {
				key: '',
				value: '',
				custom_key: '',
				custom_value: ''
			} ];
		}
		
	}
	
	self.setupRepeater = function() {

		var limit;
		if (self.options.limit > 0){
			limit = self.options.limit;
		}
		else{
			limit = 0;
		}
		
		self.UI.find( 'tbody.repeater' ).repeater( {
			
			limit:              limit,
			items:              self.data,
			addButtonMarkup:    '<img src="'+ self.options.baseURL +'/images/add.png" style="cursor:pointer;" />',
			removeButtonMarkup: '<img src="'+ self.options.baseURL +'/images/remove.png" style="cursor:pointer;" />',
			callbacks:          {
				add:  function( obj, $elem, item ) {
					
					var key_select = $elem.find( 'select[name="_gaddon_setting_'+ self.options.keyFieldName +'"]' );
					
					if ( ! item.custom_key && key_select.length > 0 ) {
						$elem.find( '.custom-key-container' ).hide();
					} else {
						$elem.find( '.key' ).hide();
					}

					var value_select = $elem.find( 'select[name="_gaddon_setting_'+ self.options.valueFieldName +'"]' );

					if ( ! item.custom_value && value_select.length > 0 ) {
						$elem.find( '.custom-value-container' ).hide();
					} else {
						$elem.find( '.value' ).hide();
					}
					
				},
				save: function( obj, data ) {

					jQuery( '#'+ self.options.fieldId ).val( jQuery.toJSON( data ) );
					
				}
			}
			
		} );
		
	}
	
	return self.init();
	
};
