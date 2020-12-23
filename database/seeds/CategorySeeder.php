<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
            [
                'category_name' => 'Whole Beans',
                'category_slug' => 'whole_beans',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'category_name' => 'Equipment',
                'category_slug' => 'equipment',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ]);
    }

}
