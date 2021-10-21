<?php

    namespace App\designPattern;

    use Illuminate\Http\Request;
    use App\designPattern\CheckEligibilityInterface;

    abstract class EligibilityImplementation implements CheckEligibilityInterface
    {
        protected $next_process;

        public function yourNextStoppage(CheckEligibilityInterface $var)
        {
            $this->next_process= $var;
        }
        public function nextProcess($subj)
        {
            if($this->next_process)
            {
                return $this->next_process->process($subj);
            }
        }
    }