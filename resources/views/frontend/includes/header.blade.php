<style>


.full-width-header .rs-header .menu-area .main-menu .rs-menu ul.nav-menu li.menu-item-has-children a:before {
    right: -12px;
}



</style>



<div class="full-width-header home8-style4 main-home" style="    background-color: black;">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky" >
            <div class="container-fluid">
                <div class="row y-middle">
                    <div class="col-lg-2">
                        <div class="logo-cat-wrap">
                            <div class="logo-part">
                                <a href="{{route('front.page')}}">
                                    @php $logo = \App\Models\Logo::latest()->first() @endphp
                                    @php $menus = \App\Models\Menu::get() @endphp
                                    @php $results = \App\Models\Result::get()
                                    @endphp
                                    <img class="normal-logo" src="{{asset($logo->logo_image1??null)}}" alt="" style="height: 75px">
                                    <img class="sticky-logo" src="{{asset($logo->logo_image??null)}}" alt="" style="height: 75px">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-left">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <li class="menu-item {{Request::routeIs('front.page') ? 'current-menu-item' : ''}}"> <a href="{{route('front.page')}}">
                                            @if(session()->get('language') == 'bangla') হোম @else Home @endif </a>

                                        </li>



{{--                        <li class="menu-item-has-children">--}}

{{--                                            <a href="#">--}}
{{--                                             Services </a>--}}



{{--                                            <ul class="sub-menu">--}}
{{--                                              @php--}}
{{--                            $software=\App\Models\Software::all();--}}
{{--                            $services=\App\Models\Service::all();--}}
{{--                            @endphp--}}
{{--                                    @foreach($software as $service)--}}
{{--                                                <li class="menu-item" >--}}
{{--                                                    <a style="margin-top:0px !important; margin-bottom:0px !important" href="/software/details/{{$service->id}}">{{$service->title}}</a>--}}
{{--                                                </li>--}}
{{--                                                 @endforeach--}}



{{--                                            </ul>--}}
{{--                                         </li>--}}
{{--                                       <li class="menu-item-has-children">--}}

{{--                                            <a href="#">--}}
{{--                                             Marketing </a>--}}



{{--                                            <ul class="sub-menu">--}}

{{--                                             @foreach($services as $service)--}}
{{--                                                <li class="menu-item">--}}
{{--                                                    <a href="{{route('services.details',['id'=>$service->id])}}">{{$service->service_title}}</a>--}}
{{--                                                </li>--}}
{{--                                                 @endforeach--}}



{{--                                            </ul>--}}
{{--                                         </li>--}}




