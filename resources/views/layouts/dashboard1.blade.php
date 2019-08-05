<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Commerce</title>
    <link rel="shortcut icon" href="images/ico/favicon.ico">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">E-Commerce</a>
        </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                  
                    @if(Session::get('admin_name'))
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    <span class="admin-name">{{ Session::get('admin_name') }}</span> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu admin-menu" role="menu">
                                    <li><a href="/admin/blog">Blog</a></li>
                                    <li><a href="/admin/profile">Profile</a></li>
                                    <li><a href="/admin/logout">Logout</a></li>
                                </ul>
                    </li>
                    @else
                    <li><a href="/login">login</a></li>
                    <li><a href="/login">register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    </nav>
</head>
<body>
    <div class="side-nav">

        <div class="panel-group" id="accordion"> 

            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="/admin/dashboard"> 
                    <i class="fas fa-tachometer-alt"> </i><span> Dashboard </span> </a> </h4> 
                </div>  
            </div>

            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseproducts"> 
                    <i class="fas fa-briefcase"></i> <span> Products </span>
                    <span class="badge dash-count pull-right">{{App\Product::get()->count()}}</span>  </a> </h4> 
                </div> 
            <div id="collapseproducts" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/add/new/product"><i class="fas fa-plus"></i> Add Product</a></li>
                        <li><a href="/manage/all/products"><i class="fas fa-edit"></i> Manage Products</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsebrands"> 
                    <i class="fas fa-thumbs-up"> </i><span> Brands </span>
                    <span class="badge dash-count pull-right">{{App\Brand::get()->count()}}</span> </a> </h4> 
                </div> 
            <div id="collapsebrands" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/add/brand"><i class="fas fa-plus"></i> Add Brand</a></li>
                        <li><a href="/manage/all/brands"><i class="fas fa-edit"></i> Manage Brands</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsecategories"> 
                    <i class="fas fa-tags"> </i> <span> Categories </span>
                    <span class="badge dash-count pull-right">{{App\Category::get()->count()}}</span> </a> </h4> 
                </div> 
            <div id="collapsecategories" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/add/category"><i class="fas fa-plus"></i> Add Category</a></li>
                        <li><a href="/manage/all/categories"><i class="fas fa-edit"></i> Manage Categories</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsesliders"> 
                    <i class="fas fa-chevron-right"></i> <span> Sliders </span>
                    <span class="badge dash-count pull-right">{{App\Slider::get()->count()}}</span> </a> </h4> 
                </div> 
            <div id="collapsesliders" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/add/new/slider"><i class="fas fa-plus"></i> Add Slider</a></li>
                        <li><a href="/manage/all/sliders"><i class="fas fa-edit"></i> Manage Sliders</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseorders"> 
                    <i class="fas fa-lock"> </i> <span> Orders </span> 
                    <span class="badge dash-count pull-right">{{App\Order::get()->count()}}</span> </a> </h4> 
                </div> 
            <div id="collapseorders" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/view/all/orders"><i class="fas fa-plus"></i> All orders</a></li>
                        <li><a href=""><i class="fas fa-edit"></i> Manage orders</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsecustomers"> 
                    <i class="fas fa-users"></i> <span> Customers </span>
                    <span class="badge dash-count pull-right">{{App\User::get()->count()}}</span>  </a> </h4> 
                </div> 
            <div id="collapsecustomers" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/view/all/customers"><i class="fas fa-plus"></i> All Customers</a></li>
                        <li><a href=""><i class="fas fa-edit"></i> Manage Customers</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="/404"> 
                    <i class="fas fa-search"></i> <span> 404 </span> </a> </h4> 
                </div>  
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="/contact"> 
                    <i class="fas fa-phone"></i> <span> Contact </span> </a> </h4> 
                </div>  
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="/collapseproducts"> 
                    <i class="fas fa-info"></i> <span> About</span> </a> </h4> 
                </div> 
        </div>
        <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="/collapseproducts"> 
                    <i class="fas fa-calculator"> </i><span> Services </span>  </a> </h4> 
                </div> 
        </div>
    </div>
</div>

    <div class="main-content">
            @yield('content')
            @yield('scripts')
    </div>
     
                
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>