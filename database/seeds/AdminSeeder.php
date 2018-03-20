<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nestor',
            'email' => 'nestor@hotmail.com',
            'username' => 'nestor123',
            'password' => bcrypt('admin123'),
            'rol' => 'admin',
            'remember_token' => bcrypt(date('YmdHms'))
        ]);
        User::create([
            'name' => 'omar',
            'email' => 'alberto34plus@gmail.com',
            'username' => 'omar123',
            'password' => bcrypt(123456),
            'rol' => 'admin',
            'remember_token' => bcrypt(date('YmdHms'))
        ]);
        User::create([
            'name' => 'corsi',
            'email' => 'corsi@gmail.com',
            'username' => 'corsi123',
            'password' => bcrypt(123456),
            'rol' => 'user',
            'remember_token' => bcrypt(date('YmdHms'))
        ]);
        User::create([
            'name' => 'SISTEMAS',
            'email' => 'sistemas@gmail.com',
            'username' => 'sistemas',
            'password' => bcrypt(12345678),
            'rol' => 'user',
            'remember_token' => bcrypt(date('YmdHms'))
        ]);
    }
}
