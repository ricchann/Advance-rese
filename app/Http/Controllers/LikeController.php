<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like_on', 'like_off']);
    }

    public function like_on($id)
    {
        Like::create([
            'user_id' => Auth::id(),
            'store_id' => $id,
        ]);
        session()->flash('success', 'You Liked the Reply.');

        return redirect()->back();
    }

    public function like_off($id)
    {
        $like = Like::where('store_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        session()->flash('success', 'You Unliked the Reply.');

        return redirect()->back();
    }

    public function mypage_like_off($id)
    {
        $db_data = new Like;
        $db_data->where('id', $id)->delete();

        return redirect('/mypage');
    }
}
