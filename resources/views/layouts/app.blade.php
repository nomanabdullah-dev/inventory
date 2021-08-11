<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->

    <!-- Base Css Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/waves-effect.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />


</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        @guest

        @else
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="{{ route('dashboard') }}" class="logo"><i class="md md-terrain"></i> <span>Moltran </span></a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                        <form class="navbar-form pull-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control search-bar"
                                    placeholder="Type here for search...">
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="true">
                                    <i class="md md-notifications"></i> <span
                                        class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">Notification</li>
                                    <li class="list-group">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                        <small>There are
                                                            <span class="text-primary">2</span> new updates
                                                            available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- last list item -->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <small>See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                        class="md md-crop-free"></i></a>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" class="right-bar-toggle waves-effect waves-light"><i
                                        class="md md-chat"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown"
                                    aria-expanded="true"><img src="{{ asset('admin/images/avatar-1.jpg') }}"
                                        alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect"><i class="fa fa-plus"></i><span>POS</span></a>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Employees </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('employee.create') }}">Add Employee</a></li>
                                <li><a href="{{ route('employee.index') }}">All Employees</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-book"></i><span> Customers </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                                <li><a href="{{ route('customer.index') }}">All Customers</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-shopping-cart"></i><span> Suppliers </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('supplier.create') }}">Add Supplier</a></li>
                                <li><a href="{{ route('supplier.index') }}">All Suppliers</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-money"></i><span> Advanced Salary </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('advancedsalary.create') }}">Add Salary</a></li>
                                <li><a href="{{ route('advancedsalary.index') }}">All Salary</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-sitemap"></i><span> Category </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('category.create') }}">Add Category</a></li>
                                <li><a href="{{ route('category.index') }}">All Category</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-briefcase"></i><span> Product </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('product.create') }}">Add Product</a></li>
                                <li><a href="{{ route('product.index') }}">All Product</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-usd"></i><span> Expense </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('expense.create') }}">Add Expense</a></li>
                                <li><a href="{{ route('todayExpense') }}">Today's Expenses</a></li>
                                <li><a href="{{ route('monthlyExpense') }}">Monthly Expenses</a></li>
                                <li><a href="{{ route('yearlyExpense') }}">Yearly Expenses</a></li>
                                <li><a href="{{ route('expense.index') }}">All Expense</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-book"></i><span> Sales Report </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('expense.create') }}">Add Expense</a></li>
                                <li><a href="{{ route('todayExpense') }}">Today's Expenses</a></li>
                                <li><a href="{{ route('monthlyExpense') }}">Monthly Expenses</a></li>
                                <li><a href="{{ route('yearlyExpense') }}">Yearly Expenses</a></li>
                                <li><a href="{{ route('expense.index') }}">All Expense</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fa fa-list-ol"></i><span> Attendance </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('attendance.create') }}">Take Attendance</a></li>
                                <li><a href="{{ route('attendance.index') }}">All Attendances</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="{{ route('setting.index') }}" class="waves-effect"><i class="fa fa-gear"></i><span> Settings </span><span
                                    class="pull-right"><i class="md md-add"></i></span></a>
                        </li>


                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->

        @endguest


        <main class="py-4">
            @yield('content')
        </main>

    <footer class="footer text-right">
        2021 © Noman Abdullah.
    </footer>

    </div>


    <script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.j') }}s"></script>
    <script src="{{ asset('admin/assets/chat/moment-2.2.1.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('admin/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>
    <!-- sweet alerts -->
    <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>
    <!-- flot Chart -->
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery.app.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.chat.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.todo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>
    {{-- Image show on input time --}}
    <script type="text/javascript">
        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80)
                }
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    {{-- toastr.js --}}
    <script>
        @if (Session::has('message'))
            var type="{{ Session::get('alert-type', 'info') }}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}")
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}")
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}")
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}")
                    break;
            }
        @endif
    </script>
    {{-- sweet alert --}}
    <script>
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var dlt_url = $(this).data('url');
            swal({
                title: "Are you sure to delete this?",
                text: "Once Delete, Data will be deleted permanently!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if(willDelete) {
                    $.ajax({
                        type: "DELETE",
                        url: dlt_url,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            location.reload(true);
                        }
                    });
                }else {
                    swal("Safe Data!")
                }
            });
        });
    </script>

</body>

</html>
