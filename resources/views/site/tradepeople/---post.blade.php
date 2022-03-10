{{-- <div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active">
      @if(isset($leadsWithOnwers))
      @foreach($leadsWithOnwers as $key => $leadsWithOnwer)
      <div class="container mb-3 jobCards">
        @foreach ($leadsWithOnwer as $key => $leads)
          <div class="row">
            @if($key == 0) 
              <div class="name col-md-4"><table><tr><th>Name:</th><td>{{ $leads['name'] }}</td></tr></table></div>
              <div class="email col-md-4"><table><tr><th>Email:</th><td>{{ $leads['email'] }}</td></tr></table></div>
              <div class="phone col-md-4"><table><tr><th>Contact:</th><td>{{ $leads['phone'] }}</td></tr></table></div>
            @else
              <div class="col-md-12 tradepeopleOptions">
                <div class="row" id="options">
                  <div class="col-md-3 btn" onclick="moveTo('won', {{ $leads['id'] }})"><p class="text-center">Move to Won</p></div>
                  <div class="col-md-3 btn" onclick="moveTo('done', {{ $leads['id'] }})"><p class="text-center">Move to Done</p></div>
                  <div class="col-md-3 btn" onclick="moveTo('lost', {{ $leads['id'] }})"><p class="text-center">Move to Lost</p></div>
                  <div class="col-md-3 btn" onclick="moveTo('archive', {{ $leads['id'] }})"><p class="text-center">Move to Archive</p></div>
                </div>
              </div>
              <div class="col-md-12 jobCard">
                <h3>{{$leads['sub_category']}} / {{$leads['title']}}</h3>
                  <div class="">
                    <div class="pl-3">
                      <table>
                          <tr>
                              <th>Location:</th>
                              <td>Karachi</td>
                          </tr>
                          <tr>
                              <th>Status:</th>
                              <td>{{ $leads['hiring_stage'] }}</td>
                          </tr>
                          <tr>
                              <th>Budget:</th>
                              <td>{{ $leads['amount'] }}</td>
                          </tr>
                          <tr>
                              <th>Timing:</th>
                              <td>{{ $leads['timing'] }}</td>
                          </tr>
                          <tr>
                              <th>OwnerShip:</th>
                              <td>{{ $leads['ownership'] }}</td>
                          </tr>
                      </table>
                  </div>
                    {{ $leads['description'] }}
                </div>
              </div>
            @endif
      
          </div>
        @endforeach
      </div>
        
      @endforeach
      @else
          No leads Founds.
      @endif
  </div>
  {{-- <div class="tab-pane fade" id="list-won" role="tabpanel" aria-labelledby="list-won-list">...</div>
  <div class="tab-pane fade" id="list-done" role="tabpanel" aria-labelledby="list-done-list">...</div>
  <div class="tab-pane fade" id="list-lost" role="tabpanel" aria-labelledby="list-lost-list">...</div>
  <div class="tab-pane fade" id="list-archive" role="tabpanel" aria-labelledby="list-archive-list">...</div> 
</div> --}}