<?php

    namespace App\designPattern;

    use Illuminate\Http\Request;

    interface CheckEligibilityInterface
    {
        public function yourNextStoppage(CheckEligibilityInterface $abilityChecker);
        public function process(Request $subj);
    }