<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Jobs\MailJob;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class UserRegController extends Controller
{

    public function checkEmail(SignInRequest $req)
        {
            //проверить есть ли в бд значение, да, сверить пароль, нет, регистрация

            $data_mail = $req->input('mail');
           if (User::where('email', $data_mail)->exists()){
               return View::make('user/sign-in-password', compact('data_mail'));
           }else{
               return View::make('user/registration', compact('data_mail'));
           }
        }

        public function сheckPassword(Request $req){
            $data = $req->only('email','password');
            if(Auth::attempt($data)){
                return redirect(route('home'));
            };
            return redirect(route('sign-in'))->withErrors([
                'email' => 'Не вдалось війти'
            ]);
        }


    public function registPass(Request $req){
        $passOne = $req->input('password');
        $passTwo = $req->input('password_again');
        $data_mail = $req->input('email');

        if ($passOne === $passTwo && $passOne != ""){
            $user = User::create($req->all());

            event(new Registered($user));
           // MailJob::dispatch()->onQueue('VerifyMail');

            if($user){
                Auth::login($user);
            }
            return View::make('user/verify-email');
        }
        else{
            return redirect(route('sign-in'))->withErrors(['password'=> 'Пароли не совпадают']);
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect()->to(route('home'));
    }

}
