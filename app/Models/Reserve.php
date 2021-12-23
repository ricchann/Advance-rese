<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $dates = ['reserve_datetime', 'created_at', 'updated_at'];
    protected $fillable = [
        'user_id','store_id','reserve_datetime','num_of_users'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

}
