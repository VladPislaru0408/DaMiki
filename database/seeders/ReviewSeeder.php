<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            ['Vlad Rareș', 'Serviciu impecabil și calitate peste așteptări! Recomand cu încredere.', 5],
            ['Ionuț', 'Foarte mulțumit de produs. Arată exact ca în poze.', 4],
            ['Vasilică', 'Livrare rapidă și suport foarte prompt. Mulțumesc!', 5],
            ['Cristi', 'Experiență bună, dar ambalajul putea fi mai atent.', 4],
            ['Andreea', 'Mobilierul este absolut superb, detalii elegante și materiale de calitate.', 5],
            ['Daria', 'Un pic întârziată comanda, dar produsul merită așteptarea.', 4],
            ['Laura', 'Foarte încântată de rezultat! Exact ce căutam.', 5],
        ];

        foreach ($reviews as [$name, $content, $rating]) {
            Review::create([
                'name' => $name,
                'content' => $content,
                'rating' => $rating,
            ]);
        }
    }
}
