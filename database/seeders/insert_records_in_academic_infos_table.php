<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class insert_records_in_academic_infos_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academic_info=
        [
            [
                'name' => 'Protap Mistry',
                'father_name' => 'dfgyhujikl',
                'mother_name' => 'edtrfyuhkl',
                'division' => 'Khulna',
                'ssc_roll' => '654321',
                'ssc_group' => 'Science',
                'ssc_board' => 'Jessore',
                'ssc_passing_year' => '2013',
                'ssc_gpa' => '5.00',
                'hsc_roll' => '123456',
                'hsc_group' => 'Science',
                'hsc_board' => 'Jessore',
                'hsc_passing_year' => '2015',
                'hsc_gpa' => '4.67',
                'has_hsc_math' => 1,
                'has_hsc_physics' => 1,
                'has_hsc_chemistry' => 1,
                'has_hsc_biology' => 1,
                'has_hsc_statistics' => 0,
                'has_hsc_economics' => 0
            ],
            [
                'name' => 'Student-1',
                'father_name' => 'etrfgyuhjk',
                'mother_name' => 'dtrfyuhjik',
                'division' => 'Barishal',
                'ssc_roll' => '665432',
                'ssc_group' => 'Arts',
                'ssc_board' => 'Barishal',
                'ssc_passing_year' => '2013',
                'ssc_gpa' => '4.80',
                'hsc_roll' => '112345',
                'hsc_group' => 'Arts',
                'hsc_board' => 'Barishal',
                'hsc_passing_year' => '2015',
                'hsc_gpa' => '4.60',
                'has_hsc_math' => 0,
                'has_hsc_physics' => 0,
                'has_hsc_chemistry' => 0,
                'has_hsc_biology' => 0,
                'has_hsc_statistics' => 1,
                'has_hsc_economics' => 0
            ],
            [
                'name' => 'Sarwar Hossain',
                'father_name' => 'segyulcfgvbjhnmk',
                'mother_name' => 'edrtfjiok',
                'division' => 'Rajshahi',
                'ssc_roll' => '655432',
                'ssc_group' => 'Science',
                'ssc_board' => 'Rajshahi',
                'ssc_passing_year' => '2013',
                'ssc_gpa' => '4.60',
                'hsc_roll' => '122345',
                'hsc_group' => 'Science',
                'hsc_board' => 'Rajshahi',
                'hsc_passing_year' => '2015',
                'hsc_gpa' => '4.78',
                'has_hsc_math' => 1,
                'has_hsc_physics' => 1,
                'has_hsc_chemistry' => 1,
                'has_hsc_biology' => 1,
                'has_hsc_statistics' => 0,
                'has_hsc_economics' => 0
            ],
            [
                'name' => 'Student-2',
                'father_name' => 'dtrgyjkl',
                'mother_name' => 'trfgyuhjikl',
                'division' => 'Dhaka',
                'ssc_roll' => '654432',
                'ssc_group' => 'Commerce',
                'ssc_board' => 'Dhaka',
                'ssc_passing_year' => '2013',
                'ssc_gpa' => '4.55',
                'hsc_roll' => '123345',
                'hsc_group' => 'Commerce',
                'hsc_board' => 'Dhaka',
                'hsc_passing_year' => '2015',
                'hsc_gpa' => '4.34',
                'has_hsc_math' => 0,
                'has_hsc_physics' => 0,
                'has_hsc_chemistry' => 0,
                'has_hsc_biology' => 0,
                'has_hsc_statistics' => 1,
                'has_hsc_economics' => 0
            ],
            [
                'name' => 'Pranta Biswas',
                'father_name' => 'dtrfgyjhkl',
                'mother_name' => 'stfgyhjkl',
                'division' => 'Magura',
                'ssc_roll' => '654332',
                'ssc_group' => 'Science',
                'ssc_board' => 'Jessore',
                'ssc_passing_year' => '2013',
                'ssc_gpa' => '4.50',
                'hsc_roll' => '123445',
                'hsc_group' => 'Science',
                'hsc_board' => 'Jessore',
                'hsc_passing_year' => '2015',
                'hsc_gpa' => '4.67',
                'has_hsc_math' => 1,
                'has_hsc_physics' => 1,
                'has_hsc_chemistry' => 1,
                'has_hsc_biology' => 1,
                'has_hsc_statistics' => 0,
                'has_hsc_economics' => 0
            ],
        ];
        DB::table('academic_infos')->insert($academic_info);
    }
}
