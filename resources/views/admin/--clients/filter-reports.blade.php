@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clients Transaction History
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
    <h1>Clients</h1>
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
                    Transaction History
                </h4>
                <div class="pull-right">
                    <a href="{{ route('clients') }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/clients/filter-reports'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}

                        <div class="form-group {{ $errors->first('client_id', 'has-error') }}">
                            <label for="client_id" class="col-sm-3 control-label">
                                Select Client
                            </label>
                            <div class="col-sm-5">
                                {!! Form::select('client_id', $clientData, $cid, array('class' => 'form-control select2', 'placeholder'=>'Select Client'))!!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('client_id', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('golf_course_id', 'has-error') }}">
                            <label for="golf_course_id" class="col-sm-3 control-label">
                                Select Period
                            </label>
                            <div class="col-sm-5">
                                <table class="table table-bordered table-order" id="table1">
                                    <tbody>
                                      <tr role="row" class="odd">
                                        <td class="sorting_1">
                                          <div class="checkbox">
                                            <label>
                                              <input name="period_quarter[]" <?php if(isset($period_quarter) && in_array('7', $period_quarter)){echo 'checked';}else{}?> type="checkbox" value="7"> July - Sept -7
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr role="row" class="odd">
                                        <td class="sorting_1">
                                          <div class="checkbox">
                                            <label>
                                              <input name="period_quarter[]" <?php if(isset($period_quarter) && in_array('10', $period_quarter)){echo 'checked';}else{}?> type="checkbox" value="10"> Oct - Dec -10
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr role="row" class="odd">
                                        <td class="sorting_1">
                                          <div class="checkbox">
                                            <label>
                                              <input name="period_quarter[]" <?php if(isset($period_quarter) && in_array('1', $period_quarter)){echo 'checked';}else{}?> type="checkbox" value="1"> Jan - Mar -1
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr role="row" class="odd">
                                        <td class="sorting_1">
                                          <div class="checkbox">
                                            <label>
                                              <input name="period_quarter[]" <?php if(isset($period_quarter) && in_array('4', $period_quarter)){echo 'checked';}else{}?> type="checkbox" value="4"> Apr - Jun -4
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="form-group {{ $errors->first('report_type', 'has-error') }}">
                            <label for="report_type" class="col-sm-3 control-label">
                                Select Year
                            </label>
                            <div class="col-sm-5">
                                <?php
                                  $Startyear=date('Y');
                                  $endYear=$Startyear+5;
                                  $yearArray = range($Startyear,$endYear);
                                  ?>
                                  <select class="form-control required" id="sel1" name="period_year"  style="display: block !important;">
                                    <?php
                                    foreach ($yearArray as $year) {
                                        // $selected = ($year == $Startyear) ? 'selected' : '';
                                        if(isset($period_year) && $period_year == $year){
                                          $selected = "selected";
                                        }else{
                                          $selected = "";
                                        }
                                        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                    }
                                    ?>
                                  </select>

                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('report_type', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                                <button type="submit" name="show" value="show" class="btn btn-success">
                                    Show
                                </button>
                                <!-- <button type="submit" name="export" value="export" class="btn btn-success">
                                    Export
                                </button> -->
                            </div>
                        </div>
                    {!! Form::close() !!}
            </div>
            <br />
            <div class="panel-body">
            <?php //echo $period_sel_income;
    // print_r($allsubscriptions);
    // echo '<br><br><br><br>';
    $re = array();
    foreach($allsubscriptions as $als){
      $re[$als->cd_id] = $als->period_sel_income;
    }
    // print_r($re);
    // echo '<br><br><br><br>';
    // print_r(array_unique($re));
    // echo '<br><br><br><br>';
    $ty = count(array_unique($re));
    // echo $ty;
    // echo '<br><br><br><br>';
    if($ty == 1){
      ///////////////////////////////// 3 MONThS OR SINGLE MONTH INDIVIDUALLY /////////////////////////
      // echo "///////////////////////////////// 3 MONTHS OR SINGLE MONTH INDIVIDUALLY /////////////////////////<br>";
      // echo "///////////////////////////////// INDIVIDUAL REPORT /////////////////////////<br>";
      $period_sel_income = array_values(array_unique($re))[0];
      $period_sel_income2 = array_values(($re));
      // print_r($period_sel_income);exit;
      ?>
      @if(isset($period_sel_income) && $period_sel_income != '' && $period_sel_income == 2)
        @if(isset($q_period_year) && $q_period_year != '')
        
        <main>
          <div id="details" class="clearfix">
            <div id="client" style="display:none;">
              <div class="to">INVOICE TO:</div>
              <h2 class="name">John Doe</h2>
              <div class="address">796 Silver Harbour, TX 79273, US</div>
              <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
            </div>
            <div id="invoice" style="text-align:center;">
              <h1>BAS REPORT</h1>
              <div class="date">Period  {{$q_period_year}}</div>
            </div>
          </div>
          @if($period_sel_income == 1)
            <table border="0" cellspacing="0" cellpadding="0" class="table-bordered">
              <tr>
                <td class="desc" colspan="5">INCOME</td>
              </tr>
              <tbody>
                <tr>
                  <td class="no">#</td>
                  <td class="desc"><h3>Items</h3></td>
                  <td class="unit">Client Input</td>
                  <td class="qty">GST on amount</td>
                  <td class="total">Amount after GST</td>
                </tr>
                <?php 
                $allsubscriptions->sel_incomes = json_decode($allsubscriptions->sel_incomes); 
                $allsubscriptions->multiple_income_alter_vals = json_decode($allsubscriptions->multiple_income_alter_vals); 
                $allsubscriptions->multiple_income_vals = json_decode($allsubscriptions->multiple_income_vals); 
                $allsubscriptions->multiple_income_percent = json_decode($allsubscriptions->multiple_income_percent); 
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
                    <td class="unit">$
                      @if(isset($single_income_alter_vals[$k]) && $single_income_alter_vals[$k] !='')
                        {{number_format((float)$single_income_alter_vals[$k], 2, '.', '')}}
                        <?php $s = number_format((float)$single_income_alter_vals[$k], 2, '.', ''); ?>
                      @else
                        {{number_format((float)$single_income_vals[$k], 2, '.', '')}}
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
                  <td class="desc" colspan="2"><h3>Total Income</h3></td>
                  <td class="unit">${{$tot_income}}</td>
                  <td class="qty">${{$a_income_gst_collected}}</td>
                  <td class="total">${{$after_gst_income}}</td>
                </tr>          
                <tr>
                  <td class="desc" colspan="5">EXPENSES</td>
                </tr>
                <tr>
                  <td class="no">#</td>
                  <td class="desc"><h3>Items</h3></td>
                  <td class="unit">Client Input</td>
                  <td class="qty">GST on amount</td>
                  <td class="total">Amount after GST</td>
                </tr>
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
                    <td class="unit">$@if(isset($single_expense_vals[$k]))
                      {{number_format((float)$single_expense_vals[$k], 2, '.', '')}}
                      <?php $s = number_format((float)$single_expense_vals[$k], 2, '.', ''); ?>
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
                  <td class="desc" colspan="2"><h3>Total Expense</h3></td>
                  <td class="unit">${{$tot_expense}}</td>
                  <td class="qty">${{$b_expense_gst_paid}}</td>
                  <td class="total">${{$after_gst_expense}}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <!-- <td colspan="2"></td> -->
                  <td colspan="4">NET INCOME</td>
                  <td>${{$net_income}}</td>
                </tr>
              </tfoot>
            </table>
          @elseif($period_sel_income == 2)
          <?php 
          // print_r($period_sel_income2);
          $nmn = 9; $nump = 3;
            // print_r($period_sel_income2);exit;
            foreach($period_sel_income2 as $p){
              if($p == 2)
                $nump += 6;
              else
                $nump += 2;
            }
            // echo $nump;
            // exit;

          if(isset($period_quarter) && count($period_quarter) == 2) $nmn = 15;
          if(isset($period_quarter) && count($period_quarter) == 3) $nmn = 21;
          if(isset($period_quarter) && count($period_quarter) == 4) $nmn = 27;

          ?>
          <div style="width: ;    overflow-x: scroll;">
            <table border="0" cellspacing="0" cellpadding="0" class="table-bordered">
                <tr>
                  <td class="desc" colspan="<?php echo $nump;?>">INCOME</td>
                </tr>
              <tbody>
                <tr>
                  <td class="no">#</td>
                  <td class="desc"><h3>Items</h3></td>
                  <?php 
                  foreach($allsubscriptions as $all){
                    $month_num = $all->q_period; 
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
                  <?php } ?>
                  <td class="total">Total Amount after GST</td>
                </tr>
                <?php 
                $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_income_after_gst_total = 0; $rst = 0;
                $arr1 = array();
                $arr2 = array();
                $arr3 = array();
                $arr4 = array();
                ?>
                @foreach($allsubscriptions as $all)
                <?php 
                $all->sel_incomes = json_decode($all->sel_incomes); 
                $all->multiple_income_alter_vals = json_decode($all->multiple_income_alter_vals); 
                $all->multiple_income_vals = json_decode($all->multiple_income_vals); 
                $all->multiple_income_percent = json_decode($all->multiple_income_percent); 
                // $all->sel_incomes = json_decode($all->sel_incomes); 
                // $all->sel_incomes = json_decode($all->sel_incomes); 
                // $all->sel_incomes = json_decode($all->sel_incomes); 
                // print_r($all->multiple_income_alter_vals);echo '<br>';echo '<br>';
                // print_r($all->multiple_income_vals);echo '<br>';echo '<br>';
                // print_r($all->multiple_income_percent);echo '<br>';echo '<br>';
                // echo count($all->sel_incomes);
                // print_r($all->sel_incomes);
                // echo '<br>';echo '<br>';
                ?>
                @for($k=0; $k<count($all->sel_incomes); $k++)
                <?php //print_r($all->sel_incomes);exit;
                // echo $k.'<br>';
                ?>
                  <tr role="row" class="odd" style="display:none;">       
                    <td class="no">{{$k+1}}</td>
                    <td class="sorting_1" width="20%" style="display:none;">
                      <?php
                      $parts = explode('_', $all->sel_incomes[$k]);
                      // print_r($parts);
                      // echo '>>>>>>>>>><br>';
                      // echo $parts[0];
                      // echo '>>>>>>>>>><br>';
                      
                      ?>
                      {{$parts[0]}}
                    </td>
                    <td class="unit" style="display:none;">$
                      @if(isset($all->multiple_income_alter_vals[$k][0]) && $all->multiple_income_alter_vals[$k][0] != '')
                        {{number_format((float)$all->multiple_income_alter_vals[$k][0], 2, '.', '')}}
                        <?php $s0 = number_format((float)$all->multiple_income_alter_vals[$k][0], 2, '.', ''); 
                              $s00 += $s0;
                        ?>
                      @else
                        {{number_format((float)$all->multiple_income_vals[$k][0], 2, '.', '')}}
                        <?php $s0 = number_format((float)$all->multiple_income_vals[$k][0], 2, '.', ''); 
                              $s00 += $s0;
                        ?>
                      @endif</td>
                    <td class="qty" style="display:none;">$
                      @if(isset($all->multiple_income_percent[$k][0]) && $all->multiple_income_percent[$k][0]!=0)
                        @if(isset($all->multiple_income_alter_vals[$k][0]) && $all->multiple_income_alter_vals[$k][0] != '')
                          {{number_format((float)$all->multiple_income_alter_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                          <?php $p0 = number_format((float)$all->multiple_income_alter_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                $p00 += $p0;
                          ?>
                        @else
                          {{number_format((float)$all->multiple_income_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                          <?php $p0 = number_format((float)$all->multiple_income_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                $p00 += $p0;
                          ?>
                        @endif
                      @else
                        {{number_format((float)0, 2, '.', '')}}
                        <?php $p0 = number_format((float)0, 2, '.', ''); 
                              $p00 += $p0;
                        ?>
                      @endif</td>
                    <td class="unit" style="display:none;">$
                      @if(isset($all->multiple_income_alter_vals[$k][1]) && $all->multiple_income_alter_vals[$k][1] != '')
                        {{number_format((float)$all->multiple_income_alter_vals[$k][1], 2, '.', '')}}
                        <?php $s1 = number_format((float)$all->multiple_income_alter_vals[$k][1], 2, '.', ''); 
                              $s11 += $s1;
                        ?>
                      @else
                        {{number_format((float)$all->multiple_income_vals[$k][1], 2, '.', '')}}
                        <?php $s1 = number_format((float)$all->multiple_income_vals[$k][1], 2, '.', ''); 
                              $s11 += $s1;
                        ?>
                      @endif</td>
                    <td class="qty" style="display:none;">$
                      @if(isset($all->multiple_income_percent[$k][1]) && $all->multiple_income_percent[$k][1]!=0)
                        @if(isset($all->multiple_income_alter_vals[$k][1]) && $all->multiple_income_alter_vals[$k][1] != '')
                          {{number_format((float)$all->multiple_income_alter_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                          <?php $p1 = number_format((float)$all->multiple_income_alter_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                $p11 += $p1;
                          ?>
                        @else
                          {{number_format((float)$all->multiple_income_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                          <?php $p1 = number_format((float)$all->multiple_income_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                $p11 += $p1;
                          ?>
                        @endif
                      @else
                        {{number_format((float)0, 2, '.', '')}}
                        <?php $p1 = number_format((float)0, 2, '.', ''); 
                              $p11 += $p1;
                        ?>
                      @endif</td>
                    <td class="unit" style="display:none;">$
                      @if(isset($all->multiple_income_alter_vals[$k][2]) && $all->multiple_income_alter_vals[$k][2] != '')
                        {{number_format((float)$all->multiple_income_alter_vals[$k][2], 2, '.', '')}}
                        <?php $s2 = number_format((float)$all->multiple_income_alter_vals[$k][2], 2, '.', ''); 
                              $s22 += $s2;
                        ?>
                      @else
                        {{number_format((float)$all->multiple_income_vals[$k][2], 2, '.', '')}}
                        <?php $s2 = number_format((float)$all->multiple_income_vals[$k][2], 2, '.', ''); 
                              $s22 += $s2;
                        ?>
                      @endif</td>    
                    <td class="qty" style="display:none;">$
                      @if(isset($all->multiple_income_percent[$k][2]) && $all->multiple_income_percent[$k][2]!=0)
                        @if(isset($all->multiple_income_alter_vals[$k][2]) && $all->multiple_income_alter_vals[$k][2] != '')
                          {{number_format((float)$all->multiple_income_alter_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                          <?php $p2 = number_format((float)$all->multiple_income_alter_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                $p22 += $p2;
                          ?>
                        @else
                          {{number_format((float)$all->multiple_income_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                          <?php $p2 = number_format((float)$all->multiple_income_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                $p22 += $p2;
                          ?>
                        @endif
                      @else
                        {{number_format((float)0, 2, '.', '')}}
                        <?php $p2 = number_format((float)0, 2, '.', ''); 
                              $p22 += $p2;
                        ?>
                      @endif              </td>
                    
                    <td class="unit" style="display:none;"></td>
                    <td class="qty" style="display:none;"></td>
                    <td class="unit" style="display:none;"></td>
                    <td class="qty" style="display:none;"></td>
                    <td class="unit" style="display:none;"></td>
                    <td class="qty" style="display:none;"></td>

                    <td class="total">${{number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', '')}}
                      <?php $x_income_after_gst_total += number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', ''); ?>
                    </td>
                  </tr>
                  <?php
                  // echo '>>>>>>>>>><br>';
                      $arr1[$rst][$parts[0]] = array($s0,$p0,$s1,$p1,$s2,$p2);

                  ?>
                @endfor
                <?php $rst++; ?>
                @endforeach
                <?php 
                // echo '---<br>';
                // echo '<br>=============================<br>';
                // print_r($arr1[0]);
                // echo '<br>=============================<br>';
                // print_r($arr1[3]);
                // echo '<br>=============================<br>';


                // echo '<br>=============================<br>';



                //       foreach ($arr1[1] as $key=> $value){
                //          $output[$key]=(array_key_exists($key, $arr1[0])) ? NULL : $arr1[0][$key];
                //       }
                // print_r($output);
                if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2]) && isset($arr1[3])){
                    $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2]), array_keys($arr1[3])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc4'] = isset($arr1[3][$k]) ? $arr1[3][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    // $final_ar = array();
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2'], $result1[$k]['doc3'], $result1[$k]['doc4']);
                    }
                    // echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
                    // print_r($final_ar);
                    // print_r($result1);
                    // exit;
                }else if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2])){
                    $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2'], $result1[$k]['doc3']);
                    }
                }else if(isset($arr1[0]) && isset($arr1[1])){
                    $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2']);
                    }
                }else if(isset($arr1[0])){
                    $keys = array_flip(array_merge(array_keys($arr1[0])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1']);
                    }
                }
                

                

                // print_r($final_ar);








                // exit;


                // $ttt = array();
                // foreach($arr1 as $rrr){
                //   // print_r($rrr);echo '---<br>';
                //   $ttt = array_merge_recursive($ttt, $rrr);

                // }
                // echo '<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>><br>';
                // print_r($ttt);
                // $l = max($ttt);
                $counts = array_map('count', $final_ar);
                // $key = array_flip($counts)[max($counts)];
                // $largest_arr = $ttt[$key];
                // echo 'large val===>>> <br>';
                // print_r($counts);
                // exit;
                $ccv = max($counts);
                // echo ($ccv);
                $sd = 1;$sk=0;
                ?>

                @foreach($final_ar as $key=>$rt)
                <tr>
                  <td class="unit">{{$sd}}</td>
                  <td>{{$key}}</td>
                  <?php $nt_i = 0; $nt_p = 0; ?>
                  @for($fc=0; $fc<$ccv; $fc++)

                  <td class="unit">
                    @if(isset($rt[$fc]))
                      ${{$rt[$fc]}}
                      <?php 
                        if($fc%2==0){
                          $nt_i += $rt[$fc]; 
                        }
                        if($fc%2!=0){
                          $nt_p += $rt[$fc]; 
                        }
                      ?>
                    @else
                      0.00
                    @endif</td>
                  @endfor
                  <td>${{number_format((float)($nt_i - $nt_p), 2, '.', '')}}</td>
                </tr>
                <?php $sd++; $sk++; ?>
                @endforeach

                <?php //exit; ?>
                <tr class="mkred">
                  <!-- <td class="no"></td> -->
                  <td class="desc" colspan="<?php echo $nump-1;?>"><h3>Total Income</h3></td>
                  <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
                  <td class="total">${{$x_income_after_gst_total}}</td>
                </tr>          
                <tr>
                  <td class="desc" colspan="<?php echo $nump;?>">EXPENSES</td>
                </tr>
                <tr>
                  <td class="no">#</td>
                  <td class="desc"><h3>Items</h3></td>
                  <?php 
                  foreach($allsubscriptions as $all){
                    $month_num = $all->q_period; 
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
                  <?php } ?>
                  <td class="total">Total Amount after GST</td>
                </tr>
                <?php 
                $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_expense_after_gst_total = 0; $rst = 0;
                $arr1 = array();
                $arr2 = array();
                $arr3 = array();
                $arr4 = array();
                ?>
                @foreach($allsubscriptions as $all)
                <?php 
                $all->sel_expenses = json_decode($all->sel_expenses); 
                $all->multiple_expense_alter_vals = json_decode($all->multiple_expense_alter_vals); 
                $all->multiple_expense_vals = json_decode($all->multiple_expense_vals); 
                $all->multiple_expense_percent = json_decode($all->multiple_expense_percent); 
                // $all->sel_expenses = json_decode($all->sel_expenses); 
                // $all->sel_expenses = json_decode($all->sel_expenses); 
                // $all->sel_expenses = json_decode($all->sel_expenses); 
                // print_r($all->multiple_expense_alter_vals);echo '<br>';echo '<br>';
                // print_r($all->multiple_expense_vals);echo '<br>';echo '<br>';
                // print_r($all->multiple_expense_percent);echo '<br>';echo '<br>';
                // echo count($all->sel_expenses);
                // print_r($all->sel_expenses);
                // echo '<br>';echo '<br>';
                ?>
                @for($k=0; $k<count($all->sel_expenses); $k++)
                <?php //print_r($all->sel_expenses);exit;
                // echo $k.'<br>';
                ?>
                  <tr role="row" class="odd" style='display:none;'>       
                    <td class="no">{{$k+1}}</td>
                    <td class="sorting_1" width="20%">
                      <?php
                      $parts = explode('_', $all->sel_expenses[$k]);
                      // print_r($parts);
                      ?>
                      {{$parts[0]}}
                    </td>
                    <td class="unit">$@if(isset($all->multiple_expense_vals[$k][0]))
                      {{number_format((float)$all->multiple_expense_vals[$k][0], 2, '.', '')}}
                      <?php $s0 = number_format((float)$all->multiple_expense_vals[$k][0], 2, '.', ''); 
                            $s00 += $s0;
                      ?>
                      @endif</td>
                    <td class="qty">$@if(isset($all->multiple_expense_percent[$k][0]) && $all->multiple_expense_percent[$k][0]!=0)
                      {{number_format((float)$all->multiple_expense_vals[$k][0]/number_format((float)$all->multiple_expense_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                      <?php $p0 = number_format((float)$all->multiple_expense_vals[$k][0]/number_format((float)$all->multiple_expense_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                            $p00 += $p0;
                      ?>
                      @else
                      {{number_format((float)0, 2, '.', '')}}
                      <?php $p0 = number_format((float)0, 2, '.', ''); 
                            $p00 += $p0;
                      ?>
                      @endif</td>
                    <td class="unit">$@if(isset($all->multiple_expense_vals[$k][1]))
                      {{number_format((float)$all->multiple_expense_vals[$k][1], 2, '.', '')}}
                      <?php $s1 = number_format((float)$all->multiple_expense_vals[$k][1], 2, '.', ''); 
                            $s11 += $s1;
                      ?>
                      @endif</td>
                    <td class="qty">$@if(isset($all->multiple_expense_percent[$k][1]) && $all->multiple_expense_percent[$k][1]!=0)
                      {{number_format((float)$all->multiple_expense_vals[$k][1]/number_format((float)$all->multiple_expense_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                      <?php $p1 = number_format((float)$all->multiple_expense_vals[$k][1]/number_format((float)$all->multiple_expense_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                            $p11 += $p1;
                      ?>
                      @else
                      {{number_format((float)0, 2, '.', '')}}
                      <?php $p1 = number_format((float)0, 2, '.', ''); 
                            $p11 += $p1;
                      ?>
                      @endif</td>
                    <td class="unit">$@if(isset($all->multiple_expense_vals[$k][2]))
                      {{number_format((float)$all->multiple_expense_vals[$k][2], 2, '.', '')}}
                      <?php $s2 = number_format((float)$all->multiple_expense_vals[$k][2], 2, '.', ''); 
                            $s22 += $s2;
                      ?>
                      @endif</td>    
                    <td class="qty">$@if(isset($all->multiple_expense_percent[$k][2]) && $all->multiple_expense_percent[$k][2]!=0)
                      {{number_format((float)$all->multiple_expense_vals[$k][2]/number_format((float)$all->multiple_expense_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                      <?php $p2 = number_format((float)$all->multiple_expense_vals[$k][2]/number_format((float)$all->multiple_expense_percent[$k][2], 2, '.', ''), 2, '.', ''); 
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
                <?php
                  // echo '>>>>>>>>>><br>';
                      $arr2[$rst][$parts[0]] = array($s0,$p0,$s1,$p1,$s2,$p2);

                  ?>
                @endfor
                <?php $rst++; ?>
                @endforeach
                <?php 
                // echo '---<br>';
                // echo '<br>=============================<br>';
                // print_r($arr1[0]);
                // echo '<br>=============================<br>';
                // print_r($arr1[3]);
                // echo '<br>=============================<br>';


                // echo '<br>=============================<br>';



                //       foreach ($arr1[1] as $key=> $value){
                //          $output[$key]=(array_key_exists($key, $arr1[0])) ? NULL : $arr1[0][$key];
                //       }
                // print_r($arr2);
                if(isset($arr2[0]) && isset($arr2[1]) && isset($arr2[2]) && isset($arr2[3])){
                    $keys = array_flip(array_merge(array_keys($arr2[0]), array_keys($arr2[1]), array_keys($arr2[2]), array_keys($arr2[3])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc2'] = isset($arr2[1][$k]) ? $arr2[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc3'] = isset($arr2[2][$k]) ? $arr2[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc4'] = isset($arr2[3][$k]) ? $arr2[3][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    // $final_ar2 = array();
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1'], $result2[$k]['doc2'], $result2[$k]['doc3'], $result2[$k]['doc4']);
                    }
                    // echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
                    // print_r($final_ar2);
                    // print_r($result2);
                    // exit;
                }else if(isset($arr2[0]) && isset($arr2[1]) && isset($arr2[2])){
                    $keys = array_flip(array_merge(array_keys($arr2[0]), array_keys($arr2[1]), array_keys($arr2[2])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc2'] = isset($arr2[1][$k]) ? $arr2[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc3'] = isset($arr2[2][$k]) ? $arr2[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1'], $result2[$k]['doc2'], $result2[$k]['doc3']);
                    }
                }else if(isset($arr2[0]) && isset($arr2[1])){
                    $keys = array_flip(array_merge(array_keys($arr2[0]), array_keys($arr2[1])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc2'] = isset($arr2[1][$k]) ? $arr2[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1'], $result2[$k]['doc2']);
                    }
                }else if(isset($arr2[0])){
                    $keys = array_flip(array_merge(array_keys($arr2[0])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1']);
                    }
                }
                

                

                // print_r($final_ar2);








                // exit;


                // $ttt = array();
                // foreach($arr1 as $rrr){
                //   // print_r($rrr);echo '---<br>';
                //   $ttt = array_merge_recursive($ttt, $rrr);

                // }
                // echo '<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>><br>';
                // print_r($ttt);
                // $l = max($ttt);
                $counts = array_map('count', $final_ar2);
                // $key = array_flip($counts)[max($counts)];
                // $largest_arr = $ttt[$key];
                // echo 'large val===>>> <br>';
                // print_r($counts);
                // exit;
                $ccv = max($counts);
                // echo ($ccv);
                $sd = 1;$sk=0;
                ?>
                @foreach($final_ar2 as $key=>$rt)
                <tr>
                  <td class="unit">{{$sd}}</td>
                  <td>{{$key}}</td>
                  <?php $nt_i = 0; $nt_p = 0; ?>
                  @for($fc=0; $fc<$ccv; $fc++)

                  <td class="unit">
                    @if(isset($rt[$fc]))
                      ${{$rt[$fc]}}
                      <?php 
                        if($fc%2==0){
                          $nt_i += $rt[$fc]; 
                        }
                        if($fc%2!=0){
                          $nt_p += $rt[$fc]; 
                        }
                      ?>
                    @else
                      0.00
                    @endif</td>
                  @endfor
                  <td>${{number_format((float)($nt_i - $nt_p), 2, '.', '')}}</td>
                </tr>
                <?php $sd++; $sk++; ?>
                @endforeach
                <?php //exit;?>
                <tr class="mkred">
                  <!-- <td class="no"></td> -->
                  <td class="desc" colspan="<?php echo $nump-1;?>"><h3>Total Expense</h3></td>
                  <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
                  <td class="total">${{$x_expense_after_gst_total}}</td>
                </tr>  
              </tbody>
              <tfoot>
                <tr>
                  <!-- <td colspan="5"></td> -->
                  <td colspan="<?php echo $nump-1;?>">NET INCOME</td>
                  <td>${{$x_income_after_gst_total - $x_expense_after_gst_total}}</td>
                </tr>
              </tfoot>
            </table>
          </div>
          @endif
          <!-- <div id="thanks">Thank you!</div> -->
          
        </main>
        
        <!-- <footer>
          Report was created on a computer and is valid without the signature and seal.
        </footer> -->
        @endif
      @endif

      @if(isset($period_sel_income) && $period_sel_income != '' &&  $period_sel_income == 1)
          @if(isset($q_period_year) && $q_period_year != '')
            
            <main>
            <div id="details" class="clearfix">
              <div id="client" style="display:none;">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">John Doe</h2>
                <div class="address">796 Silver Harbour, TX 79273, US</div>
                <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
              </div>
              <div id="invoice" style="text-align:center;">
                <h1>BAS REPORT</h1>
                <div class="date">Period  {{$q_period_year}}</div>
              </div>
            </div>
            @if($period_sel_income == 1)
            <?php 
            $nmn = 5; 
            $nmn = 9; $nump = 3;
            // print_r($period_sel_income2);exit;
            foreach($period_sel_income2 as $p){
              if($p == 2)
                $nump += 6;
              else
                $nump += 2;
            }
            // echo $nump;
            // exit;
            if(isset($period_quarter) && count($period_quarter) == 2) $nmn = 7;
            if(isset($period_quarter) && count($period_quarter) == 3) $nmn = 9;
            if(isset($period_quarter) && count($period_quarter) == 4) $nmn = 11;

            ?>
            <div style="width: ;    overflow-x: scroll;">
              <table border="0" cellspacing="0" cellpadding="0" class="table-bordered">
                <tr>
                  <td class="desc" colspan="<?php echo $nump; ?>">INCOME</td>
                </tr>
                <tbody>
                  <tr>
                    <td class="no">#</td>
                    <td class="desc"><h3>Items</h3></td>
                    <?php 
                    foreach($allsubscriptions as $all){
                      $month_num = $all->q_period; 
                      $text = 'Client Input ';
                    ?>
                    <td class="unit">
                      {{$text}} {{$all->cd_id}}
                    @for($f=0;$f<3;$f++)
                      
                        <?php 
                        $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                        echo '<br>'.$month_name."\n"; 
                        $month_num++;
                        ?>
                      
                    @endfor
                    </td>
                      <td class="qty">GST on amount</td>
                    <?php } ?>
                    <td class="total">Total Amount after GST</td>
                  </tr>
                  <?php 
                  $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_expense_after_gst_total = 0; $rst = 0; $after_gst_income =0; 
                  $arr1 = array();

                  ?>
                  @foreach($allsubscriptions as $all)
                    <?php 
                    $all->sel_incomes = json_decode($all->sel_incomes); 
                    $all->single_income_alter_vals = json_decode($all->single_income_alter_vals);
                    $all->single_income_percent = json_decode($all->single_income_percent);
                    $all->single_income_vals = json_decode($all->single_income_vals);
                    // print_r($all->single_income_alter_vals);
                    $all->multiple_income_alter_vals = json_decode($all->multiple_income_alter_vals);
                    $all->multiple_income_vals = json_decode($all->multiple_income_vals); 
                    $all->multiple_income_percent = json_decode($all->multiple_income_percent); 
                    ?>
                    @for($k=0; $k<count($all->sel_incomes); $k++)
                      <tr role="row" class="odd" style='display:none;'>       
                        <td class="no">{{$k+1}}</td>
                        <td class="sorting_1" width="20%">
                          <?php
                          $parts = explode('_', $all->sel_incomes[$k]);
                          // print_r($parts);
                          ?>
                          {{$parts[0]}}
                        </td>
                        <td class="unit">$
                          @if(isset($all->single_income_alter_vals[$k]) && $all->single_income_alter_vals[$k] !='')
                            {{number_format((float)$all->single_income_alter_vals[$k], 2, '.', '')}}
                            <?php 
                            $s = number_format((float)$all->single_income_alter_vals[$k], 2, '.', ''); 
                            $s00 += $s;
                            ?>
                          @else
                            {{number_format((float)$all->single_income_vals[$k], 2, '.', '')}}
                            <?php 
                            $s = number_format((float)$all->single_income_vals[$k], 2, '.', ''); 
                            $s00 += $s;
                            ?>
                          @endif</td>
                        <td class="qty">$
                          @if(isset($all->single_income_percent[$k]) && $all->single_income_percent[$k]!=0)
                            @if(isset($all->single_income_alter_vals[$k]) && $all->single_income_alter_vals[$k] !='')
                              {{number_format((float)$all->single_income_alter_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', '')}}
                              <?php 
                              $p = number_format((float)$all->single_income_alter_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', ''); 
                              $p00 += $p;
                              ?>
                            @else
                              {{number_format((float)$all->single_income_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', '')}}
                              <?php 
                              $p = number_format((float)$all->single_income_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', ''); 
                              $p00 += $p;
                              ?>
                            @endif
                          @else
                            {{number_format((float)0, 2, '.', '')}}
                            <?php $p = number_format((float)0, 2, '.', ''); ?>
                          @endif</td>
                        <td class="total">
                          ${{number_format((float)($s-$p), 2, '.', '')}}
                          <?php //$after_gst_income = number_format((float)($s-$p), 2, '.', ''); ?>
                          <?php $after_gst_income += number_format((float)(($s-$p)), 2, '.', ''); ?>
                        </td>
                      </tr>
                      <?php
                        // echo '>>>>>>>>>><br>';
                        $arr1[$rst][$parts[0]] = array($s,$p);

                      ?>
                    @endfor
                    <?php $rst++; ?>
                  @endforeach
                  <tr class="mkred" style='display:none;'>
                    <!-- <td class="no"></td> -->
                    <td class="desc" colspan="2"><h3>Total Income</h3></td>
                    <!-- <td class="unit">$</td> -->
                    <!-- <td class="qty">$</td> -->
                    <td class="total">${{$after_gst_income}}</td>
                  </tr>  

                  <?php 
                  // echo '<pre>';
                  // print_r($arr1);
                  ?>
                  <?php 
                  // echo '---<br>';
                  // echo '<br>=============================<br>';
                  // print_r($arr1[0]);
                  // echo '<br>=============================<br>';
                  // print_r($arr1[3]);
                  // echo '<br>=============================<br>';


                  // echo '<br>=============================<br>';



                  //       foreach ($arr1[1] as $key=> $value){
                  //          $output[$key]=(array_key_exists($key, $arr1[0])) ? NULL : $arr1[0][$key];
                  //       }
                  // print_r($output);
                  if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2]) && isset($arr1[3])){
                      $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2]), array_keys($arr1[3])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00');
                        $result1[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00');
                        $result1[$k]['doc4'] = isset($arr1[3][$k]) ? $arr1[3][$k] : array('0.00','0.00');
                        $df++;
                      }
                      // $final_ar = array();
                      foreach($result1 as $k=>$res){
                        $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2'], $result1[$k]['doc3'], $result1[$k]['doc4']);
                      }
                      // echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
                      // print_r($final_ar);
                      // print_r($result1);
                      // exit;
                  }else if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2])){
                      $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00');
                        $result1[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00');
                        $df++;
                      }
                      foreach($result1 as $k=>$res){
                        $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2'], $result1[$k]['doc3']);
                      }
                  }else if(isset($arr1[0]) && isset($arr1[1])){
                      $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00');
                        $df++;
                      }
                      foreach($result1 as $k=>$res){
                        $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2']);
                      }
                  }else if(isset($arr1[0])){
                      $keys = array_flip(array_merge(array_keys($arr1[0])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $df++;
                      }
                      foreach($result1 as $k=>$res){
                        $final_ar[$k] = array_merge_recursive($result1[$k]['doc1']);
                      }
                  }
                  

                  // $ttt = array();
                  // foreach($arr1 as $rrr){
                  //   // print_r($rrr);echo '---<br>';
                  //   $ttt = array_merge_recursive($ttt, $rrr);

                  // }
                  // echo '<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>><br>';
                  // print_r($ttt);
                  // $l = max($ttt);
                  $counts = array_map('count', $final_ar);
                  // $key = array_flip($counts)[max($counts)];
                  // $largest_arr = $ttt[$key];
                  // echo 'large val===>>> <br>';
                  // print_r($counts);
                  // exit;
                  $ccv = max($counts);
                  // echo ($ccv);
                  $sd = 1;$sk=0;
                  ?>

                  @foreach($final_ar as $key=>$rt)
                  <tr>
                    <td class="unit">{{$sd}}</td>
                    <td>{{$key}}</td>
                    <?php $nt_i = 0; $nt_p = 0; ?>
                    @for($fc=0; $fc<$ccv; $fc++)

                    <td class="unit">
                      @if(isset($rt[$fc]))
                        ${{$rt[$fc]}}
                        <?php 
                          if($fc%2==0){
                            $nt_i += $rt[$fc]; 
                          }
                          if($fc%2!=0){
                            $nt_p += $rt[$fc]; 
                          }
                        ?>
                      @else
                        0.00
                      @endif</td>
                    @endfor
                    <td>${{number_format((float)($nt_i - $nt_p), 2, '.', '')}}</td>
                  </tr>
                  <?php $sd++; $sk++; ?>
                  @endforeach

                  <?php //exit; ?>
                  <tr class="mkred">
                    <!-- <td class="no"></td> -->
                    <td class="desc" colspan="<?php echo $nump-1; ?>"><h3>Total Income</h3></td>
                    <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                    <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                    <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                    <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                    <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                    <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
                    <td class="total">${{$after_gst_income}}</td>
                  </tr>          
                  <tr>
                    <td class="desc" colspan="<?php echo $nump;  ?>">EXPENSES</td>
                  </tr>
                  <tr>
                    <td class="no">#</td>
                    <td class="desc"><h3>Items</h3></td>
                    <?php 
                    foreach($allsubscriptions as $all){
                      $month_num = $all->q_period; 
                      $text = 'Client Input ';
                    ?>
                    <td class="unit">
                      {{$text}} {{$all->cd_id}}
                    @for($f=0;$f<3;$f++)
                      
                        <?php 
                        $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                        echo '<br>'.$month_name."\n"; 
                        $month_num++;
                        ?>
                      
                    @endfor
                    </td>
                      <td class="qty">GST on amount</td>
                    <?php } ?>
                    <td class="total">Total Amount after GST</td>
                  </tr>
                  
                  <?php 
                  $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_expense_after_gst_total = 0; $rst = 0; $after_gst_expense =0; 
                  $arr1 = array();

                  ?>
                  @foreach($allsubscriptions as $all)
                    <?php 
                    $all->sel_expenses = json_decode($all->sel_expenses); 
                    // $all->single_income_alter_vals = json_decode($all->single_income_alter_vals);
                    $all->single_expense_percent = json_decode($all->single_expense_percent);
                    $all->single_expense_vals = json_decode($all->single_expense_vals);
                    // print_r($all->single_income_alter_vals);
                    // $all->multiple_income_alter_vals = json_decode($all->multiple_income_alter_vals);
                    // $all->multiple_income_vals = json_decode($all->multiple_income_vals); 
                    // $all->multiple_income_percent = json_decode($all->multiple_income_percent); 
                    ?>
                    @for($k=0; $k<count($all->sel_expenses); $k++)
                      <tr role="row" class="odd" style='display:none;'>       
                        <td class="no">{{$k+1}}</td>
                        <td class="sorting_1" width="20%">
                          <?php
                          $parts = explode('_', $all->sel_expenses[$k]);
                          // print_r($parts);
                          ?>
                          {{$parts[0]}}
                        </td>

                      <td class="unit">$@if(isset($all->single_expense_vals[$k]))
                        {{number_format((float)$all->single_expense_vals[$k], 2, '.', '')}}
                        <?php 
                              $s = number_format((float)$all->single_expense_vals[$k], 2, '.', ''); 
                              $s00 += $s;
                        ?>
                        @endif</td>
                      <td class="qty">$@if(isset($all->single_expense_percent[$k]) && $all->single_expense_percent[$k]!=0)
                        {{number_format((float)$all->single_expense_vals[$k]/number_format((float)$all->single_expense_percent[$k], 2, '.', ''), 2, '.', '')}}
                        <?php 
                              $p = number_format((float)$all->single_expense_vals[$k]/number_format((float)$all->single_expense_percent[$k], 2, '.', ''), 2, '.', ''); 
                              $p00 += $p;
                        ?>
                        @else
                        {{number_format((float)0, 2, '.', '')}}
                        <?php 
                              $p = number_format((float)0, 2, '.', ''); 
                              $p00 += $p;
                        ?>
                        @endif</td>          
                        <td class="total">
                          ${{number_format((float)($s-$p), 2, '.', '')}}
                          <?php //$after_gst_income = number_format((float)($s-$p), 2, '.', ''); ?>
                          <?php $after_gst_expense += number_format((float)(($s-$p)), 2, '.', ''); ?>
                        </td>
                      </tr>
                      <?php
                        // echo '>>>>>>>>>><br>';
                        $arr1[$rst][$parts[0]] = array($s,$p);

                      ?>
                    @endfor
                    <?php $rst++; ?>
                  @endforeach
                  <tr class="mkred" style='display:none;'>
                    <!-- <td class="no"></td> -->
                    <td class="desc" colspan="2"><h3>Total Expense</h3></td>
                    <!-- <td class="unit">$</td> -->
                    <!-- <td class="qty">$</td> -->
                    <td class="total">${{$after_gst_expense}}</td>
                  </tr>  

                  <?php 
                  // echo '<pre>';
                  // echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
                  // print_r($arr1);
                  ?>

                  
                  <?php 
                  // echo '---<br>';
                  // echo '<br>=============================<br>';
                  // print_r($arr1[0]);
                  // echo '<br>=============================<br>';
                  // print_r($arr1[3]);
                  // echo '<br>=============================<br>';


                  // echo '<br>=============================<br>';



                  //       foreach ($arr1[1] as $key=> $value){
                  //          $output[$key]=(array_key_exists($key, $arr1[0])) ? NULL : $arr1[0][$key];
                  //       }
                  // print_r($output);
                  if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2]) && isset($arr1[3])){
                      $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2]), array_keys($arr1[3])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1_22[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $result1_22[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00');
                        $result1_22[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00');
                        $result1_22[$k]['doc4'] = isset($arr1[3][$k]) ? $arr1[3][$k] : array('0.00','0.00');
                        $df++;
                      }
                      // $final_ar = array();
                      foreach($result1_22 as $k=>$res){
                        $final_ar_22[$k] = array_merge_recursive($result1_22[$k]['doc1'], $result1_22[$k]['doc2'], $result1_22[$k]['doc3'], $result1_22[$k]['doc4']);
                      }
                      // echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
                      // print_r($final_ar);
                      // print_r($result1_22);
                      // exit;
                  }else if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2])){
                      $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1_22[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $result1_22[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00');
                        $result1_22[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00');
                        $df++;
                      }
                      foreach($result1_22 as $k=>$res){
                        $final_ar_22[$k] = array_merge_recursive($result1_22[$k]['doc1'], $result1_22[$k]['doc2'], $result1_22[$k]['doc3']);
                      }
                  }else if(isset($arr1[0]) && isset($arr1[1])){
                      $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1_22[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $result1_22[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00');
                        $df++;
                      }
                      foreach($result1_22 as $k=>$res){
                        $final_ar_22[$k] = array_merge_recursive($result1_22[$k]['doc1'], $result1_22[$k]['doc2']);
                      }
                  }else if(isset($arr1[0])){
                      $keys = array_flip(array_merge(array_keys($arr1[0])));
                      // print_r($keys);
                      // create new array
                      $df=0;
                      foreach($keys as $k=>$v) {
                        // echo '-'.$df.'<br>';
                        $result1_22[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00');
                        $df++;
                      }
                      foreach($result1_22 as $k=>$res){
                        $final_ar_22[$k] = array_merge_recursive($result1_22[$k]['doc1']);
                      }
                  }
                  
                  // print_r($final_ar_22);
                  // $ttt = array();
                  // foreach($arr1 as $rrr){
                  //   // print_r($rrr);echo '---<br>';
                  //   $ttt = array_merge_recursive($ttt, $rrr);

                  // }
                  // echo '<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>><br>';
                  // print_r($ttt);
                  // $l = max($ttt);
                  $counts = array_map('count', $final_ar_22);
                  // $key = array_flip($counts)[max($counts)];
                  // $largest_arr = $ttt[$key];
                  // echo 'large val===>>> <br>';
                  // print_r($counts);
                  // exit;
                  $ccv = max($counts);
                  // echo ($ccv);
                  $sd = 1;$sk=0;
                  ?>

                  @foreach($final_ar_22 as $key=>$rt)
                  <tr>
                    <td class="unit">{{$sd}}</td>
                    <td>{{$key}}</td>
                    <?php $nt_i = 0; $nt_p = 0; ?>
                    @for($fc=0; $fc<$ccv; $fc++)

                    <td class="unit">
                      @if(isset($rt[$fc]))
                        ${{$rt[$fc]}}
                        <?php 
                          if($fc%2==0){
                            $nt_i += $rt[$fc]; 
                          }
                          if($fc%2!=0){
                            $nt_p += $rt[$fc]; 
                          }
                        ?>
                      @else
                        0.00
                      @endif</td>
                    @endfor
                    <td>${{number_format((float)($nt_i - $nt_p), 2, '.', '')}}</td>
                  </tr>
                  <?php $sd++; $sk++; ?>
                  @endforeach

                  <?php //exit; ?>
                  <tr class="mkred">
                    <!-- <td class="no"></td> -->
                    <td class="desc" colspan="<?php echo $nump-1; ?>"><h3>Total Expense</h3></td>
                    <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                    <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                    <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                    <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                    <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                    <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
                    <td class="total">${{number_format((float)(($after_gst_expense)), 2, '.', '') }}</td>
                  </tr>   
                  
                </tbody>
                <tfoot>
                  <tr>
                    <!-- <td colspan="5"></td> -->
                    <td colspan="<?php echo $nump-1;?>">NET INCOME</td>
                    <td>${{$after_gst_income - $after_gst_expense}}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
              @endif
            </main>
            <!-- <footer>
              Report was created on a computer and is valid without the signature and seal.
            </footer> -->
          @endif
      @endif
      <?php 
    }elseif($ty == 2){
      ///////////////////////////////// 3 MONThS OR SINGLE MONTH COMBINED /////////////////////////
      // echo "///////////////////////////////// 3 MONTHS OR SINGLE MONTH COMBINED /////////////////////////<br>";
      // echo "///////////////////////////////// COMBINED REPORT /////////////////////////<br>";
      $period_sel_income = ($re);
      // print_r($period_sel_income);
      // echo 'yesy';
      ?>
      
      <?php
      //--------------------------------------------------------------------------------------------

          $nmn = 9; $nump = 3;
          foreach($period_sel_income as $p){
            if($p == 2)
              $nump += 6;
            else
              $nump += 2;
          }
          // echo $nump;
          // exit;
          // echo 'aaa'.count($period_quarter);
          if(isset($period_quarter) && count($period_quarter) == 2) $nmn = 11;
          if(isset($period_quarter) && count($period_quarter) == 3) $nmn = 21;
          if(isset($period_quarter) && count($period_quarter) == 4) $nmn = 27;

          ?>
          <div style="width: ;    overflow-x: scroll;">
            <table border="0" cellspacing="0" cellpadding="0" class="table-bordered">
                <tr>
                  <td class="desc" colspan="<?php echo $nump;?>">INCOME</td>
                </tr>
              <tbody>
                <tr>
                  <td class="no">#</td>
                  <td class="desc"><h3>Items</h3></td>
                  <?php 
                  $totaltd=0;
                  foreach($allsubscriptions as $all){
                    $month_num = $all->q_period; 
                    if($all->period_sel_income == 2){//{echo $all->period_sel_income;}
                  ?>
                  @for($f=0;$f<3;$f++)
                    <td class="unit">
                      <?php 
                      $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                      echo $all->cd_id.'-'.$all->period_sel_income.'--'.'Client Input <br>'.$month_name."\n"; 
                      $month_num++;$totaltd+=2;
                      ?>
                    </td>
                    <td class="qty">GST on amount</td>
                  @endfor
                  <?php 
                    }else{ $text = "Client Input ";$totaltd+=2;?>
                      <td class="unit">
                      {{$text}} {{$all->cd_id}}
                    @for($f=0;$f<3;$f++)
                      
                        <?php 
                        $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                        echo '<br>'.$month_name."\n"; 
                        $month_num++;
                        ?>
                      
                    @endfor
                    </td>
                      <td class="qty">GST on amount</td>
                      <?php
                    }
                  } ?>
                  <td class="total">Total Amount after GST</td>
                </tr>
                <?php 
                
                  $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_income_after_gst_total = 0; $rst = 0;
                  $arr1 = array();
                  $arr2 = array();
                  $arr3 = array();
                  $arr4 = array();
                  ?>
                  @foreach($allsubscriptions as $all)
                  <?php 
                  if($all->period_sel_income == 2){
                      $all->sel_incomes = json_decode($all->sel_incomes); 
                      $all->multiple_income_alter_vals = json_decode($all->multiple_income_alter_vals); 
                      $all->multiple_income_vals = json_decode($all->multiple_income_vals); 
                      $all->multiple_income_percent = json_decode($all->multiple_income_percent); 
                      // $all->sel_incomes = json_decode($all->sel_incomes); 
                      // $all->sel_incomes = json_decode($all->sel_incomes); 
                      // $all->sel_incomes = json_decode($all->sel_incomes); 
                      // print_r($all->multiple_income_alter_vals);echo '<br>';echo '<br>';
                      // print_r($all->multiple_income_vals);echo '<br>';echo '<br>';
                      // print_r($all->multiple_income_percent);echo '<br>';echo '<br>';
                      // echo count($all->sel_incomes);
                      // print_r($all->sel_incomes);
                      // echo '<br>';echo '<br>';
                      ?>
                      @for($k=0; $k<count($all->sel_incomes); $k++)
                      <?php //print_r($all->sel_incomes);exit;
                      // echo $k.'<br>';
                      ?>
                      <tr role="row" class="odd" style="display:none;">       
                        <td class="no">{{$k+1}}</td>
                        <td class="sorting_1" width="20%" style="display:none;">
                          <?php
                          $parts = explode('_', $all->sel_incomes[$k]);
                          // print_r($parts);
                          // echo '>>>>>>>>>><br>';
                          // echo $parts[0];
                          // echo '>>>>>>>>>><br>';
                          
                          ?>
                          {{$parts[0]}}
                        </td>
                        <td class="unit" style="display:none;">$
                          @if(isset($all->multiple_income_alter_vals[$k][0]) && $all->multiple_income_alter_vals[$k][0] != '')
                            {{number_format((float)$all->multiple_income_alter_vals[$k][0], 2, '.', '')}}
                            <?php $s0 = number_format((float)$all->multiple_income_alter_vals[$k][0], 2, '.', ''); 
                                  $s00 += $s0;
                            ?>
                          @else
                            {{number_format((float)$all->multiple_income_vals[$k][0], 2, '.', '')}}
                            <?php $s0 = number_format((float)$all->multiple_income_vals[$k][0], 2, '.', ''); 
                                  $s00 += $s0;
                            ?>
                          @endif</td>
                        <td class="qty" style="display:none;">$
                          @if(isset($all->multiple_income_percent[$k][0]) && $all->multiple_income_percent[$k][0]!=0)
                            @if(isset($all->multiple_income_alter_vals[$k][0]) && $all->multiple_income_alter_vals[$k][0] != '')
                              {{number_format((float)$all->multiple_income_alter_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                              <?php $p0 = number_format((float)$all->multiple_income_alter_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                    $p00 += $p0;
                              ?>
                            @else
                              {{number_format((float)$all->multiple_income_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                              <?php $p0 = number_format((float)$all->multiple_income_vals[$k][0]/number_format((float)$all->multiple_income_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                    $p00 += $p0;
                              ?>
                            @endif
                          @else
                            {{number_format((float)0, 2, '.', '')}}
                            <?php $p0 = number_format((float)0, 2, '.', ''); 
                                  $p00 += $p0;
                            ?>
                          @endif</td>
                        <td class="unit" style="display:none;">$
                          @if(isset($all->multiple_income_alter_vals[$k][1]) && $all->multiple_income_alter_vals[$k][1] != '')
                            {{number_format((float)$all->multiple_income_alter_vals[$k][1], 2, '.', '')}}
                            <?php $s1 = number_format((float)$all->multiple_income_alter_vals[$k][1], 2, '.', ''); 
                                  $s11 += $s1;
                            ?>
                          @else
                            {{number_format((float)$all->multiple_income_vals[$k][1], 2, '.', '')}}
                            <?php $s1 = number_format((float)$all->multiple_income_vals[$k][1], 2, '.', ''); 
                                  $s11 += $s1;
                            ?>
                          @endif</td>
                        <td class="qty" style="display:none;">$
                          @if(isset($all->multiple_income_percent[$k][1]) && $all->multiple_income_percent[$k][1]!=0)
                            @if(isset($all->multiple_income_alter_vals[$k][1]) && $all->multiple_income_alter_vals[$k][1] != '')
                              {{number_format((float)$all->multiple_income_alter_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                              <?php $p1 = number_format((float)$all->multiple_income_alter_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                    $p11 += $p1;
                              ?>
                            @else
                              {{number_format((float)$all->multiple_income_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                              <?php $p1 = number_format((float)$all->multiple_income_vals[$k][1]/number_format((float)$all->multiple_income_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                    $p11 += $p1;
                              ?>
                            @endif
                          @else
                            {{number_format((float)0, 2, '.', '')}}
                            <?php $p1 = number_format((float)0, 2, '.', ''); 
                                  $p11 += $p1;
                            ?>
                          @endif</td>
                        <td class="unit" style="display:none;">$
                          @if(isset($all->multiple_income_alter_vals[$k][2]) && $all->multiple_income_alter_vals[$k][2] != '')
                            {{number_format((float)$all->multiple_income_alter_vals[$k][2], 2, '.', '')}}
                            <?php $s2 = number_format((float)$all->multiple_income_alter_vals[$k][2], 2, '.', ''); 
                                  $s22 += $s2;
                            ?>
                          @else
                            {{number_format((float)$all->multiple_income_vals[$k][2], 2, '.', '')}}
                            <?php $s2 = number_format((float)$all->multiple_income_vals[$k][2], 2, '.', ''); 
                                  $s22 += $s2;
                            ?>
                          @endif</td>    
                        <td class="qty" style="display:none;">$
                          @if(isset($all->multiple_income_percent[$k][2]) && $all->multiple_income_percent[$k][2]!=0)
                            @if(isset($all->multiple_income_alter_vals[$k][2]) && $all->multiple_income_alter_vals[$k][2] != '')
                              {{number_format((float)$all->multiple_income_alter_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                              <?php $p2 = number_format((float)$all->multiple_income_alter_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                    $p22 += $p2;
                              ?>
                            @else
                              {{number_format((float)$all->multiple_income_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                              <?php $p2 = number_format((float)$all->multiple_income_vals[$k][2]/number_format((float)$all->multiple_income_percent[$k][2], 2, '.', ''), 2, '.', ''); 
                                    $p22 += $p2;
                              ?>
                            @endif
                          @else
                            {{number_format((float)0, 2, '.', '')}}
                            <?php $p2 = number_format((float)0, 2, '.', ''); 
                                  $p22 += $p2;
                            ?>
                          @endif              </td>
                        
                        <td class="unit" style="display:none;"></td>
                        <td class="qty" style="display:none;"></td>
                        <td class="unit" style="display:none;"></td>
                        <td class="qty" style="display:none;"></td>
                        <td class="unit" style="display:none;"></td>
                        <td class="qty" style="display:none;"></td>

                        <td class="total">${{number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', '')}}
                          <?php $x_income_after_gst_total += number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', ''); ?>
                        </td>
                      </tr>
                      <?php
                      // echo '>>>>>>>>>><br>';
                          $arr1[$rst][$parts[0]] = array($s0,$p0,$s1,$p1,$s2,$p2);

                      ?>
                      @endfor
                      <?php $rst++; ?>
                  <?php }else{
                    $all->sel_incomes = json_decode($all->sel_incomes); 
                    $all->single_income_alter_vals = json_decode($all->single_income_alter_vals);
                    $all->single_income_percent = json_decode($all->single_income_percent);
                    $all->single_income_vals = json_decode($all->single_income_vals);
                    // print_r($all->single_income_alter_vals);
                    $all->multiple_income_alter_vals = json_decode($all->multiple_income_alter_vals);
                    $all->multiple_income_vals = json_decode($all->multiple_income_vals); 
                    $all->multiple_income_percent = json_decode($all->multiple_income_percent); 
                    ?>
                    @for($k=0; $k<count($all->sel_incomes); $k++)
                      <tr role="row" class="odd" style='display:none;'>       
                        <td class="no">{{$k+1}}</td>
                        <td class="sorting_1" width="20%">
                          <?php
                          $parts = explode('_', $all->sel_incomes[$k]);
                          // print_r($parts);
                          ?>
                          {{$parts[0]}}
                        </td>
                        <td class="unit">$
                          @if(isset($all->single_income_alter_vals[$k]) && $all->single_income_alter_vals[$k] !='')
                            {{number_format((float)$all->single_income_alter_vals[$k], 2, '.', '')}}
                            <?php 
                            $s = number_format((float)$all->single_income_alter_vals[$k], 2, '.', ''); 
                            $s00 += $s;
                            ?>
                          @else
                            {{number_format((float)$all->single_income_vals[$k], 2, '.', '')}}
                            <?php 
                            $s = number_format((float)$all->single_income_vals[$k], 2, '.', ''); 
                            $s00 += $s;
                            ?>
                          @endif</td>
                        <td class="qty">$
                          @if(isset($all->single_income_percent[$k]) && $all->single_income_percent[$k]!=0)
                            @if(isset($all->single_income_alter_vals[$k]) && $all->single_income_alter_vals[$k] !='')
                              {{number_format((float)$all->single_income_alter_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', '')}}
                              <?php 
                              $p = number_format((float)$all->single_income_alter_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', ''); 
                              $p00 += $p;
                              ?>
                            @else
                              {{number_format((float)$all->single_income_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', '')}}
                              <?php 
                              $p = number_format((float)$all->single_income_vals[$k]/number_format((float)$all->single_income_percent[$k], 2, '.', ''), 2, '.', ''); 
                              $p00 += $p;
                              ?>
                            @endif
                          @else
                            {{number_format((float)0, 2, '.', '')}}
                            <?php $p = number_format((float)0, 2, '.', ''); ?>
                          @endif</td>
                        <td class="total">
                          ${{number_format((float)($s-$p), 2, '.', '')}}
                          <?php $x_income_after_gst_total += number_format((float)($s-$p), 2, '.', '');//$after_gst_income = number_format((float)($s-$p), 2, '.', ''); ?>
                          <?php //$after_gst_income += number_format((float)(($s-$p)), 2, '.', ''); ?>
                        </td>
                      </tr>
                      <?php
                        // echo '>>>>>>>>>><br>';
                        $arr1[$rst][$parts[0]] = array($s,$p);

                      ?>
                    @endfor
                    <?php $rst++; ?>

                  <?php
                  } ?>
                  @endforeach
                  
                <?php 
                //////////////////////////////////////////////////////////////////////////////////////
                  //////////////////////////////////////////////////////////////////////////////////////
                // exit;
                // echo '---<br>';
                // echo '<br>=============================<br>';
                // print_r($arr1[0]);
                // echo '<br>=============================<br>';
                // print_r($arr1[3]);
                // echo '<br>=============================<br>';


                // echo '<br>=============================<br>';



                //       foreach ($arr1[1] as $key=> $value){
                //          $output[$key]=(array_key_exists($key, $arr1[0])) ? NULL : $arr1[0][$key];
                //       }
                // print_r($output);
                if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2]) && isset($arr1[3])){
                    $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2]), array_keys($arr1[3])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc4'] = isset($arr1[3][$k]) ? $arr1[3][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    // $final_ar = array();
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2'], $result1[$k]['doc3'], $result1[$k]['doc4']);
                    }
                    // echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
                    // print_r($final_ar);
                    // print_r($result1);
                    // exit;
                }else if(isset($arr1[0]) && isset($arr1[1]) && isset($arr1[2])){
                    $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1]), array_keys($arr1[2])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc3'] = isset($arr1[2][$k]) ? $arr1[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2'], $result1[$k]['doc3']);
                    }
                }else if(isset($arr1[0]) && isset($arr1[1])){
                    $keys = array_flip(array_merge(array_keys($arr1[0]), array_keys($arr1[1])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result1[$k]['doc2'] = isset($arr1[1][$k]) ? $arr1[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1'], $result1[$k]['doc2']);
                    }
                }else if(isset($arr1[0])){
                    $keys = array_flip(array_merge(array_keys($arr1[0])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result1[$k]['doc1'] = isset($arr1[0][$k]) ? $arr1[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result1 as $k=>$res){
                      $final_ar[$k] = array_merge_recursive($result1[$k]['doc1']);
                    }
                }
                
                // print_r($final_ar);exit;
                // $ttt = array();
                // foreach($arr1 as $rrr){
                //   // print_r($rrr);echo '---<br>';
                //   $ttt = array_merge_recursive($ttt, $rrr);

                // }
                // echo '<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>><br>';
                // print_r($ttt);
                // $l = max($ttt);
                $counts = array_map('count', $final_ar);
                // $key = array_flip($counts)[max($counts)];
                // $largest_arr = $ttt[$key];
                // echo 'large val===>>> <br>';
                // print_r($counts);
                // exit;
                $ccv = max($counts);
                // echo ($ccv);
                $sd = 1;$sk=0;
                ?>

                @foreach($final_ar as $key=>$rt)
                <tr>
                  <td class="unit">{{$sd}}</td>
                  <td>{{$key}}</td>
                  <?php $nt_i = 0; $nt_p = 0; ?>
                  @for($fc=0; $fc<$totaltd; $fc++)

                  <td class="unit">
                    @if(isset($rt[$fc]))
                      ${{$rt[$fc]}}
                      <?php 
                        if($fc%2==0){
                          $nt_i += $rt[$fc]; 
                        }
                        if($fc%2!=0){
                          $nt_p += $rt[$fc]; 
                        }
                      ?>
                    @else
                      0.00
                    @endif</td>
                  @endfor
                  <td>${{number_format((float)($nt_i - $nt_p), 2, '.', '')}}</td>
                </tr>
                <?php $sd++; $sk++; ?>
                @endforeach

                <?php //exit; ?>
                <tr class="mkred">
                  <!-- <td class="no"></td> -->
                  <td class="desc" colspan="<?php echo $nump-1;?>"><h3>Total Income</h3></td>
                  <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
                  <td class="total">${{$x_income_after_gst_total}}</td>
                </tr>          
                <tr>
                  <td class="desc" colspan="<?php echo $nump;?>">EXPENSES</td>
                </tr>
                <tr>
                  <td class="no">#</td>
                  <td class="desc"><h3>Items</h3></td>
                  <?php 
                  $totaltd=0;
                  foreach($allsubscriptions as $all){
                    $month_num = $all->q_period; 
                    if($all->period_sel_income == 2){//{echo $all->period_sel_income;}
                  ?>
                  @for($f=0;$f<3;$f++)
                    <td class="unit">
                      <?php 
                      $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                      echo 'Client Input <br>'.$month_name."\n"; 
                      $month_num++;$totaltd+=2;
                      ?>
                    </td>
                    <td class="qty">GST on amount</td>
                  @endfor
                  <?php 
                    }else{ $text = "Client Input ";$totaltd+=2;?>
                      <td class="unit">
                      {{$text}} {{$all->cd_id}}
                    @for($f=0;$f<3;$f++)
                      
                        <?php 
                        $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                        echo '<br>'.$month_name."\n"; 
                        $month_num++;
                        ?>
                      
                    @endfor
                    </td>
                      <td class="qty">GST on amount</td>
                      <?php
                    }
                  } ?>
                  <td class="total">Total Amount after GST</td>
                </tr>
                <?php 
                $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_expense_after_gst_total = 0; $rst = 0;
                $arr1 = array();
                $arr2 = array();
                $arr3 = array();
                $arr4 = array();
                ?>
                @foreach($allsubscriptions as $all)
                      <?php 
                      if($all->period_sel_income == 2){
                          $all->sel_expenses = json_decode($all->sel_expenses); 
                          $all->multiple_expense_alter_vals = json_decode($all->multiple_expense_alter_vals); 
                          $all->multiple_expense_vals = json_decode($all->multiple_expense_vals); 
                          $all->multiple_expense_percent = json_decode($all->multiple_expense_percent); 
                          // $all->sel_expenses = json_decode($all->sel_expenses); 
                          // $all->sel_expenses = json_decode($all->sel_expenses); 
                          // $all->sel_expenses = json_decode($all->sel_expenses); 
                          // print_r($all->multiple_expense_alter_vals);echo '<br>';echo '<br>';
                          // print_r($all->multiple_expense_vals);echo '<br>';echo '<br>';
                          // print_r($all->multiple_expense_percent);echo '<br>';echo '<br>';
                          // echo count($all->sel_expenses);
                          // print_r($all->sel_expenses);
                          // echo '<br>';echo '<br>';
                          ?>
                          @for($k=0; $k<count($all->sel_expenses); $k++)
                          <?php //print_r($all->sel_expenses);exit;
                          // echo $k.'<br>';
                          ?>
                            <tr role="row" class="odd" style='display:none;'>       
                              <td class="no">{{$k+1}}</td>
                              <td class="sorting_1" width="20%">
                                <?php
                                $parts = explode('_', $all->sel_expenses[$k]);
                                // print_r($parts);
                                ?>
                                {{$parts[0]}}
                              </td>
                              <td class="unit">$@if(isset($all->multiple_expense_vals[$k][0]))
                                {{number_format((float)$all->multiple_expense_vals[$k][0], 2, '.', '')}}
                                <?php $s0 = number_format((float)$all->multiple_expense_vals[$k][0], 2, '.', ''); 
                                      $s00 += $s0;
                                ?>
                                @endif</td>
                              <td class="qty">$@if(isset($all->multiple_expense_percent[$k][0]) && $all->multiple_expense_percent[$k][0]!=0)
                                {{number_format((float)$all->multiple_expense_vals[$k][0]/number_format((float)$all->multiple_expense_percent[$k][0], 2, '.', ''), 2, '.', '')}}
                                <?php $p0 = number_format((float)$all->multiple_expense_vals[$k][0]/number_format((float)$all->multiple_expense_percent[$k][0], 2, '.', ''), 2, '.', ''); 
                                      $p00 += $p0;
                                ?>
                                @else
                                {{number_format((float)0, 2, '.', '')}}
                                <?php $p0 = number_format((float)0, 2, '.', ''); 
                                      $p00 += $p0;
                                ?>
                                @endif</td>
                              <td class="unit">$@if(isset($all->multiple_expense_vals[$k][1]))
                                {{number_format((float)$all->multiple_expense_vals[$k][1], 2, '.', '')}}
                                <?php $s1 = number_format((float)$all->multiple_expense_vals[$k][1], 2, '.', ''); 
                                      $s11 += $s1;
                                ?>
                                @endif</td>
                              <td class="qty">$@if(isset($all->multiple_expense_percent[$k][1]) && $all->multiple_expense_percent[$k][1]!=0)
                                {{number_format((float)$all->multiple_expense_vals[$k][1]/number_format((float)$all->multiple_expense_percent[$k][1], 2, '.', ''), 2, '.', '')}}
                                <?php $p1 = number_format((float)$all->multiple_expense_vals[$k][1]/number_format((float)$all->multiple_expense_percent[$k][1], 2, '.', ''), 2, '.', ''); 
                                      $p11 += $p1;
                                ?>
                                @else
                                {{number_format((float)0, 2, '.', '')}}
                                <?php $p1 = number_format((float)0, 2, '.', ''); 
                                      $p11 += $p1;
                                ?>
                                @endif</td>
                              <td class="unit">$@if(isset($all->multiple_expense_vals[$k][2]))
                                {{number_format((float)$all->multiple_expense_vals[$k][2], 2, '.', '')}}
                                <?php $s2 = number_format((float)$all->multiple_expense_vals[$k][2], 2, '.', ''); 
                                      $s22 += $s2;
                                ?>
                                @endif</td>    
                              <td class="qty">$@if(isset($all->multiple_expense_percent[$k][2]) && $all->multiple_expense_percent[$k][2]!=0)
                                {{number_format((float)$all->multiple_expense_vals[$k][2]/number_format((float)$all->multiple_expense_percent[$k][2], 2, '.', ''), 2, '.', '')}}
                                <?php $p2 = number_format((float)$all->multiple_expense_vals[$k][2]/number_format((float)$all->multiple_expense_percent[$k][2], 2, '.', ''), 2, '.', ''); 
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
                          <?php
                            // echo '>>>>>>>>>><br>';
                                $arr2[$rst][$parts[0]] = array($s0,$p0,$s1,$p1,$s2,$p2);

                            ?>
                          @endfor
                          <?php $rst++; ?>
                    <?php }else{ ?>
                            <?php 
                            // $s00 = 0; $s11 = 0; $s22 = 0; $p00 = 0; $p11 = 0; $p22 = 0; $x_expense_after_gst_total = 0; $rst = 0; 
                            // $after_gst_expense =0; 
                            // $arr1 = array();

                            ?>
                            
                              <?php 
                              $all->sel_expenses = json_decode($all->sel_expenses); 
                              // $all->single_income_alter_vals = json_decode($all->single_income_alter_vals);
                              $all->single_expense_percent = json_decode($all->single_expense_percent);
                              $all->single_expense_vals = json_decode($all->single_expense_vals);
                              // print_r($all->single_income_alter_vals);
                              // $all->multiple_income_alter_vals = json_decode($all->multiple_income_alter_vals);
                              // $all->multiple_income_vals = json_decode($all->multiple_income_vals); 
                              // $all->multiple_income_percent = json_decode($all->multiple_income_percent); 
                              ?>
                              @for($k=0; $k<count($all->sel_expenses); $k++)
                                <tr role="row" class="odd" style='display:none;'>       
                                  <td class="no">{{$k+1}}</td>
                                  <td class="sorting_1" width="20%">
                                    <?php
                                    $parts = explode('_', $all->sel_expenses[$k]);
                                    // print_r($parts);
                                    ?>
                                    {{$parts[0]}}
                                  </td>

                                <td class="unit">$@if(isset($all->single_expense_vals[$k]))
                                  {{number_format((float)$all->single_expense_vals[$k], 2, '.', '')}}
                                  <?php 
                                        $s = number_format((float)$all->single_expense_vals[$k], 2, '.', ''); 
                                        $s00 += $s;
                                  ?>
                                  @endif</td>
                                <td class="qty">$@if(isset($all->single_expense_percent[$k]) && $all->single_expense_percent[$k]!=0)
                                  {{number_format((float)$all->single_expense_vals[$k]/number_format((float)$all->single_expense_percent[$k], 2, '.', ''), 2, '.', '')}}
                                  <?php 
                                        $p = number_format((float)$all->single_expense_vals[$k]/number_format((float)$all->single_expense_percent[$k], 2, '.', ''), 2, '.', ''); 
                                        $p00 += $p;
                                  ?>
                                  @else
                                  {{number_format((float)0, 2, '.', '')}}
                                  <?php 
                                        $p = number_format((float)0, 2, '.', ''); 
                                        $p00 += $p;
                                  ?>
                                  @endif</td>          
                                  <td class="total">
                                    ${{number_format((float)($s-$p), 2, '.', '')}}
                                    <?php $x_expense_after_gst_total += number_format((float)($s-$p), 2, '.', '');//$after_gst_income = number_format((float)($s-$p), 2, '.', ''); ?>
                                    <?php //$after_gst_expense += number_format((float)(($s-$p)), 2, '.', ''); ?>
                                  </td>
                                </tr>
                                <?php
                                  // echo '>>>>>>>>>><br>';
                                  $arr2[$rst][$parts[0]] = array($s,$p);

                                ?>
                              @endfor
                              <?php $rst++; ?>
                            
                            
                    <?php } ?>
                @endforeach
                <?php 
                // echo '---<br>';
                // echo '<br>=============================<br>';
                // print_r($arr1[0]);
                // echo '<br>=============================<br>';
                // print_r($arr1[3]);
                // echo '<br>=============================<br>';


                // echo '<br>=============================<br>';



                //       foreach ($arr1[1] as $key=> $value){
                //          $output[$key]=(array_key_exists($key, $arr1[0])) ? NULL : $arr1[0][$key];
                //       }
                // print_r($arr2);
                if(isset($arr2[0]) && isset($arr2[1]) && isset($arr2[2]) && isset($arr2[3])){
                    $keys = array_flip(array_merge(array_keys($arr2[0]), array_keys($arr2[1]), array_keys($arr2[2]), array_keys($arr2[3])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc2'] = isset($arr2[1][$k]) ? $arr2[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc3'] = isset($arr2[2][$k]) ? $arr2[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc4'] = isset($arr2[3][$k]) ? $arr2[3][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    // $final_ar2 = array();
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1'], $result2[$k]['doc2'], $result2[$k]['doc3'], $result2[$k]['doc4']);
                    }
                    // echo '++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>';
                    // print_r($final_ar2);
                    // print_r($result2);
                    // exit;
                }else if(isset($arr2[0]) && isset($arr2[1]) && isset($arr2[2])){
                    $keys = array_flip(array_merge(array_keys($arr2[0]), array_keys($arr2[1]), array_keys($arr2[2])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc2'] = isset($arr2[1][$k]) ? $arr2[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc3'] = isset($arr2[2][$k]) ? $arr2[2][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1'], $result2[$k]['doc2'], $result2[$k]['doc3']);
                    }
                }else if(isset($arr2[0]) && isset($arr2[1])){
                    $keys = array_flip(array_merge(array_keys($arr2[0]), array_keys($arr2[1])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $result2[$k]['doc2'] = isset($arr2[1][$k]) ? $arr2[1][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1'], $result2[$k]['doc2']);
                    }
                }else if(isset($arr2[0])){
                    $keys = array_flip(array_merge(array_keys($arr2[0])));
                    // print_r($keys);
                    // create new array
                    $df=0;
                    foreach($keys as $k=>$v) {
                      // echo '-'.$df.'<br>';
                      $result2[$k]['doc1'] = isset($arr2[0][$k]) ? $arr2[0][$k] : array('0.00','0.00','0.00','0.00','0.00','0.00');
                      $df++;
                    }
                    foreach($result2 as $k=>$res){
                      $final_ar2[$k] = array_merge_recursive($result2[$k]['doc1']);
                    }
                }
                

                

                // print_r($final_ar2);




                // echo $totaltd;



                // exit;


                // $ttt = array();
                // foreach($arr1 as $rrr){
                //   // print_r($rrr);echo '---<br>';
                //   $ttt = array_merge_recursive($ttt, $rrr);

                // }
                // echo '<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>><br>';
                // print_r($ttt);
                // $l = max($ttt);
                $counts = array_map('count', $final_ar2);
                // $key = array_flip($counts)[max($counts)];
                // $largest_arr = $ttt[$key];
                // echo 'large val===>>> <br>';
                // print_r($counts);
                // exit;
                $ccv = max($counts);
                // echo ($ccv);
                $sd = 1;$sk=0;
                ?>
                @foreach($final_ar2 as $key=>$rt)
                <tr>
                  <td class="unit">{{$sd}}</td>
                  <td>{{$key}}</td>
                  <?php $nt_i = 0; $nt_p = 0; ?>
                  @for($fc=0; $fc<$totaltd; $fc++)

                  <td class="unit">
                    @if(isset($rt[$fc]))
                      ${{$rt[$fc]}}
                      <?php 
                        if($fc%2==0){
                          $nt_i += $rt[$fc]; 
                        }
                        if($fc%2!=0){
                          $nt_p += $rt[$fc]; 
                        }
                      ?>
                    @else
                      0.00
                    @endif</td>
                  @endfor
                  <td>${{number_format((float)($nt_i - $nt_p), 2, '.', '')}}</td>
                </tr>
                <?php $sd++; $sk++; ?>
                @endforeach
                <?php //exit;?>
                <tr class="mkred">
                  <!-- <td class="no"></td> -->
                  <td class="desc" colspan="<?php echo $nump-1;?>"><h3>Total Expense</h3></td>
                  <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
                  <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
                  <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
                  <td class="total">${{$x_expense_after_gst_total}}</td>
                </tr>  
              </tbody>
              <tfoot>
                <tr>
                  <!-- <td colspan="5"></td> -->
                  <td colspan="<?php echo $nump-1;?>">NET INCOME</td>
                  <td>${{$x_income_after_gst_total - $x_expense_after_gst_total}}</td>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- <div id="thanks">Thank you!</div> -->
          
        </main>
        
        <!-- <footer>
          Report was created on a computer and is valid without the signature and seal.
        </footer> -->


    
    <?php
    //............................................................................................
    }

    // exit;
    ?>
</div>
        </div>
    </div>    <!-- row-->
</section>
<style type="text/css">
 footer{ position:relative; }
        .no, .desc, .unit, .qty, .total{ width: 20%; }
        .no { width: 10%;}
        .sorting_1 { width: %; }
        table td, table .desc { text-align: center; }
        .mkred td, .mkred td h3 { background-color: #887e80 !important; color: #fff;}
        /*body {width: 21.5cm;}*/
        table th, table td {
          padding: 12px;
        }

        table .no {
          color: #000;
          font-size: 1em !important;
          background: #dcdcdc !important;
          text-align: center;
        }
        table .total {
            background: #dcdcdc;
            color: #000;
            text-align: center;
        }
        table th, table td {
            padding: 5px;
            }
        table td.unit, table td.qty, table td.total {
            font-size: 1em !important;
        }   
        table td.sorting_1 {
          text-align: left;
          padding: 5px 0px 5px 10px;
        } 
        table h3 { font-size: 15px;}
</style>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function() {
	$('.tabled').DataTable();
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