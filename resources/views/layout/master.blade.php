<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths" lang="en" style=""><head>
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/icon/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets')}}/css/themify-icons.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    {{-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"> --}}
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    {{-- <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script> --}}
    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
    <!--promptjs-->
    <link rel="stylesheet" href="{{asset('assets/js/vendor/promptjs/prompt.css')}}">
    <script src="{{asset('assets/js/vendor/promptjs/prompt.js')}}"></script>
    <!--datatables-->
    <link rel="stylesheet" href="{{asset('assets/js/vendor/datatables/datatables.css')}}">
    <script src="{{asset('assets/js/vendor/datatables/datatables.js')}}"></script>
    <script src="{{asset('assets/js/vendor/datatables/dataTables.button.js')}}"></script>

    <!-- Tippy js -->
    <script src="{{asset('assets/js/vendor/tippy/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/tippy/tippy-bundle.umd.js')}}"></script>
    <!--my javascript-->
    <script src="{{asset('assets/js/myjavascript.js')}}"></script>
    <!-- Select -->
    <link rel="stylesheet" href="{{asset('assets/js/vendor/datatables/select.dataTables.min.css')}}"/>
    <script src="{{asset('assets/js/vendor/datatables/dataTables.select.min.js')}}"></script>
    <!--html5-qrcode-->
    <!--https://blog.minhazav.dev/research/html5-qrcode-->
    <script src="{{asset('assets/js/vendor/html5_qrcode/html5-qrcode.min.js')}}"></script>


</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
           <!-- sidebar menu area start -->
           {{-- @if ($navbar_mode != '1') --}}
           <div class="sidebar-menu">
               <div class="sidebar-header" style="background: white; padding:5px">
                   <div class="logo">
                       <a href="index.html"><img src="{{asset('assets')}}/images/icon/logo.png" alt="logo"></a>
                       <p style="color:black;font-size: 15px; font-weight:800; margin-bottom:0px">PT TRIMITRA CHITRAHASTA</p>
                   </div>
               </div>
               <div class="main-menu">
                   <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 505px;"><div class="menu-inner" style="overflow: hidden; width: auto; height: 505px;">
                       <nav>
                           <ul class="metismenu" id="menu">
                               <li  ><a href="{{route('home')}}" aria-expanded="false"><i class="fa fa-dashboard" style="color:white"></i> <span>Beranda</span></a></li>
                               <li ><a href="{{route('home')}}" aria-expanded="false"><i class="fa fa-file-text" style="color:white"></i> <span>Stock Opname</span></a></li>

                                   <li ><a href="" aria-expanded="false"><i class="fa fa-list-alt" style="color:white"></i> <span>Report Data</span></a></li>

                           </ul>
                       </nav>
                   </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 64px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 505px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
               </div>
           </div>

           <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content" style="min-height: 780px;">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required="">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="{{route('actionlogout')}}">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                @yield('content')
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        {{-- <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: calc(100vh - 114px);"><div class="recent-activity" style="overflow: hidden; width: auto; height: calc(100vh - 114px);">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 414.493px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: calc(100vh - 158px);"><div class="settings-list" style="overflow: hidden; width: auto; height: calc(100vh - 158px);">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1">
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2">
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3">
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4">
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5">
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- offset area end -->

    <!-- bootstrap 4 js -->
    <script src="{{asset('assets')}}/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/js/metisMenu.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.slimscroll.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="{{asset('assets')}}/js/plugins.js"></script>
    <script src="{{asset('assets')}}/js/scripts.js"></script>
    <script>
        //$(document).ready(function(){


            // $(".badge-light").hide();
            // @if (session('role') !== '')
            //     myMethod();
            //     setInterval(myMethod, 3000);

            //     function myMethod(){
            //         $.ajax({ //update jumlah persetujuan
            //             type: "GET",
            //             url: "/agreement/count",

            //             success: function(data){
            //                 data = $.parseJSON(data);
            //                 if(data === 0){
            //                     $(".badge-light").hide();
            //                 }else{
            //                     $(".badge-light").text(data);
            //                     $(".badge-light").show();
            //                 }
            //             }
            //         });
            //     }
            // @endif
        //});
    </script>


</body></html>
