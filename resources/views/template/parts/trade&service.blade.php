<section class="section-six">
    <div class="mm-pp">
        <p>our trades and</p>
        <h3>services</h3>
    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach($categories as $key => $category)
                <div class="col-md-4 pr-2">
                    <p class="m-0">
                        <a href="{{ route('postJob') }}?categoryName={{ $category->name }}" >
                            {{ ucfirst($category->name) }}
                        </a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>