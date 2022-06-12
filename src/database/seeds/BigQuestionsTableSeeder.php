<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BigQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('big_questions')->insert(['title' => '東京の難読地名クイズ']);
        DB::table('big_questions')->insert(['title' => '広島の難読地名クイズ']);
    }
}
