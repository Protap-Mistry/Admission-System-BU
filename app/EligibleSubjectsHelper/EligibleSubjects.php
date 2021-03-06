<?php

    namespace App\EligibleSubjectsHelper;

    use Illuminate\Http\Request;
    use Illuminate\Support\Arr;
    use App\Models\Subject;

    class EligibleSubjects
    {
        public function checker($gst_info, $academic_info, $unit_chng)
        {
            $subjects=[];
            $subject_with_unit_change= [];

            if($gst_info->gst_unit == 'A')
            {
                if($academic_info->has_hsc_math && $gst_info->gst_math_score != null && $gst_info->gst_math_score >= 6)
                {
                    $math= Subject::select('subj_name','subj_code')->where('subj_code' , 'math')->first();
                    $subjects[]=(object)$math;

                }
                if($gst_info->gst_chemistry_score >= 6)
                {
                    $chemistry= Subject::select('subj_name','subj_code')->where('subj_code' , 'chem')->first();
                    $subjects[]=(object)$chemistry;

                }
                if($gst_info->gst_physics_score >= 6)
                {
                    $physics= Subject::select('subj_name','subj_code')->where('subj_code' , 'phy')->first();
                    $subjects[]=(object)$physics;

                }
                if($gst_info->gst_physics_score >= 6)
                {
                    $gm= Subject::select('subj_name','subj_code')->where('subj_code' , 'gm')->first();
                    $subjects[]=(object)$gm;

                }
                if(($gst_info->gst_math_score != null && $gst_info->gst_math_score >= 6) || $gst_info->gst_physics_score >= 6)
                {
                    $cse= Subject::select('subj_name','subj_code')->where('subj_code' , 'cse')->first();
                    $subjects[]=(object)$cse;

                }
                if($academic_info->has_hsc_math)
                {
                    $statistics= Subject::select('subj_name','subj_code')->where('subj_code' , 'stat')->first();
                    $subjects[]=(object)$statistics;

                }
                if($gst_info->gst_chemistry_score >= 6)
                {
                    $ses= Subject::select('subj_name','subj_code')->where('subj_code' , 'ses')->first();
                    $subjects[]=(object)$ses;

                }
                if($academic_info->has_hsc_biology && $gst_info->gst_biology_score != null && $gst_info->gst_biology_score >= 6)
                {
                    $bot= Subject::select('subj_name','subj_code')->where('subj_code' , 'bot')->first();
                    $subjects[]=(object)$bot;

                }
                if(($gst_info->gst_math_score != null && $gst_info->gst_math_score >= 6) || $gst_info->gst_physics_score >= 6)
                {
                    $csdm= Subject::select('subj_name','subj_code')->where('subj_code' , 'csdm')->first();
                    $subjects[]=(object)$csdm;

                }
                if($academic_info->has_hsc_biology && $gst_info->gst_biology_score != null && $gst_info->gst_biology_score >= 6)
                {
                    $bb= Subject::select('subj_name','subj_code')->where('subj_code' , 'bb')->first();
                    $subjects[]=(object)$bb;

                }
                
                //A to B

                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $eco= Subject::select('subj_name','subj_code')->where('subj_code' , 'eco')->first();
                    $subject_with_unit_change[]=(object)$eco;

                }
                if($gst_info->gst_bangla_score >= 3)
                {
                    $bangla= Subject::select('subj_name','subj_code')->where('subj_code' , 'bang')->first();
                    $subject_with_unit_change[]=(object)$bangla;

                }
                if($gst_info->gst_english_score >= 4)
                {
                    $english= Subject::select('subj_name','subj_code')->where('subj_code' , 'eng')->first();
                    $subject_with_unit_change[]=(object)$english;

                }

                //A to C

                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $mkt= Subject::select('subj_name','subj_code')->where('subj_code' , 'mkt')->first();
                    $subject_with_unit_change[]=(object)$mkt;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $ms= Subject::select('subj_name','subj_code')->where('subj_code' , 'ms')->first();
                    $subject_with_unit_change[]=(object)$ms;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $ais= Subject::select('subj_name','subj_code')->where('subj_code' , 'ais')->first();
                    $subject_with_unit_change[]=(object)$ais;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $fb= Subject::select('subj_name','subj_code')->where('subj_code' , 'fb')->first();
                    $subject_with_unit_change[]=(object)$fb;

                }
                
            }
            elseif($gst_info->gst_unit == 'B')
            {
                
                if($gst_info->gst_bangla_score >= 12)
                {
                    $bang= Subject::select('subj_name','subj_code')->where('subj_code' , 'bang')->first();
                    $subjects[]=(object)$bang;

                }
                if($gst_info->gst_english_score >= 14)
                {
                    $eng= Subject::select('subj_name','subj_code')->where('subj_code' , 'eng')->first();
                    $subjects[]=(object)$eng;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $eco= Subject::select('subj_name','subj_code')->where('subj_code' , 'eco')->first();
                    $subjects[]=(object)$eco;

                }

                $phil= Subject::select('subj_name','subj_code')->where('subj_code' , 'phil')->first();
                $subjects[]=(object)$phil;

                $mcj= Subject::select('subj_name','subj_code')->where('subj_code' , 'mcj')->first();
                $subjects[]=(object)$mcj;

                $hc= Subject::select('subj_name','subj_code')->where('subj_code' , 'hc')->first();
                $subjects[]=(object)$hc;

                $soc= Subject::select('subj_name','subj_code')->where('subj_code' , 'soc')->first();
                $subjects[]=(object)$soc;

                $pad= Subject::select('subj_name','subj_code')->where('subj_code' , 'pad')->first();
                $subjects[]=(object)$pad;

                $ps= Subject::select('subj_name','subj_code')->where('subj_code' , 'ps')->first();
                $subjects[]=(object)$ps;

                $law= Subject::select('subj_name','subj_code')->where('subj_code' , 'law')->first();
                $subjects[]=(object)$law;

                //B to A

                if($academic_info->has_hsc_math)
                {
                    $math= Subject::select('subj_name','subj_code')->where('subj_code' , 'math')->first();
                    $subject_with_unit_change[]=(object)$math;

                }
                if($academic_info->has_hsc_math)
                {
                    $statistics= Subject::select('subj_name','subj_code')->where('subj_code' , 'stat')->first();
                    $subject_with_unit_change[]=(object)$statistics;

                }

                //B to C

                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $mkt= Subject::select('subj_name','subj_code')->where('subj_code' , 'mkt')->first();
                    $subject_with_unit_change[]=(object)$mkt;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $ms= Subject::select('subj_name','subj_code')->where('subj_code' , 'ms')->first();
                    $subject_with_unit_change[]=(object)$ms;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $ais= Subject::select('subj_name','subj_code')->where('subj_code' , 'ais')->first();
                    $subject_with_unit_change[]=(object)$ais;

                }
                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $fb= Subject::select('subj_name','subj_code')->where('subj_code' , 'fb')->first();
                    $subject_with_unit_change[]=(object)$fb;

                }

            }
            elseif($gst_info->gst_unit == 'C')
            {
                
                $mkt= Subject::select('subj_name','subj_code')->where('subj_code' , 'mkt')->first();
                $subjects[]=(object)$mkt;
            
                $ms= Subject::select('subj_name','subj_code')->where('subj_code' , 'ms')->first();
                $subjects[]=(object)$ms;
            
                $ais= Subject::select('subj_name','subj_code')->where('subj_code' , 'ais')->first();
                $subjects[]=(object)$ais;
            
                $fb= Subject::select('subj_name','subj_code')->where('subj_code' , 'fb')->first();
                $subjects[]=(object)$fb;

                //C to B

                if($academic_info->has_hsc_math || $academic_info->has_hsc_statistics || $academic_info->has_hsc_economics)
                {
                    $eco= Subject::select('subj_name','subj_code')->where('subj_code' , 'eco')->first();
                    $subject_with_unit_change[]=(object)$eco;

                }
                if($gst_info->gst_bangla_score >= 4)
                {
                    $bangla= Subject::select('subj_name','subj_code')->where('subj_code' , 'bang')->first();
                    $subject_with_unit_change[]=(object)$bangla;

                }
                if($gst_info->gst_english_score >= 4)
                {
                    $english= Subject::select('subj_name','subj_code')->where('subj_code' , 'eng')->first();
                    $subject_with_unit_change[]=(object)$english;

                }

            }
            else {
                return "Something went wrong";
            }

            if($unit_chng == 1 ){
                $subjects = Arr::collapse([$subjects, $subject_with_unit_change]);
                return $subjects;
            }
            elseif ($unit_chng == 0) {
                return $subjects;
            }

            info( $subjects.$subject_with_unit_change);
            return array('academic_info' => $academic_info, 'gst_info' => $gst_info, 'subjects' => $subjects, 'subject_with_unit_change' => $subject_with_unit_change);
        }
    }
    
    