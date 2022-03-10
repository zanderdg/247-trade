<table class="table table-striped table-hover table-bordered" id="sample_1">
    <thead>
    <tr>
        <th>Buyers Last Name</th>
        <th>Buyers First Name</th>
        <th>Amount of Purchase</th>
        <th>User ID</th>
        <th>Zip Code</th> 
        <th>Transaction Date</th> 
    </tr>
    </thead>
    <tbody>
      @foreach ($allfilteredcourses7 as $member)
        <tr>
            <td>{!! $member->last_name !!}</td>
            <td>{!! $member->first_name !!}</td>
            <td>${!! $member->actual_total_amount !!}</td>                            
            <td>{!! $member->id !!}</td>                            
            <td>{!! $member->zipcode !!}</td>
            <td>{!! date('M d, Y', strtotime($member->created_at)) !!}</td>
        </tr>
    @endforeach
    
    </tbody>
</table>