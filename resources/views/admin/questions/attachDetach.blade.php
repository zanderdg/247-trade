@extends('admin/layouts/default')


{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop

{{-- Page title --}}
@section('title')
Link Question
@parent
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Link Question</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Link Question</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('notifications')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Sync Question
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">

                        <!--main content-->
                        <div class="col-md-12">
                            <form action="{{ url('admin/question/attach') }}" method="POST" enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-6 form-group @if($errors->first('subcategory')) has-error @endif">
                                            <label for="">Categories</label>
                                            <select class="form-control" id="category" name="category">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->first('subcategory'))
                                                <label class="control-label text-danger" for="sub_category"> {{ $errors->first('subcategory') }} </label>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group @if($errors->first('subcategory')) has-error @endif">
                                            <label for="">Sub Categories</label>
                                            <select class="form-control" id="subCategory" name="subCategory" onchange="getQue()">
                                                <option selected disabled>First select Category</option>
                                            </select>
                                            @if($errors->first('subcategory'))
                                                <label class="control-label text-danger" for="sub_category"> {{ $errors->first('subcategory') }} </label>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group @if($errors->first('question')) has-error @endif" id="queDiv" style="display: none;">
                                            <label for="description">Questions</label>
                                            <select class="form-control searchable-dropdown" id="questions" name="question[]" multiple>
                                                <option selected disabled>Select Question</option>
                                            </select>
                                            @if($errors->first('question'))
                                                <label class="control-label text-danger" for="sub_category"> {{ $errors->first('question') }} </label>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-block btn-success" type="submit"> Attach Question </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#questions').select2({ width: '100%' });
        });

        $('#category').on('change', function(){
            console.log($('#category').val());
            $.ajax({
                url: 'get-sub-categories',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    catgory: $('#category').val(),
                },
                success:function(data){
                    console.log(data);
                    if(data){
                        $('select[name="subCategory"]').empty();
                        $('select[name="subCategory"]').append('<option selected disabled>Select Sub Category</option>');
                        for (let i = 0; i < data.length; i++) {
                            $('select[name="subCategory"]').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                        }
                    } else {
                        $('select[name="subCategory"]').empty();
                    }
                }
            });
        });

        function getQue(){
            $.ajax({
                url: 'get-questions',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    sub_category: $('#subCategory').val(),
                },
                success:function(data){
                    if(data.questions.length > 0) {
                        $('#queDiv').show();
                        $('#questions').empty();
                        for (let i = 0; i < data.questions.length; i++) {
                            if(data.attachQue.length > 0 && data.attachQue.some(a => a.question_id == data.questions[i].id)) {
                                $('select[name="question[]"]').append('<option selected value="'+ data.questions[i].id +'">'+ data.questions[i].question +'</option>');
                            } else {
                                $('select[name="question[]"]').append('<option value="'+ data.questions[i].id +'">'+ data.questions[i].question +'</option>');
                            }
                        }                        
                    } else {
                        $('#queDiv').hide();
                        $('#queDiv').empty();
                    }
                }
            });
        }
    </script>
    
@endsection