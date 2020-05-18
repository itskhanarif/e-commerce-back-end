<!-- HEADER -->
<header>
  <!-- header -->
  <div id="header">
    <div class="container">
      <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
          <a class="logo" href="{{ route('index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <!-- /Logo -->

        <!-- Search -->
        <div class="header-search">
          <form action="{{ route('search') }}" method="post">
            {{ csrf_field() }}
            <input class="input search-input" type="text" placeholder="Enter your keyword" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- /Search -->
      </div>
      <div class="pull-right">
        <ul class="header-btns">
          <!-- Account -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">My Dashboard</a></br>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
          <!-- /Account -->

          <!-- Cart -->
          <li class="header-cart dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-shopping-cart"></i>
                <span class="qty">
                  {{ App\Models\Cart::totalItems() }}
                </span>
              </div>
              <strong class="text-uppercase">Cart</strong>
              <br>
              <span>Total = {{ App\Models\Cart::totalPrice() }} Taka</span>
            </a>
            <div class="custom-menu">
              <div id="shopping-cart">
                <div class="shopping-cart-list">

                  @foreach(App\Models\Cart::cartProducts() as $cartproduct )
                  <div class="product product-widget">
                    <div class="product-thumb">
                      @if($cartproduct->product->Product_Image->count() > 0)
                      <img src="" alt="">
                      @endif
                    </div>
                    <div class="product-body">
                      <h3 class="product-price">{{ $cartproduct->product->price }} <span class="qty">x{{$cartproduct->product_quantity}} = {{ $cartproduct->product->price * $cartproduct->product_quantity}}</span></h3>
                      <h2 class="product-name"><a href="#">{{ $cartproduct->product->title }}</a></h2>
                    </div>
                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                  </div>
                  @endforeach

                </div>
                <div class="shopping-cart-btns">
                  <a href="{{  route('cart.show') }}"><button class="primary-btn">View Cart<i class="fa fa-arrow-circle-right"></i></button></a>
                  <a href="{{  route('checkouts') }}"><button class="primary-btn">Checkout<i class="fa fa-arrow-circle-right"></i></button></a>

                </div>
              </div>
            </div>
          </li>
          <!-- /Cart -->

          <!-- Mobile nav toggle-->
          <li class="nav-toggle">
            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
          </li>
          <!-- / Mobile nav toggle -->
        </ul>
      </div>
    </div>
    <!-- header -->
  </div>
  <!-- container -->
</header>
