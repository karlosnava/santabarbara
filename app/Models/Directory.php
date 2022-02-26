<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function newsletters()
    {
        return $this->hasMany('App\Models\Newsletter')->where('status', 'active');
    }
}
