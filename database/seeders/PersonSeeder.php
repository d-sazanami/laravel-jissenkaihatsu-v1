<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'name' => '博麗霊夢',
            'mail' => 'reimu@hakurei.com',
            'age' => 16,
        ]);
        DB::table('people')->insert([
            'name' => '霧雨魔理沙',
            'mail' => 'maisa@kirisame.jp',
            'age' => 16,
        ]);
        DB::table('people')->insert([
            'name' => 'ルーミア',
            'mail' => 'rumia@gmail.com',
            'age' => 9,
        ]);
        DB::table('people')->insert([
            'name' => 'チルノ',
            'mail' => 'cirno@gmail.com',
            'age' => 16,
        ]);
        DB::table('people')->insert([
            'name' => '紅美鈴',
            'mail' => 'meirin@koumakan.com',
            'age' => 19,
        ]);
        DB::table('people')->insert([
            'name' => 'パーチュリー・ノーレッジ',
            'mail' => 'patchuli@koumakan.com',
            'age' => 20,
        ]);
        DB::table('people')->insert([
            'name' => '十六夜咲夜',
            'mail' => 'sakuya@koumakan.com',
            'age' => 9,
        ]);
        DB::table('people')->insert([
            'name' => 'レミリア・スカーレット',
            'mail' => 'remilia@koumakan.com',
            'age' => 500,
        ]);
        DB::table('people')->insert([
            'name' => 'フランドール・スカーレット',
            'mail' => 'flandre@koumakan.com',
            'age' => 490,
        ]);
        DB::table('people')->insert([
            'name' => 'レティ・ホワイトロック',
            'mail' => 'letty@white-rock.com',
            'age' => 23,
        ]);
        DB::table('people')->insert([
            'name' => '橙',
            'mail' => 'chen@gmail.com',
            'age' => 10,
        ]);
        DB::table('people')->insert([
            'name' => 'アリス・マーガトロイド',
            'mail' => 'alice@margatroid.com',
            'age' => 17,
        ]);
        DB::table('people')->insert([
            'name' => 'リリーホワイト',
            'mail' => 'lily@white.com',
            'age' => 13,
        ]);
    }
}
