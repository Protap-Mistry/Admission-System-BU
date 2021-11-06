<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\EligibleSubjectsHelper\EligibleSubjects;
use DB;
use App\Models\User;
use App\Models\Payment;
use App\Models\Choice;

class ChoiceController extends Controller
{
    public function choice(Request $request){
        //validations start
        $validator = Validator::make($request->all(),[
            'hsc_roll' => 'required',
            'has_auto_migrate' => 'required|boolean',
        ]);
        if ($validator->fails()) 
        {
            return response()->json($validator->errors(), 422); //unprocessable entity code (semantic errors)
        }
        //validations end

        $user= User::where('hsc_roll', $request->hsc_roll)->first();

        if(!empty($user)){
            
            $user->has_auto_migrate= $request->has_auto_migrate;
            $user->save();
        }
        else {
            return response()->json([
                'success'=> false,
                'Data' => "Whopps!!! Something went wrong.",
            ]);
        }
        try {

            \DB::beginTransaction();

            if(!empty($user->choosen_subject))
                $subject_choice=Choice::where('user_id', $user->id)->first();
            else
                $subject_choice= new Choice();

            $subject_choice->user_id = $user->id;
            $subject_choice->save();

            if(!empty($request->subjects))
            {
                foreach ($request->subjects as $key=>$subject) 
                {
                    if($key==0)
                        $subject_choice->rank_1 = $subject['subj_code'];
                    else if($key==1)
                        $subject_choice->rank_2 = $subject['subj_code'];
                    else if($key==2)
                        $subject_choice->rank_3 = $subject['subj_code'];
                    else if($key==3)
                        $subject_choice->rank_4 = $subject['subj_code'];
                    else if($key==4)
                        $subject_choice->rank_5 = $subject['subj_code'];
                    else if($key==5)
                        $subject_choice->rank_6 = $subject['subj_code'];
                    else if($key==6)
                        $subject_choice->rank_7 = $subject['subj_code'];
                    else if($key==7)
                        $subject_choice->rank_8 = $subject['subj_code'];
                    else if($key==8)
                        $subject_choice->rank_9 = $subject['subj_code'];
                    else if($key==9)
                        $subject_choice->rank_10 = $subject['subj_code'];
                    else if($key==10)
                        $subject_choice->rank_11 = $subject['subj_code'];
                    else if($key==11)
                        $subject_choice->rank_12 = $subject['subj_code'];
                    else if($key==12)
                        $subject_choice->rank_13 = $subject['subj_code'];
                    else if($key==13)
                        $subject_choice->rank_14 = $subject['subj_code'];
                    else if($key==14)
                        $subject_choice->rank_15 = $subject['subj_code'];
                    else if($key==15)
                        $subject_choice->rank_16 = $subject['subj_code'];
                    else if($key==16)
                        $subject_choice->rank_17 = $subject['subj_code'];
                    else if($key==17)
                        $subject_choice->rank_18 = $subject['subj_code'];
                    else if($key==18)
                        $subject_choice->rank_19 = $subject['subj_code'];
                    else if($key==19)
                        $subject_choice->rank_20 = $subject['subj_code'];
                    else if($key==20)
                        $subject_choice->rank_21 = $subject['subj_code'];
                    else if($key==21)
                        $subject_choice->rank_22 = $subject['subj_code'];
                    else if($key==22)
                        $subject_choice->rank_23 = $subject['subj_code'];
                    else if($key==23)
                        $subject_choice->rank_24 = $subject['subj_code'];
                    
                    $subject_choice->save();
                }
            }

            \DB::commit();

            return response()->json($subject_choice, 200);

        } catch (\Throwable $th) {
                \DB::rollback();
        }
    }    
}
