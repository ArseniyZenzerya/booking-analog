@php
    $objects = DB::table('data_about_objects')
    ->orderBy('updated_at', 'desc')
    ->get()
    ->where('price', '=', -1)
    ->where('userId', auth()->guard('userForObj')->id())
@endphp
@extends('layouts.app')




@include('inc/header-object')

@section('header-extra-info')
    <div class="reg-obj">
        <div class="block-reg-obj">
            <div class="reg-obj-info">
                @auth('userForObj')
                    <h1>{{Auth::guard('userForObj')->user()->name. ' ' .Auth::guard('userForObj')->user()->surname  }}, зареєструйте <span>що завгодно</span> на Booking.com</h1>
                    <h3>Реєстрація безкоштовна й займає всього 15 хвилин – почніть зараз</h3>
                @endauth
                    @guest('userForObj')
                    <h1>Зареєструйте <span>що завгодно</span> на Booking.com</h1>
                    <h3>Реєстрація безкоштовна й займає всього 15 хвилин – почніть зараз</h3>
                    @endguest
            </div>
            <div class="reg-obj-block-info">
                <div>
                    @if(DB::table('data_about_objects')
                            ->where('userId', auth()->guard('userForObj')->id())
                            ->where('price', '=', -1)
                            ->exists())
                        <h1>Продовжити реєстрацію</h1>
                        <h3>З поверненням, {{Auth::guard('userForObj')->user()->name}}!</h3>
                        <hr>
                        <div class="scroll-object">
                            @foreach($objects as $object => $infoAboutObject)
                            <div>
                                <div>
                                    <h5>{{$infoAboutObject->objectName}}</h5>
                                    <p>Останні зміни: {{ $infoAboutObject->updated_at}}</p>
                                </div>
                                <a href="{{url("/register-new-object/details/next-step/" . $infoAboutObject->objectId)}}">
                                    <button id="continue-registration-button">Продовжити</button>
                                </a>
                            </div>
                                @endforeach
                        </div>
                        <h4>З поверненням, {{Auth::guard('userForObj')->user()->name}}!</h4>
                        <a id="link-continue" href="{{route('register-new-object')}}">Зареєструвати нове помешкання</a>
                    @else
                        <h1>Зареєструйте нове помешкання</h1>
                        <ol>
                            <li>Понад 6,4 млн зареєстрованих помешкань для відпустки</li>
                            <li>Більше ніж 1 млрд заїздів у помешкання для відпустки</li>
                            <li>Понад 40% щойно зареєстрованих помешкань для відпустки отримують своє перше бронювання протягом тижня</li>
                        </ol>
                            @guest('userForObj')
                            <hr>
                            <h5>Створіть акаунт партнера, щоб почати:</h5>
                            <p>Продовжуючи, Ви погоджуєтесь отримувати листи від Booking.com стосовно реєстрації Вашого готельного об'єкта.</p>
                            <a href="{{route('reg-obj-signin')}}"><button>Почати</button></a>
                        @endguest
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-reg-obj">
        <div class="in-content-reg-obj">
            <div class="content-our-plus">
                <h1>Ваш спокій – наш основний пріоритет</h1>
                <p>Ось як ми допомагаємо вам почуватися впевненіше, коли ви приймаєте гостей:</p>
                <ol>
                    <li>Встановіть <b>правила помешкання</b>, з якими гості мають погодитися перед заїздом</li>
                    <li>Встановіть <b>страхову заставу</b> для додаткової безпеки</li>
                    <li><b>Повідомте про неналежну поведінку гостя</b>, якщо щось піде не так</li>
                    <li>Доступ до <b>цілодобової служби підтримки</b> понад 43 мовами</li>
                    <li>Захист від страхових вимог з боку гостей та сусідів на суму до 1 000 000 дол. США для кожного бронювання</li>
                </ol>
                <a href=""><button class="button-more">Дізнатися більше</button></a>
            </div>
            <img src="https://cf.bstatic.com/psb/capla/static/media/peace-of-mind.73a348df.svg" alt="">
        </div>
    </div>
    <div class="what-descript">
        <div class="in-what-descript">
            <h1>Який опис підходить Вам краще?</h1>
            <p>Виберіть один із варіантів, щоб переглянути персоналізовану інформацію</p>
            <div class="descript-cards">
                <div>
                    <h3>Я іноді здаю своє помешкання в оренду</h3>
                    <ol>
                        <li>У цьому помешканні я зберігаю особисті речі</li>
                        <li>У мене мало досвіду у сфері гостинності</li>
                    </ol>
                    <a href=""><button class="button-more button-card">Дізнатися більше</button></a>
                </div>
                <div>
                    <h3>Я маю кілька помешкань, які здаю протягом усього року</h3>
                    <ol>
                        <li>Ці помешкання здебільшого здаються в оренду гостям</li>
                        <li>У мене є досвід роботи у сфері гостинності</li>
                    </ol>
                    <a href=""><button class="button-more button-card">Дізнатися більше</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
