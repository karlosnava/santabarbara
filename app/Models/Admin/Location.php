<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post')->orderBy('created_at', 'desc')->limit(config('settings.limit_records'));
    }
}
