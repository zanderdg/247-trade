@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Homeowner
@parent
@stop

@section('head_style')
    <style>
        .btn-review a,
        .btn-review button {
            padding: 0.50em .4em;
        }
    </style>

@endsection

@section('content')
   
    <section class="serv-dash">
        <div class="container">
            <div class="banner-content hav-aa">
                <h3 class="text-uppercase">haven't posted any jobs yet?</h3>
                <p>Post your job for free. Match to tradespeople, get quotes and read reviews.</p>
                <a class="text-uppercase" href="{{ url('/') }}">post a jobs</a>
            </div>
        </div>
    </section>
    <br>

    <div class="mm-pp">
        <p>My Recent and previous</p>
        <h3>Posted Jobs</h3>
    </div>
    
    <section class="services-mm">
        <div class="container">
            <div class="container">
            </div>
            @include('notifications')
            <div class="row">
                <div class="col-12">
                    <div class="main-ss">
                        <div class="right-se">
                            <div class="main-sss"><img src="{{ asset('assets/front_lib/images/icon-select.png') }}">
                                <select name="category" id="category">
                                    <option value="" selected>Select Category</option>
                                    @if(isset($sub_categories))
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}">{{ ucfirst($sub_category->name) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="data"></section>
    
    @include('site.homeowner.discardModel')
@endsection

@section('footer_script')
    <script src="{{ asset('assets/front_lib/js/custom.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            loaddata();
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                // alert(page);
                loaddata(page);
            }) 
        })

        $('#category').on('change', function() {    
            loaddata();
        })

        function loaddata(page) {

            sub_category_id = $('#category option:selected').val();
            // $('#spinner').show();

            if(page == null) {
                $.ajax({
                    type: "POST",
                    url: "account/homeowner-data",
                    data: { 
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(data) {
                        // console.log(data)
                        // setTimeout(function(){
                            $('#data').empty();
                            // $('#spinner').hide();
                            // $('.spinnerContainer').attr('class', 'height:0px;');
                            $('#data').append(data);
                        // }, 500);

                    },
                    error:function(data){
                        window.reload();
                    }
                });
            } else {
                $.ajax({
                    url: "account/homeowner-data" + "?page=" + page,
                    type: "POST",
                    data: { 
                        _token: "{{ csrf_token() }}", 
                        sub_category_id: sub_category_id 
                    },
                    success:function(data) {
                        $('#data').empty();
                        // console.log(data);
                        $('#data').append(data);
                    }
                });
            }
        }

        discard = (id, title) => {
            $('#job_id').val('')
            $('#job_id').val(id)
            $('#discardModelLabel').empty()
            $('#discardModelLabel').append(title)
        }

    </script>
@endsection