<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['JavaScript', 'HTML5', 'Laravel', 'PHP', 'CSS3', 'Bootstrap', 'Vue.js'];
        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($technology, '-');

            $newTechnology->save();
        }
    }
}
