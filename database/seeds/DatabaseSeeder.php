<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'cpf' => '11660335704',
    		'name' => 'Thiago',
    		'phone' => '999365421',
    		'birth' => '1990-09-01',
    		'gender' => 'M',
    		'email' => 'thiago@gmail.com',
    		'password' => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
    	]);
        // $this->call(UsersTableSeeder::class);
    }
}
