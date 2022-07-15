@extends('layouts.app')

@include('inc/header-when-you-having-reg')



@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text enter-pass">Введите пароль</h1>
            <p class="info">Введіть свій пароль Booking.com для електронної адреси <b>{{$data_mail}}</b></p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4 style="color: red">{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <form action="{{route('check-pass-regist-obj')}}" method="post" class="form">
                @csrf
                <label for="password" class="mail-label">Пароль</label>
                <input type="hidden" name="email" value="{{$data_mail}}">
                <input type="password" name="password" class="input-mail">
                <input class="button" type="submit" value="Войти">
            </form>
            <p class="extra-auth and">aбо</p>
            <a href="{{route('forgot-pass')}}" class="forgot-pass"><p>Забыли пароль?</p></a>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

