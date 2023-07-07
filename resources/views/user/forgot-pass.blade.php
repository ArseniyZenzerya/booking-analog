@extends('layouts.app')


@section('header')
    <header class="header-auth">
        <div class="bar">
            <a href="{{ route("home") }}"><img src="/images/logo.png" class="logo" alt="logo"></a>
            <div class="lang"><img src="/images/flag.png" alt="lang"></div>
        </div>
    </header>
@endsection


@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text enter-pass">Забули пароль?</h1>
            <p class="info">Нічого страшного! Ми надішлемо вам посилання для зміни пароля. Введіть адресу електронної пошти, з якою ви входите на Booking.com.</p>
            <form action="" method="post" class="form">
                @csrf
                <label for="" class="mail-label">Електронна адреса</label>
                <input type="text" name="" class="input-mail">
                <input class="button" type="submit" value="Отримати посилання для зміни пароля">
            </form>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

