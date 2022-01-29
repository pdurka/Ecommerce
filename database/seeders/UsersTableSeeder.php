<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'api_token' => str::random(60),
            'admin' => true,
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'api_token' => str::random(60),
            ]);
        }
    }
}
