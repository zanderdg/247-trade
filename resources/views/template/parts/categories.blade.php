<!-- popular section -->
<section class="most-popular">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mm-pp">
                    <p>MOST POPULAR</p>
                    <h3>CATEGORIES</h3>
                </div>
            </div>
            @if($limitedCategories)
                @foreach ($limitedCategories as $category)
                    <div class="col-md-3">
                        <div class="cate-ff">
                            <a href="{{ route('postJob') }}?categoryName={{ $category->name }}" >
                                <p>{{ ucfirst($category->name) }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>No Category is available.</h3>
            @endif            
        </div>
    </div>
    <div class="btn-bb"><a href="{{ route('categories') }}">BROWSE ALL</a></div>
</section>
<!-- popular section end -->