<div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show" id="" role="tabpanel" aria-labelledby="">

        @if($jobs)

        @foreach ($jobs as $key => $job)

        <div class="card mb-2">

            <div class="card-body">

                {!! $job->deleted_at == null ?'': '<p class="text-warning">This job is on longer available.</p>' !!}

                <div class="row">

                    <div class="col-10">

                        <h3 class="card-title"> <strong> {{ $job->sub_category_id }} / {{ $job->title }} </strong></h3>

                    </div>

                    <div class="col-2 text-right">

                        <div class="dropdown bars">

                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">

                                <i class="fa fa-bars" aria-hidden="true"></i></button>

                            <ul class="dropdown-menu">

                                <li><a onclick="moveTo('won', '{{ $job->id }}')" class="btn btn-link" href="#">move to won</a></li>

                                <li><a onclick="moveTo('done', '{{ $job->id }}')" class="btn btn-link" href="#">move to done</a></li>

                                <li><a onclick="moveTo('lost', '{{ $job->id }}')" class="btn btn-link" href="#">move to lost</a></li>

                                <li><a onclick="moveTo('archive', '{{ $job->id }}')" class="btn btn-link" href="#">move to archive</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4"><strong>Reference Number:</strong> {{ $job->reference_number }}</div>

                    <div class="col-md-4 offset-md-4"><strong>Posted:</strong> {{ $job->created_at->diffForHumans() }}</div>

                </div>

                <div class="">

                    <table>

                        <tr>

                            <th>Location: </th>

                            <td>{{ $job->location }}</td>

                        </tr>

                        {{-- <tr>

                                    <th>Status:</th>

                                    <td>{{ $job->hiring_stage }}</td>

                        </tr>

                        <tr>

                            <th>Budget:</th>

                            <td> {{ $job->currency }}{{ $job->amount }}</td>

                        </tr>

                        <tr>

                            <th>Timing:</th>

                            <td>{{ $job->timing }}</td>

                        </tr> --}}

                        {{-- <tr>

                                    <th>OwnerShip: </th>

                                    <td>{{ $job->ownership }}</td>

                        </tr> --}}

                    </table>



                </div>

                <p><b>Description:</b> {{ $job->description }} </p>

                <hr>

                <div class="card">

                    <div class="card-body">

                        <div class="col-12 p-0"><strong>Name:</strong> {{ $job->owner_id->first_name }} {{ $job->owner_id->last_name }}</div>

                        <div class="row">

                            <div class="col-md-6"><strong>Email:</strong> {{ $job->owner_id->email }}</div>

                            <div class="col-md-6"><strong>Phone:</strong> {{ $job->owner_id->country_code }} {{ $job->owner_id->phone }}</div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        @endforeach

        @endif

    </div>

</div>