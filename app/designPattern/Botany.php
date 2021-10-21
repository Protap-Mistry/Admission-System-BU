<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Botany extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->hsc_biology_subj && $subj->admission_biology_marks >= 6)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Botany"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Botany"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
