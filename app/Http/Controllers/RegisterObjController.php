<?php

namespace App\Http\Controllers;

use App\Models\UserObj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class RegisterObjController extends Controller
{

    public function setMail(Request $req){

        $data_mail = $req->input('emailObj');
        if (UserObj::where('email', $data_mail)->exists()) {
            return redirect(route('reg-obj-signin'))->withErrors(['email'=>'Обліковий запис вже існує']);

        }
        return View::make('object/reg-obj-details', compact('data_mail'));
    }


    public function setDetails(Request $req){

       $data = $req->only('nameUser','surnameUser','phoneUser','email');
        return View::make('object/reg-obj-create-pass',compact('data'));
    }


    public function setAllData(Request $req){

        $data = $req->only('name','surname','phone','email', 'password');


            $user = UserObj::create([
                'email' => $data['email'],
                'name' => $data['name'],
                'phone' => $data['phone'],
                'password' => $data['password'],
                'surname' => $data['surname'],
            ]);
            if ($user) {
                Auth::guard('userForObj')->login($user);
            }
            return redirect()->to(route('register-new-object'));

    }
    public function logOut(){
        Auth::guard('userForObj')->logout();

        return redirect()->to(route('register-obj'));
    }


// sign in obj user
    public function checkEmail(Request $req)
    {
        $data_mail = $req->input('nameUser');
        return View::make('object/reg-obj-password', compact('data_mail'));
    }

    public function checkPass(Request $req)
    {
        $data = $req->only('email','password');
        if(Auth::guard('userForObj')->attempt($data)){
            return redirect(route('register-obj'));
        };
        return redirect(route('reg-obj-signin'))->withErrors([
            'email' => 'Не вдалось війти'
        ]);
    }
}
