@extends('layouts.app')


@include('inc/header-object')

@section('content')
    <div class="content-reg-obj">
        <div class="content-places">
            @foreach($object as $value)
            <div class="header-remake-place ">
                    <h2>{{$value->objectName}}</h2>
                    <div>
                        <a href="{{url("/register-new-object/details/next-step/" . $value->objectId . '/' . 'booking')}}"><button @if($sort == 'booking')id="active-place" @endif>Бронювання</button></a>
                        <a href="{{url("/register-new-object/details/next-step/" . $value->objectId . '/' . 'remake')}}"><button @if($sort == 'remake')id="active-place" @endif>Редагувати помешкання</button></a>
                    </div>
                </div>
            @endforeach
            @foreach($occupied as $ocupItem)
                @php
                    $users = DB::table('users')->where('id', $ocupItem->userId)->get()->toArray();
                @endphp
                    <br><br>
                @foreach($object as $value)
                <div class="accept-book-block">
                    <div class="wanna-booking">
                        <div>
                            <img src="https://t-cf.bstatic.com/static/img/identity/profile/b47cd0e05ec8b7831167f4f7593ead56402a6bb4.svg" alt="">
                        </div>
                        <div>
                            @if($users[0]->name != '')
                            <p>Ім'я: {{$users[0]->name}}</p>
                            @endif
                            @if($users[0]->surname != '')
                                    <p>Прізвище: {{$users[0]->surname}}</p>
                                @endif
                                @if($users[0]->email != '')
                                    <p>E-mail: {{$users[0]->email}}</p>
                                @endif
                                @if($users[0]->wasBorn != '')
                            <p>Дата народження: {{$users[0]->wasBorn}}</p>
                                @endif
                                @if($users[0]->sex)
                                        <p>Стать:
                                            @switch($users[0]->sex)
                                                @case('n') не вказано
                                                    @break
                                                @case('w') жінка
                                                @break
                                                @case('m') чоловік
                                                @break
                                            @endswitch
                                        </p>
                                @endif
                                @if($users[0]->phone != '')
                            <p>Номер телефону: {{$users[0]->phone}}</p>
                                @endif
                        </div>
                    </div>

                    <h3>Хоче забронювати ваш об'єкт</h3>
                    <div class="wanna-booking">
                        <div>
                            <img src="{{'../../../../storage/'.$photo[0]->photo}}" alt="">
                        </div>
                        <div class="block-accept-book">
                            <div>
                                <p>Числа: з <b>{{$ocupItem->firstDay}}</b> по <b>{{$ocupItem->lastDay}}</b></p>
                                @if($ocupItem->preferences != '')
                                <p>Особисті побажання: {{$ocupItem->preferences}} </p>
                                    @endif
                            </div>
                            <div>
                                @if($ocupItem->accepted == 'n')
                                <a href="{{url('/booked-place/'.$ocupItem->id .'/cancel')}}">
                                    <button>Відхилити бронь</button>
                                </a>
                                <a href="{{url('/booked-place/'.$ocupItem->id .'/accepted')}}">
                                    <button>Підтвертити бронювання</button>
                                </a>
                                @elseif($ocupItem->accepted == 'true')
                                    <b><i>Бронювання підтверджено</i></b>
                                @elseif($ocupItem->accepted == 'false')
                                    <b><i>Бронювання не підтверджено</i></b>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
