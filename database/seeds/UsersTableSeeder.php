<?php

use App\User;
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
        User::create([
            'name' => 'Lsantos',
            'email' => 'lsantosmanga21@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        User::create([
            'name' => 'Luh Quirino',
            'email' => 'lulinhapiko@gmail.com',
            'password' => bcrypt('admin123')
        ]);
    }
}
