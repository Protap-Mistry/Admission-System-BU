<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Mathematics extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->hsc_mathematics_subj && $subj->admission_mathematics_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Mathematics"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Mathematics"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
