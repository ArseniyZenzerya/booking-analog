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
                    <div id="block-blue-progress"></div>
                </div>
            </div>
        </div>

    </div>

    <hr>
    <div class="main-home-content" id="app">
        <div class="block-progress">
            <h1>Як виглядає ваше помешкання</h1>
            <form action="{{route('continue-reg-obj')}}" method="post" class="form-in-registr" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idObj" value="{{session('objId')}}">
                <div class="data-input">
                    <p class="extra-text">Додате принайме одне фото. Ви завжди можете додати інші пізніше</p>
                    <div class="example-2">
                        <photo-component></photo-component>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <h4 style="color: red">{{ $error }}</h4>
                            @endforeach
                        </div>
                    @endif
                    <hr>
                </div>
                <div class="block-links">
                    <a href="" class="continue-link"><button>Продовжити</button></a>
                </div>
            </form>
        </div>

    </div>



@endsection

