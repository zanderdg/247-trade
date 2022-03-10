
// disable enter key.
$("body").bind("keypress", function (e) {  
    if (e.keyCode == 13) {  
        return false;  
    }  
});

const UK_BOUNDS = {
    north: 61.061,
    south: 49.674,
    west: -14.015,
    east: 2.091,
};

// Google API
let map;
let marker;
let placeSearch;
let autocomplete;
const componentForm = {
    locality: "long_name",
    administrative_area_level_1: "short_name",
    postal_code: "short_name"
};
let getLat = parseFloat(document.getElementById('lat').value);
let getLng = parseFloat(document.getElementById('lng').value);

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("stateInput"),
        { types: ["geocode"] }
    );
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat:51.19389533300396, lng:0.18624536132811453},
        zoom: 19,
        mapTypeId: "roadmap",
        clickableIcons: false,
        scrollwheel: true,
        mapTypeControl: false,
        zoomControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        restriction: {
            latLngBounds: UK_BOUNDS,
            strictBounds: true,
        }
    });
    var image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
    marker = new google.maps.Marker({ 
        map: map,
        position: {lat: getLat, lng: getLng },
        icon: image
    });
    if( getLat != null && getLng != null) {
        map.setCenter({lat: getLat, lng: getLng});
        map.setZoom(15);
        // Maker Not working -- pending
        // marker.setPlace({ lat: getLat, lng: getLng});
        // marker.setVisible(true);
    }

    // Set initial restrict to the greater list of countries.
    autocomplete.setComponentRestrictions({
        country: ["uk"],
    });
    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    autocomplete.setFields(['address_component', 'geometry', 'place_id']);

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    const place = autocomplete.getPlace();

    console.log('place: ', place)
    // console.log()

    if (!place.geometry) {
      return;
    }
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(19);
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location,
    });
    marker.setVisible(true);
    
    for (const component in componentForm) {
        document.getElementById(component).value = "";
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (const component of place.address_components) {
        const addressType = component.types[0];

        if (componentForm[addressType]) {
            const val = component[componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
    document.getElementById('lat').value = place.geometry.location.lat();
    document.getElementById('lng').value = place.geometry.location.lng();
}
