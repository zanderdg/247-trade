@extends('layouts.site.app')
{{-- Page title --}}
@section('title')
Checkout
@parent
@stop

@section('head_style')
   <link rel="stylesheet" href="{{ asset('assets/front_lib/css/stripe.css') }}">
@endsection

@section('content')
<?php $stripe_key = env('STRIPE_KEY'); ?>
<section>
   <div class="container my-5">
      <form id="payment-form">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="row">
            <div class="col-md-8">
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
            <div class="col-md-4 mt-2 mt-md-0">
               <div class="card">
                  <div class="card-body">
                     <input type="hidden" name="jobId" value="{{ $job->id }}">
                     <div class="creditCardForm require-validation">
                        <div class="payment">
                           <!-- Display a payment form -->
                              <div class="form-group owner">
                                 <label for="owner" class="m-0">Account Title</label>
                                 <input type="text" name="card_holder" value="{{ old('card_holder') }}" class="form-control form-control-sm card-name" id="name">
                              </div>

                              <div class="form-group owner">
                                 <label for="owner" class="m-0">Email</label>
                                 <input type="email" name="custommer_email" value="{{ old('custommer_email',  Sentinel::getUser()->email) }}" class="form-control form-control-sm card-name" id="email" disabled>
                              </div>
                           
                              <label class="m-0" for="">Card</label>
                              <div id="card-element"><!--Stripe.js injects the Card Element--></div>
                              <button id="submit" class="btn-sm stripe-btn" data-secret="{!! $paymentIntent->client_secret !!}">
                                 <div class="spinner hidden" id="spinner"></div>
                                 <span id="button-text">Pay now</span>
                              </button>
                              <p id="card-error" class="text-danger" role="alert"></p>
                              <p class="result-message hidden"> Payment succeeded. </p>
                              {{-- see the result in your <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again. --}}


                           {{-- <div class="form-group owner">
                                 <label for="owner" class="m-0">Account Title</label>
                                 <input type="text" name="card_holder" value="{{ old('card_holder') }}" class="form-control form-control-sm card-name" id="owner">
                              </div> --}}
                           
                            {{-- <div class="form-group m-0 field" id="card-number-field">
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
                                </div> --}}
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

   <script src="https://js.stripe.com/v3/"></script>
   <script>
      // A reference to Stripe.js initialized with your real test publishable API key.
      var stripe = Stripe("{{ $stripe_key }}");

      var elements = stripe.elements();
      var clientSecret = submit.dataset.secret;

      var style = {
         base: {
            color: "#32325d",
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "14px",
            "::placeholder": {
               color: "#32325d"
            }
         },
         invalid: {
               fontFamily: 'Arial, sans-serif',
               color: "#fa755a",
               iconColor: "#fa755a"
         }
      };

      var card = elements.create("card", { style: style });
      card.mount("#card-element");

      card.on("change", function (event) {
         // Disable the Pay button if there are no card details in the Element
         document.querySelector("button").disabled = event.empty;
         document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
      });

      var form = document.getElementById("payment-form");
      form.addEventListener("submit", function(event) {
         event.preventDefault();
         // Complete payment when the submit button is clicked
         payWithCard(stripe, card, clientSecret);
      });

      // Calls stripe.confirmCardPayment
      // If the card requires authentication Stripe shows a pop-up modal to
      // prompt the user to enter authentication details without leaving your page.
      var payWithCard = function(stripe, card, clientSecret) {
         loading(true);
         stripe.confirmCardPayment(clientSecret, {
            payment_method: {
               card: card
            }
         }).then(function(result) {
            if (result.error) {
               // Show error to your customer
                showError(result.error.message);
            } else {
                // The payment succeeded!
                result.tradesperson = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value
                }
                request(result);
            }
         });
      };

      request = (result) => {
         console.log(result.paymentIntent);
         $.ajax({
            type: "POST",
            url: "{{ url('store_payment_details') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: result,
            success: function(data) {
                loading(false);
                window.location.href = "{{ url('account') }}";
            },
            errors: function(data) {
               loading(false);
               console.log('inError',data);
            }
         });
      }

      /* ------- UI helpers ------- */

      // Show the customer the error from Stripe if their card fails to charge
      var showError = function(errorMsgText) {
         loading(false);
         var errorMsg = document.querySelector("#card-error");
         errorMsg.textContent = errorMsgText;
         setTimeout(function() {
            errorMsg.textContent = "";
         }, 4000);
      };

      // Show a spinner on payment submission
      var loading = function(isLoading) {
         if (isLoading) {
               // Disable the button and show a spinner
               document.querySelector("button").disabled = true;
               document.querySelector("#spinner").classList.remove("hidden");
               document.querySelector("#button-text").classList.add("hidden");
         } else {
               document.querySelector("button").disabled = false;
               document.querySelector("#spinner").classList.add("hidden");
               document.querySelector("#button-text").classList.remove("hidden");
         }
      };

   </script>

@endsection