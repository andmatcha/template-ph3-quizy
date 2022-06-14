<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo1.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo2.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo3.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo4.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo5.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo6.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo7.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo8.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo9.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'img' => 'tokyo10.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima1.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima2.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima3.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima4.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima5.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima6.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima7.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima8.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima9.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'img' => 'hiroshima10.png']);
    }
}
