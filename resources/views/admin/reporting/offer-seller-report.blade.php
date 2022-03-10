<table class="table table-striped table-hover table-bordered" id="sample_1">
    <thead>
    <tr>
        <th>Sellers Last Name</th>
        <th>Sellers First Name</th>
        <th>Course</th>
        <th>Membership #</th>
        <th>User ID</th>
        <th>Barcode</th> 
    </tr>
    </thead>
    <tbody>
      @foreach ($allfilteredcourses6 as $member)
        <tr>
            <td>{!! $member->last_name !!}</td>
            <td>{!! $member->first_name !!}</td>
            <td>{!! $member->c_id !!}</td>
            <td>MM-{!! $member->mm_id !!}</td>
            <td>{!! $member->id !!}</td>
            <td>{!! $member->bar_code !!}</td>                            
        </tr>
    @endforeach  
    
    </tbody>
</table>