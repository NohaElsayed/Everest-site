<div id="headerMain" class="d-none">
    <header id="header" style="background-color: #041562"
            class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper">
                <!-- Logo -->
                {{-- @if (auth('seller'))
                @php($shop=\App\Model\Shop::where(['seller_id'=>auth('seller')->id()])->first())

                <a class="navbar-brand" href="{{route('admin-delivery.dashboard')}}" aria-label="">
                    @if (isset($shop))
                        <img class="navbar-brand-logo" style="max-height: 42px;"
                             onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}'"
                             src="{{asset("storage/app/public/shop/$shop->image")}}" alt="Logo" height="40" width="40">
                        <img class="navbar-brand-logo-mini" style="max-height: 42px;"
                             onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}'"
                             src="{{asset("storage/app/public/shop/$shop->image")}}"
                             alt="Logo" height="40" width="40">

                    @else
                        <img class="navbar-brand-logo-mini" style="max-height: 42px;"
                             src="{{asset('public/assets/back-end/img/160x160/img1.jpg')}}"
                             alt="Logo" height="40" width="40">
                    @endif

                </a>
                @endif --}}
                <!-- End Logo -->
            </div>

            <div class="navbar-nav-wrap-content-left">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                       data-placement="right" title="Collapse"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                       data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-toggle="tooltip" data-placement="right" title="Expand"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
                <div class="d-none d-md-block">
                    <form class="position-relative">
                    </form>
                </div>
            </div>


            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right"
                 style="{{Session::get('direction') === "rtl" ? 'margin-left:unset; margin-right: auto' : 'margin-right:unset; margin-left: auto'}}">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center flex-row">

                    <li class="nav-item d-none d-sm-inline-block">
                        <div class="hs-unfold">
                            <div style="background:white;padding: 2px;border-radius: 5px;">
                                @php( $local = session()->has('local')?session('local'):'en')
                                @php($lang = \App\Model\BusinessSetting::where('type', 'language')->first())
                                <div
                                    class="topbar-text dropdown disable-autohide {{Session::get('direction') === "rtl" ? 'ml-3' : 'm-1'}} text-capitalize">
                                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown"
                                       style="color: black!important;">
                                        @foreach(json_decode($lang['value'],true) as $data)
                                            @if($data['code']==$local)
                                                <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                                     width="20"
                                                     src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                                     alt="Eng">
                                                {{$data['name']}}
                                            @endif
                                        @endforeach
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach(json_decode($lang['value'],true) as $key =>$data)
                                            @if($data['status']==1)
                                                <li>
                                                    <a class="dropdown-item pb-1"
                                                       href="{{route('lang',[$data['code']])}}">
                                                        <img
                                                            class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                                            width="20"
                                                            src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                                            alt="{{$data['name']}}"/>
                                                        <span
                                                            style="text-transform: capitalize">{{$data['name']}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            {{-- <a title="Website Home" --}}
                               {{-- class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="{{route('home')}}" target="_blank">
                                <i class="tio-globe"></i> --}}
                                {{--<span class="btn-status btn-sm-status btn-status-danger"></span>--}}
                            {{-- </a> --}}
                        </div>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            {{-- <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="{{route('seller.messages.chat')}}">
                                <i class="tio-email"></i>
                                @php($message=\App\Model\Chatting::where(['seen_by_seller'=>1,'seller_id'=>auth('seller')->id()])->count())
                                @if($message!=0)
                                    <span class="btn-status btn-sm-status btn-status-danger">{{\App\Model\Chatting::where(['seen_by_seller'=>1,'seller_id'=>auth('seller')->id()])->count()}}</span>
                                @endif
                            </a> --}}
                        </div>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            {{-- <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="{{route('seller.orders.list',['pending'])}}">
                                <i class="tio-shopping-cart-outlined"></i>

                            </a> --}}
                        </div>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item view-web-site-info">
                        <div class="hs-unfold">
                            <a style="background-color: rgb(255, 255, 255)" onclick="openInfoWeb()" href="javascript:"
                               class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle">
                                <i class="tio-info"></i>
                            </a>
                        </div>
                    </li>


                    <li class="nav-item">
                        <!-- Account -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                               data-hs-unfold-options='{
                                     "target": "#accountNavbarDropdown",
                                     "type": "css-animation"
                                   }'>
                                <div class="avatar avatar-sm avatar-circle">
<<<<<<< HEAD
                                      @if(auth('employ')->user())
                                    <img class="avatar-img"
                                         onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}'"
                                         src="{{asset('storage/app/public/employ/')}}/{{auth('employ')->user()->photo}}"
=======
                                      @if(auth('seller')->user())
                                    <img class="avatar-img"
                                         onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}'"
                                         src="{{asset('storage/app/public/seller/')}}/{{auth('seller')->user()->image}}"
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                                         alt="Image Description">@endif
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account"
                                 style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center text-break">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
<<<<<<< HEAD
                                     @if(auth('employ')->user())
                                            <img class="avatar-img"
                                                 onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}'"
                                                 src="{{asset('storage/app/public/employ/')}}/{{auth('employ')->user()->photo}}"
