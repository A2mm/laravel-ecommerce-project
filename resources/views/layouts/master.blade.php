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
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only"> toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a href="/" class="navbar-brand"><span class="E">E</span>-<span class="commerce">Commerce</span> </a>
        </div>
            <div class="collapse navbar-collapse" id="example">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('shop') ? 'customactive' : null }}">
                        <a href="/shop"><i class="fas fa-road"></i>Shop</a>
                    </li>

                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-tags"></i> Categories
                            <span class="caret"></span> 
                        </a>
                        <ul class="dropdown-menu categories-menu">
                        @foreach(App\Category::all() as $category)
                        <li><a href="/shopping/products/by/category/{{$category->id}}"></i> {{ $category->name }} </a></li>
                        @endforeach   
                        </ul>
                    </li>
                    <li class="dropdown {{ Request::is('shopping/products/by/brand/$brand->id') ? 'customactive' : null }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-briefcase"></i> Brands 
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu brands-menu">
                        @foreach(App\Brand::all() as $brand)
                        <li><a href="/shopping/products/by/brand/{{$brand->id}}"> {{ $brand->name }}</a></li>
                        @endforeach   
                        </ul>
                    </li>
                    <li class="{{ Request::is('show/shopping/cart/contents') ? 'customactive' : null }}">
                        <a href="/show/shopping/cart/contents"><i class="fas fa-shopping-cart"></i> 
                        @if(Cart::instance('default')->count() > 0)
                        Cart <span class="badge" style="background: orange"> {{ Cart::instance('default')->count() }} </span>
                        @else
                        Cart 
                        @endif
                    </a></li>
                    <li class="{{ Request::is('show/wishlist/contents') ? 'customactive' : null }}">
                        <a href="/show/wishlist/contents"><i class="fas fa-info"></i> 
                        @if(Cart::instance('savedForLater')->count() > 0)
                        Wishlist 
                        <span class="badge" style="background:skyblue">{{ Cart::instance('savedForLater')->count() }} </span>
                        @else
                        Wishlist
                        @endif
                    </a></li>
                    @if(Auth::check())
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu user-menu" role="menu">
                                    <li><a href="/user/home">Dashboard</a></li>
                                    <li><a href="/view/my/profile">My profile</a></li>
                                    <li><a href="/user/logout">Logout</a></li>
                                </ul>
                    </li>
                    @else
                    <li class="{{ Request::is('login') ? 'customactive' : null }}">
                        <a href="/login">login</a></li>
                    
                    <li class="{{ Request::is('register') ? 'customactive' : null }}">
                        <a href="/register">register</a>
                    </li>
                    @endif
                    @if(Session::get('admin_name'))
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Session::get('admin_name') }} <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu user-menu" role="menu">
                                    <li><a href="/admin/dashboard">Dashboard</a></li>
                                    <li><a href="/admin/logout">Logout</a></li>
                                </ul>
                    </li>
                    @else
                    <li class="{{ Request::is('admin/login') ? 'customactive' : null }}">
                        <a href="/admin/login">Admin login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    </nav>
</head>
<body>
        <div class="section">

                @yield('content')
                @yield('scripts')

        </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>