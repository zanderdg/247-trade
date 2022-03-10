<table class="table table-striped table-hover table-bordered" id="sample_1">
    <tr>
        <td class="desc" colspan="5">Client Name: {{$user->first_name}} {{$user->last_name}}</td>
    </tr>
    <tr>
        <td class="desc" colspan="5">Client Number: {{$user->client->client_number}}</td>
    </tr>
    <tr>
        <td class="desc" colspan="5">ABN Number: {{$user->client->abn_number}}</td>
    </tr>
    <tr>
        @if($user->client->address)
          <td class="desc" colspan="5">Address: {{$user->client->address}}</td>
        @endif            
    </tr>
    <tr>
        <td class="desc" colspan="5">Phone: {{$user->client->phone}}</td>
    </tr>
    <tr>
        <td class="desc" colspan="5">{{$user->email}}</td>
    </tr>
</table>

@if($period_sel_income == 1)
      <table class="table table-striped table-hover table-bordered" id="sample_1">
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
                {{number_format((float)$single_expense_vals[$k], 2, '.', '')}}<br>

                @if($single_expense_date_vals[$k] != '')<b>Date: </b>{{$single_expense_date_vals[$k]}}<br>@endif
                @if($single_expense_makemodel_vals[$k] != '')<b>Make/Model: </b>{{$single_expense_makemodel_vals[$k]}}<br>@endif
                @if($single_expense_business_percent_vals[$k] != '')<b>B. Percent: </b>{{$single_expense_business_percent_vals[$k]}}<br>@endif

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
      <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="desc" colspan="9">INCOME</td>
          </tr>
        <tbody>
          <tr>
            <td class="no">#</td>
            <td class="desc"><h3>Items</h3></td>
            <?php 
              $month_num = $q_period; 
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
                @if(isset($multiple_income_alter_vals[$k][0]) && $multiple_income_alter_vals[$k][0] != '')
                  {{number_format((float)$multiple_income_alter_vals[$k][0], 2, '.', '')}}
                  <?php $s0 = number_format((float)$multiple_income_alter_vals[$k][0], 2, '.', ''); 
                        $s00 += $s0;
                  ?>
                @else
                  {{number_format((float)$multiple_income_vals[$k][0], 2, '.', '')}}
                  <?php $s0 = number_format((float)$multiple_income_vals[$k][0], 2, '.', ''); 
                        $s00 += $s0;
                  ?>
                @endif</td>
              <td class="qty">$
                @if(isset($multiple_income_percent[$k][0]) && $multiple_income_percent[$k][0]!=0)
                  @if(isset($multiple_income_alter_vals[$k][0]) && $multiple_income_alter_vals[$k][0] != '')
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
                @if(isset($multiple_income_alter_vals[$k][1]) && $multiple_income_alter_vals[$k][1] != '')
                  {{number_format((float)$multiple_income_alter_vals[$k][1], 2, '.', '')}}
                  <?php $s1 = number_format((float)$multiple_income_alter_vals[$k][1], 2, '.', ''); 
                        $s11 += $s1;
                  ?>
                @else
                  {{number_format((float)$multiple_income_vals[$k][1], 2, '.', '')}}
                  <?php $s1 = number_format((float)$multiple_income_vals[$k][1], 2, '.', ''); 
                        $s11 += $s1;
                  ?>
                @endif</td>
              <td class="qty">$
                @if(isset($multiple_income_percent[$k][1]) && $multiple_income_percent[$k][1]!=0)
                  @if(isset($multiple_income_alter_vals[$k][1]) && $multiple_income_alter_vals[$k][1] != '')
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
                @if(isset($multiple_income_alter_vals[$k][2]) && $multiple_income_alter_vals[$k][2] != '')
                  {{number_format((float)$multiple_income_alter_vals[$k][2], 2, '.', '')}}
                  <?php $s2 = number_format((float)$multiple_income_alter_vals[$k][2], 2, '.', ''); 
                        $s22 += $s2;
                  ?>
                @else
                  {{number_format((float)$multiple_income_vals[$k][2], 2, '.', '')}}
                  <?php $s2 = number_format((float)$multiple_income_vals[$k][2], 2, '.', ''); 
                        $s22 += $s2;
                  ?>
                @endif</td>    
              <td class="qty">$
                @if(isset($multiple_income_percent[$k][2]) && $multiple_income_percent[$k][2]!=0)
                  @if(isset($multiple_income_alter_vals[$k][2]) && $multiple_income_alter_vals[$k][2] != '')
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
            <td class="desc" colspan="2"><h3>Total Income</h3></td>
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
            <td class="desc"><h3>Items</h3></td>
            <?php 
              $month_num = $q_period; 
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
              <td class="unit">$@if(isset($multiple_expense_vals[$k][0]))
                {{number_format((float)$multiple_expense_vals[$k][0], 2, '.', '')}}<br>

                @if($multiple_expense_date_vals[$k][0] != '')<b>Date: {{$multiple_expense_date_vals[$k][0]}}<br>@endif
                @if($multiple_expense_makemodel_vals[$k][0] != '')Make/Model: </b>{{$multiple_expense_makemodel_vals[$k][0]}}<br>@endif
                @if($multiple_expense_business_percent_vals[$k][0] != '')<b>B. Percent: </b>{{$multiple_expense_business_percent_vals[$k][0]}}<br>@endif

                <?php $s0 = number_format((float)$multiple_expense_vals[$k][0], 2, '.', ''); 
                      $s00 += $s0;
                ?>
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

                <?php $s1 = number_format((float)$multiple_expense_vals[$k][1], 2, '.', ''); 
                      $s11 += $s1;
                ?>
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

                <?php $s2 = number_format((float)$multiple_expense_vals[$k][2], 2, '.', ''); 
                      $s22 += $s2;
                ?>
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
            <td class="desc" colspan="2"><h3>Total Expense</h3></td>
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
            <td colspan="8">NET INCOME</td>
            <td>${{$x_income_after_gst_total - $x_expense_after_gst_total}}</td>
          </tr>
        </tfoot>
      </table>
      @endif