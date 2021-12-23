<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\store;
use App\Models\user;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['create']);
    }

    public function create(Request $request)
    {
        $reserve = new Reserve();

        $reserve->user_id = Auth::user()->id;
        $reserve->store_id = $request->store_id;
        $reserve->reserve_datetime = $request->date . ' ' . $request->time;
        $reserve->num_of_users = $request->num_of_users;
        $reserve->save();

        return view('done');
    }
    public function delete(Request $request)
    {
        $id = Auth::id();
        $reserve_id = $request->input('id');

        Reserve::where('user_id', $id)->where('id', $reserve_id)->delete();

        return view('mypage');
    }

}
