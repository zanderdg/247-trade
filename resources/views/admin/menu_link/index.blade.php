@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('menu_link/title.management')
@parent
@stop
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>@lang('menu_link/title.management')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Modules</li>
        <li class="active">Menu Links</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Menu Links List
                    </h4>
                    <div class="pull-right">
                    <a href="{{ URL::to('admin/menu_link/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('menu_link/table.id')</th>
                                    <th>@lang('menu_link/table.name')</th>
                                    <th>@lang('menu_link/table.page_id')</th>
                                    <th>@lang('menu_link/table.other_url')</th>
                                    <th>@lang('menu_link/table.order')</th>
                                    <th>@lang('menu_link/table.menu_location')</th>
                                    <th>@lang('menu_link/table.status')</th>
                                    <th>@lang('menu_link/table.created_at')</th>
                                    <th>@lang('menu_link/table.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($menu_links))
                                @foreach ($menu_links as $menu_link)
                                    <tr>
                                        <td>{{{ $menu_link->id }}}</td>
                                        <td>{{{ $menu_link->name }}}</td>
                                        <td>
                                            @if ($menu_link->page_id != 0 && $menu_link->golf_course_id ==0)
                                                <a href="{{{ URL::to($menu_link->page['slug']) }}}" target="_blank">{{{ $menu_link->page['title'] }}}</a>
                                            @elseif($menu_link->page_id == 0 && $menu_link->golf_course_id !=0)
                                                {{-- */ $golfData = $menu->getGolfCourseLink($menu_link->golf_course_id); 
                                                /* --}}
                                                <a href="{{{ URL::to('golf_course/'.$golfData['slug']) }}}" target="_blank">{{{ $golfData['title'] }}}</a>
                                            @else
                                                None
                                            @endif
                                        </td>
                                        <td>{{{ $menu_link->other_url }}}</td>
                                        <td>{{{ $menu_link->order }}}</td>
                                        <td>
                                            @if ($menu_link->menu_location == 0)
                                                Top
                                            @elseif ($menu_link->menu_location == 1)
                                                Header
                                            @else
                                                Footer
                                            @endif
                                        </td>
                                        <td>
                                            @if ($menu_link->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>{{{ $menu_link->created_at->diffForHumans() }}}</td>
                                        <td>
                                            <a href="{{{ URL::to('admin/menu_link/' . $menu_link->id . '/edit' ) }}}">
                                                <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Menu Link"></i>
                                            </a>

                                            <a href="{{ route('confirm-delete/menu_link', $menu_link->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Menu Link"></i>
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
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="menu_link_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>
        $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
    </script>
@stop
