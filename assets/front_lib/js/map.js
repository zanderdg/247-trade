
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: 'profile/getUserData', 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data){
            user = JSON.parse(data)
            jobs = user.jobs
            db_coords = JSON.parse(user.coordinates)
            origin_coords = [parseFloat(user.lat), parseFloat(user.lng)];
            if(!db_coords) {
                for (let i = 0; i < 8; i++) {
                    point = [origin_coords[0] + positive, origin_coords[1] + negative];
                    corners.push(point);
                    if(i == 0){
                        positive += 0.000218;
                        negative += 0.001233;
                    } else if(i == 1){
                        positive += 0.000192;
                        negative += 0.000731;
                    } else if(i == 2) {
                        positive += 0.000402;
                        negative += 0.000007;
                    } else if(i == 3){
                        positive += 0.000201;
                        negative += -0.000737;
                    } else if(i == 4) {
                        positive += -0.000017;
                        negative += -0.001241;
                    } else if(i == 5) {
                        positive += -0.000188;
                        negative += -0.000829;
                    } else if(i == 6) {
                        positive += -0.000444;
                        negative += 0.000074;
                    }
                } 
            } else {
                corners = db_coords;
            }
            initMap(false)
        }
    }) 
});

const UK_BOUNDS = {
    north: 61.061,
    south: 49.674,
    west: -14.015,
    east: 2.091,
};
let user;
let btn_edit = $('#btn_edit');
let btn_cancel = $('#btn_cancel');
let btn_save = $('#btn_save');
let origin_coords;
let db_coords ;
let map;
let infoWindow;
let image = '';
let State = '';
let corners = [];
let positive = -0.000444;
let negative = -0.000574;
var coordinates = [];
let jobs = [];
let availJobs;


btn_cancel.on('click', () => initMap(false))
function initMap(state) {
    state === undefined || state === false ? State = false : State = true;
    if(State == false) {
        btn_edit.show(); btn_cancel.hide(); btn_save.hide();
    } else if(State == true) {
        btn_edit.hide(); btn_cancel.show(); btn_save.show();
    }

    if(isNaN(origin_coords[0]), isNaN(origin_coords[1])) {
        return;
    } else {
        map = new google.maps.Map( document.getElementById("map"), {
            zoom: 15,
            center: { lat:origin_coords[0] , lng:origin_coords[1]},
            clickableIcons: false,
            scrollwheel: State,
            mapTypeId: "roadmap",
            mapTypeControl: false,
            zoomControl: false,
            streetViewControl: false,
            fullscreenControl: false,
            draggable: State,
            restriction: {
                latLngBounds: UK_BOUNDS,
                strictBounds: true,
            },
            styles: [
                {
                    "featureType": "poi",            
                    "stylers": [
                        { "visibility": "on" },
                        { "display": "none" }
                    ]
                }
            ]
        });
        
        if(State) {
            corners.length = 0; // now corners is empty.
        }
        for (var i=0; i<corners.length; i++){
            var position = new google.maps.LatLng(corners[i][0], corners[i][1]);
            coordinates.push(position);        
        }
        create_polygon(coordinates);

        // Create jobs markers.
        for (let i = 0; i < jobs.length; i++) {
            new google.maps.Marker({
                position: new google.maps.LatLng(jobs[i].lat, jobs[i].lng),
                map: map,
                // icon: icons[features[i].type].icon,
            });
            // availableResource(jobs[i]);
        }
    }
}

function create_polygon(coordinates) {

    var icon = {
        //path: google.maps.SymbolPath.CIRCLE,
        path: "M -1 -1 L 1 -1 L 1 1 L -1 1 z",
        strokeColor: "#1d5926",
        strokeOpacity: 0,
        fillColor: "#1d5926",
        fillOpacity: 1,
        scale: 5
    };

    var polygon = new google.maps.Polygon({
        map: map,
        paths: coordinates,
        strokeColor: "#39b54c",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#A2EF92",
        fillOpacity: 0.5,
        zIndex: -1
    });

    var marker_options = {
        map: map,
        icon: icon,
        flat: true,
        draggable: State, // make it true to make shape editable.
        raiseOnDrag: false
    };

    // Only for edit shape
    if(State) {
        for (var i=0; i<coordinates.length; i++){
            marker_options.position = coordinates[i];
            var point = new google.maps.Marker(marker_options);
        
            google.maps.event.addListener(point, "drag", update_polygon_closure(polygon, i));
        }
        function update_polygon_closure(polygon, i){
        return function(event){
                polygon.getPath().setAt(i, event.latLng);
            }
        }

        btn_save.on('click', (event) => {
            event.preventDefault();
            let shape = [];
            const vertices = polygon.getPath();
            for (let i = 0; i < vertices.getLength(); i++) {
                const xy = vertices.getAt(i);
                point = [xy.lat(), xy.lng()];
                shape.push(point);
            }        
            request(shape); 
        })
    }
};

// jQuery POST Request
request = (shape) => {
    console.log(shape);
    $.ajax({
        type: 'POST',
        url: 'setting/workarea/'+user.id+'/edit',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data:{
            data: shape
        },
        success: function(data){
            if(data.statusCode == 200){
                corners.length = 0;
                coordinates.length = 0;
                corners = shape;
                initMap(false);
                $('#message').addClass("alert");
                $('#message').addClass("alert-success");
                $('#message').text(data.success);
                setTimeout(() => {
                    $('#message').removeClass("alert");
                    $('#message').removeClass("alert-success");
                    $('#message').empty();
                }, 5000);
                return;
            } else {
                initMap(false);
                $('#message').addClass("alert");
                $('#message').addClass("alert-danger");
                $('#message').text(data.danger);
                setTimeout(() => {
                    $('#message').removeClass("alert");
                    $('#message').removeClass("alert-danger");
                    $('#message').text();
                }, 5000);
            }
        },
        error: function(data) {
            console.log(data);
        }
    });
}