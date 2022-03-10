@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Post Job 
@parent 
@stop

@section('content')
    
    <section>
        <div class="container py-5">
            <table class="table table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Service</td>
                        <td>{{ $postData->category }}</td>
                    </tr>
                    <tr>
                        <td>Sub Category</td>
                        <td>{{ $postData->subcategory }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Timing</td>
                        <td>{{ $postData->answer1 }}</td>
                    </tr>
                    <tr>
                        <td>Hiring Stage</td>
                        <td>{{ $postData->answer2 }}</td>
                    </tr> --}}
                    {{-- @if(isset($postData->job_auth))
                    <tr>
                        <td>OwnerShip</td>
                        <td>{{ $postData->job_auth }}</td>
                    </tr>
                    @endif --}}
                    <tr>
                        <td>Title</td>
                        <td>{{ $postData->job_title }}</td>
                    </tr>
                    <tr>
                        <td>Post Code</td>
                        <td>{{ $postData->job_postcode }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Budget</td>
                        <td>{{$postData->amount }}</td>
                    </tr> --}}
                    @if(isset($postData->job_images))
                    <tr>
                        <td>Images</td>
                        <td>{{ $postData->job_images }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Description</td>
                        <td>{{ $postData->job_description }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="row mx-1">
                <form action="{{ route('beforePostJob') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-success mr-1" type="submit">Continue to post Job</button>
                </form>
                <form action="{{ route('discardPost') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-danger" type="submit">Discard</button>
                </form>
            </div>

        </div>
    </section>
    

@endsection