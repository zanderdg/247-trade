{{-- * Template Name : Homeowner-HIW * --}}

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
        <h1>How the service works</h1>
        <h4>It’s simple to find a quality local tradesperson.</h4>
        <ul>
            <li><strong>Creating a job is free</strong>
                Whatever you need doing around the house, we can connect you with the right tradespeople. With over 30 specialist trades, covering the whole of the UK, every job’s covered. Just give us as much detail as possible so our tradespeople can get you an accurate quote.
            </li>
            <li><strong>Get quotes</strong>
                Up to 3 tradespeople can provide a quote, but on average you’ll get 1-2. They pay a fee to do this, at which point they get to see your contact details.
            </li>
            <li><strong>Check reviews</strong>
                You’ll get a link to each tradesperson’s profile page where you can see their reviews and reviews. Only homeowners who have found their tradesperson through our site can leave reviews, so they’re based on genuine experiences.
            </li>
            <li><strong>Pick a tradesperson</strong>
                Go through our homeowner checklist, which explains how to review a tradesperson’s qualifications, reputation and agree the work.
            </li>
            <li><strong>Job done</strong>
                After the work is complete, return to the site and review your tradesperson based on quality of their work, reliability and value for money.
            </li>
        </ul>
    </div>

@endsection