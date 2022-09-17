<?php

use Illuminate\Database\Seeder;

class StudiedContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studied_contents')->insert([
            ['study_record_id' => 1, 'content_id' => 3],
            ['study_record_id' => 1, 'content_id' => 1],
            ['study_record_id' => 2, 'content_id' => 1],
            ['study_record_id' => 2, 'content_id' => 2],
            ['study_record_id' => 2, 'content_id' => 3],
            ['study_record_id' => 3, 'content_id' => 1],
            ['study_record_id' => 4, 'content_id' => 2],
            ['study_record_id' => 5, 'content_id' => 2],
            ['study_record_id' => 6, 'content_id' => 1],
            ['study_record_id' => 7, 'content_id' => 2],
            ['study_record_id' => 8, 'content_id' => 1],
            ['study_record_id' => 9, 'content_id' => 1],
            ['study_record_id' => 10, 'content_id' => 3],
            ['study_record_id' => 11, 'content_id' => 1],
            ['study_record_id' => 12, 'content_id' => 2],
            ['study_record_id' => 13, 'content_id' => 3],
            ['study_record_id' => 14, 'content_id' => 3],
            ['study_record_id' => 15, 'content_id' => 1],
            ['study_record_id' => 16, 'content_id' => 3],
            ['study_record_id' => 17, 'content_id' => 2],
            ['study_record_id' => 18, 'content_id' => 2],
            ['study_record_id' => 19, 'content_id' => 3],
            ['study_record_id' => 20, 'content_id' => 2],
            ['study_record_id' => 21, 'content_id' => 1],
            ['study_record_id' => 22, 'content_id' => 3],
            ['study_record_id' => 23, 'content_id' => 1],
            ['study_record_id' => 24, 'content_id' => 1],
            ['study_record_id' => 25, 'content_id' => 3],
            ['study_record_id' => 26, 'content_id' => 2],
            ['study_record_id' => 27, 'content_id' => 2],
            ['study_record_id' => 28, 'content_id' => 3],
            ['study_record_id' => 28, 'content_id' => 2],
            ['study_record_id' => 29, 'content_id' => 1],
        ]);
    }
}
