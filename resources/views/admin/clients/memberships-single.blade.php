@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Member Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Membership Details</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Members</a>
            </li>
            <li class="active">Membership Details</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                            Membership Details</a>
                    </li>
                    
                    <!-- <li>
                        <a href="{{ URL::to('admin/user_profile') }}" >
                            <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Advanced Member Profile</a>
                    </li> -->

                </ul>

                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                    <div class="pull-right">
                    <a href="{{ route('member/memberships', $allmemberships[0]->u_id) }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            Membership Details
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        
                                        <div class="col-md-10">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                          <td  width="30%">Membership Course Name: </td>
                                                          <td>{!! $allmemberships[0]->c_id !!}</td>
                                                          
                                                        </tr>
                                                        <tr>
                                                          <td>Join Date:</td>
                                                          <td>{!! $allmemberships[0]->join_date !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Expiry Date:</td>
                                                          <td>{!! $allmemberships[0]->expiry_date !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Payment Type:</td>
                                                          <td>{!! $allmemberships[0]->payment_type !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Gender:</td>
                                                          <td>{!! $allmemberships[0]->gender !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Shirt Size:</td>
                                                          <td>{!! $allmemberships[0]->shirt_size !!}</td>
                                                        </tr>
                                                        @if( $allmemberships[0]->payment_type == 'Installment')
                                                        <tr>
                                                          <td>Installment Plan:</td>
                                                          <td>{!! $allmemberships[0]->installment_plan !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Subscription ID:</td>
                                                          <td>{!! $allmemberships[0]->subscription_id !!}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                          <td>Shipping Info:</td>
                                                          <td>{!! $allmemberships[0]->shipping_address.', '.$allmemberships[0]->shipping_city.', '.$allmemberships[0]->shipping_state.', '.$allmemberships[0]->shipping_zip.', '.$allmemberships[0]->shipping_country !!}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
@stop