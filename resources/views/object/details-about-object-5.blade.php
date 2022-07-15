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
                    <div id="block-green-progress"></div>
                </div>
            </div>
            <div class="block-progress">
                <p class="block-progress-text" >Тарифи і календар</p>
                <div class="line-progress">
                    <div id="block-blue-progress"></div>
                    <div id="block-grey-progress"></div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="main-home-content">
        <div class="block-progress">
            <h1>Як виглядає ваше помешкання</h1>
            <form action="{{route('register-details-5')}}" method="post" class="form-in-registr">
                @csrf
                <div class="data-input">
                    <p class="extra-text">Ви можете стягувати оплату з кредитних карток у вашому помешканні?</p>
                    <br>
                    @if(!empty(session('objId')))
                        <input type="hidden" name="idObj" value="{{session('objId')}}">
                    @endif
                    <label for="card"><input name="card" type="radio" value="true"> Так</label><br>
                    <label for="card"><input name="card" type="radio" value="false"> Ні</label>
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

