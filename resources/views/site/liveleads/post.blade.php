    @if(Sentinel::check())
        @if(is_object($jobs))
            @if($jobs->total() != 0)            
                <div class="col-12 left-se">
                    <p>{{$jobs->total()}} job found.</p>
                </div>
                @foreach($jobs as $job)
                    <div class="job_card col-md-12">
                        <div class="row">
                            <div class="col-9">
                                <h3><i class="fa fa-bolt" aria-hidden="true"></i> {{ ucfirst($job->title) }}</h3>
                                <div class="tat-a">
                                    <div class="col-md-12 fl-left clearfix">
                                    <h4><i class="fa fa-wrench" aria-hidden="true"></i> {{ ucfirst($job->name) }}</h4>
                                    <p class="left-dd"><i class="fa fa-map-marker" aria-hidden="true"></i> Location: &nbsp; </p>
                                        <p class="right-dd">{{ $job->location }}</p>
                                    </div>
                                    <div class="col-md-12 fl-left clearfix">
                                    <p class="left-dd"><i class="fa fa-calendar" aria-hidden="true"></i> Posted: &nbsp; </p>
                                        <p class="right-dd">{{ $job->created_at->diffForHumans(null, true).' ago' }} </p>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('livelead-preview', $job->id) }}"  class="d-flex justify-content-end">
                                    <p class="mx-4 mt-4 mb-0 d-flex align-items-center text-success">Click here to see details 
                                        <i class="ml-2 fa fa-arrow-right"></i>
                                    </p>
                                </a>
                                <a href="javascript:;" onclick="notinter(event, {{ $job->id }})" class="d-flex justify-content-end">
                                    <p class="mx-4 d-flex align-items-center text-danger">Not interested
                                        <i class="ml-2 fa fa-times"></i>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div id="profile-description">
                            <div class="text text{{ $job->id }} show-more-height">
                                <hr class="m-1">
                                <b>Description:</b>
                                {{ $job->description }}
                                @if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug =='tradeperson')
                                    <a href="{{ route('checkout', $job->id) }}" class="my-2 btn btn-block btn-outline-success">£5 + VAT</a>
                                @elseif(Sentinel::check() && Sentinel::getUser()->roles[0]->slug !='tradesperson')
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Tradepeople</strong> can purchase a jobs!
                                    </div>
                                @else
                                    <div class="alert alert-info" role="alert">
                                        Need to Login and register! — <a href="{{ route('client-login') }}" class="alert-link">Login</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="vin-btn">
                            <div class="vie-mm show-more" onClick="viewmore({{ $job->id }})">VIEW MORE</div>
                        </div>
                    </div>
                @endforeach
    
                {!! $jobs->render() !!}
            @else
                <div class="row m-auto">
                    <div class="card alert alert-info">
                        <p class="display-3 m-0">No job result found</p>
                    </div>
                </div>
            @endif
        @else 
            <div class="row m-auto">
                <div class="card alert alert-warning">
                    <p class="display-4 m-0">{{$jobs}}</p>
                </div>
            </div>
        @endif
    @else
        <div class="row m-auto">
            <div class="card alert alert-warning">
                <p class="display-4 m-0">You need to Register or Login</p>
            </div>
        </div>
    @endif