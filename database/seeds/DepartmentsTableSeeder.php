<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
                'name' => 'ANESTHETICS',
                'description' => 'Doctors in this department give anesthetic for operations and procedures. An anesthetic is a drug or agent that produces a complete or partial loss of feeling. There are three kinds of anesthetic: general, regional and local.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'BREAST SCREENING',
                'description' => 'Screens women for breast cancer and is usually linked to the X-ray or radiology department.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'CARDIOLOGY',
                'description' => 'Provides medical care to patients who have problems with their heart or circulation.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'CORONARY CARE UNIT (CCU)',
                'description' => 'A hospital ward specialized in the care of patients with heart attacks, unstable angina, cardiac dysrhythmia and other cardiac conditions that require continuous monitoring and treatment.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'CRITICAL CARE',
                'description' => 'Also called intensive care, this department is for seriously ill patients.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'DIAGNOSTIC IMAGING',
                'description' => 'Also known as X-Ray Department and/or Radiology Department.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'ELDERLY SERVICES',
                'description' => 'Covers and assists with a wide range of issues associated with seniors.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'GASTROENTEROLOGY',
                'description' => ' This department investigates and treats digestive and upper and lower gastrointestinal diseases.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'GYNECOLOGY',
                'description' => 'Investigates and treats problems relating to the female urinary tract and reproductive organs, such as Endometriosis, infertility and incontinence.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'INTENSIVE CARE UNIT',
                'description' => '(Intensive Therapy Unit, Intensive Treatment Unit (ITU), Critical Care Unit (CCU) - A special department of a hospital or health care facility that provides intensive treatment medicine and caters to patients with severe and life-threatening illnesses and injuries, which require constant, close monitoring and support from specialist equipment and medications.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'MATERNITY',
                'description' => ' Maternity wards provide antenatal care, delivery of babies and care during childbirth, and postnatal support.'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'NEUROLOGY',
                'description' => 'A medical specialty dealing with disorders of the nervous system. Specifically, it deals with the diagnosis and treatment of all categories of disease involving the central, peripheral, and autonomic nervous systems, including their coverings, blood vessels, and all effector tissue, such as muscle. Includes the brain, spinal cord, and spinal cord injuries (SCI).'
            ]
        );
        DB::table('departments')->insert([
                'name' => 'NEONATAL',
                'description' => 'Closely linked with the hospital maternity department, provides care and support for babies and their families.'
            ]
        );


    }
}
