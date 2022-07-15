@extends('layouts.app')

@include('inc/header-object-reg-details-4more')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="main-bar-content">
        <div class="bar-progress">
            <div class="block-progress">
                <p class="block-progress-text" >Назва та розтошування</p>
                <div class="line-progress">
                    <div id="block-green-progress"></div>
                    <div id="block-green-progress"></div>
                    <div id="block-green-progress"></div>
                </div>
            </div>
            <div class="block-progress">
                <p class="block-progress-text" >Фотографії</p>
                <div class="line-progress">
                    <div id="block-green-progress"></div>
                </div>
            </div>
            <div class="block-progress">
                <p class="block-progress-text" >Створення сторінки помешкання</p>
                <div class="line-progress">
                    <div id="block-blue-progress"></div>
                    <div id="block-grey-progress"></div>
                    <div id="block-grey-progress"></div>
                    <div id="block-grey-progress"></div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="main-home-content">
        <div class="block-progress">
            <h1>Додатковий опис до вашого помешкання</h1>
            <form action="{{route('register-details-8')}}" method="post" class="form-in-registr">
                @csrf
                <div class="data-input">
                    @if(!empty($id))
                        <input type="hidden" name="idObj" value="{{$id}}">
                    @endif
                    <h3>Загальне</h3>
                    <p><label><input type="checkbox" name="conditioning" value="true"> Кондиціонер</label></p>
                    <p><label><input type="checkbox" name="heating" value="true"> Опалення</label></p>
                    <p><label><input type="checkbox" name="wiFi" value="true"> Безкоштовний Wi-Fi</label></p>
                    <p><label><input type="checkbox" name="charging" value="true"> Станція для заряджання електричних автомобілів</label></p>
                    <hr class="line">
                    <h3>Готування та прибирання</h3>
                    <p><label><input type="checkbox" name="kitchen" value="true">  Кухня</label></p>
                    <p><label><input type="checkbox" name="miniKitchen" value="true"> Міні-кухня</label></p>
                    <p><label><input type="checkbox" name="washingMachine" value="true"> Пральна машина</label></p>
                    <hr class="line">
                    <h3>Розваги</h3>
                    <p><label><input type="checkbox" name="tv" value="true"> Телевізор з плоским екраном</label></p>
                    <p><label><input type="checkbox" name="pool" value="true"> Басейн</label></p>
                    <p><label><input type="checkbox" name="hydromassage" value="true"> Гідромасажна ванна</label></p>
                    <p><label><input type="checkbox" name="miniBar" value="true"> Міні-бар</label></p>
                    <p><label><input type="checkbox" name="sauna" value="true"> Сауна</label></p>
                </div>
                <div class="block-links">
                    <a href="" class="continue-link"><button>Продовжити</button></a>
                </div>
            </form>
        </div>

    </div>



@endsection

