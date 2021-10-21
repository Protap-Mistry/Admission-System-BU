<?php
    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\EligibilityImplementation;

    class Statistics extends EligibilityImplementation
    {
        public function process($subj=null)
        {
            switch($subj->hsc_mathematics_subj)
            {   
                case true:
                switch (!empty($subj['subj'])) {
                    case true:
                        $subj->merge(['subj'=> array_merge($subj['subj'],["Statistics"])]);
                        break;
                    
                    default:
                        $subj->merge(['subj'=>["Statistics"]]);
                        break;
                }
                break;
            }

            return $this->nextProcess($subj);
        }
    }
