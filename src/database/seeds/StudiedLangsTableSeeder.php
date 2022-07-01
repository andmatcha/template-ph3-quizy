<?php

use Illuminate\Database\Seeder;

class StudiedLangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studied_langs')->insert([
            ['study_record_id' => 1, 'lang_id' => 3],
            ['study_record_id' => 1, 'lang_id' => 5],
            ['study_record_id' => 2, 'lang_id' => 2],
            ['study_record_id' => 2, 'lang_id' => 3],
            ['study_record_id' => 2, 'lang_id' => 1],
            ['study_record_id' => 3, 'lang_id' => 4],
            ['study_record_id' => 4, 'lang_id' => 8],
            ['study_record_id' => 4, 'lang_id' => 2],
            ['study_record_id' => 5, 'lang_id' => 1],
            ['study_record_id' => 6, 'lang_id' => 3],
            ['study_record_id' => 7, 'lang_id' => 7],
            ['study_record_id' => 7, 'lang_id' => 4],
            ['study_record_id' => 8, 'lang_id' => 6],
            ['study_record_id' => 9, 'lang_id' => 6],
            ['study_record_id' => 9, 'lang_id' => 1],
            ['study_record_id' => 10, 'lang_id' => 6],
            ['study_record_id' => 10, 'lang_id' => 2],
            ['study_record_id' => 11, 'lang_id' => 5],
            ['study_record_id' => 12, 'lang_id' => 3],
            ['study_record_id' => 13, 'lang_id' => 3],
            ['study_record_id' => 14, 'lang_id' => 4],
            ['study_record_id' => 15, 'lang_id' => 7],
            ['study_record_id' => 16, 'lang_id' => 3],
            ['study_record_id' => 17, 'lang_id' => 2],
            ['study_record_id' => 18, 'lang_id' => 6],
            ['study_record_id' => 19, 'lang_id' => 4],
            ['study_record_id' => 20, 'lang_id' => 3],
            ['study_record_id' => 21, 'lang_id' => 2],
            ['study_record_id' => 22, 'lang_id' => 5],
            ['study_record_id' => 23, 'lang_id' => 5],
            ['study_record_id' => 24, 'lang_id' => 1],
            ['study_record_id' => 25, 'lang_id' => 3],
            ['study_record_id' => 26, 'lang_id' => 8],
            ['study_record_id' => 27, 'lang_id' => 3],
            ['study_record_id' => 28, 'lang_id' => 3],
            ['study_record_id' => 29, 'lang_id' => 1],
            ['study_record_id' => 29, 'lang_id' => 2],
        ]);
    }
}
