@extends('layouts.app')


@include('inc.header-user')


@section('content')
    <div class="main-home-content">
        <div class="content-places">
            <h1>Мої відгуки</h1>

            @php
                $bookedPlace = DB::table('data_about_objects')
                ->Join('occupied_date_in_places', 'occupied_date_in_places.objectId', '=', 'data_about_objects.objectId')
                ->leftJoin('comments', 'occupied_date_in_places.id', '=', 'comments.occupied')
                ->leftJoin('users', 'occupied_date_in_places.userId', '=', 'users.id')
                ->orderBy('lastDay', 'DESC')
                ->get()
                ->where('userId', Auth::id())
                ->toArray();
            @endphp

                @foreach($bookedPlace as $value)
                    @php
                        $photo = DB::table('photo_for_objects')
                           ->where('objectId', $value->objectId)
                           ->get()
                           ->toArray();
                    @endphp
                @if($value->personal !== null)
                <br>
                    <b>{{$value->city}}</b>
                    <div class="wanna-booking space-between">
                        <div class="book-place">
                            <div>
                                <img src="{{'../../../../storage/'.$photo[0]->photo}}" alt="">
                            </div>
                            <div>
                                <h3>{{$value->objectName}}</h3>
                                <p class="date-booked">{{$value->firstDay}} - {{$value->lastDay}}</p>
                                <i>Коментар: {{$value->comments}}</i>
                                    <ul>
                                        <li>Персонал: {{$value->personal}} балів</li>
                                        <li>Зручності: {{$value->convenient}} балів</li>
                                        <li>Чистота: {{$value->clear}} балів</li>
                                        <li>Комфорт: {{$value->comfortable}} балів</li>
                                        <li>Співвідношення ціна/якість: {{$value->priceQuality}} балів</li>
                                        <li>Розташування: {{$value->area}} балів</li>
                                    </ul>

                                @php
                                    $date2=date_create(session('endDate'));
                                    $date1=date_create(session('firstDate'));
                                    $diff=date_diff($date1,$date2);
                                    $countNight = intval ($diff->format("%R%a days"));

                                @endphp
                            </div>
                        </div>
                        <div>
                            <h3>UAH {{$value->price * $countNight}}</h3>
                        </div>
                    </div>
                @endif
                @endforeach
        </div>
    </div>
@endsection


@section('footer')
    <div class="footer">
        <div class="in-footer">
            <a href="{{route('register-obj')}}"><button class="reg-obj-footer">Зареєструвати своє помешкання</button></a>
        </div>
    </div>
    <div class="footer without-marg">
        <div class="in-footer">
            <a href="">Версія для мобільних пристроїв</a>
            <a href="">Керуйте своїми бронюваннями</a>
            <a href="">Служба підтримки</a>
            <a href="">Станьте нашим афіліатом</a>
            <a href="">Booking.com для компаній</a>
        </div>
    </div>
@endsection



