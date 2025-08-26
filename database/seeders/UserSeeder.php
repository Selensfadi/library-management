<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // أدمن
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'], // شرط التميز
            [
                'name'     => 'Site Admin',
                'password' => Hash::make('password'),
                'balance'  => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // العملاء
        $customers = [
            ['name' => 'selen sfadi', 'email' => 'selen@example.com', 'balance' => 150],
            ['name' => 'sali sfadi',  'email' => 'sali@example.com',  'balance' => 80],
            ['name' => 'mena khader', 'email' => 'mena@example.com', 'balance' => 50],
        ];

        foreach ($customers as $c) {
            DB::table('users')->updateOrInsert(
                ['email' => $c['email']],
                [
                    'name'       => $c['name'],
                    'password'   => Hash::make('password'), // كلمة مرور موحدة للتجربة
                    'balance'    => $c['balance'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
