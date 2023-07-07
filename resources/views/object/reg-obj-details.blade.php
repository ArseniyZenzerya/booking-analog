@extends('layouts.app')


@include('inc/header-when-you-having-reg')


@section('content')
    <div class="main">
        <div class="content">
            <h1 class="head-text enter-pass">Контактні дані</h1>
            <p class="info">Вкажіть своє повне ім`я та номер телефону, щоб захистити свій акаунт Booking.com.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4 style="color: red">{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <form action="{{route('reg-obj-details')}}" method="post" class="form">
                @csrf
                <input type="hidden" name="email" value="{{$data_mail}}">
                <label for="mail" class="mail-label">Ім'я</label>
                <input type="text" name="nameUser" class="input-mail">
                <label for="mail" class="mail-label">Прізвище</label>
                <input type="text" name="surnameUser" class="input-mail">
                <label for="mail" class="mail-label">Номер телефону</label>
                <input type="phone" name="phoneUser" class="input-mail">
                <p class="extra-text">Коли ви увійдете в акаунт, то ми надішлемо на цей номер СМС із кодом двофакторної автентифікації.</p>
                <input class="button" type="submit" value="Далі">
            </form>
            <hr class="line">
            <p class="extra-text">Входячи в акаунт або створюючи новий, ви погоджуєтеся з нашими Правилами та умовами та Політикою конфіденційності</p>
            <hr class="line">
            <p class="copy">Усі права захищено.</p>
            <p class="copy">Copyright (2006 - 2022) - Booking.com™</p>
        </div>
    </div>
@endsection

