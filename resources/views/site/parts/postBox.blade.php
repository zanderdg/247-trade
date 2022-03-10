    <section class="text-bb">
        <div class="container">
            @foreach($leads as $lead)
            <div class="row">
                <div class="col-md-12" style='padding: 20px;'>
                    <h3>{{ $lead->title }} / {{ $lead->sub_category_id }}</h3> 
                        {{-- <p class="ri-im"><img src="images/trash-icon.png">Quit Job</p> --}}
                    <div class="tat-a">
                    <div class="col-md-6 fl-left">
                        <p class="left-dd">Budget:</p>
                        <p class="right-dd">Under £{{ $lead->amount }}</p>
                    </div>
                    <div class="col-md-6 fl-right">
                        <p class="left-dd">Purchase Lead: </p>
                        <p class="right-dd">{{ $lead->created_at->format('d F, Y') }} </p>
                        {{-- 11:28 11 September 2020 --}}
                    </div>
                    </div>
                    <p style="padding: 0 20px;"> {{ $lead->description }} </p>
                </div>
            </div>
            @endforeach
            {{-- {{ $leads->links() }}  --}}
        </div>
    </section>