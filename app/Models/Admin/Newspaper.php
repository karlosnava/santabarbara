<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Admin\Location');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
