<style>
body {
    background-color: #eee !important;
    font-family: 'Cairo', sans-serif !important;
}

.heart-ou {
    transition: all 1s ease;
}
.hv:hover{
    background: #000 !important;
    color:#fff !important;
}
.topbar-link{
    display: flex;
}
.dropdown-toggle:hover,
a.bg-secondary:hover,
.navbar-light .navbar-tool-icon-box.bg-secondary:hover {
    background-color: #edb007 !important;
    color: #fff !important;
}

.card-body.search-result-box {
    overflow: scroll;
    height: 400px;
    overflow-x: hidden;
}

ion-icon {
    font-size: 35px;
    margin: 5px;
}

.nav-link {
    color: #000 !important;
}
.navbar-stuck-menu{
    height: 75px;
}

.nav-link:hover {
    color: #fff !important;
}

.active .seller {
    font-weight: 700;
}

.for-count-value {
    position: absolute;

    right: 0.6875rem;
    ;
    width: 1.25rem;
    height: 1.25rem;
    border-radius: 50%;

    color: {
            {
            $web_config['primary_color']
        }
    }

    ;

    font-size: 0.75rem;
    font-weight: 500;
    text-align: center;
    line-height: 1.25rem;
}

.navbar-tool .navbar-tool-label {
    background: #edb007 !important;
    margin: -3px;
}

.count-value {
    height: 1.25rem;
    border-radius: 50%;

    color: {
            {
            $web_config['primary_color']
        }
    }

    ;

    font-size: .75rem;
    font-weight: 500;
    text-align: center;
    line-height: 1.25rem;
}

@media (min-width: 992px) {
    .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
        display: block;
        height: 55px !important;
    }
}

@media (min-width: 768px) {
    .navbar-stuck-menu {
        background-color: {
                {
                $web_config['primary_color']
            }
        }

        ;
        line-height: 15px;
        padding-bottom: 6px;
    }

}

@media (max-width: 767px) {
    .search_button {
        background-color: transparent !important;
    }

    .search_button .input-group-text i {
        color: {
                {
                $web_config['primary_color']
            }
        }

         !important;
    }

    .navbar-expand-md .dropdown-menu>.dropdown>.dropdown-toggle {
        position: relative;

        padding- {
                {
                Session: :get('direction')==="rtl"? 'left': 'right'
            }
        }

        : 1.95rem;
    }

    .mega-nav1 {
        background: white;

        color: {
                {
                $web_config['primary_color']
            }
        }

         !important;
        border-radius: 3px;
    }

    .mega-nav1 .nav-link {
        color: {
                {
                $web_config['primary_color']
            }
        }

         !important;
    }
}

@media (max-width: 768px) {
    .tab-logo {
        width: 10rem;
    }
}

@media (max-width: 360px) {
    .mobile-head {
        padding: 3px;
    }
}

@media (max-width: 471px) {
    .navbar-brand img {}

    .mega-nav1 {
        background: white;

        color: {
                {
                $web_config['primary_color']
            }
        }

         !important;
        border-radius: 3px;
    }

    .mega-nav1 .nav-link {
        color: {
                {
                $web_config['primary_color']
            }
        }

         !important;
    }
}

