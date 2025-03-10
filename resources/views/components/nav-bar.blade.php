<div class="site-header d-none d-lg-block">
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 ">
                    <a href="{{ URL('/index') }}" class="site-brand">
                        <img src="{{ URL('image/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Free Support 24/7</p>
                            <p class="font-weight-bold number">+92-123-456-7891</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                            <li class="menu-item has-children">
                                <a href="/">Home </a>
                            </li>

                            <li class="menu-item has-children">
                                <a href="{{ URL('/shop-grid') }}">Shop </a>
                            </li>

                            <li class="menu-item has-children">
                                <a href="{{ URL('/blogs') }}">Blogs </a>
                            </li>


                            <!-- Pages -->
                            <li class="menu-item has-children">
                                <a href="javascript:void(0)">Pages <i
                                        class="fas fa-chevron-down dropdown-arrow"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ URL('cart') }}">Cart</a></li>
                                    <li><a href="{{ URL('search') }}">Search</a></li>
                                    <li><a href="{{ URL('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ URL('compare') }}">Compare</a></li>
                                    <li><a href="{{ URL('wishlist') }}">Wishlist</a></li>
                                    <li><a href="{{ URL('login-register') }}">Login Register</a></li>
                                    <li><a href="{{ URL('my-account') }}">My Account</a></li>
                                    <li><a href="{{ URL('order') }}-complete">Order Complete</a></li>
                                    <li><a href="{{ URL('faq') }}">Faq</a></li>
                                    <li><a href="{{ URL('contact-2') }}">contact 02</a></li>
                                </ul>
                            </li>

                            <li class="menu-item has-children">
                                <a href="{{ URL('/contact') }}">Contact </a>
                            </li>
                            @if (Auth::check())
                                <li class="menu-item has-children">

                                    <a href="{{ URL('/logout') }}" class="text-danger fw-bolder">LogOut</a> <br>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                @foreach ($Categories as $Category)
                                    <li class="cat-item has-children">
                                        <a>{{ $Category->name }}</a>
                                        <ul class="sub-menu">
                                            @foreach ($Category->subcategories as $SubCat)
                                                <li><a
                                                        href="{{ route('search',$SubCat->name) }}">{{ $SubCat->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- search box start -->
                <div class="col-lg-5">
                    <div class="header-search-block">
                        <input type="text" name="Query" id="SearchBox" value=""
                            placeholder="Search entire store here">
                        <button id="SearchBtn">Search</button>

                    </div>
                </div>
                <!-- search box end -->
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <div class="login-block">
                                @if (Auth::guest())
                                    <a href="{{ URL('login-register') }}" class="font-weight-bold">Login</a> <br>
                                    <span>or</span><a href="{{ URL('login-register') }}">Register</a>
                                @else
                                    <img src="{{ Storage::url(Auth::user()->image?Auth::user()->image:' ') }}" width="40" height="40"
                                        class="rounded-circle" alt="">
                                    <a href="/my-account" class="fw-bold fs-6 text-success text-decoration-underline">My
                                        Account</a>
                                @endif
                            </div>
                            @livewire('CartLiveWireComponent')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="{{ URL('/index') }}" class="site-brand">
                        <img src="{{ URL('image/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                @foreach ($Categories as $Category)
                                    <li class="cat-item has-children">
                                        <a>{{ $Category->name }}</a>
                                        <ul class="sub-menu">
                                            @foreach ($Category->subcategories as $SubCat)
                                                <li><a
                                                        href="{{ route('search', Crypt::encrypt($SubCat->id)) }}">{{ $SubCat->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5  order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="{{URL('cart')}}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                        class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Off Canvas Navigation Start-->
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box offcanvas">
                <form>
                    <input type="text" placeholder="Search Here">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <!-- search box end -->
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu main-mobile-menu text-center">
                        <li class="menu-item-has-children">
                            <a href="/">Home</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ URL('/blogs') }}">Blogs</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ URL('/shop-grid') }}">Shop</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a>Pages</a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL('cart') }}">Cart</a></li>
                                <li><a href="{{ URL('search') }}">Search</a></li>
                                <li><a href="{{ URL('checkout') }}">Checkout</a></li>
                                <li><a href="{{ URL('compare') }}">Compare</a></li>
                                <li><a href="{{ URL('wishlist') }}">Wishlist</a></li>
                                <li><a href="{{ URL('login-register') }}">Login Register</a></li>
                                <li><a href="{{ URL('my-account') }}">My Account</a></li>
                                <li><a href="{{ URL('order') }}-complete">Order Complete</a></li>
                                <li><a href="{{ URL('faq') }}">Faq</a></li>
                                <li><a href="{{ URL('contact-2') }}">contact 02</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ URL('/contact') }}">Contact</a></li>
                        @if (Auth::check())
                            <li class="menu-item-has-children">
                                <a href="{{ URL('/logout') }}" class="text-danger">Logout</a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">
                    <li class="menu-item-has-children">
                        <a>Currency - USD $ <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li> <a href="{{URL('cart')}}">USD $</a></li>
                            <li> <a href="checkout">EUR €</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a>Lang - Eng<i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>Eng</li>
                            <li>Ban</li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="/my-account">My Account <i class="fas fa-angle-down"></i></a>
                    </li>
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="{{ URL('/index') }}" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345)
                        78790220</a>
                    <a href="{{ URL('/index') }}" class="sin-contact"><i
                            class="fas fa-envelope"></i>examle@handart.com</a>
                </div>
                <div class="off-canvas-social">
                    <a class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a class="single-icon"><i class="fab fa-twitter"></i></a>
                    <a class="single-icon"><i class="fas fa-rss"></i></a>
                    <a class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    <a class="single-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </aside>
    <!--Off Canvas Navigation End-->
</div>


<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="{{ URL('/index') }}" class="site-brand">
                    <img src="{{ URL('image/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item has-children">
                            <a href="/">Home </a>
                        </li>

                        <li class="menu-item has-children">
                            <a href="{{ URL('/shop-grid') }}">Shop </a>
                        </li>

                        <li class="menu-item has-children">
                            <a href="{{ URL('/blogs') }}">Blogs </a>
                        </li>

                        <!-- Pages -->
                        <li class="menu-item has-children">
                            <a href="javascript:void(0)">Pages <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{ URL('cart') }}">Cart</a></li>
                                <li><a href="{{ URL('search') }}">Search</a></li>
                                <li><a href="{{ URL('checkout') }}">Checkout</a></li>
                                <li><a href="{{ URL('compare') }}">Compare</a></li>
                                <li><a href="{{ URL('wishlist') }}">Wishlist</a></li>
                                <li><a href="{{ URL('login-register') }}">Login Register</a></li>
                                <li><a href="{{ URL('my-account') }}">My Account</a></li>
                                <li><a href="{{ URL('order') }}-complete">Order Complete</a></li>
                                <li><a href="{{ URL('faq') }}">Faq</a></li>
                                <li><a href="{{ URL('contact-2') }}">contact 02</a></li>
                            </ul>
                        </li>

                        <li class="menu-item has-children">
                            <a href="{{ URL('/contact') }}">Contact </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
