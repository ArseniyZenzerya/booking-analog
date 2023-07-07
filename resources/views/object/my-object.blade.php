@extends('layouts.app')


@include('inc/header-object')

@section('content')
    <div class="content-reg-obj">
        <div class="content-places">
            @foreach($object as $value)
            <div class="header-remake-place ">
                <h2>{{$value->objectName}}</h2>
                <div>

                    <a href="{{url("/register-new-object/details/next-step/" . $value->objectId . '/' . 'booking')}}"><button @if($sort == 'booking')id="active-place" @endif>Бронювання</button></a>
                    <a href="{{url("/register-new-object/details/next-step/" . $value->objectId . '/' . 'remake')}}"><button @if($sort == 'remake')id="active-place" @endif>Редагувати помешкання</button></a>
                </div>
            </div>
                <div class="main-setting-prof">
                    <div class="profile-setting-header">
                        <div class="profile-header-text">
                            <h1>Дані про помешкання</h1>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <h4 style="color: red">{{ $error }}</h4>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="avatar-block-place">
                            <img src="{{asset('storage/'.$photo[0]->photo)}}" alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Назва помешкання</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-first">
                            <p id="element-setting-prof-text-first">{{$value->objectName}} </p>
                            <form action="{{route('setting-object-name')}}"  method="post" id="block-form-modal" style="display: none;">
                                @csrf
                                <div><label for="">Назва помешкання</label><input name="name" type="text"></div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form" value="Cкасувати">
                                    <a href="{{route('setting-object-name')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-first">
                            <button  class="change-but class-open-form">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Місто</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-second">
                            <p id="element-setting-prof-text-second">{{$value->city}} </p>
                            <form action="{{route('setting-object-city')}}"  method="post" id="block-form-modal2" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть назву міста</label><input name="city" type="text"></div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form2" value="Cкасувати">
                                    <a href="{{route('setting-object-city')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-second">
                            <button  class="change-but class-open-form2">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Адреса</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-third">
                            <p id="element-setting-prof-text-third">{{$value->address}} </p>
                            <form action="{{route('setting-object-address')}}"  method="post" id="block-form-modal3" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть адресу</label><input name="address" type="text"></div>
                                <div class="button-setting" id="button-setting-third">
                                    <input  type="reset"  class="cancel-but class-open-form3" value="Cкасувати">
                                    <a href="{{route('setting-object-address')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-third">
                            <button  class="change-but class-open-form3" >Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Ціна</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-fourth">
                            <p id="element-setting-prof-text-fourth">{{$value->price}} UAH</p>
                            <form action="{{route('setting-object-price')}}"  method="post" id="block-form-modal4" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть ціну</label><input min ='0' max="1000000" name="price" type="number"></div>
                                <div class="button-setting" id="button-setting-fourth">
                                    <input  type="reset"  class="cancel-but class-open-form4" value="Cкасувати">
                                    <a href="{{route('setting-object-price')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-fourth">
                            <button  class="change-but class-open-form4">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Оплата карткою</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-fifth">
                            <p id="element-setting-prof-text-fifth">
                                @if($value->card == 'false')
                                    Ні
                                @else
                                    Так
                                @endif
                            </p>
                            <form action="{{route('setting-object-card')}}"  method="post" id="block-form-modal5" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть чи стягуете ви плату карткою</label>
                                    <label for=""><input name="card" value="true" type="radio"> Так</label>
                                    <label for=""><input name="card" value="false" type="radio" checked> Ні</label>
                                </div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form5" value="Cкасувати">
                                    <a href="{{route('setting-object-card')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-fifth">
                            <button  class="change-but class-open-form5">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Опис</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-sixth">
                            <p id="element-setting-prof-text-sixth">{{$value->description}} </p>
                            <form action="{{route('setting-object-description')}}"  method="post" id="block-form-modal6" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть опис</label><textarea name="description" cols="50"
                                                                                 rows="5"></textarea></div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form6" value="Cкасувати">
                                    <a href="{{route('setting-object-description')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-sixth">
                            <button  class="change-but class-open-form6">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Кількість зірок</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-seventh">
                            <p id="element-setting-prof-text-seventh">{{$value->stars}} </p>
                            <form action="{{route('setting-object-stars')}}"  method="post" id="block-form-modal7" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть кількість зірок</label>
                                    <select name="stars">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select></div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form7" value="Cкасувати">
                                    <a href="{{route('setting-object-stars')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-seventh">
                            <button  class="change-but class-open-form7">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Яка кількість гостей може проживати</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-eight">
                            <p id="element-setting-prof-text-eight">{{$value->countGuest}} </p>
                            <form action="{{route('setting-object-countGuest')}}"  method="post" id="block-form-modal8" style="display: none;">
                                @csrf
                                <div><label for="">Вкажіть кількість гостей</label><input name="countGuest" min='1' max='200'type="number"></div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form8" value="Cкасувати">
                                    <a href="{{route('setting-object-countGuest')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-eight">
                            <button  class="change-but class-open-form8">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Зручності</p></div>
                        <div class="element-setting-prof-field" id="element-setting-prof-field-ninth">
                            <ul  id="element-setting-prof-text-ninth">
                                @if($value->conditioning == 'true')
                                    <li>Кондиціонер</li>
                                @endif
                                @if($value->heating  == 'true')
                                    <li>Опалення</li>
                                @endif
                                @if($value->wiFi  == 'true')
                                    <li>Безкоштовний Wi-Fi</li>
                                @endif
                                @if($value->kitchen  == 'true')
                                    <li>Кухня</li>
                                @endif
                                @if($value->miniKitchen == 'true')
                                    <li>Міні-кухня</li>
                                @endif
                                @if($value->washingMachine == 'true')
                                    <li>Пральна машина</li>
                                @endif
                                @if($value->tv == 'true')
                                    <li>Телевізор з плоским екраном</li>
                                @endif
                                @if($value->pool == 'true')
                                    <li>Басейн</li>
                                @endif
                                @if($value->hydromassage == 'true')
                                    <li>Гідромасажна ванна</li>
                                @endif
                                @if($value->miniBar == 'true')
                                    <li>Міні-бар</li>
                                @endif
                                @if($value->sauna == 'true')
                                    <li>Сауна</li>
                                @endif
                            </ul>

                            <form action="{{route('setting-object-comfort')}}"  method="post" id="block-form-modal9" style="display: none;">
                                @csrf
                                <div>
                                    <h3>Загальне</h3>
                                    <div>
                                        <label for="">Кондиціонер</label>
                                        <br>
                                        <label for=""><input type="radio" name="conditioning" value="true" @if($value->conditioning == 'true') checked @endif> Так</label>
                                    <label for=""><input type="radio" name="conditioning" value="false" @if($value->conditioning == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Опалення</label>
                                        <br>
                                        <label for=""><input type="radio" name="heating" value="true" @if($value->heating == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="heating" value="false" @if($value->heating == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Безкоштовний Wi-Fi</label>
                                        <br>
                                        <label for=""><input type="radio" name="wiFi" value="true" @if($value->wiFi == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="wiFi" value="false"  @if($value->wiFi == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Станція для заряджання електричних автомобілів</label>
                                        <br>
                                        <label for=""><input type="radio" name="charging" value="true" @if($value->charging == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="charging" value="false"  @if($value->charging == 'false') checked @endif> Ні</label>
                                    </div>
                                    <hr class="line">
                                    <h3>Готування та прибирання</h3>
                                    <div>
                                        <label for="">Кухня</label>
                                        <br>
                                        <label for=""><input type="radio" name="kitchen" value="true" @if($value->kitchen == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="kitchen" value="false"  @if($value->kitchen == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Міні-кухня</label>
                                        <br>
                                        <label for=""><input type="radio" name="miniKitchen" value="true" @if($value->miniKitchen == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="miniKitchen" value="false"  @if($value->miniKitchen == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Пральна машина</label>
                                        <br>
                                        <label for=""><input type="radio" name="washingMachine" value="true" @if($value->washingMachine == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="washingMachine" value="false"  @if($value->washingMachine == 'false') checked @endif> Ні</label>
                                    </div>
                                    <hr class="line">
                                    <h3>Розваги</h3>
                                    <div>
                                        <label for="">Телевізор з плоским екраном</label>
                                        <br>
                                        <label for=""><input type="radio" name="tv" value="true" @if($value->tv == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="tv" value="false"  @if($value->tv == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Басейн</label>
                                        <br>
                                        <label for=""><input type="radio" name="pool" value="true" @if($value->pool == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="pool" value="false"  @if($value->pool == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Гідромасажна ванна</label>
                                        <br>
                                        <label for=""><input type="radio" name="hydromassage" value="true" @if($value->hydromassage == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="hydromassage" value="false"  @if($value->hydromassage == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Міні-бар</label>
                                        <br>
                                        <label for=""><input type="radio" name="miniBar" value="true" @if($value->miniBar == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="miniBar" value="false"  @if($value->miniBar == 'false') checked @endif> Ні</label>
                                    </div>
                                    <div>
                                        <label for="">Сауна</label>
                                        <br>
                                        <label for=""><input type="radio" name="sauna" value="true" @if($value->sauna == 'true') checked @endif> Так</label>
                                        <label for=""><input type="radio" name="sauna" value="false"  @if($value->sauna == 'false') checked @endif> Ні</label>
                                    </div>
                                </div>
                                <div class="button-setting">
                                    <input  type="reset"  class="cancel-but class-open-form9" value="Cкасувати">
                                    <a href="{{route('setting-object-comfort')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                        <div class="element-setting-prof-change" id="element-setting-prof-change-ninth">
                            <button  class="change-but class-open-form9">Змінити</button>
                        </div>
                    </div>
                    <hr>
                    <div class="element-setting-prof">
                        <div class="element-setting-prof-pattern"><p>Додати фото</p></div>
                        <div class="element-setting-prof-field" style="width: 78%">

                            <form action="{{route('setting-object-photo')}}"  method="post" id="block-form-modal" >
                                @csrf
                                    <input type="file" name="images[]" id="image" multiple class="input-file">
                                <div class="button-setting">
                                    <a href="{{route('setting-object-photo')}}">
                                        <button class="save-but">Зберегти</button>
                                    </a>
                                </div>
                                <input type="hidden" name="objectId" value="{{$id}}">
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection
