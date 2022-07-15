<?php

namespace App\Http\Controllers;

use App\Models\occupiedDateInPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use View;
class BookingPlace extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function viewBook($id){

        $objects = DB::table('data_about_objects')
            ->get()
            ->where('price','!=', -1)
            ->where('objectId', $id)
            ->first();

        $photo = DB::table('photo_for_objects')
            ->where('objectId', $objects->objectId)
            ->get()
            ->toArray();

        $countPhoto = count($photo);

        $date2=date_create(session('endDate'));
        $date1=date_create(session('firstDate'));
        $diff=date_diff($date1,$date2);
        $countNight = intval ($diff->format("%R%a days"));



        return View::make('user.booking-place', compact('objects','photo','countPhoto','countNight'));
    }

    public function bookWithPreferences(Request $req){

        $data =  $req->all();

        $occupied = DB::table('occupied_date_in_places')
            ->leftjoin('data_about_objects', 'data_about_objects.objectId', '=', 'occupied_date_in_places.objectId')
            ->get()
            ->where('objectId', $data['objectsId'])
            ->where('accepted', 'true')
            ->toArray();

        $firstDate = session('firstDate');
        $endDate = session('endDate');
        $occupiedArray = [];
        $notOccupiedArray = [];

            foreach ($occupied as $value) {
                if ($firstDate != $value->firstDay && $endDate != $value->lastDay){
                    if($firstDate > $value->lastDay && $endDate <$value->firstDay) {
                        $notOccupiedArray[] = $value->objectId;
                    }
                    else if($endDate < $value->firstDay && $firstDate < $value->firstDay){
                        $notOccupiedArray[] = $value->objectId;
                    }
                    else if($endDate > $value->lastDay && $firstDate > $value->lastDay){
                        $notOccupiedArray[] = $value->objectId;
                    }
                    else{
                        $occupiedArray[] = $value->objectId;
                    }
                } else {
                    $occupiedArray[] = $value->objectId;
                }
            }

            if(isset($occupiedArray[0])){
                return redirect()->back()->withErrors([
                    'dateError' => 'Ці дати вже занято'
                ]);
            }


        $occupied = new occupiedDateInPlace;
        $occupied->objectId = $data['objectsId'];
        $occupied->preferences = $data['preferences'];
        $occupied->firstDay = session('firstDate');
        $occupied->lastDay = session('endDate');
        $occupied->userId = auth()->id();
        $occupied->save();



        $this->obj = DB::table('data_about_objects')
            ->leftjoin('user_objs', 'data_about_objects.objectId', '=', 'user_objs.id')
            //->where('objectId', $data['objectsId'])
            ->first();


//        Mail::send(['text' => 'mail.message-wanna-book'],['booking', 'booking'], function($message){
//            $message->to($this->obj->email)->subject('Новий гість');
//            $message->from('booking@gmail.com', 'Booking.com');
//        });
        return redirect(route('info-about-book-place'));
    }

    public function bookedPlaceStatus($id, $status = 'n'){

        if($status == 'accepted'){
            DB::table('occupied_date_in_places')->where('id', $id)->update(['accepted' => 'true']);
        }elseif($status == 'cancel'){
            DB::table('occupied_date_in_places')->where('id', $id)->update(['accepted' => 'false']);
        }
        return redirect()->back();


    }
}
