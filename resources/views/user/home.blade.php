@extends('layouts.app')

@include('inc.header-user')

@section('header-extra-info')
    <script>
        $( function() {
            var availableTags =
                @php
                    echo DB::table('data_about_objects')->where('price', '>', 0)->pluck('city'); //unique doesnt work
                @endphp
            ;
            $( "#tags" ).autocomplete({
                source: availableTags
            });
        } );
    </script>
    <div class="main-home" id="app">
        <div class="content-home">
            <div class="text-block">
                <h1 class="biggest-text">Знижки назавжди? Це Genius.</h1>
                <h2 class="big-text">Отримуйте винагороди за поїздки – економте 10% або більше з безкоштовним акаунтом Booking.com</h2>
                @if(\Illuminate\Support\Facades\Auth::check())
                @else
                    <a href="{{route("sign-in")}}"><button class="button-reg-log">Увійти / зареєструватися</button></a>
                @endif
            </div>
            <div class="block-data" style="margin-top: 30px">
                <form action="{{route('find-place')}}" method="post">
                    @csrf
                    <input type="text" name='city' id="tags" class="city-input" placeholder="Куда ви вирушаєте?">
                    <input type="date" name='firstDate' class="date-input">
                    <input type="date" name='endDate' class="date-input">
                    <input type="text" name='countPeople' class="people" placeholder="Кількість гостей">
                    <input type="submit" class="input-submit" value="Шукати">
                </form>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4 style="color: red">{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@section('content')
    <div class="main-home-content">
        <div class="content-home-content">
            <h1>Пошук за типом помешкання</h1>
            <div class="type-place">
{{--                <div class="card-type">--}}
{{--                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/xdata/images/xphoto/square300/57584488.webp?k=bf724e4e9b9b75480bbe7fc675460a089ba6414fe4693b83ea3fdd8e938832a6&o=" alt="hostel">--}}
{{--                    </a>--}}
{{--                    <a href=""><h4>Готелі</h4></a>--}}
{{--                    <p>804 394 отелей</p>--}}
{{--                </div>--}}
                <div class="card-type">
                    <a href="{{route('apartments')}}"><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-apartments_300/9f60235dc09a3ac3f0a93adbc901c61ecd1ce72e.jpg" alt=""></a>
                    <a href="{{route('apartments')}}"><h4>Aпартаменти</h4></a>
                    <p>{{DB::table('data_about_objects')->where('price', '>', 0)->count()}} апартаментів</p>
                </div>
{{--                <div class="card-type">--}}
{{--                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/bg_resorts/6f87c6143fbd51a0bb5d15ca3b9cf84211ab0884.jpg" alt=""></a>--}}
{{--                    <a href=""><h4>Курортні готелі</h4></a>--}}
{{--                    <p>804 394 отелей</p>--}}
{{--                </div>--}}

{{--                <div class="card-type">--}}
{{--                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-villas_300/dd0d7f8202676306a661aa4f0cf1ffab31286211.jpg" alt=""></a>--}}
{{--                        <a href=""><h4>Віли</h4></a>--}}
{{--                        <p>804 394 отелей</p>--}}
{{--                </div>--}}
{{--                <div class="card-type">--}}
{{--                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg" alt=""></a>--}}
{{--                        <a href=""><h4>Шале</h4></a>--}}
{{--                        <p>804 394 отелей</p>--}}
{{--                </div>--}}
{{--                <div class="card-type">--}}
{{--                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg" alt=""></a>--}}
{{--                        <a href=""><h4>Шале</h4></a>--}}
{{--                        <p>804 394 отелей</p>--}}
{{--                </div>--}}
{{--                <div class="card-type">--}}
{{--                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg" alt=""></a>--}}
{{--                        <a href=""><h4>Шале</h4></a>--}}
{{--                        <p>804 394 отелей</p>--}}
{{--                </div>--}}


            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="level-prof">
                    <div>
                        <p class="congrut"><b>Вітаємо!</b> У вас <a href="">Genius-рівень 1</a></p>
                        <p>Отримайте безкоштовний доступ назавжди до знижок у помешканнях, що беруть участь у програмі, по всьому світі:</p>
                        <ol>
                            <li class="marker-discont">Знижка 10%</li>
                        </ol>
                    </div>
                    <div>
                        <img class="img-discont" src="https://t-cf.bstatic.com/static/img/genius/genius-levels/genius-lvl-1-gift.svg" alt="">
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('footer')
    <div class="footer">
        <div class="in-footer">
            <a href="{{route('register-obj')}}"><button class="reg-obj-footer">Зареєструвати своє помешкання</button></a>
        </div>
    </div>
    <div class="footer without-marg">
        <div class="in-footer">
            <a href="">Версія для мобільних пристроїв</a>
            <a href="">Керуйте своїми бронюваннями</a>
            <a href="">Служба підтримки</a>
            <a href="">Станьте нашим афіліатом</a>
            <a href="">Booking.com для компаній</a>

        </div>
    </div>
@endsection



