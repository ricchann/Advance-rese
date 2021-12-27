<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'area_name'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'id');
    }
}