=======
                                     @if(auth('seller')->user())
                                            <img class="avatar-img"
                                                 onerror="this.src='{{asset('public/assets/back-end/img/160x160/img1.jpg')}}'"
                                                 src="{{asset('storage/app/public/seller/')}}/{{auth('seller')->user()->image}}"
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                                                 alt="Image Description">
                                                 @endif
                                        </div>
                                        <div class="media-body">
                                            
<<<<<<< HEAD
                                            {{-- <span class="card-title h5">{{auth('employ')->user()->f_name}}</span>

                                            <span class="card-text">{{auth('employ')->user()->email}}</span> --}}
                                           
                                            <span class="card-title h5">{{auth('employ')->user()->name}}</span>

                                            <span class="card-text">{{auth('employ')->user()->email}}</span>
                                            
=======
                                            {{-- <span class="card-title h5">{{auth('seller')->user()->f_name}}</span>

                                            <span class="card-text">{{auth('seller')->user()->email}}</span>
                                           
                                            <span class="card-title h5">{{auth('delivery')->user()->name}}</span>

                                            <span class="card-text">{{auth('delivery')->user()->email}}</span>
                                             --}}
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>
<<<<<<< HEAD
                               @if(auth('employ')->user())
                                {{-- <a class="dropdown-item"
                                   href="{{route('seller.profile.update',auth('employ')->user()->id)}}">
                                    <span class="text-truncate pr-2"
                                          title="Settings">{{\App\CPU\translate('Settings')}}</span>
                                </a> --}}
=======
                               @if(auth('seller')->user())
                                <a class="dropdown-item"
                                   href="{{route('seller.profile.update',auth('seller')->user()->id)}}">
                                    <span class="text-truncate pr-2"
                                          title="Settings">{{\App\CPU\translate('Settings')}}</span>
                                </a>
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                                @endif
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="javascript:" onclick="Swal.fire({
                                    title: '{{\App\CPU\translate('Do you want to logout')}}?',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonColor: '#377dff',
                                    cancelButtonColor: '#363636',
                                    confirmButtonText: `Yes`,
                                    denyButtonText: `Don't Logout`,
                                    }).then((result) => {
                                    if (result.value) {
<<<<<<< HEAD
                                    location.href='{{route('admin-delivery.auth.logout')}}';
=======
                                    location.href='{{route('seller.auth.logout')}}';
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                                    } else{
                                    Swal.fire('Canceled', '', 'info')
                                    }
                                    })">
                                    <span class="text-truncate pr-2"
                                          title="Sign out">{{\App\CPU\translate('Sign out')}}</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Account -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
            <!-- End Secondary Content -->
        </div>
        <div id="website_info"
             style="display:none;background-color:rgb(165, 164, 164);width:100%;border-radius:0px 0px 5px 5px;">
            <div style="padding: 20px;">
                <div style="background:white;padding: 2px;border-radius: 5px;">
                    @php( $local = session()->has('local')?session('local'):'en')
                    @php($lang = \App\Model\BusinessSetting::where('type', 'language')->first())
                    <div
                        class="topbar-text dropdown disable-autohide {{Session::get('direction') === "rtl" ? 'ml-3' : 'm-1'}} text-capitalize">
                        <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown"
                           style="color: black!important;">
                            @foreach(json_decode($lang['value'],true) as $data)
                                @if($data['code']==$local)
                                    <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                         width="20"
                                         src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                         alt="Eng">
                                    {{$data['name']}}
                                @endif
                            @endforeach
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(json_decode($lang['value'],true) as $key =>$data)
                                @if($data['status']==1)
                                    <li>
                                        <a class="dropdown-item pb-1"
                                           href="{{route('lang',[$data['code']])}}">
                                            <img
                                                class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                                width="20"
                                                src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                                alt="{{$data['name']}}"/>
                                            <span style="text-transform: capitalize">{{$data['name']}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div style="background:white;padding: 2px;border-radius: 5px;margin-top:10px;">
                    <a title="Website home" class="p-2"
                       href="{{route('home')}}" target="_blank">
                        <i class="tio-globe"></i>

                        {{\App\CPU\translate('view_website')}}
                    </a>
                </div>

<<<<<<< HEAD
                {{-- <div style="background:white;padding: 2px;border-radius: 5px;margin-top:10px;">
=======
                <div style="background:white;padding: 2px;border-radius: 5px;margin-top:10px;">
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                    <a class="p-2"
                       href="{{route('seller.messages.chat')}}">
                        <i class="tio-email"></i>
                        {{\App\CPU\translate('message')}}
                        @php($message=\App\Model\Chatting::where(['seen_by_seller'=>1,'seller_id'=>auth('seller')->id()])->count())
                        @if($message!=0)
                            <span class="">({{ $message }})</span>
                        @endif
                    </a>
<<<<<<< HEAD
                </div> --}}
           
                {{-- <div style="background:white;padding: 2px;border-radius: 5px;margin-top:10px;">
=======
                </div>
           
                <div style="background:white;padding: 2px;border-radius: 5px;margin-top:10px;">
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
                    <a class="p-2"
                       href="{{route('seller.orders.list',['pending'])}}">
                        <i class="tio-shopping-cart-outlined"></i>
                        {{\App\CPU\translate('Order_list')}}
                    </a>
<<<<<<< HEAD
                </div> --}}
=======
                </div>
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444

            </div>
        </div>
    </header>
</div>
<div id="headerFluid" class="d-none"></div>
<div id="headerDouble" class="d-none"></div>
