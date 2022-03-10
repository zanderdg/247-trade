<div class="container">
    <div class="row">
        {{-- @if($user->userDetails->postal == null)
            <div class="alert alert-warning my-2 mx-auto" role="alert">
                <h2 class="alert-heading p-0">Warning!</h2>
                <p class="m-0">Please complete your profile in order to post your job post for Tradespeople to see. Otherwise your post is only visible to you only.</p>
                <hr>
                <p class="m-0">Complete Profile, <a href="{{ route('update-profile',  $user->id) }}" class="alert-link">Profile</a></p>
            </div>
        @endif --}}
        <div class="left-se">
        </div>
        @if(isset($res))
            @foreach($res as $key => $job)
                <div class="col-md-12 py-2">
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><strong>{{ $job->sub_category_id }} / {{ $job->title }}</strong></h3>
                                </div>
                                <div class="offset-md-4 col-md-2 text-right">
                                    <button onclick="discard({{$job->id}}, '{{$job->title}}')" data-toggle="modal" data-target="#discardModel" class="btn btn-sm btn-danger">Delete Job</button>
                                </div>
                            </div>
                            <div class="pl-3">
                                <table>
                                    <tr>
                                        <th>Location: &nbsp; </th>
                                        <td>{!! $job->location ?? 'Not available' !!}</td>
                                    </tr>
                                </table>
                            </div>
                            <p> <b>Description:</b> {{ $job->description }} </p>
                            <div class="row mx-1">
                            
                            </div>
                            <hr>
                            @if($job->leadPurchaseBy != "[]")
                                {!! is_null($job->leadPurchaseBy) !!}
                                <div class="row">
                                @foreach($job->leadPurchaseBy as $key => $tradepeople)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <table></table>
                                                <p class="m-0"><strong>Name:</strong> {{ ucfirst($tradepeople->first_name) }} {{ ucfirst($tradepeople->last_name) }}</p>
                                                <p class="m-0"><strong>Email:</strong> {{ $tradepeople->email }}</p>
                                                <p class="m-0"><strong>Phone:</strong> {{ $tradepeople->userdetails->country_code }} {{ $tradepeople->userdetails->phone }}</p>
                                                <div class="row">
                                                    <div class="btn-review col-12 mt-3">
                                                        <a href="{{ route('guest-profile-view', $tradepeople->id).'?a2dJU!!12JASE395W!&job='.$job->id.'&a2dJU!!120742AW!' }}" class="float-right badge badge-success ">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            {{-- @else
                                <div class="alert alert-primary m-0 text-center" role="alert">
                                    <p class="m-0">Not yet purchase by anyone.</p>
                                </div>  --}}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        {{-- @else
            <div class="my-5 alert alert-success" role="alert">
                <h4 class="alert-heading"><strong>{{ Sentinel::getUser()->first_name }}</strong></h4>
                <p>Want to post a job? you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Currently there is no job is posted by you.</p>
            </div> --}}
        @endif
    </div>
    {{-- {!! $data->render() !!}  --}}
</div> 