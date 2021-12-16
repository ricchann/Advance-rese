<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','store_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function store() {
        return $this->belongsTo('App\Models\Store');
    }

     public function is_liked_by_auth_user_like()
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
}

