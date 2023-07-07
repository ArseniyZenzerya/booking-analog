@extends('layouts.app')

@include('inc/header-object')

@section('content')
    <script>
        $( function() {
            var availableTags =
                [
                    'Київ',
                    'Львів',
                    'Одеса',
                    'Харків',
                    'Чернігів',
                    'Луцьк',
                    'Чернівці',
                    'Запоріжжя',
                    'Полтава',
                    'Дніпро',
                    'Ужгород',
                    'Херсон',
                    'Миколаїв',
                    'Вінниця',
                    'Луганськ',
                    'Суми',
                    'Івано-Франківськ',
                    'Донецьк',
                    'Кіровоград',
                    'Тернопіль',
                    'Житомир',
                    'Черкаси',
                    'Рівне',
                    'Хмельницький'
                ]
            ;
            $( "#tags" ).autocomplete({
                source: availableTags
            });
        } );
    </script>
    <div class="main-bar-content">
        <div class="bar-progress">
            <div class="block-progress">
                <p class="block-progress-text" >Назва та розтошування</p>
                <div class="line-progress">
                    <div id="block-green-progress"></div>
                    <div id="block-blue-progress"></div>
                    <div id="block-grey-progress"></div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="main-home-content">
        <div class="block-progress">
            <h1>Де розташоване помешкання, яке ви хочете зареєструвати?</h1>
            <form action="{{route('register-details-2')}}" method="post" class="form-in-registr">
                @csrf
                <div class="data-input">
                    <p class="extra-text">Щоб підтвердити розташування вашого помешкання, ми можемо надіслати лист звичайною поштою. Обов'язково перевірте правильність поштової адреси – її важко буде змінити згодом.</p>
                    <label for="city" >Країна/регіон</label>
                    <input type="text" name="city" id='tags' class="input-mail">
                    <label for="address" >Знайдіть свою адресу</label>
                    <input type="text" name="address" class="input-mail">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <h4 style="color: red">{{ $error }}</h4>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="block-links">
                    <a href="" class="continue-link"><button>Продовжити</button></a>
                </div>
            </form>
        </div>

    </div>
@endsection