#anouncement {
    width: 100%;
    padding: 2px 0;
    text-align: center;
    color: white;
}
</style>
@php($announcement=\App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status']==1)
<div class="d-flex justify-content-between align-items-center" id="anouncement"
    style="background-color: {{ $announcement['color'] }};color:{{$announcement['text_color']}}">
    <span></span>
    <span style="text-align:center; font-size: 15px;">{{ $announcement['announcement'] }} </span>
    <span class="ml-3 mr-3" style="font-size: 12px;cursor: pointer;color: darkred" onclick="myFunction()">X</span>
</div>
@endif


<header class="box-shadow-sm rtl" style=" font-weight: bold !important;">
    <!-- Topbar-->
    <div class="topbar">
        <div class="container">

            <div>
                <div
                    class="topbar-text dropdown d-md-none {{Session::get('direction') === "rtl" ? 'mr-auto' : 'ml-auto'}}">
                    <a class="topbar-link" href="tel: {{$web_config['phone']->value}}">
                        <i class="fa fa-phone"></i> {{$web_config['phone']->value}}
                    </a>
                </div>
                <div class="d-none d-md-block {{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}} text-nowrap">
                    <a class="topbar-link d-none d-md-flex" href="tel:{{$web_config['phone']->value}}">
                    <ion-icon name="call-outline"></ion-icon> {{$web_config['phone']->value}}
                    </a>
                </div>
            </div>

            <div>
                @php($currency_model = \App\CPU\Helpers::get_business_settings('currency_model'))
                @if($currency_model=='multi_currency')
                <div
                    class="topbar-text dropdown disable-autohide {{Session::get('direction') === "rtl" ? 'ml-4' : 'mr-4'}}">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <span>{{session('currency_code')}} {{session('currency_symbol')}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                        style="min-width: 160px!important;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                        @foreach (\App\Model\Currency::where('status', 1)->get() as $key => $currency)
                        <li style="cursor: pointer" class="dropdown-item"
                            onclick="currency_change('{{$currency['code']}}')">
                            {{ $currency->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @php( $local = \App\CPU\Helpers::default_lang())
                <div class="topbar-text dropdown disable-autohide  text-capitalize">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                        @foreach(json_decode($language['value'],true) as $data)
                        @if($data['code']==$local)
                        <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}" width="20"
                            src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png" alt="Eng">
                        {{$data['name']}}
                        @endif
                        @endforeach
                    </a>
                    <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                        @foreach(json_decode($language['value'],true) as $key =>$data)
                        @if($data['status']==1)
                        <li>
                            <a class="dropdown-item pb-1" href="{{route('lang',[$data['code']])}}">
                                <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}" width="20"
                                    src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                    alt="{{$data['name']}}" />
                                <span style="text-transform: capitalize">{{$data['name']}}</span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-sticky bg-light mobile-head">
        <div class="navbar navbar-expand-md navbar-light">
            <div class="container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-none d-sm-block {{Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'}} flex-shrink-0"
                    href="{{route('home')}}" style="min-width: 7rem;">
                    <img style="height: 40px!important; width:auto;"
                        src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                        alt="{{$web_config['name']->value}}" />
                </a>
                <a class="navbar-brand d-sm-none {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                    href="{{route('home')}}">
                    <img style="height: 38px!important;width:auto;" class="mobile-logo-img"
                        src="{{asset("storage/app/public/company")."/".$web_config['mob_logo']->value}}"
                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                        alt="{{$web_config['name']->value}}" />
                </a>
                <!-- Search-->
                <div class="input-group-overlay d-none d-md-block mx-4"
                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                    <form action="{{route('products')}}" type="submit" class="search_form">
                        <input class="form-control appended-form-control search-bar-input" type="text"
                            autocomplete="off" placeholder="{{\App\CPU\translate('search')}}" name="name">
                        <button class="input-group-append-overlay search_button" type="submit"
                            style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};top:0">
                            <span class="input-group-text" style="font-size: 20px;">
                                <i class="czi-search text-white"></i>
                            </span>
                        </button>
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <diV class="card search-card"
                            style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                            <div class="card-body search-result-box"
                                style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                        </diV>
                    </form>
                </div>
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center" style="margin-right: 10px;">
                    <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip">{{\App\CPU\translate('Expand menu')}}</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon czi-menu"></i>
                        </div>
                    </a>
                    <div class="navbar-tool dropdown {{Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'}}">
                        <a class="navbar-tool-icon-box  dropdown-toggle" href="{{route('wishlists')}}">
                            <span class="navbar-tool-label">
                                <span
                                    class="countWishlist">{{session()->has('wish_list')?count(session('wish_list')):0}}</span>
                            </span>
                            <ion-icon name="heart-outline" class="heart-ou"></ion-icon>
                        </a>
                    </div>
                    @if(auth('customer')->check())
                    <div class="dropdown">
                        <a class="navbar-tool ml-2 mr-2 " type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="navbar-tool-icon-box bg-secondary">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <img style="width: 40px;height: 40px"
                                        src="{{asset('storage/app/public/profile/'.auth('customer')->user()->image)}}"
                                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                        class="img-profile rounded-circle">
                                </div>
                            </div>
                            <div class="navbar-tool-text">
                                <small>{{\App\CPU\translate('hello')}}, {{auth('customer')->user()->f_name}}</small>
                                {{\App\CPU\translate('dashboard')}}
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('account-oder')}}">
                                {{ \App\CPU\translate('my_order')}} </a>
                            <a class="dropdown-item" href="{{route('user-account')}}">
                                {{ \App\CPU\translate('my_profile')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="{{route('customer.auth.logout')}}">{{ \App\CPU\translate('logout')}}</a>
                        </div>
                    </div>

                    <!-- <div class="dropdown">
                            <a class="navbar-tool {{Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'}}"
                               type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box">
                                    <div class="navbar-tool-icon-box">
                                    <ion-icon name="person-outline" style="color:#2ebd30 !important;"></ion-icon>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}" aria-labelledby="dropdownMenuButton"
                                 style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                  <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                                  <i class="fa fa-sign-in {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>  {{ \App\CPU\translate('Seller')}}  {{\App\CPU\translate('signin')}}
                                            </a>
                                <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item" href="{{route('customer.auth.sign-up')}}">
                                    <i class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>{{\App\CPU\translate('sign_up')}}
                                </a> --}}
                                 <a class="dropdown-item" href="{{route('customer.auth.login')}}">
                                    <i class="fa fa-sign-in {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i> {{\App\CPU\translate('sign_in')}}
                                </a>
                            </div>
                        </div> -->
                    @endif
                    <div id="cart_items">
                        @include('layouts.front-end.partials.cart')
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-md navbar-stuck-menu">
            <div class="container"
                style="padding-left: 10px;padding-right: 10px; display: flex; flex-direction: column;">
                <div class="collapse navbar-collapse" id="navbarCollapse"
                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}; ">

                    <!-- Search-->
                    <div class="input-group-overlay d-md-none my-3">
                        <form action="{{route('products')}}" type="submit" class="search_form">
                            <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                                autocomplete="off" placeholder="{{\App\CPU\translate('search')}}" name="name">
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button class="input-group-append-overlay search_button" type="submit"
                                style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">
                                <span class="input-group-text" style="font-size: 20px;">
                                    <i class="czi-search text-white"></i>
                                </span>
                            </button>
                            <diV class="card search-card"
                                style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                                <div class="card-body search-result-box" id=""
                                    style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                            </diV>
                        </form>
                    </div>


                    <ul class="navbar-nav mega-nav1  pr-2 pl-2 d-block">
                        <!--mobile-->
<<<<<<< HEAD
                        {{-- <li class="nav-item dropdown drop-toggle">
=======
                        <li class="nav-item dropdown drop-toggle">
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                            <a class="nav-link dropdown-toggle {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}"
                                href="#" data-toggle="dropdown">
                                <i
                                    class="czi-menu align-middle mt-n1 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                <span
                                    style="margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 20px !important;">{{ \App\CPU\translate('categories')}}</span>
                            </a>

<<<<<<< HEAD
                        </li> --}}
=======
                        </li>
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav" style="{{Session::get('direction') === "rtl" ? 'padding-right: 0px' : ''}}">
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">

                            <a class="nav-link hv" href="{{route('home')}}" style="display: flex; align-items: center; padding: 6px;">
                                <ion-icon name="home-outline"></ion-icon>
                                {{ \App\CPU\translate('Home')}}

                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link hv dropdown-toggle" href="#"
                                data-toggle="dropdown">{{ \App\CPU\translate('brand') }}</a>
                            <ul class="dropdown-menu  dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} scroll-bar"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                @foreach(\App\CPU\BrandManager::get_active_brands() as $brand)
                                <li
                                    style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:space-between; ">
                                    <div>
                                        <a class="dropdown-item"
                                            href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                                            {{$brand['name']}}
                                        </a>
                                    </div>
                                    <div class="align-baseline">
                                        @if($brand['brand_products_count'] > 0 )
                                        <span class="count-value px-2">( {{ $brand['brand_products_count'] }} )</span>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                                <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:center;">
                                    <div>
                                        <a class="dropdown-item" href="{{route('brands')}}"
                                            style="color: {{$web_config['primary_color']}} !important;">
                                            {{ \App\CPU\translate('View_more') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="nav-link hv text-capitalize" href="{{route('services',['data_from'=>'latest'])}}">
                                {{ \App\CPU\translate('Service')}}</a>
                        </li>
                        @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=',
                        0)->count())
                        @if ($discount_product>0)
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link hv text-capitalize"
                                href="{{route('products',['data_from'=>'discounted','page'=>1])}}">{{ \App\CPU\translate('discounted_products')}}</a>
                        </li>
                        @endif

                        @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                        @if ($business_mode == 'multi')
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link hv" href="{{route('sellers')}}">{{ \App\CPU\translate('Sellers')}}</a>
                        </li>

                        @php($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value)
                        @if($seller_registration)
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="font-weight: bold; margin-top: 3px; color:#000;  padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0">
                                    {{ \App\CPU\translate('Create Account')}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 165px !important; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                    <a class="dropdown-item" href="{{route('shop.apply')}}">
                                        <i
                                            class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                        {{ \App\CPU\translate('Seller')}} {{ \App\CPU\translate('Become a')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('customer.auth.sign-up')}}">
                                        <i
                                            class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>{{\App\CPU\translate('sign_up')}}
                                    </a>
                                    {{-- <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                    {{ \App\CPU\translate('Seller')}} {{ \App\CPU\translate('login')}}
                                    </a> --}}
                                </div>
                            </div>
                        </li>
                        @endif
                        @endif


                        <div class="dropdown">
                            <a class="navbar-tool {{Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'}}"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="navbar-tool-icon-box">
                                    <div class="navbar-tool-icon-box">
<<<<<<< HEAD
                                        <a href="#" class="nav-item p-1 hv"> <i
                                    class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i></a>
=======
                                        <a href="#" class="nav-item p-1 hv">Login</a>
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                                aria-labelledby="dropdownMenuButton"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                    <i
                                        class="fa fa-sign-in {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                    {{ \App\CPU\translate('Seller')}} {{\App\CPU\translate('signin')}}
                                </a>
                                <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item" href="{{route('customer.auth.sign-up')}}">
                                <i
                                    class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>{{\App\CPU\translate('sign_up')}}
                                </a> --}}
                                <a class="dropdown-item" href="{{route('customer.auth.login')}}">
                                    <i
                                        class="fa fa-sign-in {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                                    {{\App\CPU\translate('sign_in')}}
                                </a>
                            </div>
                        </div>




                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
function myFunction() {
    $('#anouncement').addClass('d-none').removeClass('d-flex')
}
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script>



</script>