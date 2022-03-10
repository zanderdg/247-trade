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
            <li >Question</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Question
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="col-md-12" style="overflow: hidden;">
                            {{-- {{ $question }} --}}
                            <h2>Que: {{ $question->question }}</h2>
                            @if($question->answer_type == 'increment' || $question->answer_type == 'radio' || $question->answer_type == 'select')
                                <table>
                                    @foreach($question->answer as $option)
                                        <tr> <td>{{ $option }}</td> </tr>
                                    @endforeach
                                </table>
                            @endif

                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>


@endsection