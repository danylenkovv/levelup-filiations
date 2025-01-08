<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seed for user table.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('login', 'admin')->exists()) {
            User::create([
                'login' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
            ]);
        }
    }
}
