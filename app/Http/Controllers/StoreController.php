<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index() 
    {
        $items = Store::all();
        foreach ($items as $item) {
            $area = Area::where('id', $item->area_id)->first();
            $item->area_name = $area->area_name;

            $genre = Genre::where('id', $item->genre_id)->first();
            $item->genre_name = $genre->genre_name;
        }
        return view('index', ['items' => $items]);
    }
}
