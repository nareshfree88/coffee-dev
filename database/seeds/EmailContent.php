<?php

use Illuminate\Database\Seeder;

class EmailContent extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('email_contents')->insert([
            [
                'status' => '0',
                'content' => 'Email For Awaiting',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'status' => '1',
                'content' => 'Email For Awaiting Process',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'status' => '2',
                'content' => 'Email For Shipped',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'status' => '3',
                'content' => 'Email For Delivered',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ]);
    }

}
