<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // قائمة الكتب مع التصنيف المرتبط
        $books = [
            [
                'title' => 'Laravel From Scratch',
                'author' => 'John Doe',
                'category' => 'Programming',
                'price' => 19.99,
                'stock' => 25,
                'release_date' => '2023-01-15',
                'description' => 'A beginner-friendly guide to Laravel.',
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'category' => 'Programming',
                'price' => 24.50,
                'stock' => 15,
                'release_date' => '2008-08-01',
                'description' => 'Best practices for writing readable code.',
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'category' => 'Science',
                'price' => 14.75,
                'stock' => 30,
                'release_date' => '1988-06-01',
                'description' => 'Cosmology explained for everyone.',
            ],
            [
                'title' => 'The Lean Startup',
                'author' => 'Eric Ries',
                'category' => 'Business',
                'price' => 17.25,
                'stock' => 20,
                'release_date' => '2011-09-13',
                'description' => 'Build and scale products efficiently.',
            ],
        ];

        foreach ($books as $b) {
            // نجيب الـ category_id من جدول categories
            $category = DB::table('categories')->where('name', $b['category'])->first();

            if ($category) {
                DB::table('books')->updateOrInsert(
                    ['title' => $b['title']],
                    [
                        'slug'         => Str::slug($b['title']) . '-' . rand(1000,9999),
                        'author'       => $b['author'],
                        'category_id'  => $category->id,
                        'description'  => $b['description'],
                        'release_date' => $b['release_date'],
                        'price'        => $b['price'],
                        'stock'        => $b['stock'],
                        'cover_path'   => null,
                        'file_path'    => null,
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ]
                );
            }
        }
    }
}
