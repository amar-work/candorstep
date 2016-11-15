/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	
	$( "#searchJob" ).click(function() {
		$( "#searchJobForm" ).submit();
	});	
	
	var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "us"}
 };
var input = document.getElementById('location');
var autocomplete = new google.maps.places.Autocomplete(input,options);
	
});
	