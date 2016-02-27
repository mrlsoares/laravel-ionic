<?php

use Entrega\Models\Client;
use Entrega\Models\User;
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
        //User::truncate();
        factory(User::class,10)->create();
        factory(User::class)->create(
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10)
            ]
        )->client()->save(factory(Client::class)->make());



    }
}
