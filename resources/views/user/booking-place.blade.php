@extends('layouts.app')


@include('inc.header-user')




@section('content')
    <div class="main-home-content">
        <div class="content-setting">
            <div class="bar-book">
                <div class="bar-info-for-booking">
                    <h3>Інформація про ваше бронювання</h3>
                    <br>
                    <div class="calendar-book">
                        <div>
                            <p>Реєстрація заїзду</p>
                            <div>
                                <b>{{session('firstDate')}}</b>
                            </div>
                        </div>
                        <div id="line-right-side"></div>
                        <div>
                            <p>Реєстрація виїзду</p>
                            <div>
                                <b>{{session('endDate')}}</b>
                            </div>
                        </div>
                    </div>
                    <br>
                    <p>Загальний термін перебування:</p>
                    <b>{{ $countNight }} ніч</b>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <h4 style="color: red">{{ $error }}</h4>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="bar-info-for-booking back-color">
                    <h3>Деталі ціни</h3>
                    <br>
                        <div class="price-book">
                            <div>
                                <h4>Ціна</h4>
                                <p>(за {{$objects->countGuest}} гостей)</p>
                            </div>
                            <div>
                                <h4>UAH {{$countNight * $objects->price}}</h4>
                            </div>
                        </div>
                </div>
            </div>
                <div class="main-setting-prof">
                        <div class="place-book">
                        <div><img src="{{'../../storage/'.$photo[0]->photo}}" alt=""></div>
                        <div>
                            <h2>{{$objects->objectName}}</h2>
                            <p>{{$objects->address}}, {{$objects->city}}, Україна</p>
                        </div>
                    </div>
                    <form action="{{route('book-place-end')}}" id="preferences" method="post">
                        @csrf
                        @guest
                            <div class="place-book">
                                <div>
                                    <p><a href="{{route("sign-in")}}">Увійдіть</a>, щоб завантажити свої дані або
                                        <a href="{{route("sign-in")}}">зареєструйтеся</a>, щоб керувати своїми бронюваннями на ходу!</p>
                                </div>
                            </div>
{{--                            <div class="place-book back-color">--}}
{{--                            <div>--}}
{{--                                <h2>Введіть свої дані</h2>--}}
{{--                                <br>--}}
{{--                                <div>--}}
{{--                                    <label for="">Ім'я (латиницею) *</label>--}}
{{--                                    <input type="text" name="name">--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <label for="">Прізвище (латиницею) *</label>--}}
{{--                                    <input type="text" name="surname">--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <div>--}}
{{--                                    <label for="">Електронна адреса *</label>--}}
{{--                                    <input type="text" name="email">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        @endguest
                    @if(Auth::check())

                            <div class="place-book back-color">
                                <div>
                                    <h2>Напишіть свої особливі побажання</h2>
                                    <br>
                                    <p>Виконання особливих побажань не гарантовано, однак адміністрація помешкання зробить усе можливе, щоб задовольнити ваші потреби. Ви завжди можете відправити запит або особливе побажання після завершення бронювання!</p>
                                    <br>
                                    <h5>Будь ласка, напишіть свої запити тут. (за бажанням)</h5>
                                        <input type="hidden" name='objectsId' value="{{$objects->objectId}}">
                                        <textarea name="preferences" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                    <div class="place-book without-bg">
                      <input type="submit" form="preferences" value="Далі">
                    </div>
                        @endif
                    </form>
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
