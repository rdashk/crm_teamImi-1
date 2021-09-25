<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => "intern",
        ]);
        DB::table('levels')->insert([
            'name' => "junior",
        ]);
        DB::table('levels')->insert([
            'name' => "middle",
        ]);
        DB::table('levels')->insert([
            'name' => "senior",
        ]);
        DB::table('levels')->insert([
            'name' => "n/a",
        ]);
    }
}
