<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
                [
                    'first_name' => 'Admin',
                    'last_name' => 'Admin',
                    'user_name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => \Hash::make('admin123'),
                    'gender' => '1',
                    'role' => '0',
                    'created_at' => Carbon\Carbon::now(),
                ],
                [
                    'first_name' => 'Student',
                    'last_name' => 'Student',
                    'user_name' => 'student',
                    'email' => 'student@demo.com',
                    'password' => \Hash::make('admin123'),
                    'gender' => '1',
                    'role' => '1',
                    'created_at' => Carbon\Carbon::now(),
                ],
                [
                    'first_name' => 'Admin',
                    'last_name' => 'Admin',
                    'user_name' => 'admin',
                    'email' => 'instructor@demo.com',
                    'password' => \Hash::make('admin123'),
                    'gender' => '1',
                    'role' => '2',
                    'created_at' => Carbon\Carbon::now(),
                ]
            ]);
    }
}
