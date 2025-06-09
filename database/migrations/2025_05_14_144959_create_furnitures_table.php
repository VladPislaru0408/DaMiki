<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_furnitures_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFurnituresTable extends Migration
{
    public function up()
    {
        Schema::create('furnitures', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Title of the furniture
            $table->text('description'); // Description of the furniture
            $table->decimal('price', 10, 2); // Price of the furniture
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('furnitures');
    }
}
// database/migrations/xxxx_xx_xx_xxxxxx_create_furniture_images_table.php