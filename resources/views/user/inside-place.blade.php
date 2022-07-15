@extends('layouts.app')


@include('inc.header-user')


@section('content')
    <div class="main-home-content">
        <div class="content-setting">
            <div class="bar-sort">
                <h3>Шукати</h3>
                <form action="{{route('find-place')}}">
                    @csrf
                    <p>Місце / назва помешкання:</p>
                    <input type="text" name='city' value="{{session('city')}}">
                    <p>Дата заїзду</p>
                    <input type="date" name='firstDate' value="{{session('firstDate')}}" >
                    <p>Дата виїзду</p>
                    <input type="date" name='endDate' value="{{session('endDate')}}" >
                    <p>Термін перебування: ночей</p>
                    <input type="number" name='countPeople' placeholder="Кількість людей" value="{{session('countPeople')}}" >
                    <input type="submit" class="button-search" value="Шукати">
                </form>
            </div>
            <div class="main-setting-prof">
                        <div class="block-menu-place">
                            <a href="#info">
                                <div><p>Інформація та ціни</p></div>
                            </a>
                            <a href="#convinients">
                                <div><p>Зручності</p></div>
                            </a>
                            <a href="#feedbacks">
                                <div><p>Відгуки гостей ({{count($feedbacks)}})</p></div>
                            </a>
                        </div>
                    <div class="place-main">
                        <div class="header">
                            <div>
                                <h2>{{$objects->objectName}}</h2>
                            </div>
                            <div>
                                <a href=""><div></div></a>
                                <a href="{{url("/place/" . $objects->objectId) ."/booking"}}"><button>Забронювати зараз</button></a>
                            </div>
                        </div>
                        <p class="address">{{$objects->address}}, {{$objects->city}}, Україна –</p>
                        <div class="gallery">
                            @if($countPhoto == 1)
                                <div>
                                    <div>
                                    </div>
                                    <div>
                                        <img src="{{'../../storage/'.$photo[0]->photo}}" alt="">
                                    </div>
                                </div>
                            @elseif($countPhoto <= 2)
                            <div>
                                <div>
                                    <img src="{{'../../storage/'.$photo[0]->photo}}" alt="">
                                </div>
                                <div>
                                    <img src="{{'../../storage/'.$photo[1]->photo}}" alt="">
                                </div>
                            </div>
                            @elseif($countPhoto <=3)
                                <div>
                                    <div>
                                        <img src="{{'../../storage/'.$photo[0]->photo}}" alt="">
                                        <img src="{{'../../storage/'.$photo[1]->photo}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{'../../storage/'.$photo[2]->photo}}" alt="">
                                    </div>
                                </div>
                                @else
                                <div>
                                    <div>
                                        <img src="{{'../../storage/'.$photo[0]->photo}}" alt="">
                                        <img src="{{'../../storage/'.$photo[1]->photo}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{'../../storage/'.$photo[2]->photo}}" alt="">
                                    </div>
                                </div>
                            <div>
                                @for($i = 3; $i < $countPhoto; $i++)
                                    @if($i < 8)
                                        <img src="{{'../../storage/'.$photo[$i]->photo}}" alt="">
                                    @else
                                        @php
                                            break;
                                        @endphp
                                    @endif
                                @endfor
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="more-about-place">
        <div class="block-description">
            <h3 id="info">Опис помешкання</h3>
            <p>{{$objects->description}}</p>
            <p>Ціна за нічь: {{$objects->price}} UAH</p>
            <h3 id="convinients">Найпопулярніші зручності</h3>
            <ul>
                @if($objects->conditioning == 'true')
                <li>Кондиціонер</li>
                @endif
                    @if($objects->heating  == 'true')
                <li>Опалення</li>
                @endif
                    @if($objects->wiFi  == 'true')
                    <li>Безкоштовний Wi-Fi</li>
                @endif
                    @if($objects->kitchen  == 'true')
                    <li>Кухня</li>
                @endif
                    @if($objects->miniKitchen == 'true')
                    <li>Міні-кухня</li>
                @endif
                    @if($objects->washingMachine == 'true')
                <li>Пральна машина</li>
                @endif
                    @if($objects->tv == 'true')
                <li>Телевізор з плоским екраном</li>
                @endif
                    @if($objects->pool == 'true')
                <li>Басейн</li>
                @endif
                    @if($objects->hydromassage == 'true')
                <li>Гідромасажна ванна</li>
                @endif
                    @if($objects->miniBar == 'true')
                <li>Міні-бар</li>
                @endif
                    @if($objects->sauna == 'true')
                <li>Сауна</li>
                @endif

            </ul>
            <hr class="line">
{{--            <h2>Наявність місць</h2>--}}
{{--            <div class="block-data">--}}
{{--                <form action="{{route('find-place')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input type="date" name='firstDate' class="date-input-in-place-first">--}}
{{--                    <input type="date" name='endDate' class="date-input-in-place-second">--}}
{{--                    <input type="text" name='countPeople' class="people-in-place">--}}
{{--                    <input type="submit" class="input-submit-in-place" value="Змінити пошук">--}}
{{--                </form>--}}
{{--            </div>--}}

            <h2 id="feedbacks">Відгуки гостей</h2>
            <div class="block-with-point">
                <div class="point"><p>{{round(($persAverage+$convenientAverage+$priceQualityAverage+$clearAverage+$comfortableAverage+$areaAverage)/6,1)}}</p></div>
                <h5>Чудово</h5>
                <p>{{count($feedbacks)}} відгуки</p>
            </div>
            <h4 class="category">Категорії:</h4>
            <div class="progress-point">
                <div>
                    <p>Персонал</p>
                    <div>
                        <div class="progress-block-category"><div class="progress-block-category-progress"
                                                                  style="width: {{$persAverage*10}}%;"></div></div>
                        <p>{{$persAverage}}</p>
                    </div>
                </div>
                <div>
                    <p>Зручності</p>
                    <div>
                        <div class="progress-block-category"><div class="progress-block-category-progress"
                                                                  style="width: {{$convenientAverage*10}}%;"></div></div>

                        <p>{{$convenientAverage}}</p>
                    </div>
                </div>
                <div>
                    <p>Чистота</p>
                    <div>
                        <div class="progress-block-category"><div class="progress-block-category-progress"
                                                                  style="width: {{$clearAverage*10}}%;"></div></div>

                        <p>{{$clearAverage}}</p>
                    </div>
                </div>
            </div>

            <div class="progress-point">
                <div>
                    <p>Комфорт</p>
                    <div>
                        <div class="progress-block-category"><div class="progress-block-category-progress"
                                                                  style="width: {{$comfortableAverage*10}}%;"></div></div>
                        <p>{{$comfortableAverage}}</p>
                    </div>
                </div>
                <div>
                    <p>Співвідношення ціна/якість</p>
                    <div>
                        <div class="progress-block-category"><div class="progress-block-category-progress"
                                                                  style="width: {{$priceQualityAverage*10}}%;"></div></div>
                        <p>{{$priceQualityAverage}}</p>
                    </div>
                </div>
                <div>
                    <p>Розташування</p>
                    <div>
                        <div class="progress-block-category"><div class="progress-block-category-progress"
                                                                  style="width: {{$areaAverage*10}}%;"></div></div>
                        <p>{{$areaAverage}}</p>
                    </div>
                </div>
            </div>
            <div class="type-place">
                @foreach($feedbacks as $feed)
                    @if($feed->name && $feed->comments !== null)
                <div class="feedback-block">
                    <div>
                        <img src="https://t-cf.bstatic.com/static/img/identity/profile/b47cd0e05ec8b7831167f4f7593ead56402a6bb4.svg" alt="">
                        <h4>{{$feed->name}}</h4>
                    </div>
                    <div>
                        <p>“{{$feed->comments}}“</p>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
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
