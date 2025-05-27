<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $table = 'furnitures';

    protected $fillable = [
        'title',
        'price',
        'description',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('position');
    }


    public function thumbnail()
    {
        return $this->hasOne(Photo::class)->where('is_thumbnail', true);
    }
}
