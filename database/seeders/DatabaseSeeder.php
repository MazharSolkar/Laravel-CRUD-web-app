<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::insert([

           [ 'name' => 'mazhar', 'email' => 'm@gmail.com','password' => bcrypt('password')],
           [ 'name' => 'naved', 'email' => 'n@gmail.com','password' => bcrypt('password')]
        ]);

        Task::insert([
            ['title' => 'default task by user id 1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'default task by user id 2', 'user_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'default task by user id 2', 'user_id' => '2', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
