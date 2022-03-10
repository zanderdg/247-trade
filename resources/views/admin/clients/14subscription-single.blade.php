@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Subscription Details
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
        <h1>Subscription Details</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Clients</a>
            </li>
            <li class="active">Subscription Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                            Subscription Details</a>
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
                          <div class="pull-left">
                            <label>Download Reports: </label>
                            <a class="btn btn-sm btn-default" style="background-color:#90d0b6; color:#fff;" href="{{ route('client/generate-report-admin', ['userId'=>$user->id,'nid'=>$allsubscriptions[0]->cd_id] ) }}">Basic <i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Report"></i></a>
                            <a class="btn btn-sm btn-default" style="background-color:#90d0b6; color:#fff;" href="{{ route('client/generate-full-report-admin', ['userId'=>$user->id,'nid'=>$allsubscriptions[0]->cd_id] ) }}">Full <i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Report"></i></a>
                            <a class="btn btn-sm btn-default" style="background-color:#90d0b6; color:#fff;" href="{{ route('client/generate-profitloss-report-admin', ['userId'=>$user->id,'nid'=>$allsubscriptions[0]->cd_id] ) }}">Profit/Loss <i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Report"></i></a>

                            <a class="btn btn-sm btn-default" style="background-color:#90d0b6; color:#fff;" href="{{ route('client/generate-full-report-excel-admin', ['userId'=>$user->id,'nid'=>$allsubscriptions[0]->cd_id] ) }}">Full (Excel)<i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Report"></i></a>
                            <a class="btn btn-sm btn-default" style="background-color:#90d0b6; color:#fff;" href="{{ route('client/generate-profitloss-report-excel-admin', ['userId'=>$user->id,'nid'=>$allsubscriptions[0]->cd_id] ) }}">Profit/Loss (Excel)<i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Report"></i></a>
                            <a class="btn btn-sm btn-default" style="background-color:#90d0b6; color:#fff;" href="{{ route('client/generate-report-excel-admin', ['userId'=>$user->id,'nid'=>$allsubscriptions[0]->cd_id] ) }}">Basic {Excel}<i class="livicon" data-name="download" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Report"></i></a>



                          </div>        
                          <div class="pull-right">
                            <a href="{{ route('client/subscriptionorders', $allsubscriptions[0]->u_id) }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            Subscription Details
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        if($allsubscriptions[0]->subscription_package == 1){
                                            $subscription_package_name =  'DIY BAS';
                                            $subscription_package_fees =  '5';
                                        }elseif($allsubscriptions[0]->subscription_package == 2){
                                            $subscription_package_name =  'Express BAS';
                                            $subscription_package_fees =  '29';
                                        }elseif($allsubscriptions[0]->subscription_package == 3){
                                            $subscription_package_name =  'Expert BAS';
                                            $subscription_package_fees =  '49';
                                        }else{
                                            $subscription_package_name =  '';
                                            $subscription_package_fees =  '';
                                        }
                                        ?>
                                        <?php 
                                          $month_num = $allsubscriptions[0]->q_period; 
                                          $month_name = ""; $m_p = "";
                                          if($allsubscriptions[0]->period_sel_income == 1){
                                                $m_p = "3 Months Period";
                                          }elseif($allsubscriptions[0]->period_sel_income == 2){
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
                                        <div class="col-md-10">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">
                                                        <tr>
                                                          <td  width="30%">Package Name: </td>
                                                          <td>{!! $subscription_package_name.' ($'.$subscription_package_fees.')' !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Created Date:</td>
                                                          <td>{!! $allsubscriptions[0]->created_at->format('M d, Y') !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Period:</td>
                                                          <td>{!! $month_name.' '.$allsubscriptions[0]->year !!}</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Month Option:</td>
                                                          <td>{!! $m_p !!}</td>
                                                        </tr>                                                        
                                                    </table>
                                                    @if($allsubscriptions[0]->period_sel_income == 1)
                                                        <table class="table table-bordered table-striped" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td class="desc" colspan="5">INCOME</td>
                                                              </tr>
                                                            <tbody>
                                                              <tr>
                                                                    <td class="no">#</td>
                                                                    <td class="desc">Items</td>
                                                                    <td class="unit">Client Input</td>
                                                                    <td class="qty">GST on amount</td>
                                                                    <td class="total">Amount after GST</td>
                                                              </tr>
                                                              <?php
                                                                    $sel_incomes = json_decode($allsubscriptions[0]->sel_incomes);
                                                                    // print_r($sel_incomes);exit;
                                                                    // $parts = explode('_', $sel_incomes[$k]);
                                                              ?>
                                                              @for($k=0; $k<count($sel_incomes); $k++)
                                                                <tr role="row" class="odd">
                                                                  <td class="no">{{$k+1}}</td>
                                                                  <td class="sorting_1" width="20%">
                                                                    <?php
                                                                    $parts = explode('_', $sel_incomes[$k]);
                                                                    // print_r($parts);
                                                                    ?>
                                                                    {{$parts[0]}}
                                                                  </td>
                                                                  <?php
                                                                        $single_income_vals = json_decode($allsubscriptions[0]->single_income_vals);
                                                                        $single_income_alter_vals = json_decode($allsubscriptions[0]->single_income_alter_vals);
                                                                        $single_income_percent = json_decode($allsubscriptions[0]->single_income_percent);
                                                                        $single_income_invoices = json_decode($allsubscriptions[0]->single_income_invoices);

                                                                        $a_income_gst_collected = 0; $b_expense_gst_paid = 0;
                                                                        if(($allsubscriptions[0]->single_income_gst_collected != '0')){
                                                                            $a_income_gst_collected = number_format((float)$allsubscriptions[0]->single_income_gst_collected, 2, '.', '');
                                                                        }elseif(($allsubscriptions[0]->multiple_income_gst_collected != '0')){
                                                                            $a_income_gst_collected = number_format((float)$allsubscriptions[0]->multiple_income_gst_collected, 2, '.', '');
                                                                        }

                                                                        if(($allsubscriptions[0]->single_expense_gst_paid != '0')){
                                                                            $b_expense_gst_paid = number_format((float)$allsubscriptions[0]->single_expense_gst_paid, 2, '.', '');
                                                                        }elseif(($allsubscriptions[0]->multiple_expense_gst_paid != '0')){
                                                                            $b_expense_gst_paid = number_format((float)$allsubscriptions[0]->multiple_expense_gst_paid, 2, '.', '');
                                                                        }

                                                                        if($a_income_gst_collected !== '' && $b_expense_gst_paid !== ''){
                                                                            $gst_payable_amount = $a_income_gst_collected - $b_expense_gst_paid;
                                                                            $gst_payable_amount = number_format((float)$gst_payable_amount, 2, '.', '');
                                                                        }
                                                                        $after_gst_income  = number_format((float)$allsubscriptions[0]->tot_income -  $a_income_gst_collected, 2, '.', '');
                                                                        $after_gst_expense = number_format((float)$allsubscriptions[0]->tot_expense - $b_expense_gst_paid, 2, '.', '');
                                                                        $net_income = number_format((float)$after_gst_income - $after_gst_expense, 2, '.', '');
                                                                  ?>
                                                                  <td class="unit">$
                                                                    @if(isset($single_income_alter_vals[$k]) && $single_income_alter_vals[$k] !='')
                                                                      {{number_format((float)$single_income_alter_vals[$k], 2, '.', '')}}<br>

                                                                      @if($single_income_invoices[$k] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$single_income_invoices[$k]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s = number_format((float)$single_income_alter_vals[$k], 2, '.', ''); ?>
                                                                    @else
                                                                      {{number_format((float)$single_income_vals[$k], 2, '.', '')}}<br>

                                                                      @if($single_income_invoices[$k] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$single_income_invoices[$k]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s = number_format((float)$single_income_vals[$k], 2, '.', ''); ?>
                                                                    @endif</td>
                                                                  <td class="qty">$
                                                                    @if(isset($single_income_percent[$k]) && $single_income_percent[$k]!=0)
                                                                      @if(isset($single_income_alter_vals[$k]) && $single_income_alter_vals[$k] !='')
                                                                        {{number_format((float)$single_income_alter_vals[$k]/number_format((float)$single_income_percent[$k], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p = number_format((float)$single_income_alter_vals[$k]/number_format((float)$single_income_percent[$k], 2, '.', ''), 2, '.', ''); ?>
                                                                      @else
                                                                        {{number_format((float)$single_income_vals[$k]/number_format((float)$single_income_percent[$k], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p = number_format((float)$single_income_vals[$k]/number_format((float)$single_income_percent[$k], 2, '.', ''), 2, '.', ''); ?>
                                                                      @endif
                                                                    @else
                                                                      {{number_format((float)0, 2, '.', '')}}
                                                                      <?php $p = number_format((float)0, 2, '.', ''); ?>
                                                                    @endif</td>
                                                                  <td class="total">${{number_format((float)($s-$p), 2, '.', '')}}</td>
                                                                </tr>
                                                              @endfor
                                                              <tr class="mkred">
                                                                    <!-- <td class="no"></td> -->
                                                                    <td class="desc" colspan="2">Total Income</td>
                                                                    <td class="unit">${{$allsubscriptions[0]->tot_income}}</td>
                                                                    <td class="qty">${{$a_income_gst_collected}}</td>
                                                                    <td class="total">${{$after_gst_income}}</td>
                                                              </tr>          
                                                              <tr>
                                                                    <td class="desc" colspan="5">EXPENSES</td>
                                                              </tr>
                                                              <tr>
                                                                    <td class="no">#</td>
                                                                    <td class="desc">Items</td>
                                                                    <td class="unit">Client Input</td>
                                                                    <td class="qty">GST on amount</td>
                                                                    <td class="total">Amount after GST</td>
                                                              </tr>
                                                              <?php
                                                                    $sel_expenses = json_decode($allsubscriptions[0]->sel_expenses);
                                                                    // print_r($sel_incomes);exit;
                                                                    // $parts = explode('_', $sel_incomes[$k]);
                                                              ?>
                                                              @for($k=0; $k<count($sel_expenses); $k++)
                                                                <tr role="row" class="odd">       
                                                                  <td class="no">{{$k+1}}</td>
                                                                  <td class="sorting_1" >
                                                                    <?php
                                                                    $parts = explode('_', $sel_expenses[$k]);
                                                                    // print_r($parts);
                                                                    ?>
                                                                    {{$parts[0]}}
                                                                  </td>
                                                                  <?php
                                                                        $single_expense_vals = json_decode($allsubscriptions[0]->single_expense_vals);
                                                                        $single_expense_percent = json_decode($allsubscriptions[0]->single_expense_percent);
                                                                        $single_expense_date_vals = json_decode($allsubscriptions[0]->single_expense_date_vals);
                                                                        $single_expense_makemodel_vals = json_decode($allsubscriptions[0]->single_expense_makemodel_vals);
                                                                        $single_expense_business_percent_vals = json_decode($allsubscriptions[0]->single_expense_business_percent_vals);
                                                                        $single_expense_invoices = json_decode($allsubscriptions[0]->single_expense_invoices);
                                                                  ?>
                                                                  <td class="unit">$@if(isset($single_expense_vals[$k]))
                                                                    {{number_format((float)$single_expense_vals[$k], 2, '.', '')}}<br>

                                                                    @if($single_expense_date_vals[$k] != '')<b>Date: </b>{{$single_expense_date_vals[$k]}}<br>@endif
                                                                    @if($single_expense_makemodel_vals[$k] != '')<b>Make/Model: </b>{{$single_expense_makemodel_vals[$k]}}<br>@endif
                                                                    @if($single_expense_business_percent_vals[$k] != '')<b>B. Percent: </b>{{$single_expense_business_percent_vals[$k]}}<br>@endif
                                                                    
                                                                    @if($single_expense_invoices[$k] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$single_expense_invoices[$k]}}" target="_blank">view</a><br>@endif

                                                                    <?php $s = number_format((float)$single_expense_vals[$k], 2, '.', ''); ?>
                                                                    @else
                                                                      {{number_format((float)$single_expense_vals[$k], 2, '.', '')}}<br>

                                                                      @if($single_expense_invoices[$k] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$single_expense_invoices[$k]}}" target="_blank">view</a><br>@endif

                                                                    @endif</td>
                                                                  <td class="qty">$@if(isset($single_expense_percent[$k]) && $single_expense_percent[$k]!=0)
                                                                    {{number_format((float)$single_expense_vals[$k]/number_format((float)$single_expense_percent[$k], 2, '.', ''), 2, '.', '')}}
                                                                    <?php $p = number_format((float)$single_expense_vals[$k]/number_format((float)$single_expense_percent[$k], 2, '.', ''), 2, '.', ''); ?>
                                                                    @else
                                                                    {{number_format((float)0, 2, '.', '')}}
                                                                    <?php $p = number_format((float)0, 2, '.', ''); ?>
                                                                    @endif</td>
                                                                  <td class="total">${{number_format((float)($s-$p), 2, '.', '')}}</td>
                                                                </tr>
                                                              @endfor
                                                              <tr class="mkred">
                                                                    <!-- <td class="no"></td> -->
                                                                    <td class="desc" colspan="2">Total Expense</td>
                                                                    <td class="unit">${{$allsubscriptions[0]->tot_expense}}</td>
                                                                    <td class="qty">${{$b_expense_gst_paid}}</td>
                                                                    <td class="total">${{$after_gst_expense}}</td>
                                                              </tr>
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                    <!-- <td colspan="2"></td> -->
                                                                    <td colspan="4" align="center">NET INCOME</td>
                                                                    <td>${{$net_income}}</td>
                                                              </tr>
                                                            </tfoot>
                                                        </table>
                                                    @elseif($allsubscriptions[0]->period_sel_income == 2)

                                                        <table class="table table-bordered table-striped" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td class="desc" colspan="9">INCOME</td>
                                                            </tr>
                                                            <tbody>
                                                              <tr>
                                                                <td class="no">#</td>
                                                                <td class="desc">Items</td>
                                                                <?php 
                                                                  $month_num = $allsubscriptions[0]->q_period; 
                                                                ?>
                                                                @for($f=0;$f<3;$f++)
                                                                  <td class="unit">
                                                                    <?php 
                                                                    $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                                                                    echo 'Client Input <br>'.$month_name."\n"; 
                                                                    $month_num++;
                                                                    ?>
                                                                  </td>
                                                                  <td class="qty">GST on amount</td>
                                                                @endfor
                                                                <td class="total">Total Amount after GST</td>
                                                              </tr>
                                                              <?php $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_income_after_gst_total = 0;?>
                                                              <?php
                                                                    $sel_incomes = json_decode($allsubscriptions[0]->sel_incomes);
                                                                    // print_r($sel_incomes);exit;
                                                                    // $parts = explode('_', $sel_incomes[$k]);
                                                              ?>
                                                              @for($k=0; $k<count($sel_incomes); $k++)
                                                                <tr role="row" class="odd">
                                                                  <td class="no">{{$k+1}}</td>
                                                                  <td class="sorting_1" width="20%">
                                                                    <?php
                                                                    $parts = explode('_', $sel_incomes[$k]);
                                                                    // print_r($parts);
                                                                    ?>
                                                                    {{$parts[0]}}
                                                                  </td>
                                                                  <?php
                                                                    $multiple_income_vals = json_decode($allsubscriptions[0]->multiple_income_vals);
                                                                    $multiple_income_alter_vals = json_decode($allsubscriptions[0]->multiple_income_alter_vals);
                                                                    $multiple_income_percent = json_decode($allsubscriptions[0]->multiple_income_percent);
                                                                    $multiple_income_invoices = json_decode($allsubscriptions[0]->multiple_income_invoices);
                                                                  ?>
                                                                  <td class="unit">$
                                                                    @if(isset($multiple_income_alter_vals[$k][0]) && $multiple_income_alter_vals[$k][0] !='')
                                                                      {{number_format((float)$multiple_income_alter_vals[$k][0], 2, '.', '')}}<br>

                                                                      @if($multiple_income_invoices[$k][0] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_income_invoices[$k][0]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s0 = number_format((float)$multiple_income_alter_vals[$k][0], 2, '.', ''); 
                                                                            $s00 += $s0;
                                                                      ?>
                                                                    @else
                                                                      {{number_format((float)$multiple_income_vals[$k][0], 2, '.', '')}}<br>

                                                                      @if($multiple_income_invoices[$k][0] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_income_invoices[$k][0]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s0 = number_format((float)$multiple_income_vals[$k][0], 2, '.', ''); 
                                                                            $s00 += $s0;
                                                                      ?>
                                                                    @endif</td>
                                                                  <td class="qty">$
                                                                    @if(isset($multiple_income_percent[$k][0]) && $multiple_income_percent[$k][0]!=0)
                                                                      @if(isset($multiple_income_alter_vals[$k][0]) && $multiple_income_alter_vals[$k][0] !='')
                                                                        {{number_format((float)$multiple_income_alter_vals[$k][0]/number_format((float)$multiple_income_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p0 = number_format((float)$multiple_income_alter_vals[$k][0]/number_format((float)$multiple_income_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                                                              $p00 += $p0;
                                                                        ?>
                                                                      @else
                                                                        {{number_format((float)$multiple_income_vals[$k][0]/number_format((float)$multiple_income_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p0 = number_format((float)$multiple_income_vals[$k][0]/number_format((float)$multiple_income_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                                                              $p00 += $p0;
                                                                        ?>
                                                                      @endif
                                                                    @else
                                                                      {{number_format((float)0, 2, '.', '')}}
                                                                      <?php $p0 = number_format((float)0, 2, '.', ''); 
                                                                            $p00 += $p0;
                                                                      ?>
                                                                    @endif</td>
                                                                  <td class="unit">$
                                                                    @if(isset($multiple_income_alter_vals[$k][1]) && $multiple_income_alter_vals[$k][1] !='')
                                                                      {{number_format((float)$multiple_income_alter_vals[$k][1], 2, '.', '')}}<br>

                                                                      @if($multiple_income_invoices[$k][1] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_income_invoices[$k][1]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s1 = number_format((float)$multiple_income_alter_vals[$k][1], 2, '.', ''); 
                                                                            $s11 += $s1;
                                                                      ?>
                                                                    @else
                                                                      {{number_format((float)$multiple_income_vals[$k][1], 2, '.', '')}}<br>

                                                                      @if($multiple_income_invoices[$k][1] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_income_invoices[$k][1]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s1 = number_format((float)$multiple_income_vals[$k][1], 2, '.', ''); 
                                                                            $s11 += $s1;
                                                                      ?>
                                                                    @endif</td>
                                                                  <td class="qty">$
                                                                    @if(isset($multiple_income_percent[$k][1]) && $multiple_income_percent[$k][1]!=0)
                                                                      @if(isset($multiple_income_alter_vals[$k][1]) && $multiple_income_alter_vals[$k][1] !='')
                                                                        {{number_format((float)$multiple_income_alter_vals[$k][1]/number_format((float)$multiple_income_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p1 = number_format((float)$multiple_income_alter_vals[$k][1]/number_format((float)$multiple_income_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                                                              $p11 += $p1;
                                                                        ?>
                                                                      @else
                                                                        {{number_format((float)$multiple_income_vals[$k][1]/number_format((float)$multiple_income_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p1 = number_format((float)$multiple_income_vals[$k][1]/number_format((float)$multiple_income_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                                                              $p11 += $p1;
                                                                        ?>
                                                                      @endif  
                                                                    @else
                                                                      {{number_format((float)0, 2, '.', '')}}
                                                                      <?php $p1 = number_format((float)0, 2, '.', ''); 
                                                                            $p11 += $p1;
                                                                      ?>
                                                                    @endif</td>
                                                                  <td class="unit">$
                                                                    @if(isset($multiple_income_alter_vals[$k][2]) && $multiple_income_alter_vals[$k][2] !='')
                                                                      {{number_format((float)$multiple_income_alter_vals[$k][2], 2, '.', '')}}<br>

                                                                      @if($multiple_income_invoices[$k][2] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_income_invoices[$k][2]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s2 = number_format((float)$multiple_income_alter_vals[$k][2], 2, '.', ''); 
                                                                            $s22 += $s2;
                                                                      ?>
                                                                    @else
                                                                      {{number_format((float)$multiple_income_vals[$k][2], 2, '.', '')}}<br>

                                                                      @if($multiple_income_invoices[$k][2] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_income_invoices[$k][2]}}" target="_blank">view</a><br>@endif

                                                                      <?php $s2 = number_format((float)$multiple_income_vals[$k][2], 2, '.', ''); 
                                                                            $s22 += $s2;
                                                                      ?>  
                                                                    @endif</td>    
                                                                  <td class="qty">$
                                                                    @if(isset($multiple_income_percent[$k][2]) && $multiple_income_percent[$k][2]!=0)
                                                                      @if(isset($multiple_income_alter_vals[$k][2]) && $multiple_income_alter_vals[$k][2] !='')
                                                                        {{number_format((float)$multiple_income_alter_vals[$k][2]/number_format((float)$multiple_income_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p2 = number_format((float)$multiple_income_alter_vals[$k][2]/number_format((float)$multiple_income_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                                                              $p22 += $p2;
                                                                        ?>
                                                                      @else
                                                                        {{number_format((float)$multiple_income_vals[$k][2]/number_format((float)$multiple_income_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                                                                        <?php $p2 = number_format((float)$multiple_income_vals[$k][2]/number_format((float)$multiple_income_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                                                              $p22 += $p2;
                                                                        ?>
                                                                      @endif
                                                                    @else
                                                                      {{number_format((float)0, 2, '.', '')}}
                                                                      <?php $p2 = number_format((float)0, 2, '.', ''); 
                                                                            $p22 += $p2;
                                                                      ?>
                                                                    @endif</td>
                                                                  <td class="total">${{number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', '')}}
                                                                    <?php $x_income_after_gst_total += number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', ''); ?>
                                                                  </td>
                                                                </tr>
                                                              @endfor
                                                              <tr class="mkred">
                                                                    <!-- <td class="no"></td> -->
                                                                    <td class="desc" colspan="2">Total Income</td>
                                                                    <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                                                                    <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                                                                    <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                                                                    <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                                                                    <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                                                                    <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td>
                                                                    <td class="total">${{$x_income_after_gst_total}}</td>
                                                              </tr>          
                                                              <tr>
                                                                <td class="desc" colspan="9">EXPENSES</td>
                                                              </tr>
                                                              <tr>
                                                                <td class="no">#</td>
                                                                <td class="desc">Items</td>
                                                                <?php 
                                                                  $month_num = $allsubscriptions[0]->q_period; 
                                                                ?>
                                                                @for($f=0;$f<3;$f++)
                                                                  <td class="unit">
                                                                    <?php 
                                                                    $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                                                                    echo 'Client Input <br>'.$month_name."\n"; 
                                                                    $month_num++;
                                                                    ?>
                                                                  </td>
                                                                  <td class="qty">GST on amount</td>
                                                                @endfor
                                                                <td class="total">Total Amount after GST</td>
                                                              </tr>
                                                              <?php $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_expense_after_gst_total = 0;?>
                                                              <?php
                                                                    $sel_expenses = json_decode($allsubscriptions[0]->sel_expenses);
                                                                    // print_r($sel_expenses);exit;
                                                                    // $parts = explode('_', $sel_expenses[$k]);
                                                              ?>
                                                              @for($k=0; $k<count($sel_expenses); $k++)
                                                                <tr role="row" class="odd">
                                                                  <td class="no">{{$k+1}}</td>
                                                                  <td class="sorting_1" width="20%">
                                                                    <?php
                                                                    $parts = explode('_', $sel_expenses[$k]);
                                                                    // print_r($parts);
                                                                    ?>
                                                                    {{$parts[0]}}
                                                                  </td>
                                                                  <?php
                                                                    $multiple_expense_vals = json_decode($allsubscriptions[0]->multiple_expense_vals);
                                                                    $multiple_expense_percent = json_decode($allsubscriptions[0]->multiple_expense_percent);
                                                                    $multiple_expense_date_vals = json_decode($allsubscriptions[0]->multiple_expense_date_vals);
                                                                    $multiple_expense_makemodel_vals = json_decode($allsubscriptions[0]->multiple_expense_makemodel_vals);
                                                                    $multiple_expense_business_percent_vals = json_decode($allsubscriptions[0]->multiple_expense_business_percent_vals);
                                                                    $multiple_expense_invoices = json_decode($allsubscriptions[0]->multiple_expense_invoices);
                                                                  ?>
                                                                  <td class="unit">$@if(isset($multiple_expense_vals[$k][0]))
                                                                    {{number_format((float)$multiple_expense_vals[$k][0], 2, '.', '')}}<br>

                                                                    @if($multiple_expense_date_vals[$k][0] != '')<b>Date: {{$multiple_expense_date_vals[$k][0]}}<br>@endif
                                                                    @if($multiple_expense_makemodel_vals[$k][0] != '')Make/Model: </b>{{$multiple_expense_makemodel_vals[$k][0]}}<br>@endif
                                                                    @if($multiple_expense_business_percent_vals[$k][0] != '')<b>B. Percent: </b>{{$multiple_expense_business_percent_vals[$k][0]}}<br>@endif

                                                                    @if($multiple_expense_invoices[$k][0] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_expense_invoices[$k][0]}}" target="_blank">view</a><br>@endif

                                                                    <?php $s0 = number_format((float)$multiple_expense_vals[$k][0], 2, '.', ''); 
                                                                          $s00 += $s0;
                                                                    ?>
                                                                    @else
                                                                      {{number_format((float)$multiple_expense_vals[$k][0], 2, '.', '')}}<br>
                                                                      @if($multiple_expense_invoices[$k][0] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_expense_invoices[$k][0]}}" target="_blank">view</a><br>@endif

                                                                    @endif</td>
                                                                  <td class="qty">$@if(isset($multiple_expense_percent[$k][0]) && $multiple_expense_percent[$k][0]!=0)
                                                                    {{number_format((float)$multiple_expense_vals[$k][0]/number_format((float)$multiple_expense_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                                                                    <?php $p0 = number_format((float)$multiple_expense_vals[$k][0]/number_format((float)$multiple_expense_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                                                          $p00 += $p0;
                                                                    ?>
                                                                    @else
                                                                    {{number_format((float)0, 2, '.', '')}}
                                                                    <?php $p0 = number_format((float)0, 2, '.', ''); 
                                                                          $p00 += $p0;
                                                                    ?>
                                                                    @endif</td>
                                                                  <td class="unit">$@if(isset($multiple_expense_vals[$k][1]))
                                                                    {{number_format((float)$multiple_expense_vals[$k][1], 2, '.', '')}}<br>

                                                                    @if($multiple_expense_date_vals[$k][1] != '')<b>Date: {{$multiple_expense_date_vals[$k][1]}}<br>@endif
                                                                    @if($multiple_expense_makemodel_vals[$k][1] != '')Make/Model: </b>{{$multiple_expense_makemodel_vals[$k][1]}}<br>@endif
                                                                    @if($multiple_expense_business_percent_vals[$k][1] != '')<b>B. Percent: </b>{{$multiple_expense_business_percent_vals[$k][1]}}<br>@endif

                                                                    @if($multiple_expense_invoices[$k][1] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_expense_invoices[$k][1]}}" target="_blank">view</a><br>@endif

                                                                    <?php $s1 = number_format((float)$multiple_expense_vals[$k][1], 2, '.', ''); 
                                                                          $s11 += $s1;
                                                                    ?>
                                                                    @else
                                                                      {{number_format((float)$multiple_expense_vals[$k][1], 2, '.', '')}}<br>
                                                                      @if($multiple_expense_invoices[$k][1] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_expense_invoices[$k][1]}}" target="_blank">view</a><br>@endif

                                                                    @endif</td>
                                                                  <td class="qty">$@if(isset($multiple_expense_percent[$k][1]) && $multiple_expense_percent[$k][1]!=0)
                                                                    {{number_format((float)$multiple_expense_vals[$k][1]/number_format((float)$multiple_expense_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                                                                    <?php $p1 = number_format((float)$multiple_expense_vals[$k][1]/number_format((float)$multiple_expense_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                                                          $p11 += $p1;
                                                                    ?>
                                                                    @else
                                                                    {{number_format((float)0, 2, '.', '')}}
                                                                    <?php $p1 = number_format((float)0, 2, '.', ''); 
                                                                          $p11 += $p1;
                                                                    ?>
                                                                    @endif</td>
                                                                  <td class="unit">$@if(isset($multiple_expense_vals[$k][2]))
                                                                    {{number_format((float)$multiple_expense_vals[$k][2], 2, '.', '')}}<br>

                                                                    @if($multiple_expense_date_vals[$k][2] != '')<b>Date: {{$multiple_expense_date_vals[$k][2]}}<br>@endif
                                                                    @if($multiple_expense_makemodel_vals[$k][2] != '')Make/Model: </b>{{$multiple_expense_makemodel_vals[$k][2]}}<br>@endif
                                                                    @if($multiple_expense_business_percent_vals[$k][2] != '')<b>B. Percent: </b>{{$multiple_expense_business_percent_vals[$k][2]}}<br>@endif

                                                                    @if($multiple_expense_invoices[$k][2] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_expense_invoices[$k][2]}}" target="_blank">view</a><br>@endif

                                                                    <?php $s2 = number_format((float)$multiple_expense_vals[$k][2], 2, '.', ''); 
                                                                          $s22 += $s2;
                                                                    ?>
                                                                    @else
                                                                      {{number_format((float)$multiple_expense_vals[$k][2], 2, '.', '')}}<br>
                                                                      @if($multiple_expense_invoices[$k][2] != '')<b>Invoice: </b><a href="{{ URL::to('/') }}/uploads/source/{{$multiple_expense_invoices[$k][2]}}" target="_blank">view</a><br>@endif

                                                                    @endif</td>    
                                                                  <td class="qty">$@if(isset($multiple_expense_percent[$k][2]) && $multiple_expense_percent[$k][2]!=0)
                                                                    {{number_format((float)$multiple_expense_vals[$k][2]/number_format((float)$multiple_expense_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                                                                    <?php $p2 = number_format((float)$multiple_expense_vals[$k][2]/number_format((float)$multiple_expense_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                                                          $p22 += $p2;
                                                                    ?>
                                                                    @else
                                                                    {{number_format((float)0, 2, '.', '')}}
                                                                    <?php $p2 = number_format((float)0, 2, '.', ''); 
                                                                          $p22 += $p2;
                                                                    ?>
                                                                    @endif</td>
                                                                  <td class="total">${{number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', '')}}
                                                                    <?php $x_expense_after_gst_total += number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', ''); ?>
                                                                  </td>
                                                                </tr>
                                                              @endfor
                                                              <tr class="mkred">
                                                                    <!-- <td class="no"></td> -->
                                                                    <td class="desc" colspan="2">Total Expense</td>
                                                                    <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                                                                    <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                                                                    <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                                                                    <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                                                                    <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                                                                    <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td>
                                                                    <td class="total">${{$x_expense_after_gst_total}}</td>
                                                              </tr>  
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                <!-- <td colspan="5"></td> -->
                                                                <td colspan="8" align="center">NET INCOME</td>
                                                                <td>${{$x_income_after_gst_total - $x_expense_after_gst_total}}</td>
                                                              </tr>
                                                            </tfoot>
                                                        </table>
                                                    @endif
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