@php $objects = DB::table('data_about_objects')
    ->orderBy('updated_at', 'desc')
    ->get()
    ->where('userId', auth()->guard('userForObj')->id());

@endphp
@extends('layouts.app')


@include('inc/header-object')

@section('content')
    <div class="content-reg-obj">
        <div class="content-places">
            <div class="header-my-places">
                <h2>Мої помешкання</h2>
                <a href="{{route('register-new-object')}}"><button>Додати інше помешкання</button></a>
            </div>
            <div class="all-places">
                @foreach($objects as $object)
                <div>
                    @php
                    $photo = DB::table('photo_for_objects')->where('objectId', $object->objectId)->get()->toArray();
                    @endphp

                    @if(isset($photo[0]))
                        <img src='{{'storage/'.$photo[0]->photo}}' alt=''>
                    @else
                        <img src="/images/start-place.jpg" alt="">
                    @endif
                    <div>
                        <h2>{{$object->objectName}}</h2>
                        <p>{{$object->address}}</p>
                        <a href="{{url("/register-new-object/details/next-step/" . $object->objectId)}}">
                            @if($object->price == -1)
                            <button id="continue-registration-button">Продовжити реестрацію</button>
                            @else
                                <button id="continue-registration-button">Докладніше про об'єкт</button>

                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
