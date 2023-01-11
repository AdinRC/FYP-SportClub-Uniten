<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'admin',
            'email'=>'admin@a.com',
            'password'=>bcrypt('123456'),
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'user',
            'email'=>'user@a.com',
            'password'=>bcrypt('123456'),
            'role'=>'user'
        ]);
        User::create([
            'name'=>'editor',
            'email'=>'editor@a.com',
            'password'=>bcrypt('123456'),
            'role'=>'editor'
        ]);

        $this->call(ClubSeeder::class);
    }
}
