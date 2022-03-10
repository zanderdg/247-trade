<table class="table table-striped table-hover table-bordered" id="sample_1">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Payment Type</th>
        <th>Installment Length</th>
        <th>Received Amount</th> 
        <th>Outstanding Amount</th> 
        <th>Card Number</th> 
        <th>Contact Number</th> 
        <th>Contact Email</th> 
    </tr>
    </thead>
    <tbody>
      @foreach ($allfilteredcourses8 as $member)
        <tr>
            <td>{!! $member->last_name !!}</td>
            <td>{!! $member->first_name !!}</td>
            <td>{!! $member->payment_type !!}</td>
            <td>{!! $member->installment_plan !!}</td>                            
            <td>${!! $member->received_amount !!}</td>
            <td>${!! $member->outstanding_amount !!}</td>
            <td>[{!! $member->card_number !!}]</td>
            <td>{!! $member->phone !!}</td>
            <td>{!! $member->email !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>