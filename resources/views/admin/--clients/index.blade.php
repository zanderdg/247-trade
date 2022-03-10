@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clients List
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
    <h1>Clients</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Clients</li>
        <li class="active">Clients</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Clients List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('create/client') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>Client Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Family Name</th>
                            <th>User E-mail</th>
                            <th>TFN Number</th>
                            <th>ABN Number</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientData as $client)
                    	<tr>
                            <td>{!! $client->client_id !!}</td>
                            <td>{!! $client->client_number !!}</td>
                    		<td>{!! $client->first_name !!}</td>
                            <td>{!! $client->last_name !!}</td>
            				<td>{!! $client->family_name !!}</td>
                            <td>{!! $client->email !!}</td>
                            <td>{!! $client->tfn_number !!}</td>
            				<td>{!! $client->abn_number !!}</td>                           
            				<td>
            					@if($activation = Activation::completed($client))
            						Activated
            					@else
            						Pending
            					@endif
            				</td>
                            <td>{!! $client->created_at->diffForHumans() !!}</td>
            				<td>
                                <a href="{{ route('client/show', $client->id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>

                                <a href="{{ route('client/update', $client->id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i></a>
                                
                                @if ((Sentinel::getUser()->id != $client->id) && ($client->id != 1))
                                
                					<a href="{{ route('confirm-delete/client', $client->id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete client"></i></a>
                                
                                    <!-- <a href="{{ route('confirm-disable/client', $client->id) }}" data-toggle="modal" data-target="#disable_confirm"><i class="livicon" data-name="warning-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="disable client"></i></a> -->
                                
                				@endif
                                
                                <a href="{{ route('client/subscriptionorders', $client->id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>
                                
                                
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