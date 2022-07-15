 <header class="header-auth">
        <div class="bar">
            <a href="{{ route("home") }}"><img src="/images/logo.png" class="logo" alt="logo"></a>
            <div class="buttons">
                <div class="lang"><img src="/images/flag.png" alt="lang"></div>
                <a href="{{route("register-obj")}}"><button id="button-regist">Зареєструвати своє помешкання</button></a>
                @if(Auth::check())
                    <div id="open-block-profile" class="profile-account class-open-block">
                        <div class="img-prof">
                            <img src="https://t-cf.bstatic.com/static/img/identity/profile/b47cd0e05ec8b7831167f4f7593ead56402a6bb4.svg" alt="">
                        </div>
                        <div class="text-prof">
                            @if(Auth::user()->name == '')
                                <h5>Ваш аккаунт</h5>
                            @else
                                <h5>{{Auth::user()->name ." " .Auth::user()->surname}} </h5>
                            @endif
                            <p>Genius 1-го рівня</p>
                        </div>
                    </div>
                    <div id="block-menu-profile">
                        <a href="{{route('personal-setting')}}">
                            <div class="in-block-menu-profile">
                                <img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt="">
                                <p>Керувати аккаунтом</p>
                            </div>
                        </a>
                        <a href="{{route('info-about-book-place')}}">
                            <div class="in-block-menu-profile">
                                <img src="https://cdn-icons-png.flaticon.com/512/86/86081.png" alt="">
                                <p>Бронювання</p>
                            </div>
                        </a>
                        <a href="{{route('comments')}}">
                            <div class="in-block-menu-profile">
                                <img src="https://cdn-icons-png.flaticon.com/512/2991/2991163.png" alt="">
                                <p>Мої відгуки</p>
                            </div>
                        </a>
                        <a href="">
                            <div class="in-block-menu-profile">
                                <img src="https://cdn-icons-png.flaticon.com/512/83/83203.png" alt="">
                                <p>Винагороди та Гаманець</p>
                            </div>
                        </a>
                        <a href="">
                            <div class="in-block-menu-profile">
                                <img src="http://s1.iconbird.com/ico/2013/9/452/w512h4481380476860heart.png" alt="">
                                <p>Збережене</p>
                            </div>
                        </a>
                        <a href="{{route('logout')}}">
                            <div class="in-block-menu-profile">
                                <img src="https://cdn-icons-png.flaticon.com/512/1286/1286853.png" alt="">
                                <p>Вийти</p>
                            </div>
                        </a>
                    </div>
                @else
                    <a href="{{route("sign-in")}}"><button class="button-log-in">Зареєструватися</button></a>
                    <a href="{{route("sign-in")}}"><button class="button-log-in">Увійти</button></a>
                @endif

            </div>
        </div>
    </header>

