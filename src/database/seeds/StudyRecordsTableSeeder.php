<?php

use Illuminate\Database\Seeder;

class StudyRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_records')->insert([
            ['date' => '2022-07-01', 'hour' => 8],
            ['date' => '2022-07-02', 'hour' => 6],
            ['date' => '2022-07-03', 'hour' => 1],
            ['date' => '2022-07-04', 'hour' => 3],
            ['date' => '2022-07-05', 'hour' => 1],
            ['date' => '2022-07-06', 'hour' => 2],
            ['date' => '2022-07-07', 'hour' => 4],
            ['date' => '2022-07-08', 'hour' => 3],
            ['date' => '2022-07-09', 'hour' => 6],
            ['date' => '2022-07-10', 'hour' => 8],
            ['date' => '2022-07-11', 'hour' => 6],
            ['date' => '2022-07-12', 'hour' => 5],
            ['date' => '2022-07-13', 'hour' => 1],
            ['date' => '2022-07-14', 'hour' => 2],
            ['date' => '2022-07-16', 'hour' => 1],
            ['date' => '2022-07-17', 'hour' => 4],
            ['date' => '2022-07-18', 'hour' => 3],
            ['date' => '2022-07-19', 'hour' => 2],
            ['date' => '2022-07-20', 'hour' => 1],
            ['date' => '2022-07-21', 'hour' => 2],
            ['date' => '2022-07-22', 'hour' => 3],
            ['date' => '2022-07-23', 'hour' => 6],
            ['date' => '2022-07-24', 'hour' => 4],
            ['date' => '2022-07-25', 'hour' => 3],
            ['date' => '2022-07-26', 'hour' => 1],
            ['date' => '2022-07-28', 'hour' => 6],
            ['date' => '2022-07-29', 'hour' => 3],
            ['date' => '2022-07-30', 'hour' => 4],
            ['date' => '2022-07-31', 'hour' => 5],
        ]);
    }
}
