// global Varablies
let u_id;
let page;
let availJobss = [];
let jobs_encode;

$(document).ready(function(){
    $.post('workarea/getJob', {
        _token: $('meta[name="csrf-token"]').attr('content'),
    }).then(res => {
        if(res.user == 'isTrader'){
            if(res.jobs.length && res.coords.length) {
                u_id = res.u_id;
                var jobs = res.jobs;
                var coordinates = res.coords;
                availableResource(jobs, coordinates);
            }                
        } else {
            request(page, jobs_encode);
        }
    })

    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        page = $(this).attr('href').split('page=')[1];
        $('#data').empty();
        $('#spinner').show();
        request(page, jobs_encode);
    });
});

$('#seacrh').on('click', function(event){
    event.preventDefault();   
    $('#data').empty();
    $('#spinner').show();         
    request(page, jobs_encode);
});

$('#filters').on('change', function(event){
    event.preventDefault();
    $('#data').empty();
    $('#spinner').show();
    request(page, jobs_encode);
});

availableResource = (jobs, coordinates) => {
    
    let coords_decode = JSON.parse(coordinates);
    let polygon = [];
    for (let i = 0; i < coords_decode.length; i++) {
        let latlng = new google.maps.LatLng(parseFloat(coords_decode[i][0]), parseFloat(coords_decode[i][1]))
        polygon.push(latlng);
    }
    let workarea = new google.maps.Polygon({ paths: polygon });
    setTimeout(function() {        
        for (let i = 0; i < jobs.length; i++) {
            let value = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(parseFloat(jobs[i].lat), parseFloat(jobs[i].lng)), workarea);
            // store in array with job id and status.
            availJobss.push({jobs_id:jobs[i].id, status:value});
        }

        jobs_encode = JSON.stringify(availJobss);
        request(page, jobs_encode);
    }, 1000);
}

request = (page, jobs_encode) => {
    data = {
        status: jobs_encode,
        search: $('input[name="keyword"]').val(),
        category: $('#catrgory option:selected').val(), 
    };
    if(page == null){
        $.ajax({
            type: "GET",
            url: "data/liveleads",
            data: data,
            success:function(data){
                // setTimeout(function(){
                    $('#data').empty()
                    $('#spinner').hide()   
                    $('#data').html(data)
                    // Mapinit(coordinates)
                // }, 1000);
            },
            error:function(data){
                // location.reload();
            }
        });
    } else {
        $.ajax({
            type: "GET",
            url: "data/liveleads" + "?page=" + page,
            data:data,
            success:function(data){
                // setTimeout(function(){
                    $('#data').empty();
                    $('#spinner').hide();   
                    $('#data').html(data);
                // }, 500);
            },
            error:function(data){
                location.reload();
            }
        })
    }

    // show_only: favorite,     
    // timing: $('input[name="timing"]:checked').val(),
    // hiring_Stage: $('input[name="stage"]:checked').val(),
    // amount: $('input[name="amount"]:checked').val(),
    // services: service,


    // $.ajax({
    //     type: 'POST',
    //     url: 'workarea/'+u_id+'/jobStatus',
    //     data: availJobss,
    //     success: function(data){
    //         console.log(data);
    //     }
    // })

    // var favorite = [];
    // $.each($('input[name="show_only"]:checked'), function(){
    //     favorite.push($(this).val());
    // });
    // var service = [];
    // $.each($('input[name="service"]:checked'), function(){
    //     service.push($(this).val());
    // });
}

viewmore = (id) => {
    if($('.text'+id).hasClass("show-more-height")) {
        $(this).text("VIEW LESS");
    } else {
        $(this).text("VIEW More");
    }
    $('.text'+id).toggleClass("show-more-height");
}

Mapinit = (coordinates) => {
    map = new google.maps.Map( document.getElementById("map"), {
        zoom: 7,
        center: { lat:coordinates[0] , lng:coordinates[1]},
        mapTypeId: "roadmap",
        clickableIcons: false,
        mapTypeControl: false,
        zoomControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        draggable: false
    })
}