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

</table>