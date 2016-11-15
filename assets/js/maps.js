$(document).ready(function() {
// Maps
// ---------------------------------------------------------
if ($('#contact-page-map').length > 0) {
	new Maplace({
		map_div: '#contact-page-map',
		controls_type: 'list',
		map_options: {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			zoom: 14
		},
		locations: [
			{
				lat: -37.817314,
				lon: 144.95543099999998,
				title: 'Headquarters',
				html: '<strong>Headquarters</strong> <br> 121 King Street, Melbourne <br> Victoria 3000 Australia <br> Envato Pty Ltd',
				icon: marker
			},
			{
				lat: -37.83527632292268,
				lon: 145.01455307006836,
				title: 'Secondary Office',
				html: '<strong>Secondary Office</strong> <br> 47 Queen Street, Melbourne <br> Victoria 3000 Australia <br> Envato Pty Ltd',
				icon: marker
			}
		]
	}).Load();
}

if ($('#jobs-page-map').length > 0) {
	new Maplace({
		map_div: '#jobs-page-map',
		map_options: {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			zoom: 14
		},
		locations: [
			{
				lat: -37.817314,
				lon: 144.95543099999998,
				title: 'Job Title 1',
				icon: marker
			},
			{
				lat: -37.83527632292268,
				lon: 145.01455307006836,
				title: 'Job Title 2',
				icon: marker
			},
			{
				lat: -37.77749907004604,
				lon: 144.9452018737793,
				title: 'Job Title 3',
				icon: marker
			},
			{
				lat: -37.8127675575702,
				lon: 144.87001419067383,
				title: 'Job Title 4',
				icon: marker
			},
			{
				lat: -37.87160128507344,
				lon: 144.90503311157227,
				title: 'Job Title 5',
				icon: marker
			}
		]
	}).Load();
}

if ($('#jobs-single-page-map').length > 0) {
	new Maplace({
		map_div: '#jobs-single-page-map',
		map_options: {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			zoom: 14
		},
		locations: [
			{
				lat: -37.77749907004604,
				lon: 144.9452018737793,
				title: 'Job Title 3',
				icon: marker
			}
		]
	}).Load();
}

if ($('#find-job-map-tab').length > 0) {
	new Maplace({
		map_div: '#find-job-map-tab',
		map_options: {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			zoom: 14
		},
		locations: [
			{
				lat: -37.817314,
				lon: 144.95543099999998,
				title: 'Job Title 1',
				icon: marker
			},
			{
				lat: -37.83527632292268,
				lon: 145.01455307006836,
				title: 'Job Title 2',
				icon: marker
			},
			{
				lat: -37.77749907004604,
				lon: 144.9452018737793,
				title: 'Job Title 3',
				icon: marker
			},
			{
				lat: -37.8127675575702,
				lon: 144.87001419067383,
				title: 'Job Title 4',
				icon: marker
			},
			{
				lat: -37.87160128507344,
				lon: 144.90503311157227,
				title: 'Job Title 5',
				icon: marker
			}
		]
	}).Load();
}

if ($('#compare-price-map').length > 0) {
	new Maplace({
		map_div: '#compare-price-map',
		map_options: {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			zoom: 14
		},
		locations: [
			{
				lat: -37.817314,
				lon: 144.95543099999998,
				title: 'Job Title 1',
				icon: marker
			},
			{
				lat: -37.83527632292268,
				lon: 145.01455307006836,
				title: 'Job Title 2',
				icon: marker
			},
			{
				lat: -37.77749907004604,
				lon: 144.9452018737793,
				title: 'Job Title 3',
				icon: marker
			},
			{
				lat: -37.8127675575702,
				lon: 144.87001419067383,
				title: 'Job Title 4',
				icon: marker
			},
			{
				lat: -37.87160128507344,
				lon: 144.90503311157227,
				title: 'Job Title 5',
				icon: marker
			}
		]
	}).Load();
}

});	