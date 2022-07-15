@extends('layouts.app')

@include('inc.header-object')

@section('content')
    <div class="main-bar-content">
        <div class="bar-progress">
            <div class="block-progress">
                <p class="block-progress-text" >Назва та розтошування</p>
                <div class="line-progress">
                    <div id="block-blue-progress"></div>
                    <div id="block-grey-progress"></div>
                    <div id="block-grey-progress"></div>
                </div>
            </div>
        </div>

    </div>

    <hr>
    <div class="main-home-content">
        <div class="block-progress">
            <h1>Як називаеться ваше помешкання?</h1>
            <div class="block-for-input">
                <form action="{{route('register-details-name')}}" method="post" class="form-in-registr">
                    @csrf
                    <div class="data-input">
                        <label for="">Назва помешкання</label>
                        <input type="text" name="nameObject" class="input-mail">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <h4 style="color: red">{{ $error }}</h4>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="block-links">
                        <a class="continue-link">
                            <button>Продовжити</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

