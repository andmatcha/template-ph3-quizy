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
            ['date' => '2022-01-01', 'hour' => 8],
            ['date' => '2022-01-02', 'hour' => 6],
            ['date' => '2022-01-03', 'hour' => 1],
            ['date' => '2022-01-04', 'hour' => 3],
            ['date' => '2022-01-05', 'hour' => 1],
            ['date' => '2022-01-06', 'hour' => 2],
            ['date' => '2022-01-07', 'hour' => 4],
            ['date' => '2022-01-08', 'hour' => 3],
            ['date' => '2022-01-09', 'hour' => 6],
            ['date' => '2022-01-10', 'hour' => 8],
            ['date' => '2022-01-11', 'hour' => 6],
            ['date' => '2022-01-12', 'hour' => 5],
            ['date' => '2022-01-13', 'hour' => 1],
            ['date' => '2022-01-14', 'hour' => 2],
            ['date' => '2022-01-16', 'hour' => 1],
            ['date' => '2022-01-17', 'hour' => 4],
            ['date' => '2022-01-18', 'hour' => 3],
            ['date' => '2022-01-19', 'hour' => 2],
            ['date' => '2022-01-20', 'hour' => 1],
            ['date' => '2022-01-21', 'hour' => 2],
            ['date' => '2022-01-22', 'hour' => 3],
            ['date' => '2022-01-23', 'hour' => 6],
            ['date' => '2022-01-24', 'hour' => 4],
            ['date' => '2022-01-25', 'hour' => 3],
            ['date' => '2022-01-26', 'hour' => 1],
            ['date' => '2022-01-28', 'hour' => 6],
            ['date' => '2022-01-29', 'hour' => 3],
            ['date' => '2022-01-30', 'hour' => 4],
            ['date' => '2022-01-31', 'hour' => 5],
        ]);
    }
}
