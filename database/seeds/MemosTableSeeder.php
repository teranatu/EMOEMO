<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Memo;

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memos')->delete();

        $faker = Faker::create('en_US');

        for ($i=0; $i < 10; $i++) { 
            Memo::create([
                'memo_title' => $faker->word(),
                'memo_text' => $faker->paragraph(),
            ]);
        }
    }
}
