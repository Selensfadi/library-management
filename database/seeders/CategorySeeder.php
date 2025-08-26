<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Programming',
            'Science',
            'History',
            'Fiction',
            'Business',
            'Design'
        ];

        foreach ($categories as $name) {
            DB::table('categories')->updateOrInsert(
                ['slug' => Str::slug($name)], // شرط التميز
                ['name' => $name]             // القيم للتحديث/الإضافة
            );
        }
    }
}
