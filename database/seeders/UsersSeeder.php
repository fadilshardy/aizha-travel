<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);



        $user = User::create([
            'name' => 'Fadil S Hardy',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'is_admin' => 0
        ]);

        $url = 'https://source.unsplash.com/1080x1920/?face?' . rand(100, 10000);


        $admin
            ->addMediaFromUrl($url)
            ->toMediaCollection('avatar');

        $user
            ->addMediaFromUrl($url)
            ->toMediaCollection('avatar');


        User::factory()->times(30)->create();
    }
}
