<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Fullstack', 'Front-end', 'Back-end', 'Front-office', 'Back-office'];
        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::slug($type, '-');

            $newType->save();
        }
    }
}
