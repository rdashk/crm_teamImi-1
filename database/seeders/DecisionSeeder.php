<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DecisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("decisions")->insert([
            'name' => "Назначено собеседование"
        ]);
        DB::table("decisions")->insert([
            'name' => "Отказ"
        ]);
        DB::table("decisions")->insert([
            'name' => "Одобрен"
        ]);
        DB::table("decisions")->insert([
            'name' => "Слился"
        ]);
    }
}
