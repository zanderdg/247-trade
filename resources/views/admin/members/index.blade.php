@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Customers List
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
    <h1>Customers</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Customers</li>
        <li class="active">Customers</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Customers List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('create/member') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User E-mail</th>
                            
                            <th>Status</th>
                            <th>Created At</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($membersData as $member)
                    	<tr>
                            <td>{!! $member->m_id !!}</td>
                    		<td>{!! $member->first_name !!}</td>
            				<td>{!! $member->last_name !!}</td>
            				<td>{!! $member->email !!}</td>
                            
            				<td>
            					@if($activation = Activation::completed($member))
            						Activated
            					@else
            						Pending
            					@endif
            				</td>
                            <td>{!! $member->created_at->diffForHumans() !!}</td>
            				<td>
                                <!-- <a href="{{ route('member/show', $member->id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a> -->

                                <a href="{{ route('member/update', $member->id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i></a>
                                
                                @if ((Sentinel::getUser()->id != $member->id) && ($member->id != 1))
                                
                					<a href="{{ route('confirm-delete/member', $member->id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete member"></i></a>
                                
                                    <!-- <a href="{{ route('confirm-disable/member', $member->id) }}" data-toggle="modal" data-target="#disable_confirm"><i class="livicon" data-name="warning-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="disable member"></i></a> -->
                                
                				@endif
                                
                                
                            </td>
            			</tr>
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