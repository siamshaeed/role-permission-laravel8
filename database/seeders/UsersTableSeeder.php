<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'name'              => 'Super Admin',
                'email'             => 'admin@admin.com',
                'phone_number'     => '01700909090',
                'email_verified_at' => '2022-04-04 13:52:12',
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],
        ];

        User::insert($users);


    }
}
