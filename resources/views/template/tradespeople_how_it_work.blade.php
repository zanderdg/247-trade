{{-- * Template Name : Tradespeople-HIW * --}}

@extends('layouts.site.app')

@section('title')
    {!! isset($pageContent->meta_title) ? $pageContent->meta_title.' | 24Seven' : '24/Seven' !!}
@stop

@section('meta-keywords')
    {!! isset($pageContent->meta_keywords) ? $pageContent->meta_keywords : '24/Seven' !!}
@stop

@section('meta-description')
    {!! isset($pageContent->meta_description) ? $pageContent->meta_description : '24/Seven' !!}
@stop


@section('content')

    <div class="container my-5">
        
    </div>

@endsection