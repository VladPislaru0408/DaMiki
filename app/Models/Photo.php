<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's convention
    protected $table = 'photos';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'furniture_id',
        'image_path',
        'is_thumbnail',
    ];

    // Define the relationship between photos and furniture
    public function furniture()
    {
        return $this->belongsTo(Furniture::class);
    }
}
