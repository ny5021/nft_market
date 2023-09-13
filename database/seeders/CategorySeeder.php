<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'collectible'
        ]);
        Category::create([
            'name' => 'metaverse'
        ]);
        Category::create([
            'name' => 'utilitaire'
        ]);
        Category::create([
            'name' => 'jeux vidéo online'
        ]);
    }
}
