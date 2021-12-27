<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $searchArea = $request->input('searchArea');
        $searchGenre = $request->input('searchGenre');
        $searchKeyword = $request->input('searchKeyword');

        $query = Store::query();

        if(!empty($searchArea) && $searchArea!=='All area'){
            $query->where('area_id',$searchArea);
        }

        if(!empty($searchGenre) && $searchGenre!=='All genre'){
            $query->where('genre_id',$searchGenre);
        }

        if(!empty( $searchKeyword)){
            $query->where('name','like','%'. $searchKeyword.'%');
        }
        $items = $query->get();

        $genres = Genre::all();
        $areas = Area::all();

        return view('index',['items' => $items, 'areas' => $areas, 'genres' => $genres]);

    }


    public function show(Store $store_id)
    {
        $item = Store::find($store_id)->last();
        $area = Area::where('id', $item->area_id)->first();
        $item->area_name = $area->area_name;

        $genre = Genre::where('id', $item->genre_id)->first();
        $item->genre_name = $genre->genre_name;

        return view('detail', ['item' => $item]);
    }

}
