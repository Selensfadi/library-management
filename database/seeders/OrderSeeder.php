<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // صفقات تجريبية (user email + book title)
        $orders = [
            ['email' => 'selen@example.com', 'book' => 'Laravel From Scratch'],
            ['email' => 'sali@example.com',  'book' => 'Clean Code'],
            ['email' => 'mena@example.com',  'book' => 'A Brief History of Time'],
        ];

        foreach ($orders as $o) {
            $user = DB::table('users')->where('email', $o['email'])->first();
            $book = DB::table('books')->where('title', $o['book'])->first();

            if ($user && $book) {
                // خصم الرصيد إن يكفي
                if ($user->balance >= $book->price) {
                    DB::table('orders')->updateOrInsert(
                        ['user_id' => $user->id, 'book_id' => $book->id],
                        [
                            'price'      => $book->price,
                            'ordered_at' => now(),
                            'status'     => 'paid',
                            'emailed'    => true,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );

                    DB::table('users')->where('id', $user->id)
                        ->update(['balance' => $user->balance - $book->price]);
                }
            }
        }
    }
}
