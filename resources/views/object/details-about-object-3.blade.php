@extends('layouts.app')

@include('inc/header-object')

@section('content')
    <div class="main-bar-content">
        <div class="bar-progress">
            <div class="block-progress">
                <p class="block-progress-text" >Назва та розтошування</p>
                <div class="line-progress">
                    <div id="block-green-progress"></div>
                    <div id="block-green-progress"></div>
                    <div id="block-blue-progress"></div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="main-home-content">
        <div class="block-progress">
            <h1>Позначте розташування свого помешкання</h1>
            <form action="{{route('register-details-3')}}" method="post" class="form-in-registr">
                @csrf
{{--                <input type="hidden" value="{{$data['nameObject']}}" name="nameObject">--}}
{{--                <input type="hidden" value="{{$data['city']}}" name="city">--}}
{{--                <input type="hidden" value="{{$data['address']}}" name="address">--}}

                <div class="data-input">
                    <p class="extra-text">Це розташування бачитимуть гості на нашому сайті. Пересувайте карту, щоб позначка вказувала на точне розташування вашого помешкання.</p>
                    <div id="map"></div>
                </div>
                <div class="block-links">
                    <a href="" class="continue-link"><button>Продовжити</button></a>
                    </div>
                </form>
            </div>
        </div>



    @endsection

