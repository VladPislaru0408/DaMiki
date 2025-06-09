<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Furniture;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class FurniturePhotoSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('photos')->truncate();
        DB::table('furnitures')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $items = [
            ['Sofa Verde', 'Canapea elegantă din catifea verde.', 1500, ['sofa-verde-1.jpg', 'sofa-verde-2.jpeg']],
            ['Canapea Lux', 'Canapea premium cu design modern.', 2800, ['canapea-lux-1.webp', 'canapea-lux-2.webp']],
            ['Fotoliu Retro', 'Fotoliu cu design clasic reinterpretat.', 950, ['fotoliu-retro.webp']],
            ['Divan Regal', 'Divan cu structură din lemn masiv și tapițerie fină.', 3200, ['divan-regal.webp']],
            ['Scaun Lounge', 'Scaun relaxant cu suport lombar.', 880, ['scaun-lounge.webp']],
            ['Taburet Minimal', 'Taburet compact din lemn natur.', 450, ['taburet-minimal.webp']],
            ['Canapea Compactă', 'Canapea ideală pentru spații mici.', 1300, ['canapea-compacta.webp']],
            ['Colțar Modulat', 'Colțar modular extensibil.', 3000, ['coltar-modular.webp']],
        ];

        foreach ($items as $index => [$title, $description, $price, $images]) {
            $furniture = Furniture::create([
                'title' => $title,
                'description' => $description,
                'price' => $price,
            ]);

            foreach ($images as $i => $img) {
                Photo::create([
                    'furniture_id' => $furniture->id,
                    'image_path' => 'images/' . $img,
                    'is_thumbnail' => $i === 0,
                ]);
            }
        }
    }
}
