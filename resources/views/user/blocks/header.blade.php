<div class="headerstrip">
    <div class="container">
        <div class="row">
            <div class="span12">
                <a href="index-2.html" class="logo pull-left"><img src="{!! url('user/img/logo.png') !!}" alt="Logo"
                                                                   title="Logo"></a>
                <!-- Top Nav Start -->
                <div class="pull-left">
                    <div class="navbar" id="topnav">
                        <div class="navbar-inner">
                            <ul class="nav">
                                <li><a class="home active" href="{!! url('/') !!}">Home</a>
                                </li>
                                @if(isset($userLogined))
                                <li><a class="myaccount" href="#">{{$userLogined->username}}</a>
                                </li>
                                <li><a class="myaccount" href="{{
                                action('Auth\LoginController@getLogout')
                                }}">Logout</a>
                                </li>
                                @else
                                <li><a class="myaccount" href="{{
                                action('Auth\LoginController@getLogin')
                                }}">Login</a>
                                </li>
                                <li><a class="myaccount" href="{{
                                action('Auth\RegisterController@getRegister')
                                }}">Register</a>
                                </li>
                                @endif
                                <li><a class="shoppingcart" href="#">Shopping Cart</a>
                                </li>
                                <li><a class="checkout" href="#">CheckOut</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Nav End -->
            </div>
        </div>
    </div>
</div>