<?php

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
        DB::table('user')->delete();

        $faker = Faker::create('en_US');

        for ($i=0; $i < 10; $i++) { 
            User::create([
                'memo_title' => $faker->word(),
                'memo_text' => $faker->paragraph(),
                'user_id' => 1
            ]);
        }
    }
}
