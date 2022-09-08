<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            'usersname' => 'zsuokira123',
            'password' => bcrypt('123456'),
            'name' => 'Phan Huy Hiếu',
            'email' => 'zsuo@gmail.com',
            'avatar' => 'abcdef',
            'roleId' => '3',
            'createDate' => '2022-03-15',
            'status' => '1',
        ];

        DB::table('users')->insert($data);
    }
}
