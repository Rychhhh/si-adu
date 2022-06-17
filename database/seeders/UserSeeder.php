<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'pengaju',
                'email' => 'pengaju@gmail.com',
                'password' => bcrypt('pengaju123'),
                'role' => 'pengaju',
                'about' => 'Aku Adalah Seorang pengaju',
                'no_telepon' => '01980193012',
                'alamat' => 'bogor, jawabarat'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'about' => 'Aku Adalah Seorang Admin',
                'no_telepon' => '01980193012',
                'alamat' => 'surabaya, jawatimur'
            ],
            [
                'name' => 'petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('petugas123'),
                'role' => 'petugas',
                'about' => 'Aku Adalah Seorang petugas',
                'no_telepon' => '098324183948',
                'alamat' => 'tangerang, tangerang'
            ],
        ];
     
        foreach($user as $value) {
            User::insert($value);
        }
    }
}
