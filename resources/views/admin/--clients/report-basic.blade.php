<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Client Report</title>
    <link rel="stylesheet" href="http://localhost/gst/styledd.css" media="all" />
    
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="http://1stopwebsitesolution.com/taxapp/uploads/source/logo_1.png">
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
          <h1>BAS REPORT</h1>
          <div class="date">Period {{$tot_period}} {{$q_period_year}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <!-- <th class="unit">UNIT PRICE</th> -->
            <!-- <th class="qty">QUANTITY</th> -->
            <th class="total">AMOUNT</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">G1</td>
            <td class="desc"><h3>Total Income</h3></td>
            <td class="total">${{$tot_income}}</td>
          </tr>
          <tr>
            <td class="no">1A</td>
            <td class="desc"><h3>GST on Income</h3></td>
            <td class="total">${{$a_income_gst_collected}}</td>
          </tr>
          <tr>
            <td class="no">G11</td>
            <td class="desc"><h3>Total Expense</h3></td>
            <td class="total">${{$tot_expense}}</td>
          </tr>
          <tr>
            <td class="no">1B</td>
            <td class="desc"><h3>GST on Expense</h3></td>
            <td class="total">${{$b_expense_gst_paid}}</td>
          </tr>
          <tr>
            <td class="no">9</td>
            <td class="desc"><h3>GST Payable Amount</h3></td>
            <td class="total">${{$gst_payable_amount}}</td>
          </tr>
        </tbody>
        <!-- <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot> -->
      </table>
      <!-- <div id="thanks">Thank you!</div> -->
      
    </main>
    <footer>
      Report was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
<style type="text/css">
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