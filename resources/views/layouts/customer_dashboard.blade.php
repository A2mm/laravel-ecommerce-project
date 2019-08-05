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
    <link href="{{ asset('css/customer_dashboard.css') }}" rel="stylesheet">
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
                  
                    @if(Auth::check())
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    <span class="admin-name">{{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu admin-menu" role="menu">
                                    <li><a href="/">Home page</a></li>
                                    <li><a href="/user/home">Dashboard</a></li>
                                    <li><a href="/view/my/profile">Profile</a></li>
                                    <li><a href="/user/logout">Logout</a></li>
                                </ul>
                    </li>
                    @else
                    <li><a href="/login">login</a></li>
                    <li><a href="/register">register</a></li>
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
                    <h4 class="panel-title"> <a href="/user/home"> 
                    <i class="fas fa-tachometer-alt"> </i><span> Dashboard </span> </a> </h4> 
                </div>  
            </div>

     
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseorders"> 
                    <i class="fas fa-lock"> </i> <span> Orders </span> </a> </h4> 
                </div> 
            <div id="collapseorders" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/view/my/orders"><i class="fas fa-plus"></i> View Orders</a></li>
                        <li><a href="/manage/my/orders"><i class="fas fa-edit"></i> Manage Orders</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsecustomers"> 
                    <i class="fas fa-users"></i> <span> Logout </span>  </a> </h4> 
                </div> 
            <div id="collapsecustomers" class="panel-collapse collapse"> 
                <div class="panel-body"> 
                        <ul class="list-unstyled">
                        <li><a href="/user/logout"><i class="fas fa-plus"></i> Logout</a></li>
                       </ul> 
                </div> 
            </div> 
            </div>
            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="/view/my/profile"> 
                    <i class="fas fa-user"></i> <span> Profile </span> </a> </h4> 
                </div>  
            </div>

            <div class="panel"> 
                <div class="panel-heading"> 
                    <h4 class="panel-title"> <a href="///"> 
                    <i class="fas fa-user"></i> <span> Blog </span> </a> </h4> 
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