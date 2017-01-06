<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
                'name' => 'Erica',
                'email' => 'akaineko18@gmail.com',
                'password' => bcrypt('1818')
            ],
            [
                'name' => 'tester',
                'email' => 'test@gmail.com',
                'password' => bcrypt('1234')
            ]
        ];

        foreach($users as $user) {
            App\User::create($user);
        }
    }
}
