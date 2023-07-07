<?php

    use App\Http\Controllers\BookingPlace;
    use App\Http\Controllers\CheckPasswordController;
    use App\Http\Controllers\CreatePlaceController;
    use App\Http\Controllers\EmailCheckInRegisterOnjController;
    use App\Http\Controllers\Feedback;
    use App\Http\Controllers\FildFindPlace;
    use App\Http\Controllers\LogoutController;
    use App\Http\Controllers\MailController;
    use App\Http\Controllers\ObjectSetting;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\RegisterObjController;
    use App\Http\Controllers\SettingUser;
    use App\Http\Controllers\SignInController;
    use App\Http\Controllers\UserRegController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;



Route::view('/', 'user/home')->name("home");


Auth::routes(['verify' => true]);
    Route::get('/home', function (){
        return redirect('/');
    });

Route::get('/email/verify', function (){
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/sign-in', function(){
    if (Auth::check()){
        return redirect(route('home'));
    }
    return view('user/sign-in');
})->name("sign-in");


Route::post('/sign-in/', [UserRegController::class, 'checkEmail'])->name("check-email");
Route::any('/sign-in/password', [UserRegController::class, 'сheckPassword'])->name('check-pass');
Route::any('/sign-in/registration', [UserRegController::class, 'registPass'])->name('regist-pass');
Route::view('/account-recovery','user/forgot-pass')->name("forgot-pass"); // no make still
Route::any('/logout', [UserRegController::class, 'logOut'])->name('logout');

Route::view('/reg-obj','object/reg-obj')->name("register-obj");

Route::get('/object/sign-in', function (){
    if (Auth::guard('userForObj')->check()){
        return redirect(\route('register-obj'));
    }
    return view('object/reg-obj-signin');
})->name("reg-obj-signin");

Route::view('/object/reg', 'object/reg-obj-register')->name("reg-obj-register");
Route::post('/object/sign-in/mail', [RegisterObjController::class, 'checkEmail'])->name('check-email-regist-obj');
Route::any('/object/sign-in/password', [RegisterObjController::class, 'checkPass'])->name('check-pass-regist-obj');
Route::any('/object/reg/mail', [RegisterObjController::class, 'setMail'])->name('reg-obj-email');
Route::any('/object/reg/details', [RegisterObjController::class, 'setDetails'])->name('reg-obj-details');
Route::any('/object/reg/passwords', [RegisterObjController::class, 'setAllData'])->name('reg-obj-all-data');
Route::any('/object/reg/logout', [RegisterObjController::class, 'logOut'])->name('obj-logout');
Route::view('/register-new-object/', 'object/register-new-object')->name('register-new-object')->middleware('auth:userForObj');


//Route::group(['midddleware' => ['auth:userForObj']], function (){
//
//})
Route::view('/register-new-object/details', 'object/details-about-object')->name('register-details')->middleware('auth:userForObj');
Route::any('/register-new-object/details/placeController', [CreatePlaceController::class,'firstData'])->name('register-details-name');
Route::view('/register-new-object/details/place', 'object/details-about-object-2')->name('register-details-name-view')->middleware('auth:userForObj');;
Route::any('/register-new-object/details/mapController', [CreatePlaceController::class,'secondData'])->name('register-details-2');
Route::view('/register-new-object/details/map', 'object/details-about-object-3')->name('register-details-2-view')->middleware('auth:userForObj');;

Route::any('/register-new-object/details/image', [CreatePlaceController::class,'thirdData'])->name('register-details-3');
Route::any('/register-new-object/details/next-step/{id?}', [CreatePlaceController::class,'choseContinue'])->name('chose-continue')->where('id', '[0-9]+');
Route::any('/register-new-object/details/object/', [CreatePlaceController::class,'continueRegisterObj'])->name('continue-reg-obj');
Route::any('/register-new-object/details/object/tariff', [CreatePlaceController::class,'fifthData'])->name('register-details-5');
Route::any('/register-new-object/details/object/tariff/sec', [CreatePlaceController::class,'sixthData'])->name('register-details-6');

    Route::view('/register-new-object/details/object/photo-for-object', 'object/details-about-object-4')->name('register-details-4-view');

