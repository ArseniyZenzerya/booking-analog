<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public  function sendmail(){

        $user = auth()->user();
        event(new Registered($user));

        return redirect(route("personal-setting"))->withErrors(['mail' => 'Лист для підтвердження email надіслан']);

    }
}
