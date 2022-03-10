@extends('layouts.site.app')
{{-- Page title --}}
@section('title')
Checkout
@parent
@stop
@section('content')
<section>
   <div class="container my-5">
      <form action="{{ url('checkout') }}" method="post" id="cardFrom">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="row">
            <div class="col-md-9">
               <div class="card ">
                  <div class="card-body">
                     <h3 class="card-title "> {{ $job->name }} / {{ $job->title }} </h3>
                     <div class="text text22">
                        <div class="pl-3">
                           <table>
                              <tbody><tr>
                                 <th>Location: &nbsp; </th>
                                 <td>{{ $job->location }}</td>
                              </tr>
                           </tbody></table>
                        </div>
                        <hr class="m-1">
                        <b>Description: &nbsp; </b>
                        {!! $job->description != null ? $job->description : null !!}
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 p-0">
               <div class="card">
                  <div class="card-body p-3">
                     <input type="hidden" name="jobId" value="{{ $job->id }}">
                     <div class="creditCardForm require-validation">
                        <div class="payment">
                           <div class="form-group owner">
                              <label for="owner" class="m-0">Account Title</label>
                              <input type="text" name="owner" class="form-control form-control-sm card-name" id="owner">
                           </div>
                           <div class="form-group m-0 field" id="card-number-field">
                              <label for="cardNumber" class="m-0">Card Number</label>
                              <input type="text" name="cardNumber" class="form-control form-control-sm card-number" id="cardNumber">
                              <div class="text-right"><small><strong id="ccnum-type">Card Type</strong></small></div>
                           </div>
                           <div class="form-group " id="expiration-date">
                              <label class="m-0">Expiration Date</label>
                              <div class="row">
                                 <div class="col-8 field">
                                    <input name="expiry" placeholder="MM / YYYY" size="7" class="form-control form-control-sm" type="tel" id="expiry">
                                 </div>
                                 <div class="col-4 pl-0 field">
                                    <input type="password" placeholder="CVC" name="cvc" id="cvc" class="form-control form-control-sm">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group" id="pay-now">
                              <button class="btn btn-success btn-sm btn-block" id="submitme">Pay Now</button>
                              <div id="result" class="emoji"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
@endsection
@section('footer_script')

   <script src="{{ asset('assets/front_lib/js/payform.min.js')}}" charset="utf-8"></script>
   <script src="{{ asset('assets/front_lib/js/card_script.js')}}"></script>

@endsection