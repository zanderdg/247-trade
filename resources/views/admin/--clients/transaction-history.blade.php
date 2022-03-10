@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clients Transaction History
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
                    Transaction History
                </h4>
                <div class="pull-right">
                    <a href="{{ route('clients') }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Client Name</th>
                            <!-- <th>Course Name</th> -->
                            <!-- <th>Join Date</th> -->
                            <th>Pay Date</th>
                            <th>Transaction ID</th>
                            <th>Transaction Amount</th>
                            <th>Payment Type</th>
                            <!-- <th>Installment Plan</th> -->
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($alltransactions as $transactions)
            <tr>
                <td><a href="{{ route('member/show', $transactions->u_id ) }}">{!! $transactions->user->first_name.' '.$transactions->user->last_name !!}</a></td>
                <!-- <td>{!! $transactions->c_id !!}</td>
                <td>{!! $transactions->join_date !!}</td> -->
                <td>{!! $transactions->created_at->format('M d, Y') !!}</td>
                <td>{!! $transactions->transaction_id !!}</td>
                <td>@if($transactions->transaction_amount)$ {!! $transactions->transaction_amount !!}@endif</td>
                <td>{!! $transactions->payment_type !!}</td>
                <td>{!! $transactions->installment_plan!!}</td>
                <td>{!! $transactions->status!!}</td>
                
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