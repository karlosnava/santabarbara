<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function directory()
    {
        return $this->belongsTo('App\Models\Directory');
    }
}
