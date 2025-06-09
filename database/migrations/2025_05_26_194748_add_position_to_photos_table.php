<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->unsignedInteger('position')->default(0)->after('is_thumbnail');
        });
    }

    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
};
// This migration adds a 'position' column to the 'photos' table, allowing for ordering of photos.
// The 'position' column is an unsigned integer with a default value of 0.
// The 'up' method adds the column, while the 'down' method removes it if the migration is rolled back.
// This is useful for scenarios where you want to display photos in a specific order, such as in a gallery or slideshow.
// The 'position' column can be used to store the order of photos, allowing for easy sorting when retrieving them from the database.
// This migration is part of a Laravel application that manages furniture listings, including their photos.
// It ensures that the photos can be ordered according to their position, enhancing the user experience when viewing furniture items.
// The migration is designed to be run using Laravel's artisan command, which will apply the changes to the database schema.
//
// After running this migration, you can update your application logic to handle the 'position' of photos when displaying them.
//
// For example, you might want to sort the photos by their 'position' when retrieving them for a furniture item.
//