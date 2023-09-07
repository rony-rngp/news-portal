<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::where('email', 'rony.rng@gmail.com')->first();
    	if(is_null($user)){
    		$user = new User;
	     	$user->name = "Rony Islam";
	     	$user->email = "rony.rng@gmail.com";
	     	$user->password = Hash::make('11111111');
	     	$user->save();
    	} 
    }
}
