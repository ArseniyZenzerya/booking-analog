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
                    <div id="block-green-progress"></div>
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
            <h1>Додатковий опис до вашого помешкання</h1>
            <form action="{{route('register-details-11')}}" method="post" class="form-in-registr">
                @csrf
                <div class="data-input">
                    <p class="extra-text">Вкажіть якісь особливості, яких не було раніше</p>
                    @if(!empty($id))
                        <input type="hidden" name="idObj" value="{{$id}}">
                    @endif
{{--                    <input type="hidden" name='stars' value="{{$data['stars']}}">--}}
{{--                    <input type="hidden" name='countGuest' value="{{$data['countGuest']}}">--}}
                    <textarea name="description" id="" cols="40" rows="7" ></textarea>

                </div>
                <div class="block-links">
                    <a href="" class="continue-link"><button>Продовжити</button></a>
                </div>
            </form>
        </div>

    </div>



@endsection

