<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->insert([
            ['question_id' => 1, 'name' => 'たかなわ', 'valid' => 1],
            ['question_id' => 1, 'name' => 'たかわ', 'valid' => 0],
            ['question_id' => 1, 'name' => 'こうわ', 'valid' => 0],
            ['question_id' => 2, 'name' => 'かめいど', 'valid' => 1],
            ['question_id' => 2, 'name' => 'かめど', 'valid' => 0],
            ['question_id' => 2, 'name' => 'かめと', 'valid' => 0],
            ['question_id' => 3, 'name' => 'こうじまち', 'valid' => 1],
            ['question_id' => 3, 'name' => 'かゆまち', 'valid' => 0],
            ['question_id' => 3, 'name' => 'おかとまち', 'valid' => 0],
            ['question_id' => 4, 'name' => 'おなりもん', 'valid' => 1],
            ['question_id' => 4, 'name' => 'おかどもん', 'valid' => 0],
            ['question_id' => 4, 'name' => 'ごせいもん', 'valid' => 0],
            ['question_id' => 5, 'name' => 'とどろき', 'valid' => 1],
            ['question_id' => 5, 'name' => 'たたりき', 'valid' => 0],
            ['question_id' => 5, 'name' => 'たたら', 'valid' => 0],
            ['question_id' => 6, 'name' => 'しゃくじい', 'valid' => 1],
            ['question_id' => 6, 'name' => 'せきこうい', 'valid' => 0],
            ['question_id' => 6, 'name' => 'いじい', 'valid' => 0],
            ['question_id' => 7, 'name' => 'ぞうしき', 'valid' => 1],
            ['question_id' => 7, 'name' => 'ざっしょく', 'valid' => 0],
            ['question_id' => 7, 'name' => 'ざっしき', 'valid' => 0],
            ['question_id' => 8, 'name' => 'おかちまち', 'valid' => 1],
            ['question_id' => 8, 'name' => 'みとちょう', 'valid' => 0],
            ['question_id' => 8, 'name' => 'ごしろちょう', 'valid' => 0],
            ['question_id' => 9, 'name' => 'ししぼね', 'valid' => 1],
            ['question_id' => 9, 'name' => 'ろっこつ', 'valid' => 0],
            ['question_id' => 9, 'name' => 'しこね', 'valid' => 0],
            ['question_id' => 10, 'name' => 'こぐれ', 'valid' => 1],
            ['question_id' => 10, 'name' => 'こばく', 'valid' => 0],
            ['question_id' => 10, 'name' => 'こしゃく', 'valid' => 0],
            ['question_id' => 11, 'name' => 'むかいなだ', 'valid' => 1],
            ['question_id' => 11, 'name' => 'むこうひら', 'valid' => 0],
            ['question_id' => 11, 'name' => 'むきひら', 'valid' => 0],
            ['question_id' => 12, 'name' => 'みつぎ', 'valid' => 1],
            ['question_id' => 12, 'name' => 'みよし', 'valid' => 0],
            ['question_id' => 12, 'name' => 'おしらべ', 'valid' => 0],
            ['question_id' => 13, 'name' => 'かなやま', 'valid' => 1],
            ['question_id' => 13, 'name' => 'ぎんざん', 'valid' => 0],
            ['question_id' => 13, 'name' => 'きやま', 'valid' => 0],
            ['question_id' => 14, 'name' => 'とよひ', 'valid' => 1],
            ['question_id' => 14, 'name' => 'としか', 'valid' => 0],
            ['question_id' => 14, 'name' => 'とよか', 'valid' => 0],
            ['question_id' => 15, 'name' => 'いしぐろ', 'valid' => 1],
            ['question_id' => 15, 'name' => 'しゃくぜ', 'valid' => 0],
            ['question_id' => 15, 'name' => 'いしあぜ', 'valid' => 0],
            ['question_id' => 16, 'name' => 'みよし', 'valid' => 1],
            ['question_id' => 16, 'name' => 'みつぎ', 'valid' => 0],
            ['question_id' => 16, 'name' => 'みかた', 'valid' => 0],
            ['question_id' => 17, 'name' => 'うずい', 'valid' => 1],
            ['question_id' => 17, 'name' => 'くもおり', 'valid' => 0],
            ['question_id' => 17, 'name' => 'もみち', 'valid' => 0],
            ['question_id' => 18, 'name' => 'すもも', 'valid' => 1],
            ['question_id' => 18, 'name' => 'でこぽん', 'valid' => 0],
            ['question_id' => 18, 'name' => 'ぽんかん', 'valid' => 0],
            ['question_id' => 19, 'name' => 'おおちごとうげ', 'valid' => 1],
            ['question_id' => 19, 'name' => 'おおちごえとうげ', 'valid' => 0],
            ['question_id' => 19, 'name' => 'おうちごとうげ', 'valid' => 0],
            ['question_id' => 20, 'name' => 'よおろほよばら', 'valid' => 1],
            ['question_id' => 20, 'name' => 'てっぽよばら', 'valid' => 0],
            ['question_id' => 20, 'name' => 'ていぼよはら', 'valid' => 0]
        ]);
    }
}
