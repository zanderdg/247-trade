@extends('admin/layouts/default')

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page title --}}
@section('title')
Permissions
@parent
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Add New Permission</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Permissions</li>
            <li class="active">Add New Permission</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New Permission
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <!-- errors -->
                        <div class="has-error">
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                        </div>

                        <!--main content-->
                        <div class="col-md-12">

                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            {{-- {{ route('create/role') }} --}}
                            <form action="{{ route('create/permission') }}" method="POST">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Permission Name</label>
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Example: Can View Users">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Permission Slug</label>
                                                <input class="form-control" type="text" name="slug" id="slug" placeholder="Example: user.preview">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Permission Description</label>
                                                <textarea class="form-control" placeholder="Example: Can view users" name="description" id="description" rows="5" cols="30"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="model">Permission Model </label>
                                                <input class="form-control" name="model" id="model" placeholder="Example: User">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-success" type="submit" style="margin-top: 52%;"> Create Permission </button>
                                            </div>
                                        </div>
                                    </div>     
                                </div>   
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Existing Permissions</h3>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Permission</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Model</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>    
                            </thead>       
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>
    <script>
        $(function() {
            var table = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('permissions/data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'Name' },
                    { data: 'slug', name: 'Slug' },
                    { data: 'description', name: 'Description' },
                    { data: 'model', name: 'Model' },
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
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="page_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>
        $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
    </script>
@stop