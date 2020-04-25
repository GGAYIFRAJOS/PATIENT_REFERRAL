<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
                'name' => 'ONE'
            ]
        );
        DB::table('grades')->insert([
                'name' => 'TWO'
            ]
        );
        DB::table('grades')->insert([
                'name' => 'THREE'
            ]
        );
        DB::table('grades')->insert([
            'name' => 'FOUR'
        ]
    );

    }
}
