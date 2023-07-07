<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use View;

class Feedback extends Controller
{
    public function showPage($id){
        $bookedPlace = DB::table('data_about_objects')
            ->Join('occupied_date_in_places', 'occupied_date_in_places.objectId', '=', 'data_about_objects.objectId')
            ->orderBy('lastDay', 'DESC')
            ->get()
            ->where('userId', Auth::id())
            ->toArray();

        $flag = 0;

        foreach ($bookedPlace as $item) {
            if ($item->id == $id){
                $flag = 1;
            }
        }
        if ($flag == 1){
            return View::make('user.write-comment', compact('id'));
        }else{
            return redirect()->back();

        }
    }
    public function writeComment(Request $req){

        $data = $req->all();
        unset($data['_token']);

        $comment = new Comments;
        $comment->personal = $data['personal'];
        $comment->convenient = $data['convenient'];
        $comment->clear = $data['clear'];
        $comment->comfortable = $data['comfortable'];
        $comment->priceQuality = $data['priceQuality'];
        $comment->area = $data['area'];
        $comment->comments = $data['extraComment'];
        $comment->occupied = $data['id'];

        $comment->save();
        return redirect(route('comments'));

    }
}
