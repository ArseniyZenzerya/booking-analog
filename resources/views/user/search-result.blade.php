@extends('layouts.app')

@include('inc.header-user')




@section('content')
    <div class="main-home-content" id="app">
        <div class="content-setting">
            <div class="bar-sort">
                <h3>Шукати</h3>
                @php
                  $date2=date_create(session('endDate'));
                  $date1=date_create(session('firstDate'));
                  $diff=date_diff($date1,$date2);
                  $count = intval($diff->format("%R%a days"));
                @endphp
                <form action="{{route('find-place')}}">
                    @csrf
                    <p>Місце / назва помешкання:</p>
                @if(isset($city))
                    <input type="text" name='city' value="{{$city}}">
                    @else
                        <input type="text" name='city' value="{{session('city')}}">
                    @endif
                    <p>Дата заїзду</p>
                    <input type="date" id='dates' name='firstDate' @if(session('firstDate')) value="{{session('firstDate')}}" @endif>
                    <p>Дата виїзду</p>
                    <input type="date" name='endDate' @if(session('endDate')) value="{{session('endDate')}}" @endif>
                    <p>Термін перебування: {{$count}} ночей</p>
                    <input type="number" name='countPeople' placeholder="Кількість людей" @if(session('countPeople')) value="{{session('countPeople')}}" @endif>
                    <input type="submit" class="button-search" value="Шукати">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <h4 style="color: red">{{ $error }}</h4>
                            @endforeach
                        </div>
                    @endif
                </form>

            </div>
            @isset($object)
            <div class="main-setting-prof">
                    @if(isset($city))
                        <div class="block-for-sort-place">
                            <a @if($sort == 'recomendation' || empty($sort)) id="active-sort" @endempty href="{{url('/find-place/'. $city .'/recomendation')}}"><div>Наші рекомендації</div></a>
                            <a @if($sort == 'priceLess') id="active-sort" @endif href="{{url('/find-place/'. $city .'/priceLess')}}"><div>Ціна(спершу найнижча)</div></a>
                            <a @if($sort == 'starsBiggest') id="active-sort" @endif href="{{url('/find-place/'. $city .'/starsBiggest')}}"><div>Зірки(спершу найбільше)</div></a>
                            <a href="{{url('/find-place/'. $city .'/recomendation')}}" id="special-block-for-sort-place"><div>...</div></a>
                        </div>
                    @else
                        @if(session('city') ==! null)
                         <h1>{{session('city')}}: знайдено {{count($object)}} помешкань</h1>
                        @endif
                        <div class="block-for-sort-place">
                            <a @if($sort == 'recomendation' || empty($sort)) id="active-sort" @endempty href="{{url('/find-place/'. session('city') .'/recomendation')}}"><div>Наші рекомендації</div></a>
                            <a @if($sort == 'priceLess') id="active-sort" @endif href="{{url('/find-place/'.session('city') .'/priceLess')}}"><div>Ціна(спершу найнижча)</div></a>
                            <a @if($sort == 'starsBiggest') id="active-sort" @endif href="{{url('/find-place/'. session('city') .'/starsBiggest')}}"><div>Зірки(спершу найбільше)</div></a>
                            <a href="{{url('/find-place/'. session('city') .'/recomendation')}}" id="special-block-for-sort-place"><div>...</div></a>
                        </div>
                    @endif

                @php
                    $dates = [];
                    $dates['firstDate'] = session('firstDate');
                    $dates['endDate'] = session('endDate');
                @endphp
                        <place-component
                            :object="{{json_encode($object)}}"
                            :dates="{{json_encode($dates)}}"
{{--                            :feedbacks="{{json_encode($feedbacks)}}"--}}{{--needs remake db --}}
                        >
                        </place-component>


