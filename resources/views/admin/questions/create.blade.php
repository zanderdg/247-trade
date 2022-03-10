@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Create Question & Options
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Que & Ans</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Que & Ans
        </li>
        <li class="active">create</li>
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
                        Add New Que & Ans
                    </h3>
                            <span class="pull-right clickable">
                                <i class="glyphicon glyphicon-chevron-up"></i>
                            </span>
                </div>
                <div class="panel-body">

                    <!-- errors -->
                    <div class="has-error">
                        {!! $errors->first('question', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="alert alert-info">
                        <strong>(*)</strong> Mandatory fields.
                    </div>

                    <!--main content-->
                    <div class="col-md-12">

                        <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                        <form class="form-horizontal" action="{{ route('create/question') }}" method="POST">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <section>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Question Title *</label>
                                    <div class="col-sm-3">
                                        <input id="title" name="title" type="text" placeholder="Question Title" class="form-control required"/>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="text-danger"><strong>Question Title feild</strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Question *</label>
                                    <div class="col-sm-10">
                                        <input id="title" name="question" type="text" placeholder="Question" class="form-control required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Answer Type *</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_type" value="text" class="required">
                                          Text
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_type" value="Textarea" class="required">
                                          Textarea
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_type" value="radio" class="required">
                                          Radio
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_type" value="image" class="required">
                                          Image
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_type" value="select" class="required">
                                          Dropdown
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="answer_type" value="increment" class="required">
                                          Increment
                                        </label>
                                        
                                    </div>
                                </div>
                            </section>

                            <section id="answer"></section>

                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('question') }}" type="botton" class="btn btn-link">back</a>
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

    <script type="text/javascript">

        $('input[name="answer_type"]').on('change', function(){
            if($('input[name=answer_type]:checked').val() == 'radio'){
                radio();
            } else if($('input[name=answer_type]:checked').val() == 'select') {
                select();
            } else if($('input[name=answer_type]:checked').val() == 'increment') {
                radio();
            } else {
                $('#answer').hide();
            }
            // $('input[name=answer_type]:checked').val() == 'increment' ? increment() : $('#answer').hide();
        });

        function radio(){
            debugger
            $('#answer').empty();
            value = 0;
            appendAnsDiv();
        }

        function select() {
            $('#answer').empty();
            value = 0;
            appendAnsDiv();
        }

        var value = 0;
        function appendAnsDiv(){
            value = value + 1;
            $('#answer').append('<div class="form-group" id="answer'+value+'"><label for="title" class="col-sm-2 control-label">Answer *</label><div class="col-sm-8"><input id="title" name="answer[]" type="text" placeholder="Answer Value" class="form-control required"/></div><div class="col-sm-2"><a class="btn btn-primary" onClick="appendAnsDiv()">+</a> <a class="btn btn-primary" onClick="mines('+value+')" >-</a></div></div>');
            $('#answer').show();
        }
        // ['+value+']
        function mines(value) {
            parseInt(value) > 0 ? $('#radio'+value+'').remove() : alert("Can't remove this field12312312.")
        }
    
    </script>
@endsection