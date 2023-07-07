<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url){
            return(new MailMessage())
                ->subject('Підтвердіть e-mail')
                ->line('Натисніть , щоб підтвердити')
                ->action('Підтвердити', $url)
                ->line('Якщо ви не створювали обліковий запис, не потрібно нічого робити.');
        });
    }
}
