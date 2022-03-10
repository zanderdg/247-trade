<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>  @section('title') | 24Seven @show </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{ asset('assets/front_lib/images/favicon.png') }}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- global css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{ asset('assets/css/panel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>

    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body class="skin-josh">
    <header class="header">
        <a href="{{ route('dashboard') }}" class="logo">
            <h3 style="color:#fff;margin-top:12px;text-align:left;">Administrator Panel</h3>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                            <div class="riot">
                                <div style="padding:10px;">
                                    Welcome, {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                                </div>
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li {!! (Request::is('administrator') ? 'class="active"' : '') !!}>
                            <a href="{{ route('dashboard') }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        
                        @if(Sentinel::getUser()->roles[0]->slug == 'admin')

                            {{-- <li {!! (Request::is('administrator/role&permissionManagement') || Request::is('administrator/role&permissionManagement/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/role&permissionManagement') }}">
                                    <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">RP Management</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/role&permissionManagement/roles') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/role&permissionManagement/roles') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add Role
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/role&permissionManagement/permissions') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/role&permissionManagement/permissions') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add Permission
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/role&permissionManagement') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/role&permissionManagement') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Roles & Permissions
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}

                            <li {!! (Request::is('administrator/users') || Request::is('administrator/users/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/users') }}">
                                    <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Users Management</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/users') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Users
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/users/tradespeople') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users/tradespeople') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Tradespeople
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/users/homeowner') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users/homeowner') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Homeowners
                                        </a>
                                    </li>
                                    {{-- <li {!! (Request::is('administrator/users/block') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users/block') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Block Users
                                        </a>
                                    </li> --}}

                                    {{-- <li {!! (Request::is('administrator/users/trades-people') || Request::is('administrator/users/trades-people/*') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users/trades-people') }}">
                                            <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                            <span class="title">Trades People</span>
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            
                                            <li {!! (Request::is('administrator/users/trades-people/block') ? 'class="active"' : '') !!}>
                                                <a href="{{ URL::to('administrator/users/trades-people/block') }}">
                                                    <i class="fa fa-angle-double-right"></i>
                                                    Block Trades People
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li {!! (Request::is('administrator/users/homes-owner') || Request::is('administrator/users/homes-owner/*') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users/homes-owner') }}">
                                            <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                            <span class="title">Homes Owner</span>
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                        
                                            <li {!! (Request::is('administrator/users/homes-owner/block') ? 'class="active"' : '') !!}>
                                                <a href="{{ URL::to('administrator/users/homes-owner/block') }}">
                                                    <i class="fa fa-angle-double-right"></i>
                                                    Block Homes Owners
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}

                                    {{-- <li {!! (Request::is('administrator/users/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/users/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add User
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                            {{-- <li {!! (Request::is('administrator/api') || Request::is('administrator/api/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/api') }}">
                                    <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">API Management</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/api/stripe') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/api/stripe') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Stripe config
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/api/google-map') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/api/google-map') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Google map config
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/api/twilio') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/api/twilio') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Twilio config
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}

                            <li {!! (Request::is('administrator/category') || Request::is('administrator/category/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/category') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Category</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/category') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/category') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All category
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/category/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/category/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add category
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li {!! (Request::is('administrator/subcategory') || Request::is('administrator/subcategory/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/subcategory') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Sub Category</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/subcategory') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/subcategory') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All sub-category
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/subcategory/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/subcategory/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add sub-category
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li {!! (Request::is('administrator/job') || Request::is('administrator/job/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/job') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Jobs Post</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/job') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/job') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All jobs
                                        </a>
                                    </li>
                                    <!--<li {!! (Request::is('administrator/job/create') ? 'class="active"' : '') !!}>-->
                                    <!--    <a href="{{ URL::to('administrator/job/create') }}">-->
                                    <!--        <i class="fa fa-angle-double-right"></i>-->
                                    <!--        Add jobs-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                </ul>
                            </li>

                            <li {!! (Request::is('administrator/question') || Request::is('administrator/question/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/question') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Question & Answer</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/question') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/question') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Question
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/question/attach-detach') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/question/attach-detach') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Attach OR Detach Que
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/question/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/question/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add Question
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- <li {!! (Request::is('administrator/faq') || Request::is('administrator/faq/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/faq') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">FAQs</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/faq') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/faq') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All FAQs
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/faq/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/faq/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add FAQ
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}

                            {{-- <li {!! (Request::is('administrator/page') || Request::is('administrator/page/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/page') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Pages</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/page') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/page') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Pages
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/page/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/page/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add Page
                                        </a>
                                    </li>
                                </ul>
                            </li>           --}}

                            <li {!! (Request::is('administrator/testimonial') || Request::is('administrator/testimonial/*') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/testimonial') }}">
                                    <i class="livicon" data-name="up" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Testimonial</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li {!! (Request::is('administrator/testimonial') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/testimonial') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            All Testimonial
                                        </a>
                                    </li>
                                    <li {!! (Request::is('administrator/testimonial/create') ? 'class="active"' : '') !!}>
                                        <a href="{{ URL::to('administrator/testimonial/create') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            Add Testimonial
                                        </a>
                                    </li>
                                </ul>
                            </li>                        
                            
                            <li {!! (Request::is('administrator/contact') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/contact') }}">
                                    <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Contact Form</span>
                                </a>
                            </li>

                            <li {!! (Request::is('administrator/subscribers') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/subscribers') }}">
                                    <i class="livicon" data-name="user" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Subscribers</span>
                                </a>
                            </li>

                            {{-- <li {!! (Request::is('administrator/setting') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('administrator/site_setting') }}">
                                    <i class="livicon" data-name="gear" data-size="18" data-c="#ececec" data-hc="#ececec" data-loop="true"></i>
                                    <span class="title">Site Settings</span>
                                </a>
                            </li> --}}

                        @endif
                        
                        <li><a href="{{ URL::to('administrator/logout') }}">
                                <i class="livicon" data-name="sign-out" data-s="18" data-c="#ececec" data-hc="#ececec"></i>
                                Logout
                            </a>
                        </li>

                        <!-- Menus generated by CRUD generator -->
                        @include('admin/layouts/menu')
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        {{-- */$image_fields=['full_gallery'];/* --}}
        @include('admin.layouts.modal_filemanager', $image_fields)
        <aside class="right-side l">

            <!-- Notifications -->
            @include('notifications')

            <!-- Content -->
            @yield('content')

        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>


    
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    @if (Request::is('administrator/form_builder2') || Request::is('administrator/gridmanager') || Request::is('administrator/portlet_draggable') || Request::is('administrator/calendar'))
        <script src="{{ asset('assets/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>
    @endif
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('assets/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/metisMenu.js') }}" type="text/javascript"> </script>
    <script src="{{ asset('assets/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
</body>
</html>
