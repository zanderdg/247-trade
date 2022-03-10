@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Edit Role
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Edit {{ $rolePermissions->name }} Role</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Roles</li>
        <li class="active">Edit {{ $rolePermissions->name }} Role</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        {{ $rolePermissions->name }} Role
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">


                    <!--main content-->
                    <div class="col-md-12">

                        <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                        {{-- {{ route('create/role') }} --}}
                        <form action="{{ route('create/role') }}" method="POST">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            
                            {{-- <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Role Name</label>
                                            <input type="text" value="{{ old('name', $rolePermissions->name) }}" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Role Slug</label>
                                            <input type="text" value="{{ old('name', $rolePermissions->slug) }}" name="slug" id="slug" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Role Description</label>
                                            <input type="text" name="description" id="description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="permission">Role Permissions</label>
                                            {{-- <textarea class="form-control" name="permission[]" id="permission" cols="30" rows="9"></textarea> --}}
                                            <select multiple class="form-control">
                                                @foreach($GETRoutes as $GETRoute)
                                                    <option>{{ $GETRoute }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-row">
                                    @foreach ($rolePermissions->permissions as $key => $value)
                                        <ul>
                                        <li>{{ $key }} = @if($value == 1) true @endif</li>
                                        </ul>
                                    @endforeach

                                    
                                    {{-- @foreach ($models as $model)
                                        {{-- @foreach($model[0]['User'] as $mode)
                                            <div class="col-md-3">
                                                <div class="panel panel-default">
                                                    
                                                    {{ $mode->id }}

                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach --}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-block btn-success" type="submit"> Create Role </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection