<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index() 
    {
        $items = Store::all();
        
        return view('index', ['items' => $items]);
    }
}
