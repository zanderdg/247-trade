@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Categories
@parent
@stop

@section('content')

    <!-- Categories sectionstart -->
    <section class="most-popular">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="mm-pp">
                    <p>find suitable job from</p>
                    <h3>CATEGORIES</h3>
                </div>
            </div>
                @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="cate-ff">
                        <a href="{{ route('postJob') }}?categoryName={{ $category->name }}" >
                            <p>{{ ucfirst($category->name) }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection