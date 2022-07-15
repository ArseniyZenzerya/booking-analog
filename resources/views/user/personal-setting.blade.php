@extends('layouts.app')


@include('inc.header-user')




@section('content')
    <div class="main-home-content">
        <div class="content-setting">
            <div class="bar-setting">
                <a href="{{route("personal-setting")}}"><div><div><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt=""></div><p>Особисті дані</p></div></a>
                <a href=""><div><div><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt=""></div><p>Уподобання</p></div></a>
                <a href=""><div><div><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt=""></div><p>Безпека</p></div></a>
                <a href=""><div><div><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt=""></div><p>Платіжні дані</p></div></a>
                <a href=""><div><div><img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt=""></div><p>Сповіщення ел. поштою</p></div></a>
            </div>
            <div class="main-setting-prof">
                <div class="profile-setting-header">
                    <div class="profile-header-text">
                        <h1>Особисті дані</h1>
                        <p>Оновіть свою інформацію та дізнайтеся, як вона використовується.</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <h4 style="color: red">{{ $error }}</h4>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="avatar-block">
                        <img src="https://t-cf.bstatic.com/static/img/identity/profile/b47cd0e05ec8b7831167f4f7593ead56402a6bb4.svg" alt="">
                    </div>
                </div>
                <hr>
                <div class="element-setting-prof">
                    <div class="element-setting-prof-pattern"><p>Ім'я</p></div>
                    <div class="element-setting-prof-field" id="element-setting-prof-field-first">
                        @empty(Auth::user()->name)
                            <p id="element-setting-prof-text-first">Укажіть, як до вас звертатися</p>
                        @else
                            <p id="element-setting-prof-text-first">{{Auth::user()->name ." " .Auth::user()->surname}} </p>
                        @endif
                        <form action="{{route('setting-name')}}"  method="post" id="block-form-modal" style="display: none;">
                            @csrf
                            <div><label for="">Iм'я</label><input name="name" type="text"></div>
                            <div><label for="">Прізвище</label><input name="surname" type="text"></div>
                            <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form" value="Cкасувати">
                                <a href="{{route('setting-name')}}">
                                    <button class="save-but">Зберегти</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="element-setting-prof-change" id="element-setting-prof-change-first">
                        <button  class="change-but class-open-form">Змінити</button>
                    </div>
                </div>
                <hr>
                <div class="element-setting-prof">
                    <div class="element-setting-prof-pattern"><p>Відображуване ім'я</p></div>
                    <div class="element-setting-prof-field" id="element-setting-prof-field-second">
                        @empty(Auth::user()->nameForView)
                            <p id="element-setting-prof-text-second">Виберіть відображуване ім'я</p>
                        @else
                            <p id="element-setting-prof-text-second">{{Auth::user()->nameForView}} </p>
                        @endempty
                        <form action="{{route('setting-name-for-view')}}"  method="post" id="block-form-modal2" style="display: none;">
                            @csrf
                            <div><label for="">Відображуване ім'я</label><input name="nameForView" type="text"></div>
                            <div class="button-setting">
                                <input  type="reset"  class="cancel-but class-open-form2" value="Cкасувати">
                                <a href="{{route('setting-name')}}">
                                    <button class="save-but">Зберегти</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="element-setting-prof-change" id="element-setting-prof-change-second">
                        <button class="change-but class-open-form2">Змінити</button>
                    </div>
                </div>
                <hr>
                <div class="element-setting-prof">
                    <div class="element-setting-prof-pattern"><p>Електронна адреса</p></div>
                    <div class="element-setting-prof-field" id="element-setting-prof-field-third">
                        @if(Auth::user()->email != '')
                            <p id="element-setting-prof-text-third">{{Auth::user()->email}}
                                @if((Auth::user()->email_verified_at) === null)
                                    <b color="red"><a href="{{route('mail-send')}}"> Email не підтвержено</a></b>@endif</p>
                        @endif
                        <form action="{{route('setting-email')}}"  method="post" id="block-form-modal3" style="display: none;">
                            @csrf
                            <div><label for="">Email</label><input name="email" type="email"></div>
                            <div class="button-setting" id="button-setting-third">
                                <input  type="reset"  class="cancel-but class-open-form3" value="Cкасувати">
                                <a href="{{route('setting-email')}}">
                                    <button class="save-but">Зберегти</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="element-setting-prof-change" id="element-setting-prof-change-third"><button class="change-but class-open-form3">Змінити</button></div>
                </div>
                <hr>
                <div class="element-setting-prof">
                    <div class="element-setting-prof-pattern"><p>Номер телефону</p></div>
                    <div class="element-setting-prof-field" id="element-setting-prof-field-fourth">
                        @if(Auth::user()->phone === null)
                            <p id="element-setting-prof-text-fourth">Додати свій номер телефону</p>
                        @else
                            <p id="element-setting-prof-text-fourth">{{Auth::user()->phone }}</p>
                        @endif
                        <form action="{{route('setting-phone')}}"  method="post" id="block-form-modal4" style="display: none;">
                            @csrf
                            <div><label for="">Номер телефона</label><input name="phone" type="number"></div>
                            <div class="button-setting" id="button-setting-fourth">
                                <input  type="reset"  class="cancel-but class-open-form4" value="Cкасувати">
                                <a href="{{route('setting-phone')}}">
                                    <button class="save-but">Зберегти</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="element-setting-prof-change" id="element-setting-prof-change-fourth"><button class="change-but class-open-form4">Змінити</button></div>
                </div>
                <hr>
                <div class="element-setting-prof">
                    <div class="element-setting-prof-pattern"><p>Дата народження</p></div>
                    <div class="element-setting-prof-field" id="element-setting-prof-field-fifth">
                        @if(Auth::user()->wasBorn === null)
                            <p id="element-setting-prof-text-fifth">Введіть свою дату народження</p>
                        @else
                            <p id="element-setting-prof-text-fifth">{{Auth::user()->wasBorn}}</p>
                        @endif
                        <form action="{{route('setting-date')}}"  method="post" id="block-form-modal5" style="display: none;">
                            @csrf
                            <div><label for="">Дата народження</label><input name="date" type="date"></div>
                            <div class="button-setting" id="button-setting-fifth">
                                <input  type="reset"  class="cancel-but class-open-form5" value="Cкасувати">
                                <a href="{{route('setting-date')}}">
                                    <button class="save-but">Зберегти</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="element-setting-prof-change" id="element-setting-prof-change-fifth"><button class="change-but class-open-form5">Змінити</button></div>
                </div>
                <hr>
                <div class="element-setting-prof">
                    <div class="element-setting-prof-pattern"><p>Стать</p></div>
                    <div class="element-setting-prof-field" id="element-setting-prof-field-seventh">
                        @if(Auth::user()->sex == '')
                            <p id="element-setting-prof-text-seventh">Виберіть свою стать</p>
                        @else
                            <p id="element-setting-prof-text-seventh">
                            @switch(Auth::user()->sex)
                                @case('m') Чоловічий
                                    @break
                                @case('w') Жіночий
                                    @break
                                @case('n') Не визначено
                                    @break
                            @endswitch
                            </p>
                        @endif
                        <form action="{{route('setting-sex')}}"  method="post" id="block-form-modal7" style="display: none;">
                            @csrf
                            <div>
                                <label for="">Ваша стать </label>
                                <label for=""><input name="sex" type="radio" value="m"> Чоловіча</label>
                                <label for=""><input name="sex" type="radio" value="w"> Жіноча</label>
                                <label for=""><input name="sex" type="radio" value="n" checked> Не хочу вказувати</label>
                            </div>
                            <div class="button-setting" id="button-setting-seventh">
                                <input  type="reset"  class="cancel-but class-open-form7" value="Cкасувати">
                                <a href="{{route('setting-sex')}}">
                                    <button class="save-but">Зберегти</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="element-setting-prof-change" id="element-setting-prof-change-seventh"><button class="change-but class-open-form7">Змінити</button></div>
                </div>
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
