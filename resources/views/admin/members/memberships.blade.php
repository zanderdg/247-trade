@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Members List
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
                    Members List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('member/show', $user->id) }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                                        
                            
                            <th>Membership #</th>
                            <th>Home Course</th>
                            <th>Join Date</th>
                            <th>Expiry Date</th>
                            <th>Payment Type</th>
                            <th>Membership Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allmemberships as $memberships)
            <tr>
                <td>MM-{!! $memberships->mm_id !!}</td>
                <td>{!! $memberships->c_id!!}<!--  @if($memberships->is_home_course==1) <br><em style="color: #fff;    border: 1px solid #0B9444;    border-radius: 5px;
    background: #0B9444;    font-size: 8px; padding: 2px;">{!! "Home Course"!!}</em> @endif --></td>
                <td>{!! $memberships->join_date !!}</td>
                <td>{!! $memberships->expiry_date !!}</td>
                <td>{!! $memberships->payment_type !!} @if($memberships->installment_plan!=0)({!!$memberships->installment_plan!!} months)@endif</td>
                <td>    
                    @if($memberships->ifexpired==1)
                        @if($memberships->iffreezeaccount == 0)
                        Expired<br>
                        @else
                        Freezed<br>
                        @endif
                        
                    @else
                        @if($memberships->installment_plan!=0)
                            Partially Paid<br>
                            <small style="font-size: 10px;">(Remaining Balance: ${!!$memberships->remaining_amount!!})</small>
                        @else
                            Paid
                        @endif
                    @endif 
                </td>
            
                <td><a href="{{ route('member/memberships-single', ['userId'=>$user->id,'nid'=>$memberships->mm_id] ) }}">View</a></td>
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
	$('#table').DataTable(
{
    "order": [],
    // Your other options here...
}
        );
    //"aaSorting": []

});
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