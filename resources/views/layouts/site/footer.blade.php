

<footer>
    <section class="seven">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="text-none"> 
                        <h2 class="foor-head text-uppercase">homeowner</h2>
                        <li><a href="{{ url('homeowner-workflow') }}">How it works</a></li>
                        <li><a href="{{ url('/') }}">Create a job</a></li>
                        {{-- <li><a href="#news">Testimonials</a></li> --}}
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        <li><a href="{{ url('homeowner-faqs') }}">Help & FAQs</a></li>
                        <li><a href="{{ url('homeowner-ua') }}">User agreement</a></li>
                    </ul>
                    <a href="https://play.google.com/store/apps/details?id=com.twentyfourseven.android" target="_blank">
                        <img src="https://247tradespeople.com/assets/front_lib/images/play-store.png" alt="play-store" class="w-75"/>
                    </a>
                </div>
                <div class="col-md-3">
                    <ul class="text-none">
                        <h2 class="foor-head text-uppercase">tradespeople</h2>
                        <li><a href="{{ route('client-registration') }}">Sign up</a></li>
                        @if(Sentinel::check()) @if(Sentinel::getUser()->roles[0]->slug == 'tradeperson') <li><a href="{{ route('liveleads') }}">Live leads</a></li>@endif @else <li><a href="{{ route('liveleads') }}">Live leads</a></li> @endif
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        <li><a href="{{ url('tradespeople-faqs') }}">Help & FAQs</a></li>
                        <li><a href="{{ url('tradespeople-ua') }}">User agreement</a></li>
                    </ul>
                    <a href="https://apps.apple.com/us/app/24-7-tradespeople-ltd/id1602815429" target="_blank" >
                        <img src="https://247tradespeople.com/assets/front_lib/images/app-store.png" alt="app-store" class="w-75"/>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 text-none">
                    <h2 class="foor-head mt-3 text-uppercase">get regular updates</h2>
                    <ul class="p-0 m-0 d-inline-flex socialIcons">
                        <li><a href="{{ $site_settings->twitter }}" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="{{ $site_settings->youtube }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="{{ $site_settings->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ $site_settings->facebook }}" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                    </ul>
                    <div class="subscribe-letter">
                        <p>Subscribe to our newsletter to get regular updates</p>
                        <form id="getSubscribeEmail" method="post">
                            <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="email" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div id="status" class="alert" style="display: none"></div>
                            <br />
                            <input id="getSubscribe" type="button" value="Subscribe" class="btn btn-large" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<!-- footer section start-->
<!-- footer section end-->
<!-- copyright section start-->

<div class="copyright_section">
    <div class="container">
         <div class="row">
            <div class="col-md-6 buttom-text-div">
                <p class="copyright_text">UK VAT Registered: 377 1176 79</p>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6 buttom-text-div">
                <p class="copyright_text">© Copyright {!! Date('Y') !!}. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 buttom-links-div m-auto">
                <div class="buttom-links">
                    <a href="{{ url('terms-of-use') }}">Terms of use</a>
                    <a href="{{ url('cookies') }}">Cookies</a>
                    <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- //--}}
<!-- copyright section end-->