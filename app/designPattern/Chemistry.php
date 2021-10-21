<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Chemistry extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->admission_chemistry_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Chemistry"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Chemistry"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
