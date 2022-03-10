<table class="table table-striped table-hover table-bordered" id="sample_1">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>User ID</th>
        <th>Zip Code</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($allfilteredcourses3 as $member)
        @if($member->new_member == 1)
        <tr>
            <td>{!! $member->last_name !!}</td>
            <td>{!! $member->first_name !!}</td>
            <td>{!! $member->email !!}</td>
            <td>{!! $member->id !!}</td>
            <td>{!! $member->zipcode !!}</td>            
        </tr>
        @endif
      @endforeach
    
    </tbody>
</table>