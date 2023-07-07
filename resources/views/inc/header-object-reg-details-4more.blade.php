 <header class="header-auth">
        <div class="bar">
            <a href="{{ route("home") }}"><img src="/images/logo.png" class="logo" alt="logo"></a>
            <div class="buttons">
                <div class="info-object-during-register">
                    @php
                        $list = DB::table('data_about_objects')->orderBy('updated_at', 'desc')->take(1)->get();
                        $res = DB::table('data_about_objects')->where('objectId', $list[0]->objectId)->get();
                        if (!empty($id)){
                            $object = DB::table('data_about_objects')->where('objectId',$id)->get();
                        }
                    @endphp
                    @if(empty($id))
                            <h4>{{$res[0]->objectName}}</h4>
                            <p>{{$res[0]->address}}</p>
                        @else
                        <h4>{{$object[0]->objectName}}</h4>
                        <p>{{$object[0]->address}}</p>
                    @endif
                </div>
                <div class="lang"><img src="/images/flag.png" alt="lang"></div>
                <div id="open-block-profile" class="profile-account class-open-block">
                    <div class="img-prof">
                        <img src="https://t-cf.bstatic.com/static/img/identity/profile/b47cd0e05ec8b7831167f4f7593ead56402a6bb4.svg" alt="">
                    </div>
                </div>
                <div id="block-menu-profile">
                    <a href="">
                        <div class="in-block-menu-profile">
                            <img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" alt="">
                            <p>Керувати аккаунтом</p>
                        </div>
                    </a>
                    <a href="{{route('logout')}}">
                        <div class="in-block-menu-profile">
                            <img src="https://cdn-icons-png.flaticon.com/512/1286/1286853.png" alt="">
                            <p>Вийти</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
