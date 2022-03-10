@extends('admin.layouts.default')

{{-- car title --}}
@section('title')
Income
@parent
@stop

{{-- car level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
@stop

{{-- car content --}}
@section('content')
<section class="content-header">
    <h1>Income</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Income</li>
    </ol>
</section>
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="doc-portrait" data-size="16"
                        data-loop="true" data-c="#fff" data-hc="white"></i>
                    Income List
                </h4>
                <div class="pull-right">
                    <a href="{{ URL::to('admin/income/create') }}" class="btn btn-sm btn-default"><span
                            class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table1">
                    <thead>
                        <tr class="filters">
                            <th>Name</th>
                            <th>Percent</th>
                            <!-- <th width="15%" title="for manually input percent">Allow Client</th> -->
                            <th width="15%">Multi Field</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- row-->
</section>
@stop

{{-- capability level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>
<script>
    $(function() {
            var table = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('data/income') !!}',
                columns: [
                    { data: 'income_name', name: 'income_name' },
                    { data: 'income_percent', name: 'income_percent' },
                    // { data: 'income_manual', name: 'income_manual' },
                    { data: 'income_multi_fields', name: 'income_multi_fields' },
                    { data: 'income_status', name: 'income_status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );
        });
</script>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="page_delete_confirm_title"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
    $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
</script>
@stop