Route::any('/register-new-object/details/object/tariff/third', [CreatePlaceController::class,'seventhData'])->name('register-details-7');
Route::any('/register-new-object/details/object/description/stars', [CreatePlaceController::class,'eightData'])->name('register-details-8');
Route::view('/register-new-object/details/object/description/guest', 'object/details-about-object-10')->name('register-details-10-view')->middleware('auth:userForObj');;
Route::view('/register-new-object/details/object/description/text', 'object/details-about-object-7')->name('register-details-11-view')->middleware('auth:userForObj');;
Route::any('/register-new-object/details/object/tariff/card', [CreatePlaceController::class,'elevenData'])->name('register-details-11');
Route::view('/register-new-object/details/object/tariff/price', 'object/details-about-object-6')->name('register-details-6-view')->middleware('auth:userForObj');;



Route::any('/register-new-object/details/object/description/sec', [CreatePlaceController::class,'nineData'])->name('register-details-9');
Route::any('/register-new-object/details/object/description/Controller', [CreatePlaceController::class,'tenData'])->name('register-details-10');


Route::any('/register-new-object/details/next-step/{id?}/{sort?}', [CreatePlaceController::class,'choseContinue'])->name('chose-continue')->where('id', '[0-9]+');

Route::any('/back', [CreatePlaceController::class, 'back'])->name('back');



//    Route::any('/register-new-object/details/object/tariff/third', [CreatePlaceController::class,'seventhData'])->name('register-details-7');

Route::view('/my-places', 'object/my-places')->name('my-places')->middleware('auth:userForObj');;




Route::view('/mysettings/personal', "user/personal-setting")->name("personal-setting")->middleware('auth');
Route::post('/mysettings/personal/name', [SettingUser::class,'name'])->name('setting-name');
Route::post('/mysettings/personal/nameForView', [SettingUser::class,'nameForView'])->name('setting-name-for-view');
Route::post('/mysettings/personal/email', [SettingUser::class,'email'])->name('setting-email');
Route::post('/mysettings/personal/phone', [SettingUser::class,'phone'])->name('setting-phone');
Route::post('/mysettings/personal/date', [SettingUser::class,'date'])->name('setting-date');
Route::post('/mysettings/personal/sex', [SettingUser::class,'sex'])->name('setting-sex');


Route::post('/remake/object/name', [ObjectSetting::class,'name'])->name('setting-object-name');
    Route::post('/remake/object/city', [ObjectSetting::class,'city'])->name('setting-object-city');
    Route::post('/remake/object/address', [ObjectSetting::class,'address'])->name('setting-object-address');
    Route::post('/remake/object/price', [ObjectSetting::class,'price'])->name('setting-object-price');
    Route::post('/remake/object/card', [ObjectSetting::class,'card'])->name('setting-object-card');
    Route::post('/remake/object/description', [ObjectSetting::class,'description'])->name('setting-object-description');
    Route::post('/remake/object/stars', [ObjectSetting::class,'stars'])->name('setting-object-stars');
    Route::post('/remake/object/countGuest', [ObjectSetting::class,'countGuest'])->name('setting-object-countGuest');
    Route::post('/remake/object/comfort', [ObjectSetting::class,'comfort'])->name('setting-object-comfort');
    Route::post('/remake/object/photo', [ObjectSetting::class,'photo'])->name('setting-object-photo');




Route::any('/find-place/{city?}/{sort?}', [FildFindPlace::class,'createData'])->name('find-place');
Route::view('/apartments', 'user/apartments')->name('apartments');
Route::view('/search-result', 'user/search-result')->name('search-result');
Route::any('/find-place/{city?}', [FildFindPlace::class,'createData']);

Route::any('/place/{id}', [FildFindPlace::class,'insidePlace'])->name('inside-place');

Route::any('/place/{id?}/booking', [BookingPlace::class,'viewBook'])->name('book-place');
Route::any('/booked', [BookingPlace::class,'bookWithPreferences'])->name('book-place-end');


Route::any('/booked-place/{id?}/{status?}', [BookingPlace::class,'bookedPlaceStatus'])->name('book-status');

Route::view('/my-book-place', 'user/info-about-book-place')->name('info-about-book-place');

Route::view('/coments', 'user/comments')->name('comments');

Route::any('/write-feedback/{id?}', [Feedback::class,'showPage'])->name('write-feedback');

    Route::any('/feedback', [Feedback::class,'writeComment'])->name('feedback');


    Route::get('/send-mail-again',[MailController::class, 'sendmail'] )->name('mail-send');

//    Route::get('/send-mail', [MailController::class, 'sendBook']);
