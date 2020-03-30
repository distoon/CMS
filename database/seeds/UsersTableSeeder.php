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
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'user_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('admin123'),
            'gender' => '1',
            'role' => '0',
        ]);
    }
}
