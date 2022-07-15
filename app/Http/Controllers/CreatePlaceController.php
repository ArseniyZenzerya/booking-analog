<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Http\Requests\GuestRequest;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\Place2Request;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PriceRequest;
use App\Models\DataAboutObject;
use App\Models\occupiedDateInPlace;
use App\Models\PhotoForObject;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use View;

class CreatePlaceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:userForObj');
    }
    public function back(){
        return redirect()->back();
    }
    public function firstData(PlaceRequest $req)
    {
        $data = $req->all();
        session(['nameObject' => $data['nameObject']]);
        return redirect(route('register-details-name-view'));
    }

    public function secondData(Place2Request $req)
    {
        $data = $req->only('nameObject','city','address');
        session(['city'=> $data['city']]);
        session(['address' => $data['address']]);

        return View::make('object/details-about-object-3');
    }

    public function thirdData($id = null)
    {
            $dbPlace = new DataAboutObject;
            $dbPlace->userId = Auth::guard('userForObj')->user()->id;
            $dbPlace->objectName = session('nameObject');
            $dbPlace->city = session('city');
            $dbPlace->address = session('address');
            $dbPlace->save();
        $list = DataAboutObject::orderBy('updated_at', 'desc')->take(1)->get();

        session(['objId' => $list[0]->objectId]);


        return redirect(route('register-details-4-view'));
    }

    public function choseContinue(Request $req, $id, $sort = "booking")
    {
        session(['objId' => $id]);

        $idUser = Auth::guard('userForObj')->id();
        $arrIdUser = DataAboutObject::where('userId', $idUser)->pluck('objectId')->toArray();;

        if (in_array($id, $arrIdUser)) { //if object is not user
            $obj = DataAboutObject::where('objectId', $id)->take(1)->get();
            $photo = DB::table('photo_for_objects')->where('objectId', $obj[0]->objectId)->get()->toArray();
            if (empty($photo[0])) {
                return View::make('object/details-about-object-4', compact('id'));
            } else  if ($obj[0]->countGuest == 0) {
                return View::make('object/details-about-object-8', compact('id'));
            } else  if ($obj[0]->price == -1) {
                return View::make('object/details-about-object-5', compact('id'));
            } else{
                $object = DB::table('data_about_objects')
                    ->orderBy('updated_at', 'desc')
                    ->get()
                    ->where('objectId', $id);

                $photo = DB::table('photo_for_objects')
                    ->where('objectId', $id)
                    ->get()
                    ->toArray();

                $occupied = DB::table('occupied_date_in_places')
                    ->where('objectId', $id)
                    ->where('userId', '!=', NULL)
                    ->get();


                $countPhoto = count($photo);
                if ($sort == "booking"){
                    return View::make('object/research-object-book', compact('id','object','countPhoto', 'photo', 'sort', 'occupied'));
                }elseif($sort == 'remake'){
                    return View::make('object/my-object', compact('id','object','countPhoto', 'photo', 'sort'));
                }

            }
        }else{
            return View::make('object/reg-obj');
        }


    }

    public function continueRegisterObj(PhotoRequest $req){

        if (!empty($id = $req->input('idObj'))){
            if($req->hasFile('images'))
            {
                $images = [];

                foreach($req->file('images') as $file){
                    $images[] = $file->store( 'imagesForObject');

                }
                foreach ($images as $image){
                    $photo = new PhotoForObject;
                    $photo->objectId = $id;
                    $photo->photo = $image;
                    $photo->save();
                }

                return View::make('object/details-about-object-8', compact('id'));
            }
            else{
                return redirect()->back()->withErrors(['photo'=> 'Відсутня фотографія']);
            }
        }
        else{
            if($req->hasFile('images'))
            {
                $images = [];
                $list = DataAboutObject::orderBy('updated_at', 'desc')->take(1)->get();

                foreach($req->file('images') as $file){
                    $images[] = $file->store( 'imagesForObject');

                }
                foreach ($images as $image){
                    $photo = new PhotoForObject;
                    $photo->objectId = $list[0]->objectId;
                    $photo->photo = $image;
                    $photo->save();
                }
                return View::make('object/details-about-object-8');
            }
            else{
                return redirect()->back()->withErrors(['photo'=> 'Відсутня фотографія']);
            }
        }



    }

    public function fifthData(CardRequest $req)
    {
        $data = $req->only('card', 'idObj');
        session(['card' => $data['card']]);
        return redirect(route('register-details-6-view'));
        return View::make('object/details-about-object-6', compact('data'));
    }


    public function sixthData(PriceRequest $req)
    {
        $data = $req->only( 'idObj','price');
        $date = new occupiedDateInPlace;
        $date->firstDay = "2022-01-01";
        $date->lastDay = "2022-01-01" ;
        $date->accepted ='true';
        $arr = [];
        $arr['card'] = session('card');
        $arr['price']= $data['price'];

        if (!empty($data['idObj'])){
            DataAboutObject::where('objectId', $data['idObj'])->update($arr);
            $date->objectId = $data['idObj'];
            $date->save();
        }
        else{
            $list = DataAboutObject::orderBy('updated_at', 'desc')->take(1)->get();
            DataAboutObject::where('objectId', $list[0]->objectId)->update($arr);
            $date->objectId = $list[0]->objectId;
            $date->save();
        }
        return redirect( route('my-places'));

    }

    public function eightData(Request $req)
    {
        $data = $req->all();
        unset($data['_token']);
        if (!empty($data['idObj'])){
            $idObj = $data['idObj'];
            unset($data['idObj']);
            DataAboutObject::where('objectId', $idObj)->update($data);
        }
        else{
            $list = DataAboutObject::orderBy('updated_at', 'desc')->take(1)->get();
            DataAboutObject::where('objectId', $list[0]->objectId)->update($data);
        }
        return View::make('object/details-about-object-9');
    }

    public function nineData(Request $req)//stars
    {
        $data = $req->all();
       session(['stars' => $data['stars']]);
        return redirect(route('register-details-10-view'));
    }

    public function tenData(GuestRequest $req)
    {
        $data = $req->all();
        session(['countGuest' => $data['countGuest']]);
        return redirect(route('register-details-11-view'));
    }


    public function elevenData(Request $req)
    {
        $data = $req->all();
        if (!empty($data['idObj'])){
            $idObj = $data['idObj'];
            $arr['stars'] = session('stars');
            $arr['countGuest'] = session('countGuest');
            $arr['description'] = session('description');
            DataAboutObject::where('objectId', $idObj)
                ->update('stars', $arr);
        }
        else{

             $list = DataAboutObject::orderBy('updated_at', 'desc')->take(1)->get();
             $arr = [];
             $arr['stars'] = session('stars');
            $arr['countGuest'] = session('countGuest');
            $arr['description'] = session('description');

            DB::table('data_about_objects')
                 ->where('objectId', $list[0]->objectId)
                 ->update($arr);
        }

        return View::make('object/details-about-object-5');
    }



}
