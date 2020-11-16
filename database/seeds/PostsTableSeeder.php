<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'content' => 'これはダミーです。投稿を表示する機能を確認しています。',
            'post_id' => '2',
        ];
        DB::table('posts')->insert($param);
        $param = [
            'content' => 'これはダミーです。投稿を表示する機能を確認しています。',
            'post_id' => '3',
        ];
        DB::table('posts')->insert($param);
        $param = [
            'content' => 'これはダミーです。投稿を表示する機能を確認しています。',
            'post_id' => '5',
        ];
        DB::table('posts')->insert($param);
        $param = [
            'content' => 'これはダミーです。投稿を表示する機能を確認しています。',
            'post_id' => '6',
        ];
        DB::table('posts')->insert($param);
    }
}
