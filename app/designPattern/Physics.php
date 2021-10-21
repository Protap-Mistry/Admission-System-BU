<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Physics extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->admission_physics_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Physics"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Physics"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
