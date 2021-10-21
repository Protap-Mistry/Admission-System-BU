<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Geology_and_Mining extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->admission_physics_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Geology and Mining"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Geology and Mining"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
