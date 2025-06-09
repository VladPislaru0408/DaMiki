<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_photos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('furniture_id')->constrained('furnitures')->onDelete('cascade'); // Foreign key to furniture
            $table->text('image_path'); // Path to the uploaded image
            $table->boolean('is_thumbnail')->default(false); // Whether this is the thumbnail photo
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
};
