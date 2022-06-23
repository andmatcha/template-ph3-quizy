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
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 1, 'img' => 'tokyo1.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 2, 'img' => 'tokyo2.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 3, 'img' => 'tokyo3.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 4, 'img' => 'tokyo4.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 5, 'img' => 'tokyo5.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 6, 'img' => 'tokyo6.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 7, 'img' => 'tokyo7.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 8, 'img' => 'tokyo8.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 9, 'img' => 'tokyo9.png']);
        DB::table('questions')->insert(['big_question_id' => 1, 'question_order' => 10, 'img' => 'tokyo10.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 1, 'img' => 'hiroshima1.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 2, 'img' => 'hiroshima2.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 3, 'img' => 'hiroshima3.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 4, 'img' => 'hiroshima4.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 5, 'img' => 'hiroshima5.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 6, 'img' => 'hiroshima6.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 7, 'img' => 'hiroshima7.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 8, 'img' => 'hiroshima8.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 9, 'img' => 'hiroshima9.png']);
        DB::table('questions')->insert(['big_question_id' => 2, 'question_order' => 10, 'img' => 'hiroshima10.png']);
    }
}
