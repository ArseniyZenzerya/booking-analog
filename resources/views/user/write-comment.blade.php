@extends('layouts.app')


@include('inc.header-user')


@section('content')
    <div class="main-home-content">
        <div class="content-places">
            @php
                $bookedPlace = DB::table('data_about_objects')
                ->Join('occupied_date_in_places', 'occupied_date_in_places.objectId', '=', 'data_about_objects.objectId')
                ->orderBy('lastDay', 'DESC')
                ->get()
                ->where('id', $id)
                ->toArray();
            @endphp
                @foreach($bookedPlace as $value)
                    @php
                        $photo = DB::table('photo_for_objects')
                        ->where('objectId', $value->objectId)
                        ->get()
                        ->toArray();
                    @endphp
                    <div class="wanna-booking space-between">
                        <div class="book-place">
                            <div>
                                <img src="{{'../../../../storage/'.$photo[0]->photo}}" alt="">
                            </div>
                            <div>
                                @php
                                    $date2=date_create(session('endDate'));
                                    $date1=date_create(session('firstDate'));
                                    $diff=date_diff($date1,$date2);
                                    $countNight = intval ($diff->format("%R%a days"));

                                @endphp
                                <h3>{{$value->objectName}}</h3>
                                <p class="date-booked">{{$value->firstDay}} - {{$value->lastDay}}</p>

                            </div>
                        </div>
                        <div>
                            <h3>UAH {{$value->price * $countNight}}</h3>
                        </div>
                    </div>
                @endforeach
            <form action="{{route('feedback')}}" method="post" class="rating-form">
                @csrf
                <div class="rating-get">
                    <div>
                        <label for="personal">Персонал</label>
                        <p>
                            <input type="range" class="range" id="cowbell" name="personal"
                               min="0" max="10" value="5" step="1">
                            5
                        </p>
                    </div>
                    <div>
                        <label for="personal">Зручності</label>
                        <p>
                            <input type="range" class="range" id="cowbell" name="convenient"
                                   min="0" max="10" value="5" step="1">
                            5
                        </p>
                    </div>
                    <div>
                        <label for="personal">Чистота</label>
                        <p>
                            <input type="range" class="range" id="cowbell" name="clear"
                                   min="0" max="10" value="5" step="1">
                            5
                        </p>
                    </div>
                </div>
                <div class="rating-get">

                <div>
                        <label for="personal">Комфорт</label>
                        <p>
                            <input type="range" class="range" id="cowbell" name="comfortable"
                                   min="0" max="10" value="5" step="1">
                            5
                        </p>
                    </div>
                    <div>
                        <label for="personal">
                            Співвідношення ціна/якість</label>
                        <p>
                            <input type="range" class="range" id="cowbell" name="priceQuality"
                                   min="0" max="10" value="5" step="1">
                            5
                        </p>
                    </div>
                    <div>
                        <label for="personal">
                            Розташування</label>
                        <p>
                            <input type="range" class="range" id="cowbell" name="area"
                                   min="0" max="10" value="5" step="1">
                            5
                        </p>
                    </div>

                </div>
                <label for="">Додатковий коментар</label>
                <br>
                <input type="hidden" name='id' value="{{$id}}">
                <textarea  name="extraComment" id="" cols="30" rows="10"></textarea>
                <input class="send-feedback" type="submit" value="Відправити відгук">
            </form>
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



