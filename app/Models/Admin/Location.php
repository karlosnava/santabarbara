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

    public function newspapers()
    {
        return $this->hasMany('App\Models\Admin\Newspaper');
    }
}
