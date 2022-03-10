@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('home_banner/title.management')
@parent
@stop
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>@lang('home_banner/title.management')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Modules</li>
        <li class="active">Home Banners</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="image" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Home Banners List
                    </h4>
                    <div class="pull-right">
                    <a href="{{ URL::to('admin/home_banner/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('home_banner/table.id')</th>
                                    <th>@lang('home_banner/table.title')</th>
                                    <th>@lang('home_banner/table.image')</th>
                                    <th>@lang('home_banner/table.url')</th>
                                    <th>@lang('home_banner/table.order')</th>
                                    <th>@lang('home_banner/table.status')</th>
                                    <th>@lang('home_banner/table.created_at')</th>
                                    <th>@lang('home_banner/table.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($home_banners))
                                @foreach ($home_banners as $home_banner)
                                    <tr>
                                        <td>{{{ $home_banner->id }}}</td>
                                        <td>{{{ $home_banner->title }}}</td>
                                        <td>
                                            <img src="{{ Thumb::url('/uploads/source/'.$home_banner->image,100,0) }}"  alt="" />
                                        </td>
                                        <td>{{{ $home_banner->url }}}</td>
                                        <td>{{{ $home_banner->order }}}</td>
                                        <td>
                                            @if ($home_banner->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>{{{ $home_banner->created_at->diffForHumans() }}}</td>
                                        <td>
                                            <a href="{{{ URL::to('admin/home_banner/' . $home_banner->id . '/edit' ) }}}">
                                                <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Home Banner"></i>
                                            </a>

                                            <a href="{{ route('confirm-delete/home_banner', $home_banner->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Home Banner"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>

@stop
{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="home_banner_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>
        $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
    </script>
@stop
