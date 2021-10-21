<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class SES extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->admission_chemistry_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Soil and Environmental Sciences"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Soil and Environmental Sciences"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
