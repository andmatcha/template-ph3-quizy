<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LangsTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
        $this->call(StudyRecordsTableSeeder::class);
        $this->call(StudiedLangsTableSeeder::class);
        $this->call(StudiedContentsTableSeeder::class);
    }
}
