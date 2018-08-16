function initialize() 
{
	var gMapLatLng     = {lat: -22.979235, lng: -43.233085};
	var gMapSearch     = document.getElementById('GoogleMapsSearch');
	var gMapInput      = document.getElementById('GoogleMapsSubmit');
	var gMapGeo        = new google.maps.Geocoder();
	var gMapMarker     = [];
	
  	var gMap = new google.maps.Map(document.getElementById("GoogleMapsDiv"), 
  	{
		center: new google.maps.LatLng(gMapLatLng),
      	zoom: 6,
      	mapTypeId: 'roadmap',
		mapTypeControl: false,
		streetViewControl: false,
		rotateControl: false,
		fullscreenControl: false
  	});
	gMap.controls[google.maps.ControlPosition.TOP_LEFT].push(gMapSearch);
	gMap.controls[google.maps.ControlPosition.TOP_RIGHT].push(gMapInput);
	gMap.addListener('click', function(e) {SetLocation(e.latLng, gMap, gMapMarker);});
	gMapInput.addEventListener('click', function(){ SearchGeocodeAddress(gMapGeo, gMap, gMapSearch.value, gMapMarker);});
	gMapSearch.addEventListener("keyup", function(event) 
	{
    	event.preventDefault();
    	if (event.keyCode == 13) 
			gMapInput.click();
    });
}


function SearchGeocodeAddress(Geocoder, GMap, SearchInputValue, gMapMarker) 
{
    Geocoder.geocode
	(
		{'address': SearchInputValue}, function(results, status) 
		{
    		if (status === 'OK') 
			{
   		     	return SetLocation(results[0].geometry.location, GMap, gMapMarker)
			}
		}
	);
}

function SetCountryAndEstate(latLng) 
{
	var inputLatitude        = document.getElementById("RegisterGoogleMapsLatitude");
	var inputLongitude       = document.getElementById("RegisterGoogleMapsLongitude");
	var inputCountryHidden   = document.getElementById("FormGoogleMapsCountryHidden");
	var inputRegionHidden    = document.getElementById("FormGoogleMapsRegionHidden");
	var inputCountry         = document.getElementById("FormGoogleMapsCountry");
	var inputRegion          = document.getElementById("FormGoogleMapsRegion");
	if(inputLatitude != null && inputLongitude != null && inputCountry != null && inputRegion != null)
	{
		sleep(450);
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode
		( 
			{'location': latLng}, 
			function (results, status) 
			{
				if(status == google.maps.GeocoderStatus.OK)
				{
					if(results[0]) 
					{
						for(var i = 0; i < results[0].address_components.length; i++) 
						{
							if(results[0].address_components[i].types[0] == "country")
							{
								inputCountry.value = results[0].address_components[i].short_name;
								inputCountryHidden.value = results[0].address_components[i].short_name;
							}
							else if(results[0].address_components[i].types[0] == "administrative_area_level_1" &&
									results[0].address_components[i].types[1] == "political")
							{
								if(results[0].address_components[i-1] != null)
								{
									if(results[0].address_components[i-1].types[0] == "locality" &&
										results[0].address_components[i-1].types[1] == "political")
									{
										inputRegion.value = results[0].address_components[i-1].long_name;
										inputRegionHidden.value = results[0].address_components[i-1].long_name;
									}
									else 
									{
										inputRegion.value = results[0].address_components[i].long_name;
										inputRegionHidden.value = results[0].address_components[i].long_name;
									}
								}
								else
								{
									inputRegion.value = "";
									inputRegionHidden.value = "";
								}
							}
						}
						inputLatitude.value = latLng.lat();
						inputLongitude.value = latLng.lng();
						inputRegion.value = inputRegion.value.replace("State of ", "");
						inputRegionHidden.value = inputRegionHidden.value.replace("State of ", "");
						SetCountryAndEstateClass(inputCountry, inputRegion, false);
						return true;
					}
				}
				inputCountry.value = "";
				inputCountryHidden.value = "";
				inputRegion.value = "";
				inputRegionHidden.value = "";
				inputLatitude.value = latLng.lat();
				inputLongitude.value = latLng.lng();
				SetCountryAndEstateClass(inputCountry, inputRegion, true);
				return false;
			}
		);
	}
}

function SetCountryAndEstateClass(InputCountry, InputEstate, Alert)
{
	var inputs = document.getElementsByTagName('input');
	if(Alert)
	{
		InputCountry.className = " InputAlertText";
		InputEstate.className =  " InputAlertText";
	}
	else
	{
		InputCountry.className = " InputAfterText";
		InputEstate.className  =  " InputAfterText";
	}
	for(var i = 0; i < inputs.length; i++) 
	{
		if(inputs[i].type.toLowerCase() == 'submit') 
		{
			if(!ValidateMultiplyFields(inputs[i].form.id, inputs[i].className, inputs[i].id, "")
			   || Alert)
			{
				inputs[i].className = inputs[i].className.slice(0, inputs[i].className.search(" "));
				inputs[i].className = inputs[i].className + " SubmitDisabled";
				inputs[i].disabled = true;
			}
			else
			{
				inputs[i].className = inputs[i].className.slice(0, inputs[i].className.search(" ")); 
				inputs[i].className = inputs[i].className + " SubmitEnabled";
				inputs[i].disabled = false;
			}
		}
	}
}

function SetLocation(latLng, GMap, Marker)
{
	Marker.forEach(function(Marker){Marker.setMap(null);});
	Marker.push
	(
		new google.maps.Marker
		(
			{
				position: latLng, 
				map: GMap,
				zoom: 6
			}
		)
		
	);
	GMap.setCenter(latLng);
	if(SetCountryAndEstate(latLng))
		return true;
	else return false;
}

function sleep(milliseconds) 
{
	var start = new Date().getTime();
  	for (var i = 0; i < 1e7; i++) 
	{
		if ((new Date().getTime() - start) > milliseconds)
		{
      		break;
    	}
  	}
}

google.maps.event.addDomListener(window, 'load', initialize);