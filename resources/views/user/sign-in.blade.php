@extends('layouts.app')


@include('inc/header-when-you-having-reg')



@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text create-or-enter">Увійдіть або створіть акаунт</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <h4 style="color: red">{{ $error }}</h4>
                        @endforeach
                </div>
            @endif
            <form action="{{route('check-email')}}" method="post" class="form">
                @csrf
                <label for="mail" class="mail-label">Електронна адреса</label>
                <input type="email" name="mail" class="input-mail">
                <input class="button" type="submit" value="Продовжити з електронною поштою">
            </form>
            <p class="extra-auth">або обрати один з варіантів</p>
            <div class="block-auth">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

