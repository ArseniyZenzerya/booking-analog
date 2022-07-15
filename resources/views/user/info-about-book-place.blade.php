@extends('layouts.app')


@include('inc.header-user')




@section('content')
    <div class="main-home-content">
        <div class="content-places">
            <h1>Бронювання</h1>
            @php
                $bookedPlace = DB::table('data_about_objects')
                ->Join('occupied_date_in_places', 'occupied_date_in_places.objectId', '=', 'data_about_objects.objectId')
                ->orderBy('lastDay', 'DESC')
                ->get()
                ->where('userId', Auth::id())
                ->toArray();
                foreach ($bookedPlace as $value){
                    $flag = $value;
                    break;
                }
            @endphp
            @isset($flag)
                @foreach($bookedPlace as $value)
                    @php
                        $photo = DB::table('photo_for_objects')
                        ->where('objectId', $value->objectId)
                        ->get()
                        ->toArray();
                    @endphp
                    <br>
                    <b>{{$value->city}}</b>
                    <p class="date-booked">{{$value->firstDay}} - {{$value->lastDay}}</p>
                    <div class="wanna-booking space-between">
                        <div class="book-place">
                            <div>
                                <img src="{{'../../../../storage/'.$photo[0]->photo}}" alt="">
                            </div>
                            <div>
                                <h3>{{$value->objectName}}</h3>
                                <p class="date-booked">{{$value->firstDay}} - {{$value->lastDay}}</p>
                                @php
                                    $today = date("m.d.y");
                                    $date2=date_create($today);
                                  $date1=date_create($value->firstDay);
                                  $diff=date_diff($date1,$date2);
                                  $count = intval($diff->format("%R%a days"));
                                @endphp
                                @if($count > 0 && $value->accepted == 'true')
                                    <i>Завершено</i>
                                @elseif($value->accepted == 'n')
                                    <i>Чекайте на відповідь господаря</i>
                                @elseif($value->accepted == 'true')
                                    <i>Підтверджено господарем</i>
                                @elseif($value->accepted == 'false')
                                    <i>Відхилено господарем</i>
                                @endif
                                <br>
                                <br>

                                @if($count > 0 && $value->accepted == 'true')
                                <a href="{{url('/write-feedback/'. $value->id)}}"><button class="button-comment">Залишити відгук</button></a>
                                @endif
                            </div>
                        </div>
                        <div>
                            @php
                                $date2=date_create($value->lastDay);
                              $date1=date_create($value->firstDay);
                              $diff=date_diff($date1,$date2);
                              $countNight = intval($diff->format("%R%a days"));
                          @endphp
                            <h3>UAH {{$value->price * $countNight}}</h3>
                        </div>
                    </div>
                @endforeach
            @else
                    <div class="wanna-booking space-between">
                        <div class="book-place">
                            <h3>Ви ще нічого не бронювали</h3>
                        </div>
                    </div>
            @endif

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
