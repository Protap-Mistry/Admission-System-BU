<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Computer_Science_and_Engineering extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->admission_physics_marks >= 6 || $subj->admission_mathematics_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Computer Science and Engineering"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Computer Science and Engineering"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
