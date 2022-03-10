<table class="table table-striped table-hover table-bordered" id="sample_1">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Course NAme</th>
        <th>Membership #</th>
        <th>User ID</th>
        <th>Barcode #</th>
        <th>Zip Code</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Join Date</th>
    </tr>
    </thead>
    <tbody>
     @foreach ($allfilteredcourses as $member)
        <tr>
            <td>{!! $member->last_name !!}</td>
            <td>{!! $member->first_name !!}</td>
            <td>{!! $member->coursename !!}</td>
            <td>MM-{!! $member->mm_id !!}</td>
            <td>{!! $member->id !!}</td>
            <td>{!! $member->bar_code !!}</td>
            <td>{!! $member->zipcode !!}</td>
            <td>{!! $member->phone !!}</td>
            <td>{!! $member->email !!}</td>
            <td>{!! $member->join_date !!}</td>
        </tr>
    @endforeach
    
    </tbody>
</table>