{{--                                        <li class="menu-item {{Request::routeIs('blogs.page') ? 'current-menu-item' : ''}}">--}}
{{--                                            <a href="{{route('blogs.page')}}">--}}
{{--                                                @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে  @else About Us @endif--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

                                       {{-- <li class="menu-item {{ Request::routeIs('about.us') ? 'current-menu-item' : '' }}">--}}
{{--                                            <a href="{{ route('about.us') }}">--}}
{{--                                                @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে @else About Us @endif--}}
{{--                                            </a>--}}
{{--                                        </li> --}}





                                        @foreach($menus as $menu)
                                            @php $sub_menus = \App\Models\SubMenu::Where('menu_id',$menu->id)->get() @endphp

                                            <li class="menu-item-has-children">

                                                <a href="#">
                                                    @if(session()->get('language') == 'bangla') {{$menu->title_bangla}} @else {{$menu->title}} @endif </a>



                                                <ul class="sub-menu">

                                                    <li class="menu-item">
                                                        <a href="{{ route('about.us') }}">
                                                            @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে  @else Company Profile @endif</a>
                                                    </li>



{{--                                                    @foreach($sub_menus as $sub_menu)--}}
{{--                                                        <li class="menu-item">--}}
{{--                                                            <a href="{{route('submenu.details',['id'=>$sub_menu->id])}}">--}}
{{--                                                                @if(session()->get('language') == 'bangla') {{$sub_menu->title_bangla}} @else {{$sub_menu->title}} @endif </a>--}}
{{--                                                        </li>--}}
{{--                                                    @endforeach--}}


{{--                                                    <li class="menu-item">--}}
{{--                                                        <a href="{{ route('team.page') }}">--}}
{{--                                                            @if(session()->get('language') == 'bangla') দলগত  @else Team  @endif  </a>--}}
{{--                                                    </li>--}}



                                                    {{-- <li class="menu-item">
                                                       <a href="/managing/committe">
                                                            @if(session()->get('language') == 'bangla') নির্বাহী  কমিটি @else Managing Committee @endif</a>
                                                   </li>
                                                       <li class="menu-item">
                                                           <a href="{{route('sponsor.page')}}">
                                                               @if(session()->get('language') == 'bangla') স্পন্সর @else Sponsor @endif</a>
                                                       </li> --}}

                                                </ul>
                                            </li>

                                        @endforeach







                                        {{--                                        <a href="{{ route('about.us') }}">--}}
{{--                                            @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে  @else Company Profile @endif--}}
{{--                                        </a>--}}



                                        <li class="menu-item {{Request::routeIs('blogs.page') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('blogs.page')}}">
                                                @if(session()->get('language') == 'bangla') ব্লগ @else Blog @endif
                                            </a>
                                        </li>


                                        <li class="menu-item {{Request::routeIs('contacts') ? 'current-menu-item' : ''}}">
                                            <a href="{{route('contacts')}}">
                                                @if(session()->get('language') == 'bangla') যোগাযোগ @else Contact Us @endif
                                            </a>
                                        </li>

{{--                                        <li class="menu-item {{Request::routeIs('contacts') ? 'current-menu-item' : ''}}">--}}
{{--                                            <a href="{{route('about.us.new')}}">--}}
{{--                                                @if(session()->get('language') == 'bangla') যোগাযোগ @else About Us2 @endif--}}
{{--                                            </a>--}}
{{--                                        </li>--}}







                                                @if(Auth::user()!=null)
                                                    @if(Auth::user()->is_admin == 0)
                                            <li class="menu-item-has-children d-inline d-lg-none">
                                                <a href="#">
                                                    @if(session()->get('language') == 'bangla') প্রোফাইল @else Profile @endif </a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item">
                                                        <a href="{{route('user.profile.settings')}}" class="crt-btn btn2 w-100">
                                                            @if(session()->get('language') == 'bangla') প্রোফাইল সেটিংস @else Profile Settings @endif </a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('enrollment.page')}}" class="crt-btn btn2 w-100">
                                                            @if(session()->get('language') == 'bangla') তালিকাভুক্তি @else Enrollments @endif </a>
                                                    </li>
                                                    <div class="cart-btn text-center">
                                                        <a class="crt-btn btn2 w-100" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" href="">
                                                            @if(session()->get('language') == 'bangla') লগআউট করুন @else Logout Out @endif </a>
                                                        <form action="{{route('logout')}}" id="logoutForm" method="POST">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </ul>
                                            </li>
                                            @endif
                                                @else
                                                        <a class="readon orange-btn main-home btn-sm d-block text-center d-lg-none" href="{{route('login')}}">@if(session()->get('language') == 'bangla') প্রবেশ করুন @else Login @endif</a>

                                                @endif




                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->

                        </div>
                    </div>
                    <div class="col-lg-2 text-right">

                                            {{-- <a class="btn btn-success" href="{{route('admission.page')}}">
                                                @if(session()->get('language') == 'bangla') ভর্তি  @else Admission @endif
                                            </a> --}}

                        <div class="expand-btn-inner">
                            <ul>
                                @if(Auth::user()!=null)
                                    @if(Auth::user()->is_admin == 0)
                                <li class="user-icon cart-inner no-border mini-cart-active">
                                    <a href="#"><i class="fa fa-user"></i></a>
                                    <div class="woocommerce-mini-cart text-left">
                                        <div class="cart-bottom-part">

                                            <div class="total-price text-center">
                                                <a href="{{route('user.profile.settings')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') প্রোফাইল @else Profile @endif </a>
                                            </div>

                                            <div class="total-price text-center">
                                                <a href="{{route('user.member.details')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') মেম্বার @else Member Details @endif </a>
                                            </div>

                                            {{-- <div class="total-price text-center">
                                                <a href="{{route('blogs.page')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') পোস্ট প্রকাশ করুন @else publish Post @endif </a>
                                            </div> --}}

                                            <div class="total-price text-center">
                                                <a href="{{route('enrollment.page')}}" class="crt-btn btn2 w-100">
                                                    @if(session()->get('language') == 'bangla') তালিকাভুক্তি @else Enrollments @endif </a>
                                            </div>

                                            <div class="cart-btn text-center">
                                                <a class="crt-btn btn2 w-100" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" href="">
                                                    @if(session()->get('language') == 'bangla') লগআউট করুন @else Logout Out @endif </a>
                                                <form action="{{route('logout')}}" id="logoutForm" method="POST">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @endif
                                @else
                                    <a class="readon orange-btn main-home btn-sm" href="{{route('login')}}">
                                        @if(session()->get('language') == 'bangla') প্রবেশ করুন @else Login @endif </a>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

    </header>
    <!--Header End-->
</div>
