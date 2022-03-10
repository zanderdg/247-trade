@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Dashboard
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('assets/vendors/animate/animate.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/css/only_dashboard.css') }}" rel="stylesheet" /> --}}
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Welcome to Dashboard - 24/7Tradespeople</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i> Dashboard
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        @if(Sentinel::getUser()->roles[0]->slug == 'admin')
        {{-- <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <a href="{!! URL::to('/')!!}/admin/page/create">
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-10 text-left">
                                <h3>Add New Page</h3>
                            </div>
                            <div class="square_box col-xs-2 text-left">
                                <br>
                                <i class="livicon  pull-right" data-name="docs" data-l="true" data-c="#fff" data-hc="#fff" data-s="30"></i>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            </a>
        </div> --}}
        <div class="col-lg-4 col-md-6 col-sm-6">
            
        </div>
        @endif
    </div>
</section>
<script src="{{ URL::to('/') }}/js/jquery.min.js"></script>
<style type="text/css">
    .square_box h3 { font-size: 18px;}
</style>
        
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <!--  todolist-->
    <script src="{{ asset('assets/js/todolist.js') }}" ></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('assets/vendors/charts/easypiechart.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/charts/jquery.easypiechart.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/charts/jquery.easingpie.js') }}" ></script>
    <!--for calendar-->
    <script src="{{ asset('assets/vendors/fullcalendar/moment.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/fullcalendar/fullcalendar.min.js') }}"  type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('assets/vendors/charts/jquery.flot.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/charts/jquery.flot.resize.min.js') }}"  type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('assets/vendors/charts/jquery.sparkline.js') }}" ></script>
    <!-- Back to Top-->
    {{-- <script type="text/javascript" src="{{ asset('assets/vendors/countUp/countUp.js') }}" ></script> --}}
    <!--   maps -->
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jscharts/Chart.js') }}" ></script>
    {{-- <script src="{{ asset('assets/js/dashboard.js') }}"  type="text/javascript"></script> --}}
    

@stop
