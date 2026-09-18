( function( api ) {

	// Extends our custom "logistic-cargo-trucking" section.
	api.sectionConstructor['logistic-cargo-trucking'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );