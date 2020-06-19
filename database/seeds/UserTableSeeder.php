<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
   
    public function run()
    {
        $data = array(
			[
				'name' 		=> 'Brayan', 
				'last_name' => 'Sinisterra', 
				'email' 	=> 'brayansinisterra96@gmail.com', 
				'user' 		=> 'brayan',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'active' 	=> 1,
				'address' 	=> 'San Cosme 290, Cuauhtemoc, D.F.',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Adela', 
				'last_name' => 'Torres', 
				'email' 	=> 'adela@correo.com', 
				'user' 		=> 'adela',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'user',
				'active' 	=> 1,
				'address' 	=> 'Tonala 321, Jalisco',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($data);
    }
}
