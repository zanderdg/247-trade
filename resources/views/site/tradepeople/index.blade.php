@extends('layouts.site.app')



{{-- Page title --}}

@section('title')

Tradespeople

@parent

@stop



@section('head_style')

<link rel="stylesheet" href="{{ asset('assets/front_lib/css/spinner.css') }}">

@endsection



@section('head_script')



@endsection



@section('content')



<div class="container py-5">

    @include('notifications')

    <div class="row">

        <div class="col-lg-3">

            <div class="list-group" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action" id="btn_new" onclick="page('new')" data-toggle="list" href="#new" role="tab" aria-controls="new">New </a>

                <a class="list-group-item list-group-item-action" id="btn_won" onclick="page('won')" data-toggle="list" href="#won" role="tab" aria-controls="won">Won</a>

                <a class="list-group-item list-group-item-action" id="btn_done" onclick="page('done')" data-toggle="list" href="#done" role="tab" aria-controls="done">Done</a>

                <a class="list-group-item list-group-item-action" id="btn_lost" onclick="page('lost')" data-toggle="list" href="#lost" role="tab" aria-controls="lost">Lost</a>

                <a class="list-group-item list-group-item-action" id="btn_archive" onclick="page('archive')" data-toggle="list" href="#archive" role="tab" aria-controls="archive">Archive</a>

            </div>

        </div>

        <div class="min-h-50 col-lg-9 mt-5 mt-lg-0" id="data"></div>

    </div>

</div>





@endsection



@section('footer_script')



<script type="text/javascript">
    window.onload = function() {

        start('new');

    }



    function start(page) {

        $('.list-group-item').attr('class', 'list-group-item list-group-item-action');

        // $('#spinner').show();

        $.ajax({

            url: "account/tradespeople-data",

            type: "POST",

            data: {

                user_id: '{!! Sentinel::getUser()->id !!}',

                page: page,

                _token: '{{ csrf_token() }}',

            },

            success: function(data) {

                setTimeout(function() {

                    // $('#new').empty();

                    $('#data').empty();

                    // $('#spinner').hide();

                    // $('.spinnerContainer').attr('style', 'height:0px;');

                    $('#data').append(data);

                    $('#btn_' + page + '').attr('class', 'list-group-item list-group-item-action active');

                    $('#nav-tabContent').children(".tab-pane").attr('class', 'tab-pane fade show active');

                    $('#nav-tabContent').children(".tab-pane").attr('id', page);

                    $('#nav-tabContent').children(".tab-pane").attr('aria-labelledby', page);

                    // attr('class', 'tab-pane fade show active');

                    // $('#list-'+page+'')

                    // $('#list-'+page+'')

                }, 100);

            },

            error: function(data) {

                location.reload();

            }

        });

    }



    function moveTo(page, job_id) {

        console.log(page);

        $.ajax({

            url: 'account/job/moveto',

            type: "POST",

            data: {

                page: page,

                job_id: job_id,

                user_id: '{!! Sentinel::getUser()->id !!}',

            },

            success: function(data) {

                console.log(data);

                start(page);

            }

        })

    }



    function page(page) {

        $('#data').empty();

        // $('.spinnerContainer').removeAttr("style");

        // $('#spinner').show();



        $.ajax({

            url: "account/tradespeople-data",

            type: "POST",

            data: {

                user_id: '{!! Sentinel::getUser()->id !!}',

                _token: '{{ csrf_token() }}',

                page: page,

            },

            success: function(data) {

                setTimeout(function() {

                    // $('#spinner').hide();

                    // $('.spinnerContainer').attr('style', 'height:0px;');

                    $('#data').append(data);

                    $('#nav-tabContent').children(".tab-pane").attr('class', 'tab-pane fade show active');

                    $('#nav-tabContent').children(".tab-pane").attr('id', page);

                    $('#nav-tabContent').children(".tab-pane").attr('aria-labelledby', page);

                    // $('#nav-tabContent').attr('class', 'tab-pane fade show active');

                    // $('#'+page).attr('class', 'tab-pane fade show active');

                    // $('#'+page).attr('aria-labelledby', page);

                }, 100);

            },

            error: function(data) {

                location.reload();

            }

        });

    }
</script>



@endsection