<header class="header-auth">
    <div class="bar">
        <a href="{{ route("home") }}"><img src="/images/logo.png" class="logo" alt="logo"></a>
        <div class="buttons">
            <div class="lang"><img src="/images/flag.png" alt="lang"></div>
            @guest('userForObj')
            <h3>Ви вже наш партнер?</h3>
            @endguest
            @auth('userForObj')
                <div id="open-block-profile" class="profile-account class-open-block">
                    <div class="img-prof">
                        <img src="https://t-cf.bstatic.com/static/img/identity/profile/b47cd0e05ec8b7831167f4f7593ead56402a6bb4.svg" alt="">
                    </div>
                    <div class="text-prof-obj">
                        <h5>{{Auth::guard('userForObj')->user()->name. ' ' .Auth::guard('userForObj')->user()->surname }}</h5>
                    </div>
                </div>
                <div id="block-menu-profile-obj">
                    <a href="{{route('my-places')}}">
                        <div>
                            <p>Переглянути мої помешкання</p>
                        </div>
                    </a>
                    <a href="{{route('register-new-object')}}">
                        <div>
                            <p>Додати нове помешкання</p>
                        </div>
                    </a>
                    <a href="{{route('obj-logout')}}">
                        <div>
                            <p>Вийти</p>
                        </div>
                    </a>
                </div>
        </div>
        @endauth
        @guest('userForObj')
            <a href="{{route("reg-obj-signin")}}"><button class="button-log-in white">Увійти</button></a>
        @endguest
    </div>
</header>

