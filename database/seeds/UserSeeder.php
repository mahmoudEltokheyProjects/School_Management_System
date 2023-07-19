<?php

use App\User;
use Illuminate\Database\Seeder;
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
        //User Seeder
        $user = User::create([
            'name'       => 'mahmoudEltokhey',
            'email'      => 'admin@admin.com',
            'password'   =>  Hash::make('123456') ,
        ]);
    }
}
