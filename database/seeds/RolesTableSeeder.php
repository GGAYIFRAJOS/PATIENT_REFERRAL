<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
                'name' => 'HOSPITAL_ADMIN'
            ]
        );
        DB::table('roles')->insert([
            'name' => 'DOCTOR'
        ]
        );
        DB::table('roles')->insert([
            'name' => 'SUPER_ADMIN'
        ]
        );

    }
}
