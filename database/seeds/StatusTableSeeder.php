<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
                'name' => 'SENT'
            ]
        );
        DB::table('status')->insert([
            'name' => 'APPROVED'
        ]
        );
        DB::table('status')->insert([
            'name' => 'PENDING'
        ]
        );
        DB::table('status')->insert([
            'name' => 'NOT AVAILABLE'
        ]
        );
        DB::table('status')->insert([
            'name' => 'MET PATIENT'
        ]
        );

    }
}
