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
                    <div id="block-blue-progress"></div>
                    <div id="block-grey-progress"></div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="main-home-content">
        <div class="block-progress">
            <h1>Додатковий опис до вашого помешкання</h1>
            <form action="{{route('register-details-10')}}" method="post" class="form-in-registr">
                @csrf
                <div class="data-input">
                    @if(!empty($id))
                        <input type="hidden" name="idObj" value="{{$id}}">
                    @endif
                    <h3>Інформація про помешкання</h3>
                    <h4>Скільки гостей можуть зупинитися в помешканні?</h4>
                    <div></div><input type="number" min="1" max="200" name="countGuest"><div></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <h4 style="color: red">{{ $error }}</h4>
                                @endforeach
                            </div>
                        @endif
{{--                    <h4>Які ліжка доступні в цьому номері?</h4>--}}
{{--                    <div class="type-beds">--}}
{{--                        <div></div>--}}
{{--                        <div>--}}
{{--                            <p>Односпальне</p>--}}
{{--                            <p>Ширина 90–130 см</p>--}}
{{--                        </div>--}}
{{--                        <div><div>-</div><input type="number" min="1"><div>+</div></div>--}}
{{--                    </div>--}}


                </div>
                <div class="block-links">
{{--                    <a href="{{route('register-details-10')}}" class="back-link"><</a>--}}
                    <a href="" class="continue-link"><button>Продовжити</button></a>
                </div>
            </form>
        </div>

    </div>



@endsection

