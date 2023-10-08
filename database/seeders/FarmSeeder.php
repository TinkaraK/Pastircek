<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Farm::query()->create([
            "name" => "Pri Baš",
            "address" => "Vrzdenec 63, 1354 Horjul",
            "gmid" => 100918716
        ]);
    }
}
