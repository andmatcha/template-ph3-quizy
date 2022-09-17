<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            ['name' => 'ドットインストール'],
            ['name' => 'N予備校'],
            ['name' => 'POSSE課題'],
        ]);
    }
}
