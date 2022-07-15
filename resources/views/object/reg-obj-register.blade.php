@extends('layouts.app')

@include('inc/header-when-you-having-reg')



@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text enter-pass">Створення акаунта партнера</h1>
            <p class="info">Створіть акаунт, щоб зареєструвати та керувати своїм помешканням.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4 style="color: red">{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <form action="{{route('reg-obj-email')}}" method="post" class="form">
                @csrf
                <label for="mail" class="mail-label">Електронна адреса</label>
                <input type="text" name="emailObj" class="input-mail">
                <input class="button" type="submit" value="Продовжити">
            </form>
            <hr class="line">
            <p class="extra-text">Є питання щодо вашого помешкання або Екстранету? Відвідайте Центр допомоги партнерам, щоб дізнатися більше.</p>
            <a href="{{route('reg-obj-signin')}}"><button class="button-create-prof">Увійти</button></a>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

