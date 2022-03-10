@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Orders List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Client Orders</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Clients</li>
        <li class="active">Clients</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Client Order List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('client/show', $user->id) }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>#</th>
                            <!-- <th>Client Number</th> -->
                            <th width="8%">Subscription Package</th>
                            <th width="8%">Created Date</th>
                            <th width="18%">Period</th>
                            <th width="10%">Month Option</th>
                            <th width="9%">Lodged to portal</th>
                            <th width="10%">Lodged By Agent</th>
                            <!-- <th>Payment Type</th>
                            <th>Membership Status</th> -->
                            <th>Action</th>
                            <th >Reports</th>
                           <!--  <th >Reports</th>
                            <th >Reports</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allsubscriptionorders as $subscription)
                            <tr>
                                <td>{!! $subscription->cd_id !!}</td>
                                <!-- <td>{!! $user->client->client_number !!}</td> -->
                                <?php
                                if($subscription->subscription_package == 1){
                                    $subscription_package_name =  'DIY BAS';
                                    $subscription_package_fees =  '5';
                                }elseif($subscription->subscription_package == 2){
                                    $subscription_package_name =  'Express BAS';
                                    $subscription_package_fees =  '29';
                                }elseif($subscription->subscription_package == 3){
                                    $subscription_package_name =  'Expert BAS';
                                    $subscription_package_fees =  '49';
                                }else{
                                    $subscription_package_name =  '';
                                    $subscription_package_fees =  '';
                                }
                                ?>
                                <?php 
                                  $month_num = $subscription->q_period; 
                                  $month_name = ""; $m_p = "";
                                  if($subscription->period_sel_income == 1){
                                        $m_p = "3 Months Period";
                                  }elseif($subscription->period_sel_income == 2){
                                        $m_p = "Single Month Period";
                                  }
                                ?>
                                @for($f=0;$f<3;$f++)
                                    <?php
                                    $month_name .= date("F", mktime(0, 0, 0, $month_num, 10)). ' ';
                                    // echo $month_name."\n"; 
                                    $month_num++;
                                    ?>
                                @endfor
                                <td>{!! $subscription_package_name.' ($'.$subscription_package_fees.')'!!}<!--  @if($subscription->is_home_course==1) <br><em style="color: #fff;    border: 1px solid #0B9444;    border-radius: 5px;
                                background: #0B9444;    font-size: 8px; padding: 2px;">{!! "Home Course"!!}</em> @endif --></td>
                                <td>{!! $subscription->created_at->format('M d, Y') !!}</td>
                                <td>{!! $month_name.' '.$subscription->year !!}</td>
                                <td>{!! $m_p !!}</td>

                                <td>
                                    @if($subscription->lodged_to_portal == 0)
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>{!! $subscription->agent_name !!}</td>


                                <!-- <td>{!! $subscription->payment_type !!} @if($subscription->installment_plan!=0)({!!$subscription->installment_plan!!} months)@endif</td> -->
                                <!-- <td>    
                                    @if($subscription->ifexpired==1)
                                        @if($subscription->iffreezeaccount == 0)
                                        Expired<br>
                                        @else
                                        Freezed<br>
                                        @endif
                                        
                                    @else
                                        @if($subscription->installment_plan!=0)
                                            Partially Paid<br>
                                            <small style="font-size: 10px;">(Remaining Balance: ${!!$subscription->remaining_amount!!})</small>
                                        @else
                                            Paid
                                        @endif
                                    @endif 
                                </td> -->
                            
                                <td><a href="{{ route('client/subscription-single', ['userId'=>$user->id,'nid'=>$subscription->cd_id] ) }}">View</a></td>
                                <td>
                                    <a href="{{ route('client/generate-report-admin', ['userId'=>$user->id,'nid'=>$subscription->cd_id] ) }}">Basic <i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a> | 
                                    <a href="{{ route('client/generate-full-report-admin', ['userId'=>$user->id,'nid'=>$subscription->cd_id] ) }}">Full <i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>  | 
                                    <a href="{{ route('client/generate-profitloss-report-admin', ['userId'=>$user->id,'nid'=>$subscription->cd_id] ) }}">Profit/Loss <i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
<style type="text/css"> table {font-size: 11px;} td {padding: 8px 6px;}</style>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
  </div>
</div>

<div class="modal fade" id="disable_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
  </div>
</div>
<script>
$(function () {
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});
});
</script>
@stop