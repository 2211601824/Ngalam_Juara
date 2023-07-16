<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'nik' => '2211601824',
                'name' => 'Niko Alhuda Yusuf',
                'email' => 'nikoalhuda998@gmail.com',
                'phone' => '082172994207',
                'password' => Hash::make('qweasdzxc'),
                'role' => 'Admin'
            ],
            [
                'nik' => '123456789',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '080123456789',
                'password' => Hash::make('qweasdzxc'),
                'role' => 'Admin'
            ],
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
