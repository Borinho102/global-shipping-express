<?php 
	$transportation_shipment_custom_css ='';

	/*------ Slider show/hide -------*/
	if(get_theme_mod('logistic_transport_slider_hide_show') == false){
		$transportation_shipment_custom_css .=' .page-template-custom-frontpage #header{';
			$transportation_shipment_custom_css .=' background: #000;';
		$transportation_shipment_custom_css .='}';
		$transportation_shipment_custom_css .=' #services .service-box{';
			$transportation_shipment_custom_css .='margin: 0;';
		$transportation_shipment_custom_css .='}';
	}