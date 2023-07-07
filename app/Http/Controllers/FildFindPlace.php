<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;

class FildFindPlace extends Controller
{

    public function createData(Request $req, $city = null, $sort = null){

        function arraySort($array, $on, $order=SORT_ASC)
        {
            $new_array = array();
            $sortable_array = array();


            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    if (is_array((array)$v)) {
                        foreach ($v as $k2 => $v2) {
                            if ($k2 == $on) {
                                $sortable_array[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_array[$k] = $v;
                    }

                }



                switch ($order) {
                    case SORT_ASC:
                        asort($sortable_array);
                        break;
                    case SORT_DESC:
                        arsort($sortable_array);
                        break;
                }


                foreach ($sortable_array as $k => $v) {
                    $new_array[$k] = $array[$k];
                }
            }


            return $new_array;
        }

        $objects = DB::table('photo_for_objects')
            ->leftJoin('data_about_objects', 'data_about_objects.objectId', '=', 'photo_for_objects.objectId')
            ->where('price','!=', -1)
            ->get()
            ->unique('objectId');

        $occupied = DB::table('occupied_date_in_places')
//            ->join('data_about_objects', 'data_about_objects.objectId', '=', 'occupied_date_in_places.objectId')
            ->where('accepted',  'true')
            ->get()
            ->toArray();


        if(isset($req->firstDate) || isset($req->endDate)){
            $firstDate =$req->firstDate;
            $endDate = $req->endDate;
        }else{
            $firstDate = 0;
            $endDate = 0;
        }



        $notOccupiedArray = [];
        $occupiedArray = [];
        $object = [];




        $data = $req->all();

        if (isset($data['city'])){
            session(['city'=> $data['city'],
                'firstDate' => $data['firstDate'],
                'countPeople' => $data['countPeople'],
                'endDate' => $data['endDate']]);
        }else{
            session(['city'=> $city]);
        }





        if (empty($city)) {

            if (isset($data['city'])){
                $objects = $objects->where('city', $data['city']);
            }
            if (isset($data['countPeople'])){
                $objects = $objects->where('countGuest','>=', $data['countPeople']);
            }


            if (isset($firstDate) && isset($endDate)) {
                if($endDate>$firstDate){
                    $objects->toArray();

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

                    $final_output = array_diff($notOccupiedArray, $occupiedArray);

                    if ($sort === 'recomendation'){
                        $objects = arraySort($objects, 'updated_at', SORT_DESC);
                    } else if ($sort === "priceLess"){
                        $objects = arraySort($objects, 'price', SORT_DESC);
                    }else if($sort === 'starsBiggest'){
                        $objects = arraySort($objects, 'stars', SORT_DESC);
                    }
                    foreach ($objects as $value){

                        if (in_array($value->objectId, $final_output)){

                            $object[] =  $value;
                        }
                    }

                }
                else{
                    return redirect()->back()->withErrors(['date' => 'Введіть коректні дати']);
                }
            }
        }else{
            if(isset($city)) {
                $objects = $objects->where('city', $city);
                if (isset($data['countPeople'])){
                    $objects = $objects->where('countGuest','>=', $data['countPeople']);
                }
                    if (isset($firstDate) && isset($endDate)) {
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

                    $final_output = array_diff($notOccupiedArray, $occupiedArray);

                        if ($sort === 'recomendation'){
                            $objects = arraySort($objects, 'updated_at', SORT_DESC);
                        } else if ($sort === "priceLess"){
                            $objects = arraySort($objects, 'price', SORT_ASC);
                        }else if($sort === 'starsBiggest'){
                            $objects = arraySort($objects, 'stars', SORT_DESC);
                        }
                        foreach ($objects as $value){
                            if (in_array($value->objectId, $final_output)){
                                $object[] =  $value;
                            }
                        }

                }
            }else{
                $objects = null;
            }
        }




        return View::make('user/search-result', compact('object', 'data', 'city', 'sort'));
    }



    public function insidePlace(Request $req, $id = null)
    {
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

        $feedbacks = DB::table('comments')
            ->leftJoin('occupied_date_in_places', 'comments.occupied', '=', 'occupied_date_in_places.id')
            ->join('data_about_objects', 'occupied_date_in_places.objectId', '=', 'data_about_objects.objectId')
            ->join('users', 'users.id', '=', 'occupied_date_in_places.userId')
            ->get()
            ->where('objectId', $id)
            ->toArray();



        $personal = [];
        $convenient = [];
        $clear = [];
        $comfortable = [];
        $priceQuality = [];
        $area = [];

        foreach ($feedbacks as $value){
            $personal[] = $value->clear;
            $convenient[] = $value->convenient;
            $clear[] =  $value->clear;
            $comfortable[] = $value->comfortable;
            $priceQuality[] = $value->priceQuality;
            $area[] = $value->area;
        }
        if(count($personal) != 0) {
            $persAverage = round(array_sum($personal) / count($personal), 1);
            $convenientAverage = round(array_sum($convenient) / count($convenient), 1);
            $clearAverage = round(array_sum($clear) / count($clear), 1);
            $comfortableAverage = round(array_sum($comfortable) / count($comfortable), 1);
            $priceQualityAverage = round(array_sum($priceQuality) / count($priceQuality), 1);
            $areaAverage = round(array_sum($area) / count($area), 1);
        }else{
            $persAverage = 0;
            $convenientAverage = 0;
            $clearAverage = 0;
            $comfortableAverage = 0;
            $priceQualityAverage = 0;
            $areaAverage = 0;
        }


        return View::make('user.inside-place',
            compact('objects','photo','countPhoto','feedbacks', 'persAverage', 'convenientAverage', 'clearAverage','comfortableAverage','priceQualityAverage','areaAverage'
        ));
    }

}















