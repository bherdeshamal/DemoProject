<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Panel</title>
    <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("admin/assets/images/favicon.png") }}">
    <!-- Custom CSS -->
    <link  rel="stylesheet" href="{{ asset("admin/assets/libs/flot/css/float-chart.css")}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset("admin/dist/css/style.min.css" )}}">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header" data-logobg="skin5">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <a class="navbar-brand" href="home">
                            <!-- Logo icon -->
                            <b class="logo-icon ps-2">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <img src="{{ asset("images/frontimages/E3.jpg")}}" alt="homepage" class="light-logo" />
                         
                                <!-- Dark Logo icon -->
                               </b>
                           
                        </a>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Toggle which is visible on mobile only -->
                        <!-- ============================================================== -->
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-start me-auto">
                            <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                            <!-- ============================================================== -->
                            <!-- create new -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                             </br> <a href="index">Frontend</a>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                        </ul>
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-end">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset("admin/assets/images/users/1.jpg")}}" alt="user" class="rounded-circle" width="31">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                   
                                     <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="admincontactus"><i
                                        class="ti-settings me-1 ms-1"></i> Contact Us</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/"><i
                                        class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                                        <div class="dropdown-divider"></div>
                                </ul>
                            </li>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                        </ul>
                    </div>
                </nav>
            </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/home" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span
                                    class="hide-menu">User Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="usermanage" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add New User
                                        </span></a></li>
                                <li class="sidebar-item"><a href="userview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu"> View User
                                        </span></a></li>

                                        <li class="sidebar-item"><a href="frontuserview" class="sidebar-link"><i class="fa fa-users" aria-hidden="true"></i><span class="hide-menu"> View FrontEnd Users
                                        </span></a></li>
                            </ul>
                        </li>       
                           
                    
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-envelope-open" aria-hidden="true"></i><span
                                    class="hide-menu">Configuration Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="configure" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add New Configuration
                                        </span></a></li>
                                <li class="sidebar-item"><a href="configureview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu"> View Configuration
                                        </span></a></li>
                            </ul>
                        </li>      
                               
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i><span
                                    class="hide-menu">Category Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="category" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add New Category
                                        </span></a></li>
                                <li class="sidebar-item"><a href="categoryview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu"> View Category
                                        </span></a></li>
                            </ul>
                        </li>     

                      
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-heart" aria-hidden="true"></i><span
                                    class="hide-menu">Product Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="product" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add New Product
                                        </span></a></li>
                                <li class="sidebar-item"><a href="productview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu"> View Products
                                        </span></a></li>
                            </ul>
                        </li>          
                       
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-star" aria-hidden="true"></i><span
                                    class="hide-menu">Banner Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="banner" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add New Banner
                                        </span></a></li>
                                <li class="sidebar-item"><a href="bannerview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu"> View Banners
                                        </span></a></li>
                            </ul>
                        </li>  
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-sign-language" aria-hidden="false"></i><span
                                    class="hide-menu">Coupon Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="coupon" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add New Coupon
                                        </span></a></li>
                                <li class="sidebar-item"><a href="couponview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu"> View Coupons
                                        </span></a></li>
                            </ul>
                        </li>     

                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span
                                    class="hide-menu">Order Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="vieworders" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu">   View Orders
                                        </span></a></li>
                               
                            </ul>
                        </li>   

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"> <i class="fa fa-cloud" aria-hidden="true"></i><span
                                    class="hide-menu">CMS Pages</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="add_cms_page" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Add CMS Page
                                        </span></a></li>
                               
                               <li class="sidebar-item"><a href="view_cms_page" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu">   View CMS Page
                                        </span></a></li>
                               
                            </ul>
                        </li>  

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa fa-phone-square" aria-hidden="true"></i><span
                                    class="hide-menu">Contact Us</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="admincontactus" class="sidebar-link"><i
                                            class="mdi mdi-chart-bubble"></i><span class="hide-menu">   Admin Contact Form
                                        </span></a></li>
                               
                               <li class="sidebar-item"><a href="contactview" class="sidebar-link"><i
                                            class="mdi mdi-emoticon"></i><span class="hide-menu">   View Contacts
                                        </span></a></li>
                               
                            </ul>
                        </li>   
                       
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="view-subscriptions" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i><span
                                    class="hide-menu">Newsletter Subscriptions</span></a></li>
                       

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="reports" aria-expanded="false"><i class="fa fa-file-excel" aria-hidden="true"></i><span
                                    class="hide-menu">Reports</span></a></li>
                        
                      
                                   
                                        
                                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://127.0.0.1:8000/" aria-expanded="false"><i class="fa fa-power-off me-1 ms-1"></i><span
                                    class="hide-menu">Logout</span></a></li>
                       
                       
                       </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User Management</h4>
                        <div class="ms-auto text-end">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
      
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body wizard-content">
                        
                        <h6 class="card-subtitle"></h6>
                      
{{ csrf_field() }}
  <div>
                                <h3>Details of Customers </h3>
    </br>
    </br>
                                <section>
                                </br>
          <a href="/home" class="btn btn-danger">   HOME</a>  
          <a href="/export-users" class="btn btn-info"> Export</a>
		 
 </br>
 <form>
 </br>
 </br>
 
 </br>
 @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
    
                   
                    @endif
                                </section>

                              <section></section>
                              
                               
                                <section>
                                <table class="table table-bordered">
    <thead>
      <tr>
      <th><b><font color="red">User No</th>
        <th><b><font color="red">User Name</th>
        <th><b><font color="red">User Email</th>
        <th><b><font color="red">User Mobile No.</th>
        
        <th><b><font color="red">User Address</th>
        
        
        <th><b><font color="red">User State</th>
        
        <th><b><font color="red"> User Role </th>
       </tr>
    </thead>
    <tbody>
    @foreach($frontendloginusers as $row)
      <tr style="background:white;">
      <td>{{$row->id}} </td>
      <td>{{$row->name}} </td>
      <td>{{$row->email}}</td>
      <td>{{$row->mobile}} </td>
      
      <td>{{$row->address}} </td>
      
      
      <td>{{$row->state}} </td>
      <td>  @if($row->role==1)Admin @else Customer @endif </td>
    </tbody>
    @endforeach

  </table>
  {!! $frontendloginusers->links('pagination::bootstrap-4')!!}
                          
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Designed and Developed by 
                    SHAMAL BHERDE.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset("admin/assets/libs/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset("admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js") }} "></script>
    <script src="{{ asset("admin/assets/extra-libs/sparkline/sparkline.js") }}">></script>
    <!--Wave Effects -->
    <script src="{{ asset("admin/dist/js/waves.js") }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset("admin/dist/js/sidebarmenu.js") }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset("admin/dist/js/custom.min.js") }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset("admin/assets/libs/flot/excanvas.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/flot/jquery.flot.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/flot/jquery.flot.pie.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/flot/jquery.flot.time.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/flot/jquery.flot.stack.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/flot/jquery.flot.crosshair.js") }}"></script>
    <script src="{{ asset("admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js") }}"></script>
    <script src="{{ asset("admin/dist/js/pages/chart/chart-page-init.js") }}"></script>

</body>

</html>