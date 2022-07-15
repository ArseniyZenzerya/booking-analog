@extends('layouts.app')

@include('inc/header-when-you-having-reg')



@section('content')
    <div class="main-home-content">
        <div class="content-home-content">
        <h3 class="head-text-for-reg-obj">Додайте своє помешкання на Booking.com і готуйтеся приймати гостей!</h3>
        <p class="text-for-reg-obj">Щоб почати, виберіть тип помешкання, який хочете зареєструвати на Booking.com</p>
            <div class="content-type-place">
                <div>
                    <div>
                        <img src="https://q.bstatic.com/static/img/join/segmentation/accomm_one_apt_main@2x.png" alt="">
                        <h3>Апартаменти</h3>
                        <p>Помешкання з меблями і кухнею, яке гості бронюють цілком.</p>
                    </div>
                    <div>
                        <a href="{{route('register-details')}}"><button>Зареєструйте своє помешкання</button></a>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <img src="https://q.bstatic.com/static/img/join/segmentation/accomm_home_main@2x.png" alt="">
                            <h3>Будинки</h3>
                            <p>Апартаменти, будинки для відпочинку вілли та ін.</p>
                        </div>
                        <div>
                            <a href=""> <button>Зареєструйте своє помешкання</button></a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <img src="https://q.bstatic.com/static/img/join/segmentation/accomm_hotels_main_v2@2x.png" alt="">
                            <h3>Готель або готель типу "ліжко та сніданок" й ін.</h3>
                            <p>Помешкання, як-от готелі, готелі типу "ліжко і сніданок", хостели, апарт-готелі тощо.</p>
                        </div>
                        <div>
                           <a href=""><button>Зареєструйте своє помешкання</button></a>
                        </div>
                    </div>
                    <div id="without-border-block">
                        <div>
                            <img src="https://q.bstatic.com/static/img/join/segmentation/tent-big@2x.png" alt="">
                            <h3>Альтернативні помешкання</h3>
                            <p>Ботелі, кемпінги, намети-люкс та ін.</p>
                        </div>
                       <div>
                           <a href=""><button>Зареєструйте своє помешкання</button></a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

