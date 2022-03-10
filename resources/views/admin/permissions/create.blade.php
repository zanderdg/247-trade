@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Create Permission
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Create Permission</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Permissions</li>
        <li class="active">Create Permission</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Total Number GET Routes: {{ count($restOfRoutes) }}
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form action="{{ route('create/permission') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="col-md-12">
                            @foreach($restOfRoutes as $key => $value)
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permission{{$key}}" value="{{ $value }}"> {{ $value }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    

    {{-- <form action="{{ route('create/permission') }}" method="POST"> --}}
        <!-- CSRF Token -->
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
        
           
        <div class="col-md-12">
            {{-- <div class="row"> --}}
                
                {{-- <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Permission Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Example: Can View Users">
                    </div>
                    <div class="form-group">
                        <label for="slug">Permission Slug</label>
                        <input class="form-control" type="text" value="{{ $restOfRoute }}" name="slug" id="slug" placeholder="Example: user.preview">
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
                </div>                 --}}
            {{-- </div>      --}}
        {{-- </div>    --}}

        {{-- @endforeach --}}

        {{-- <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-block btn-success" type="submit"> Create Permission </button>
            </div>
        </div> --}}
        
        {{-- <ul>
            
        </ul> --}}

        
    {{-- </form> --}}

</section>

@endsection