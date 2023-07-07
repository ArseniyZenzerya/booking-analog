<?php

namespace App\Jobs;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Mail::send(['text' => 'mail.message-wanna-book'],['booking', 'booking'], function($message){
//            $message->to('LOL')->subject('Новий гість');
//            $message->from('booking@gmail.com', 'Booking.com');
//        });
//        VerifyEmail::toMailUsing(function ($notifiable, $url){
//            return(new MailMessage())
//                ->subject('Підтвердіть e-mail')
//                ->line('Натисніть , щоб підтвердити')
//                ->action('Підтвердити', $url);
//        });
    }
}
