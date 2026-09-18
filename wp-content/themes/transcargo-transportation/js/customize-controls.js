( function( api ) {

	// Extends our custom "transcargo-transportation" section.
	api.sectionConstructor['transcargo-transportation'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );