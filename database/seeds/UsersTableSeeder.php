<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
        ];
        $user = \App\User::create($data);  
        $user->assignRole('admin');
    }

}
