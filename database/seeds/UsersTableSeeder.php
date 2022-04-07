<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザーの設定
        DB::table('users')->insert([
            'username' => 'tanaka',
            'mail' => 'tanaka@123.jp',
            'password' => 'tanaka123'
        ]);
    }
}
