<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Criar categorias sem duplicações
        Category::factory()->count(10)->create();
    }
}
