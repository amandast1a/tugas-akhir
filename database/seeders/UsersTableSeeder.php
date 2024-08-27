<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Super admin',
                'nip' => '12345',
                'tanggal_lahir' => '1999-09-09',
                'level' => 'superadmin',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengusul',
                'nip' => '123456',
                'tanggal_lahir' => '1999-09-09',
                'level' => 'pengusul',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Verifikator',
                'nip' => '123456',
                'tanggal_lahir' => '1999-09-09',
                'level' => 'verifikator',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
