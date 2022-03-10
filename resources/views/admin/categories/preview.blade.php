@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Categories Preview
@parent
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Categories</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li >Categories</li>
            <li class="active">{{ ucfirst($category[0]->name) }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ ucfirst($category[0]->name) }}
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="col-md-12" style="overflow: hidden;">
                            Name: {{ ucfirst($category[0]->name) }}
                            <br>
                            @php $icon = 'sdasd'; @endphp
                            Icon: @svg($icon, 'svg')
                            <br>
                            Slug: <a href="{{ URL('/').'/'.$category[0]->slug }}">{{ URL('/').'/'.$category[0]->slug }}</a>
                            <br>
                            Status: {{ $category[0]->status == 1 ? 'Published' : 'Unpublished' }}
                            <br>
                            Created at: {{ $category[0]->created_at->diffForHumans() }}
                            <br>
                            Description: {!! strip_tags($category[0]->description, '<p>') !!}
                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>


@endsection