<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class CSDM extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->admission_mathematics_marks >= 6 || $subj->admission_physics_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Coastal Studies and Disaster Management"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Coastal Studies and Disaster Management"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
