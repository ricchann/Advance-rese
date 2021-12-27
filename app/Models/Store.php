<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','area_id','genre_id','description','image_url'
    ];

    public function Likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
    public static function storeSearch($area, $genre, $search)
    {
        $query = Store::query();

        if ($area != ''){
        $query = $query->areaEqual($area);
        }
        if ($genre != ''){
        $query = $query->categoryEqual($genre);
        }
        if ($search != ''){
        $query = $query->stringLike($search);
        }
        return $query->get();
    }

    public function scopeAreaEqual($query, $area)
    {
        return $query->where('area_id', $area);
    }

    public function scopeCategoryEqual($query, $genre)
    {
        return $query->where('genre_id', $genre);
    }

    public function scopeStringLike($query, $search)
    {
        return $query->Where('name','like', '%'.$search.'%');
    }


    public static function oneSearch($request)
    {
        return Store::where('id', $request->id)->first();
    }

}
