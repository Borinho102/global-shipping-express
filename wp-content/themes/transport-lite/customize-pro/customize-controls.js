( function( api ) {
	// Extends our custom "transport-lite" section.
	api.sectionConstructor['transport-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );