{{-- * Template Name : Cookies * --}}

@extends('layouts.site.app')

@section('title')
    {!! isset($pageContent->meta_title) ? $pageContent->meta_title.' | 24Seven' : '24/Seven' !!}
@stop

@section('meta-keywords')
    {!! isset($pageContent->meta_keywords) ? $pageContent->meta_keywords : '24/Seven' !!}
@stop

@section('meta-description')
    {!! isset($pageContent->meta_description) ? $pageContent->meta_description : '24/Seven' !!}
@stop

@section('content')
	    <div class="container py-5">
        <h1>Cookies</h1>
        <div class="define">
            <h2 class="pt-4 pb-0">What are cookies and local storage</h2>
            <p class="m-0">
                Cookies are small text files that get stored on your computer when you visit certain web pages. Local storage is an industry standard technology that allows us to store and retrieve small amounts of data on your computer, mobile phone or other device. At 247tradespeople.com we use cookies and local storage to remember you when you return to our site and to optimise your experience when landing on 247tradesPeople.com.
                <br>
				To submit a job on 24/7TradesPeople.com you need to have cookies enabled. Most web browsers have cookies enabled by default, see Managing cookies for help to turn them on should you need to.
				<br>
				Please note that cookies can’t harm your computer. We don’t store personally identifiable information such as credit card details in cookies we create, but we do use encrypted information gathered from them to help improve your experience of the 247TradesPeople.com site.  For example, they help us to identify and resolve errors that may occur on the website.
				<br>
				From time to time we may have relationships with carefully-selected and monitored partners who may set cookies during your visit to be used for remarketing purposes; this means to show you products and services that you appear to be interested in (see the ‘third party cookie policy’ tab). If you’d like to opt out, please go to the Network Advertising Initiative website (opens in a new window – please note that we’re not responsible for the content of external websites).
				<br>
				We’re giving you this information as part of our initiative to comply with recent legislation, and to make sure we’re honest and clear about your privacy when using our website. We know you’d expect this from us, and please be assured that we’re working on a number of other privacy and cookie-related improvements to the website.
            </p>

            <h2 class="pt-4 pb-0">Security</h2>
            <p class="m-0">
                Our site uses the most advanced security software currently available for online transactions.
            </p>

            <h2 class="pt-4 pb-0">Our policy</h2>
            <p class="m-0">
            	To make full use of 24/7TradesPeople.com, your computer, tablet or mobile phone will need to accept cookies, as we can only provide you with certain personalised features of this website by using them.
	        	<br>
	          	Our cookies don’t store sensitive information such as your name, address or payment details: they simply hold the ‘key’ that, once you’re signed in, is associated with this information. However, if you’d prefer to restrict, block or delete cookies from ratedpeople.com, or any other website, you can use your browser to do this. Each browser is different, so check the ‘Help’ menu of your particular browser (or your mobile phone’s handset manual) to learn how to change your cookie preferences.
			</p>

	        <h2 class="pt-4 pb-0">Third party cookie policy</h2>
	        <p class="m-0">
	        	When you visit 247tradespeople.com you may notice some cookies that aren’t related to 24/7 TradesPeople. For example, if you go on to a web page that contains embedded content such as YouTube you may be sent cookies from these websites. We don’t control the setting of these cookies, so we suggest you check the third-party websites for more information about their cookies and how to manage them.
	        	<br>
				Some of the business partners that may set cookies on 247TradesPeople.com include:
				<br>
				criterio – see <a href="" target="_Blank"> privacy policy </a>.
				<br>
				<a href="" target="_Blank"> doubleclick.net </a> – we use double click to track how well our advertising campaigns are performing.
				<br>
				google-analytics.com, google.com, googleadservices.com, googleapis.com, gstatic.com – we use google analytics to measure traffic to our site.
				<br>
				It also provides insights into the source of the traffic, so we can optimise our site for our customers.
			</p>

	        <h2 class="pt-4 pb-0">Managing cookies, local storage and further information on cookies</h2>
	        <p class="m-0">
	        	If cookies aren’t enabled on your computer, it will mean that you can’t use the website.
	        	<br>
				If you’d like to learn more about cookies in general and how to manage them, visit ICO.org (opens in a new window – please note that we can’t be responsible for the content of external websites).
			</p>
        </div>
    </div>
@endsection