{{------------------it`s working but restart page-----------------}}
{{--                    @foreach($object as $key => $value)--}}
{{--                <div class="place-card">--}}
{{--                    <div>--}}
{{--                        @php--}}
{{--                            $photo = DB::table('photo_for_objects')->where('objectId',$value->objectId)->get()->toArray();--}}
{{--                        @endphp--}}
{{--                        @if(isset($photo[0]))--}}
{{--                            <a href="{{url("/place/" . $value->objectId)}}"><img src='{{'../../storage/'.$photo[0]->photo}}' alt=''></a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <a href="{{url("/place/" . $value->objectId)}}">{{$value->objectName}}</a>--}}
{{--                        <p>{{$value->address}}</p>--}}

{{--                        <div>--}}
{{--                            <p>{{$value->description}}</p>--}}
{{--                            <p>БЕЗКОШТОВНЕ скасування бронювання! • Передплата не потрібна</p>--}}
{{--                            <p>Ви зможете скасувати бронювання пізніше, тож зафіксуйте сьогодні відмінну ціну.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @php--}}
{{--                        $feedbacks = DB::table('comments')--}}
{{--                            ->leftJoin('occupied_date_in_places', 'comments.occupied', '=', 'occupied_date_in_places.id')--}}
{{--                            ->join('data_about_objects', 'occupied_date_in_places.objectId', '=', 'data_about_objects.objectId')--}}
{{--                            ->join('users', 'users.id', '=', 'occupied_date_in_places.userId')--}}
{{--                            ->get()--}}
{{--                            ->where('objectId', $value->objectId)--}}
{{--                            ->toArray();--}}

{{--                        $personal = [];--}}
{{--                        $convenient = [];--}}
{{--                        $clear = [];--}}
{{--                        $comfortable = [];--}}
{{--                        $priceQuality = [];--}}
{{--                        $area = [];--}}

{{--                        foreach ($feedbacks as $value){--}}
{{--                            $personal[] = $value->clear;--}}
{{--                            $convenient[] = $value->convenient;--}}
{{--                            $clear[] =  $value->clear;--}}
{{--                            $comfortable[] = $value->comfortable;--}}
{{--                            $priceQuality[] = $value->priceQuality;--}}
{{--                            $area[] = $value->area;--}}
{{--                        }--}}
{{--                        if(count($personal) != 0) {--}}
{{--                            $persAverage = round(array_sum($personal) / count($personal), 1);--}}
{{--                            $convenientAverage = round(array_sum($convenient) / count($convenient), 1);--}}
{{--                            $clearAverage = round(array_sum($clear) / count($clear), 1);--}}
{{--                            $comfortableAverage = round(array_sum($comfortable) / count($comfortable), 1);--}}
{{--                            $priceQualityAverage = round(array_sum($priceQuality) / count($priceQuality), 1);--}}
{{--                            $areaAverage = round(array_sum($area) / count($area), 1);--}}
{{--                        }else{--}}
{{--                            $persAverage = 0;--}}
{{--                            $convenientAverage = 0;--}}
{{--                            $clearAverage = 0;--}}
{{--                            $comfortableAverage = 0;--}}
{{--                            $priceQualityAverage = 0;--}}
{{--                            $areaAverage = 0;--}}
{{--                        }--}}

{{--                        $averagePoint = round(($persAverage+$convenientAverage+$priceQualityAverage+$clearAverage+$comfortableAverage+$areaAverage)/6,1);--}}

{{--                    @endphp--}}
{{--                    <div>--}}
{{--                        <div>--}}
{{--                            <a href="">--}}
{{--                            <div>--}}
{{--                                <h3>--}}
{{--                                    @switch($averagePoint)--}}
{{--                                        @case ($averagePoint >= 9) Відмінно--}}
{{--                                            @break;--}}
{{--                                        @case ($averagePoint >= 7.5) Чудово--}}
{{--                                            @break;--}}
{{--                                        @case ($averagePoint >= 5) Добре--}}
{{--                                            @break;--}}
{{--                                        @default Не дуже--}}
{{--                                    @endswitch--}}
{{--                                </h3>--}}
{{--                                <p>{{count($feedbacks)}} відгук</p>--}}
{{--                            </div>--}}
{{--                            </a>--}}
{{--                            <a href="">--}}
{{--                            <div>--}}
{{--                                <p>{{$averagePoint}}</p>--}}
{{--                            </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <p>1 ніч, {{$value->countGuest}} дорослих</p>--}}
{{--                        <h4>{{$value->price}}UAH</h4>--}}
{{--                        <p>Включає податки та збори</p>--}}
{{--                        @if(session('firstDate') != null && session('endDate') != null)--}}
{{--                        <a href="{{url("/place/" . $value->objectId)}}"><div><p>Переглянути ціни</p></div></a>--}}
{{--                        @else--}}
{{--                            <a href="#dates"><div><p>Переглянути наявність місць</p></div></a>--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
                @else
                    <div class="main-setting-prof">
                        <h1>Помешкання не знайдено</h1>
                    </div>
                @endempty
            </div>
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
