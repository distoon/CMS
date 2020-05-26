<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            [
                'name' => 'Computer Science',
                'short_name' => 'CS',
                'created_at' => Carbon\Carbon::now(),
            ],
            [
                'name' => 'Information Systems',
                'short_name' => 'IS',
                'created_at' => Carbon\Carbon::now(),
            ],
            [
                'name' => 'Information Technology',
                'short_name' => 'IT',
                'created_at' => Carbon\Carbon::now(),
            ],
        ]);
    }
}
