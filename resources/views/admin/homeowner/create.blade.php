@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Categories List
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
        <li>Categories
        </li>
        <li class="active">create</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Add New Categories
                    </h3>
                            <span class="pull-right clickable">
                                <i class="glyphicon glyphicon-chevron-up"></i>
                            </span>
                </div>
                <div class="panel-body">

                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('discription', '<span class="help-block">:message</span>') !!}
                        {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="alert alert-info">
                        <strong>(*)</strong> Mandatory fields.
                    </div>

                    <!--main content-->
                    <div class="col-md-12">

                        <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                        <form class="form-horizontal" action="{{ route('create/category') }}" method="POST" enctype="multipart/form-data">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <section>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Category Name *</label>
                                    <div class="col-sm-10">
                                        <input id="first_name" name="name" type="text" placeholder="Category Name" class="form-control required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cat_icon" class="col-sm-2 control-label">Category Icon</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="cat_icon" name="cat_icon" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" type="text" class=" textarea form-control required" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label"> Want to publish? </label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" name="status"> 
                                    </div>
                                </div>
                            </section>

                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('category') }}" type="botton" class="btn btn-link">back</a>
                        </form>
                        <!-- END FORM WIZARD WITH VALIDATION -->
                    </div>
                    <!--main content end-->
                </div>
            </div>
        </div>
    </div>
    <!--row end-->
</section>



@endsection

@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>

    <script type="text/javascript">


        $(document).ready(function() {
            // TinyMCE Full
            tinymce.init({
                selector: ".textarea",
                height : 300,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true,
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                }, {
                    title: 'Test template 2',
                    content: 'Test 2'
                }],

                external_filemanager_path:"../../../assets/vendors/responsive-filemanager/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                external_plugins: { "filemanager" : "../../../../vendors/responsive-filemanager/filemanager/plugin.min.js"},
                convert_urls: false
            });
        });

    </script>
@endsection