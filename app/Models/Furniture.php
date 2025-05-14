<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $table = 'furnitures'; // 👈 This is the fix

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function thumbnail()
    {
        return $this->hasOne(Photo::class)->where('is_thumbnail', true);
    }
}
