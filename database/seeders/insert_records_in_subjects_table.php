<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class insert_records_in_subjects_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments=
        [
            [
                'subj_name' => 'Mathematics',
                'subj_code' => 'math',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Computer Science and Engineering',
                'subj_code' => 'cse',
                'unit' => 'A',
                'total_seats' => 50,
                'available_seats' => 50
            ],
            [
                'subj_name' => 'Chemistry',
                'subj_code' => 'chem',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Physics',
                'subj_code' => 'phy',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Geology and Mining',
                'subj_code' => 'gm',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Statistics',
                'subj_code' => 'stat',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Soil and Environmental Sciences',
                'subj_code' => 'ses',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Bootany',
                'subj_code' => 'bot',
                'unit' => 'A',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Coastal Studies and Disaster Management',
                'subj_code' => 'csdm',
                'unit' => 'A',
                'total_seats' => 50,
                'available_seats' => 50
            ],
            [
                'subj_name' => 'Biochemistry and Biotechnology',
                'subj_code' => 'bb',
                'unit' => 'A',
                'total_seats' => 50,
                'available_seats' => 50
            ],
            [
                'subj_name' => 'Management Studies',
                'subj_code' => 'ms',
                'unit' => 'C',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Accounting and Information Systems',
                'subj_code' => 'ais',
                'unit' => 'C',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Marketing',
                'subj_code' => 'mkt',
                'unit' => 'C',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Finance and Banking',
                'subj_code' => 'fb',
                'unit' => 'C',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Economics',
                'subj_code' => 'eco',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Political Science',
                'subj_code' => 'ps',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Sociology',
                'subj_code' => 'soc',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Public Administration',
                'subj_code' => 'pad',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Bangla',
                'subj_code' => 'bang',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'English',
                'subj_code' => 'eng',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Philosophy',
                'subj_code' => 'phil',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Mass Communication and Journalism',
                'subj_code' => 'mcj',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'History and Civilization',
                'subj_code' => 'hc',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
            [
                'subj_name' => 'Law',
                'subj_code' => 'law',
                'unit' => 'B',
                'total_seats' => 80,
                'available_seats' => 80
            ],
        ];
        DB::table('subjects')->insert($departments);
    }
}
