<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class insert_records_in_gst_infos_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gst_info= [
            [
                'gst_roll' => '17CSE029',
                'gst_unit' => 'A',
                'gst_position' => 1,
                'gst_math_score' => 15.0,
                'gst_physics_score' => 10.0,
                'gst_chemistry_score' => 10.0,
                'gst_biology_score' => null,
                'gst_english_score' => 5.0,
                'gst_bangla_score' => 5.0,
                'gst_ict_score' => 10.0,
                'gst_accounting_score' => null,
                'gst_business_score' => null,
                'total_score' =>  55.0,
                'hsc_roll' => '123456',
                'hsc_board' => 'Jessore',
                'hsc_group' => 'Science',
                'hsc_passing_year' => '2015',
                'stu_division' => 'Khulna',

            ],
            [
                'gst_roll' => '17AIS029',
                'gst_unit' => 'C',
                'gst_position' => 1,
                'gst_math_score' => null,
                'gst_physics_score' => null,
                'gst_chemistry_score' => null,
                'gst_biology_score' => null,
                'gst_english_score' => 3.0,
                'gst_bangla_score' => 9.0,
                'gst_ict_score' => 12.0,
                'gst_accounting_score' => 12.0,
                'gst_business_score' => 10.0,
                'total_score' =>  46.0,
                'hsc_roll' => '112345',
                'hsc_board' => 'Barishal',
                'hsc_group' => 'Commerce',
                'hsc_passing_year' => '2015',
                'stu_division' => 'Barishal',

            ],
            [
                'gst_roll' => '17CSE016',
                'gst_unit' => 'A',
                'gst_position' => 2,
                'gst_math_score' => 10.0,
                'gst_physics_score' => 10.0,
                'gst_chemistry_score' => 10.0,
                'gst_biology_score' => 5.0,
                'gst_english_score' => 5.0,
                'gst_bangla_score' => 5.0,
                'gst_ict_score' => null,
                'gst_accounting_score' => null,
                'gst_business_score' => null,
                'total_score' =>  45.0,
                'hsc_roll' => '122345',
                'hsc_board' => 'Rajshahi',
                'hsc_group' => 'Science',
                'hsc_passing_year' => '2015',
                'stu_division' => 'Rajshahi',

            ],
            [
                'gst_roll' => '17HUM029',
                'gst_unit' => 'B',
                'gst_position' => 1,
                'gst_math_score' => null,
                'gst_physics_score' => null,
                'gst_chemistry_score' => null,
                'gst_biology_score' => null,
                'gst_english_score' => 30.0,
                'gst_bangla_score' => 30.0,
                'gst_ict_score' => 20.0,
                'gst_accounting_score' => null,
                'gst_business_score' => null,
                'total_score' =>  80.0,
                'hsc_roll' => '123345',
                'hsc_board' => 'Dhaka',
                'hsc_group' => 'Arts',
                'hsc_passing_year' => '2015',
                'stu_division' => 'Dhaka',

            ],
            [
                'gst_roll' => '17CSE028',
                'gst_unit' => 'A',
                'gst_position' => 3,
                'gst_math_score' => 10.0,
                'gst_physics_score' => 10.0,
                'gst_chemistry_score' => 5.0,
                'gst_biology_score' => 5.0,
                'gst_english_score' => 5.0,
                'gst_bangla_score' => 5.0,
                'gst_ict_score' => null,
                'gst_accounting_score' => null,
                'gst_business_score' => null,
                'total_score' =>  40.0,
                'hsc_roll' => '123445',
                'hsc_board' => 'Jessore',
                'hsc_group' => 'Science',
                'hsc_passing_year' => '2015',
                'stu_division' => 'Magura',
                

            ],
        ];
        DB::table('gst_infos')->insert($gst_info);
    }
}
