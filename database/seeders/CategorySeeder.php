<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
        Category::create([
            'name'=> 'Web-Designs',
            'slug' => 'web-design',
            'color' => 'pink'
        ]);

        Category::create([
            'name'=> 'UI-UX',
            'slug' => 'ui-ux',
            'color' => 'blue'
        ]);
        Category::create([
            'name'=> 'Data Structure ',
            'slug' => 'data-structure',
            'color' => 'red'
        ]);

        Category::create([
            'name'=> 'Data Analyst ',
            'slug' => 'data-analyst',
            'color' => 'grey'
        ]);
    }
}
