<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(['name' => 'Crvena']);
        Color::create(['name' => 'Plava']);
        Color::create(['name' => 'Zelena']);
        Color::create(['name' => 'Roza']);
        Color::create(['name' => 'Siva']);
        Color::create(['name' => 'Smeđa']);
        Color::create(['name' => 'Žuta']);
        Color::create(['name' => 'Narančasta']);
        Color::create(['name' => 'Bijela']);
        Color::create(['name' => 'Crna']);
        Color::create(['name' => 'Ljubičasta']);
    }
}
