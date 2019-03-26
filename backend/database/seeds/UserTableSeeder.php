<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('123456');

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => $password,
                'phone' => $faker->phoneNumber,
                'country' => $faker->country,
                'city' => $faker->city,
                'birthday' => $faker->date('Y-m-d'),
                'gender' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
