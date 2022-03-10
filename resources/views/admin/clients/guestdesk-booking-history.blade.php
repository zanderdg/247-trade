@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Members Booking History
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
    <h1>Members</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Members</li>
        <li class="active">Members</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Booking History
                </h4>
                <div class="pull-right">
                    <a href="{{ route('members') }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
            <tr class="filters">
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Course Name</th>
                <th>Play Date</th>
                <th>Play Time</th>
                <th>Golfers</th>
                <th>Confirmation Number</th>
                <th>Book Date</th>
            </tr>
        </thead>
     
        <tbody>   
            {{-- */$i=0;/* --}}
            @foreach($allgdesks as $gdesks)
            <tr>
                <td>{!!$allgdesks[$i]->last_name!!}</td>
                <td>{!!$allgdesks[$i]->first_name!!}</td>
                <td><a href="{{ route('member/show', $allgdesks[$i]->u_id) }}">{!!$allgdesks[$i]->email!!}</a></td>
                <td>{!!$allgdesks[$i]->course_name!!}</td>
                <td>{!!$allgdesks[$i]->play_date!!}</td>
                <td>{!!$allgdesks[$i]->play_time!!}</td>
                <td>{!!$allgdesks[$i]->golfers!!}</td>      
                <td>{!!$allgdesks[$i]->confirmation_number!!}</td>
                <td>{!!$allgdesks[$i]->book_date!!}</td>
            </tr>
            {{-- */$i++;/* --}}
            @endforeach
         
            
                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function() {
	$('#table').DataTable();
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