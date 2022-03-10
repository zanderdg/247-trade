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
        <h1>Member Profile</h1>
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
            <li class="active">Member Profile</li>
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
                            Member Profile</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Change Password</a>
                    </li>
                    <!-- <li>
                        <a href="{{ URL::to('admin/user_profile') }}" >
                            <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Advanced Member Profile</a>
                    </li> -->

                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                            Member Profile
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="img-file" style="height: auto;">
                                                @if($user->members->picture)
                                                    <img src="{!! url('/').'/uploads/members/'.$user->members->picture !!}" alt="profile pic" class="img-max">
                                                @else
                                                    <img src="http://placehold.it/200x200" alt="profile pic">
                                                @endif
                                            </div>
                                            <div class="clear" style="margin-top: 20px;"></div>
                                            @if(isset($MemberManagementFees2->join_date))
                                            <h3 class="panel-title" style="margin-bottom: 10px;">Annual Management Fees</h3>

                                            @if($user->members->is_free == 0)

                                            <table class="table table-striped">
                                             
                                              <tbody>
                                                <tr>
                                                  <td width="30%">Join Date: </td>
                                                  <td>{!! date('M, d, Y', strtotime($MemberManagementFees2->join_date)) !!}</td>
                                                  
                                                </tr>
                                                
                                                <tr>
                                                  <td>Expiry Date:</td>
                                                  <td>{!! date('M, d, Y', strtotime($MemberManagementFees2->expiry_date)) !!}</td>
                                                  
                                                </tr>
                                                 <tr>
                                                  <td>Management Fees Paid:</td>
                                                  <td>${!! $MemberManagementFees2->management_fees !!}</td>
                                                </tr>
                                                 <tr>
                                                  <td>Transaction ID:</td>
                                                  <td>{!! $MemberManagementFees2->transaction_id !!}</td>
                                                </tr>
                                                 
                                              </tbody>
                                            </table>

                                            @else
                                            <table class="table table-striped">
                                              <tbody>
                                                <tr>
                                                  <td width="30%">Management Fees: </td>
                                                  <td>FREE</td>
                                                </tr>   
                                              </tbody>
                                            </table>


                                            @endif
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td>@lang('users/title.first_name')</td>
                                                            <td>
                                                                {{ $user->first_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.last_name')</td>
                                                            <td>
                                                                {{ $user->last_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.email')</td>
                                                            <td>
                                                                {{ $user->email }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.phone')</td>
                                                            <td>
                                                                {{ $user->members->phone }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.gender')</td>
                                                            <td>
                                                                {{ $user->members->gender }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.dob')</td>
                                                            <td>
                                                                {{ $user->members->dob }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Key Tag/ Bar Code</td>
                                                            <td>
                                                                {{ $user->members->bar_code }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Member Type</td>
                                                            <td>
                                                                {{ $user->members->member_type }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.country')</td>
                                                            <td>
                                                                {{ $user->members->country }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.state')</td>
                                                            <td>
                                                                {{ $user->members->state }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.city')</td>
                                                            <td>
                                                                {{ $user->members->city }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.address')</td>
                                                            <td>
                                                                {{ $user->members->address }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.postal')</td>
                                                            <td>
                                                                {{ $user->members->zipcode }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Running Balance</td>
                                                            <td>
                                                                ${!!$RunningBalance!!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Earned Points</td>
                                                            <td>
                                                                {!!$PointsEarned!!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Redeemed Points</td>
                                                            <td>
                                                                {!!$PointsRedeemed!!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Loyalty Balance</td>
                                                            <td>
                                                                {!!$CurrentLoyaltyBalance!!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.status')</td>
                                                            <td>
                                                                @if($activation = Activation::completed($user))
                                                                    Activated
                                                                @else
                                                                    Pending
                                                                @endif
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.created_at')</td>
                                                            <td>
                                                                {!! $user->created_at->diffForHumans() !!}
                                                            </td>
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
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="inputpassword" class="col-md-3 control-label">
                                                Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                    <input type="password"  id="inputpassword" placeholder="Password" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnumber" class="col-md-3 control-label">
                                                Confirm Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                    <input type="password"  id="inputnumber"placeholder="Password" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            &nbsp;
                                            <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                                    </div>
                                </form>
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