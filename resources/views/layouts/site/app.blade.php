<!DOCTYPE html>

<html lang="en">

<head>

    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/front_lib/images/favicon.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site metas -->
    <title> @section('title') | 247Tradespeople @show </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">	

    <!-- Links Style -->
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/front_lib/css/dev.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/front_lib/css/jquery.mCustomScrollbar.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/owl.carousel.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/front_lib/css/owl.theme.default.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/responsive.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/front_lib/css/iconmoon.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/default-skin.css') }}">
    {{-- Customs utilities DO NOT REMOVE --}}
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/utilities.css') }}"> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}
    <!-- head Script -->
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
        var f=d.getElementsByTagName(s)[0], 
        j=d.createElement(s),
        dl=l!='dataLayer'?'&l='+l:'';
        j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
        f.parentNode.insertBefore(j,f);})
        (window,document,'script','dataLayer','GTM-KZ7T94T');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZ7T94T" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
             fbq('init', '733847317320371'); 
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" src="https://www.facebook.com/tr?id=733847317320371&ev=PageView &noscript=1"/>
        </noscript>
    <!-- End Facebook Pixel Code -->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-191000700-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-191000700-1');
    </script>


    @yield('head_style')
    @yield('head_script')
</head>
<body>

    @include('layouts.site.header')
    @yield('content')
    @include('layouts.site.footer')
    <!-- Footer style -->
    <script src="{{ asset('assets/front_lib/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front_lib/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/front_lib/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front_lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front_lib/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/front_lib/js/front.js') }}"></script>

    @yield('footer_script')
    <script>
        $(document).ready(function() {
            $('#getSubscribe').on('click', function() {
                $.ajax({
                    url: '{{ url("getSubscribe") }}',
                    type: "POST",
                    data: { 
                        _token: $('input[name="_token"]').val(), 
                        email: $('input[type="email"]').val() 
                    },
                    success: function(data) {
                        if (data.code == 1) {
                            $('#status').show();
                            $('#status').empty();
                            $('#status').addClass('alert-success');
                            $('#status').html(data.message);
                            setTimeout(() => {
                                $('#status').empty();
                                $('#status').hide();
                            }, 3000);
                        } else {
                            $('#status').show();
                            $('#status').empty();
                            $('#status').addClass('alert-danger');
                            $('#status').html(data.errors.email[0]);
                            setTimeout(() => {
                                $('#status').empty();
                                $('#status').hide();
                            }, 3000);
                        }
                    }
                });
            });
        });
    </script>


</body>
</html>