<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\PersonalNameRequest;
use App\Http\Requests\PersonalViewNameRequest;
use App\Http\Requests\PhoneRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingUser extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function name(PersonalNameRequest $req){

        $data = $req->only('name','surname');
        User::where('id',  Auth::id())->update(['name' => $data['name'], 'surname'=> $data['surname']]);
        return redirect(route('personal-setting'));
    }
    function nameForView(PersonalViewNameRequest $req){
        $data = $req->only('nameForView');
        User::where('id',  Auth::id())->update(['nameForView' => $data['nameForView']]);
        return redirect(route('personal-setting'));
    }
    function email(MailRequest $req){
        $data = $req->only('email');
        User::where('id',  Auth::id())->update(['email' => $data['email']]);
        return redirect(route('personal-setting'));
    }
    function phone(PhoneRequest $req){
        $data = $req->only('phone');
        User::where('id',  Auth::id())->update(['phone' => $data['phone']]);
        return redirect(route('personal-setting'));
    }
    function date(Request $req){
        $data = $req->only('date');
        User::where('id',  Auth::id())->update(['wasBorn' => $data['date']]);
        return redirect(route('personal-setting'));
    }
    function sex(Request $req){
        $data = $req->only('sex');
        User::where('id',  Auth::id())->update(['sex' => $data['sex']]);
        return redirect(route('personal-setting'));
    }





}
