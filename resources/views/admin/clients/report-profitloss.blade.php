<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Client Report Full</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/styledd.css" media="all" />
    
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ URL::to('/') }}/uploads/source/logo_1.png">
      </div>
      <div id="company">
        <h2 class="name">Client Name: {{$user->first_name}} {{$user->last_name}}</h2>
        <div>Client Number: {{$user->client->client_number}}</div>
        <div>ABN Number: {{$user->client->abn_number}}</div>
        @if($user->client->address)
          <div>Address: {{$user->client->address}}</div>
        @endif
        <div>Phone: {{$user->client->phone}}</div>
        <div>Email: <a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client" style="display:none;">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">John Doe</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice" style="text-align:center;">
          <h1>PROFIT LOSS REPORT</h1>
          <div class="date">Period {{$tot_period}} {{$q_period_year}}</div>
        </div>
      </div>
      @if($period_sel_income == 1)
      <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="desc" colspan="3">INCOME</td>
          </tr>
        <tbody>
          <tr>
            <td class="no">#</td>
            <td class="desc"><h3>Items</h3></td>
            <!-- <td class="unit">Client Input</td> -->
            <!-- <td class="qty">GST on amount</td> -->
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
              <!-- <td class="unit">$
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
                @endif</td> -->
              <td class="total">${{number_format((float)($s-$p), 2, '.', '')}}</td>
            </tr>
          @endfor
          <tr class="mkred">
            <!-- <td class="no"></td> -->
            <td class="desc" colspan="2"><h3>Total Income</h3></td>
            <!-- <td class="unit">${{$tot_income}}</td> -->
            <!-- <td class="qty">${{$a_income_gst_collected}}</td> -->
            <td class="total">${{$after_gst_income}}</td>
          </tr>          
          <tr>
            <td class="desc" colspan="3">EXPENSES</td>
          </tr>
          <tr>
            <td class="no">#</td>
            <td class="desc"><h3>Items</h3></td>
            <!-- <td class="unit">Client Input</td>
            <td class="qty">GST on amount</td> -->
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
              <!-- <td class="unit">$@if(isset($single_expense_vals[$k]))
                {{number_format((float)$single_expense_vals[$k], 2, '.', '')}}
                <?php $s = number_format((float)$single_expense_vals[$k], 2, '.', ''); ?>
                @endif</td>
              <td class="qty">$@if(isset($single_expense_percent[$k]) && $single_expense_percent[$k]!=0)
                {{number_format((float)$single_expense_vals[$k]/number_format((float)$single_expense_percent[$k], 2, '.', ''), 2, '.', '')}}
                <?php $p = number_format((float)$single_expense_vals[$k]/number_format((float)$single_expense_percent[$k], 2, '.', ''), 2, '.', ''); ?>
                @else
                {{number_format((float)0, 2, '.', '')}}
                <?php $p = number_format((float)0, 2, '.', ''); ?>
                @endif</td> -->
              <td class="total">${{number_format((float)($s-$p), 2, '.', '')}}</td>
            </tr>
          @endfor
          <tr class="mkred">
            <!-- <td class="no"></td> -->
            <td class="desc" colspan="2"><h3>Total Expense</h3></td>
            <!-- <td class="unit">${{$tot_expense}}</td>
            <td class="qty">${{$b_expense_gst_paid}}</td> -->
            <td class="total">${{$after_gst_expense}}</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <!-- <td colspan="2"></td> -->
            <td colspan="2">NET INCOME</td>
            <td>${{$net_income}}</td>
          </tr>
        </tfoot>
      </table>
      @elseif($period_sel_income == 2)
      <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="desc" colspan="3">INCOME</td>
          </tr>
        <tbody>
          <tr>
            <td class="no">#</td>
            <td class="desc"><h3>Items</h3></td>
            <?php 
              $month_num = $q_period; 
            ?>
            @for($f=0;$f<3;$f++)
              <!-- <td class="unit">
                <?php 
                $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                echo 'Client Input <br>'.$month_name."\n"; 
                $month_num++;
                ?>
              </td>
              <td class="qty">GST on amount</td> -->
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
              <!-- <td class="unit">$
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
                @endif</td> -->
              <td class="total">${{number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', '')}}
                <?php $x_income_after_gst_total += number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', ''); ?>
              </td>
            </tr>
          @endfor
          <tr class="mkred">
            <!-- <td class="no"></td> -->
            <td class="desc" colspan="2"><h3>Total Income</h3></td>
            <!-- <td class="unit">${{number_format((float)(($s00)), 2, '.', '')}}</td>
            <td class="qty">${{number_format((float)(($p00)), 2, '.', '')}}</td>
            <td class="unit">${{number_format((float)(($s11)), 2, '.', '')}}</td>
            <td class="qty">${{number_format((float)(($p11)), 2, '.', '')}}</td>
            <td class="unit">${{number_format((float)(($s22)), 2, '.', '')}}</td>
            <td class="qty">${{number_format((float)(($p22)), 2, '.', '')}}</td> -->
            <td class="total">${{$x_income_after_gst_total}}</td>
          </tr>          
          <tr>
            <td class="desc" colspan="3">EXPENSES</td>
          </tr>
          <tr>
            <td class="no">#</td>
            <td class="desc"><h3>Items</h3></td>
            <?php 
              $month_num = $q_period; 
            ?>
            @for($f=0;$f<3;$f++)
              <!-- <td class="unit">
                <?php 
                $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                echo 'Client Input <br>'.$month_name."\n"; 
                $month_num++;
                ?>
              </td>
              <td class="qty">GST on amount</td> -->
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
              <!-- <td class="unit">$@if(isset($multiple_expense_vals[$k][0]))
                {{number_format((float)$multiple_expense_vals[$k][0], 2, '.', '')}}
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
                {{number_format((float)$multiple_expense_vals[$k][1], 2, '.', '')}}
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
                {{number_format((float)$multiple_expense_vals[$k][2], 2, '.', '')}}
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
                @endif</td> -->
              <td class="total">${{number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', '')}}
                <?php $x_expense_after_gst_total += number_format((float)(($s0-$p0)+($s1-$p1)+($s2-$p2)), 2, '.', ''); ?>
              </td>
            </tr>
          @endfor
          <tr class="mkred">
            <!-- <td class="no"></td> -->
            <td class="desc" colspan="2"><h3>Total Expense</h3></td>
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
            <td colspan="2">NET INCOME</td>
            <td>${{$x_income_after_gst_total - $x_expense_after_gst_total}}</td>
          </tr>
        </tfoot>
      </table>
      @endif
      <!-- <div id="thanks">Thank you!</div> -->
      
    </main>
    <footer>
      Report was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
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
</style>