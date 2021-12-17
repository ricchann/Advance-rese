<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Like;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $likes = Like::where('user_id', $id)->get();
        $store[0] = 'dummy';
        foreach($likes as $like) {
            $store = Store::where('id', $like->store_id)->first();
            $like->store_name = $store->name;

            $area = Area::where('id', $store->area_id)->first();
            $like->area_name = $area->area_name;

            $genre = Genre::where('id', $store->genre_id)->first();
            $like->genre_name = $genre->genre_name;
        }

    return view('mypage', ['likes' => $likes, 'store' => $store, ]);
    }
}
