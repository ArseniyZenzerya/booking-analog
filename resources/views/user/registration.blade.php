@extends('layouts.app')

@include('inc.header-when-you-having-reg')



@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text enter-pass">Cтворіть пароль</h1>
            <p class="info">Пароль має складатися з принаймні 10 символів і містити великі й малі літери та цифри.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4 style="color: red">{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <form action="{{route('regist-pass')}}" method="post" class="form">
                @csrf
                <input type="hidden" name="email" value="{{$data_mail}}">
                <label for="password" class="mail-label">Пароль</label>
                <input type="password" name="password" class="input-mail">
                <label for="password" class="mail-label">Підтвердити пароль</label>
                <input type="password" name="password_again" class="input-mail">
                <input class="button" type="submit" value="Створити акаунт">
            </form>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та
                Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

