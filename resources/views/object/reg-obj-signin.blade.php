@extends('layouts.app')


@include('inc/header-when-you-having-reg')



@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text create-or-enter">Увійдіть в акаунт, щоб керувати готельним об'єктом</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4 style="color: red">{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <form action="{{route('check-email-regist-obj')}}" method="post" class="form">
                @csrf
                <label for="mail" class="mail-label">Ім'я користувача</label>
                <input type="text" name="nameUser" class="input-mail">
                <input class="button" type="submit" value="Далі">
            </form>
            <a href="{{route('forgot-pass')}}" class="forgot-pass"><p>Не можете увійти в акаунт?</p></a>
            <hr class="line">
            <p class="extra-text">Є питання щодо вашого помешкання або Екстранету? Відвідайте Центр допомоги партнерам, щоб дізнатися більше.</p>
            <a href="{{route('reg-obj-register')}}"><button class="button-create-prof">Cтворення акаунта партнера</button></a>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

