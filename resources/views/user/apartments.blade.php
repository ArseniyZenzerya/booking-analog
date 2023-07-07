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
    <div class="main-apartments">
        <div class="content-apartments">
            <div class="text-block">
                <h1 class="biggest-text">Апартаменти</h1>
                <h2 class="big-text">Ваш дім далеко від дому – виберіть апартаменти, які вам сподобаються найбільше</h2>
            </div>
            <div class="block-data">
                <form action="{{route('find-place')}}" method="post">
                    @csrf
                    <input type="text" name='city' id="tags" class="city-input" placeholder="Куда ви вирушаєте?">
                    <input type="date" name='firstDate' class="date-input">
                    <input type="date" name='endDate' class="date-input">
                    <input type="text" name='countPeople' class="people"  placeholder="Кількість гостей">
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
            <h1>Апартаменти - Вибрані напрямки</h1>
            <p>Перегляньте апартаменти в цих популярних напрямках</p>
            <div class="type-place">
                <div class="card-type">
                    <a href="{{url('/find-place/'.'Київ')}}"><img class="card-img" src="https://cf.bstatic.com/xdata/images/city/square250/619932.webp?k=81c20cf1191a1d05472b45413bed3cee67dc92b8c1387c60a960beb5629f109d&o=" alt="hostel"></a>
                    <a href="{{url('/find-place/'.'Київ')}}"><h4>Київ</h4></a>
                    <p>{{DB::table('data_about_objects')->where('price', '>', 0)->where('city', 'Київ')->count()}} апартаментів</p>
                </div>
                <div class="card-type">
                    <a href="{{url('/find-place/'.'Харків')}}"><img class="card-img" src="https://cf.bstatic.com/xdata/images/city/square250/613105.webp?k=1e85cf4dec7b0d5a6327be91c38cf9c1711f9da1a31c4cba736f9cb751443ff1&o=" alt=""></a>
                    <a href="{{url('/find-place/'.'Харків')}}"><h4>Харків</h4></a>
                    <p>{{DB::table('data_about_objects')->where('price', '>', 0)->where('city', 'Харків')->count()}} апартаментів</p>
                </div>
                <div class="card-type">
                    <a href="{{url('/find-place/'.'Львів')}}"><img class="card-img" src="https://cf.bstatic.com/xdata/images/city/square250/971374.webp?k=95b428839d92c523c81fc50dd7158a9073bbdf92df2a5166748b2d396976ae32&o=" alt=""></a>
                    <a href="{{url('/find-place/'.'Львів')}}"><h4>Львів</h4></a>
                    <p>{{DB::table('data_about_objects')->where('price', '>', 0)->where('city', 'Львів')->count()}} апартаментів</p>
                </div>
                <div class="card-type">
                    <a href="{{url('/find-place/'.'Одеса')}}"><img class="card-img" src="https://cf.bstatic.com/xdata/images/city/square250/619965.webp?k=8b2bc851e921e03c4565fe28e4f608c30223227743b3b2cc56c476a5ef04d3da&o=" alt=""></a>
                    <a href="{{url('/find-place/'.'Одеса')}}"><h4>Одеса</h4></a>
                    <p>{{DB::table('data_about_objects')->where('price', '>', 0)->where('city', 'Одеса')->count()}} апартаментів</p>
                </div>
                <div class="card-type">
                    <a href="{{url('/find-place/'.'Полтава')}}"><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg" alt=""></a>
                    <a href="{{url('/find-place/'.'Полтава')}}"><h4>Полтава</h4></a>
                    <p>{{DB::table('data_about_objects')->where('price', '>', 0)->where('city', 'Полтава')->count()}}апартаментів</p>
                </div>
                                <div class="card-type">
                                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg" alt=""></a>
                                        <a href=""><h4>Шале</h4></a>
                                        <p>804 394 апартаментів</p>
                                </div>
                                <div class="card-type">
                                    <a href=""><img class="card-img" src="https://t-cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg" alt=""></a>
                                        <a href=""><h4>Шале</h4></a>
                                        <p>804 394 апартаментів</p>
                                </div>


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

