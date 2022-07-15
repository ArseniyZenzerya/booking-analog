<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressObjRequest;
use App\Http\Requests\CityObjRequest;
use App\Http\Requests\CountGuestObjRequest;
use App\Http\Requests\DescriptionObjRequest;
use App\Http\Requests\NameObjRequest;
use App\Http\Requests\PriceRequest;
use App\Models\DataAboutObject;
use App\Models\PhotoForObject;
use Illuminate\Http\Request;

class ObjectSetting extends Controller
{

    // create one function
    function name(NameObjRequest $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['objectName' => $data['name']]);
        return redirect()->back();
    }

    function city(CityObjRequest $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['city' => $data['city']]);
        return redirect()->back();
    }
    function address(AddressObjRequest $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['address' => $data['address']]);
        return redirect()->back();
    }
    function price(PriceRequest $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['price' => $data['price']]);
        return redirect()->back();
    }
    function card(Request $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['card' => $data['card']]);
        return redirect()->back();
    }
    function description(DescriptionObjRequest $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['description' => $data['description']]);
        return redirect()->back();
    }
    function stars(Request $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['stars' => $data['stars']]);
        return redirect()->back();
    }
    function countGuest(CountGuestObjRequest $req){
        $data = $req->all();
        DataAboutObject::where('objectId', $data['objectId'] )->update(['countGuest' => $data['countGuest']]);
        return redirect()->back();
    }
    function comfort(Request $req){
        $data = $req->all();
        unset($data['_token']);
        unset($data['idObj']);
        DataAboutObject::where('objectId', $data['objectId'])->update($data);

        return redirect()->back();
    }
    // create one function


    function photo(Request $req){
        $data = $req->all();

        if($req->hasFile('images'))
        {
            $images = [];

            foreach($req->file('images') as $file){
                $images[] = $file->store( 'imagesForObject');

            }
            foreach ($images as $image){
                $photo = new PhotoForObject;
                $photo->objectId = $data['objectId'];
                $photo->photo = $image;
                $photo->save();
            }
        }
        return redirect()->back();
    }

}
