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

use Illuminate\Support\Str;

class ApplyController extends Controller
{
    public function apply(Request $request)
    {
        //validations start
        $validator = Validator::make($request->all(),[
            'gst_roll' => 'required',
            'hsc_roll' => 'required|digits:6|integer',
            'hsc_board' => 'required',
            'hsc_passing_year' => 'required|digits:4|integer',
        ]);
        if ($validator->fails()) 
        {
            return response()->json($validator->errors(), 422); //unprocessable entity code (semantic errors)
        }
        //validations end

        
        $academic_info= DB::table('academic_infos')->where('hsc_roll', $request->hsc_roll)
                                                    ->where('hsc_board', $request->hsc_board)
                                                    ->where('hsc_passing_year', $request->hsc_passing_year)->first();
        if(empty($academic_info))
        {
            return response()->json([
                'message' => "Whoops!!! Your academic info not matched.",
                'academic_info' => $request['academic_info'],
            ], 422);
        }

        $gst_info= DB::table('gst_infos')->where('gst_roll', $request->gst_roll)->first();
        if(empty($gst_info))
        {
            return response()->json([
                'message' => "Whoops!!! Your GST info not matched.",
                'gst_info' => $request['gst_info'],
            ], 422);
        }



        $subjects= new EligibleSubjects();

        $eligible_subjects= $subjects->checker($gst_info, $academic_info, 2);
        return response()->json([
            'success'=> true,
            'Data' => $eligible_subjects,
        ]);

    }

    public function get_student(Request $request)
    {
        //validations start
        $validator = Validator::make($request->all(),[
            'hsc_roll' => 'required|digits:6|integer',
        ]);
        if ($validator->fails()) 
        {
            return response()->json($validator->errors(), 422); //unprocessable entity code (semantic errors)
        }
        //validations end

        $academic_info= DB::table('academic_infos')->where('hsc_roll', $request->hsc_roll)->first();

        if(empty($academic_info))
        {
            return response()->json([
                'message' => "Whoops!!! Your academic info not matched.",
                'academic_info' => $request['academic_info'],
            ], 422);
        }

        $gst_info= DB::table('gst_infos')->where('hsc_roll', $request->hsc_roll)->first();

        $subjects= new EligibleSubjects();

        $eligible_subjects= $subjects->checker($gst_info, $academic_info, 2);
        return response()->json([
            'success'=> true,
            'Data' => $eligible_subjects,
        ]);
    }

    public function payment(Request $request)
    {
        //validations start
        $validator = Validator::make($request->all(),[
            'hsc_roll' => 'required|digits:6|integer',
            'has_unit_change' => 'required|boolean',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpeg,bmp,svg,jpg,png|max:512',
            'present_address' => 'required',
            'permanent_address' => 'required',
        ]);
        if ($validator->fails()) 
        {
            return response()->json($validator->errors(), 422); //unprocessable entity code (semantic errors)
        }
        //validations end

        $academic_info= DB::table('academic_infos')->where('hsc_roll', $request->hsc_roll)->first();
        $gst_info= DB::table('gst_infos')->where('hsc_roll', $request->hsc_roll)->first();

        if(empty($academic_info))
        {
            return response()->json([
                'message' => "Whoops!!! Your academic info not matched.",
                'academic_info' => $request['academic_info'],
            ], 422);
        }

        //Subjects with code

        $subjects= new EligibleSubjects();

        $eligible_subjects= $subjects->checker($gst_info, $academic_info, $request->has_unit_change);

        $user= User::where('hsc_roll', $request->hsc_roll)->first();

        if($user != null)
        {
            return response()->json([
                'success'=> true,
                'Data' => array('user' => $user, 'payment' => $user->payment, 'subjects' => $eligible_subjects),
            ]);
        }

        try {
            \DB::beginTransaction();

            //User model+table
            $user= new User();

            $user->name= $academic_info->name;
            $user->father_name= $academic_info->father_name;
            $user->mother_name= $academic_info->mother_name;
            $user->image= $request->image;
            $user->present_address= $request->present_address;
            $user->permanent_address= $request->permanent_address;
            $user->division= $academic_info->division;
            $user->email= $request->email;
            $user->password= bcrypt('123456');
            $user->phone= $request->phone;
            $user->gst_roll= $gst_info->gst_roll;
            $user->gst_unit= $gst_info->gst_unit;
            $user->gst_position= $gst_info->gst_position;
            $user->hsc_roll= $gst_info->hsc_roll;
            $user->has_unit_change= $request->has_unit_change;

            $user->save();

            //Payment model+table
            $payment= new Payment();

            $payment->transaction_id= (string) Str::orderedUuid();
            $payment->method= "PayPal";

            if ($user->has_unit_change == 1) {
                if ($gst_info->gst_unit == 'A') {
                    $payment->amount= "1000.00";
                }elseif ($gst_info->gst_unit == 'B') {
                    $payment->amount= "900.00";
                }elseif ($gst_info->gst_unit == 'C') {
                    $payment->amount= "800.00";
                }
            }
            else {
                 if ($gst_info->gst_unit == 'A') {
                    $payment->amount= "600.00";
                }elseif ($gst_info->gst_unit == 'B') {
                    $payment->amount= "550.00";
                }elseif ($gst_info->gst_unit == 'C') {
                    $payment->amount= "500.00";
                }
            }

            $payment->has_unit_change= $request->has_unit_change;
            $payment->user_id= $user->id;

            $payment->save();
            

            \DB::commit();

            

            return response()->json([
                'success'=> true,
                'Data' => array('user' => $user, 'payment' => $payment, 'subjects' => $eligible_subjects),
            ]);

        } catch (Throwable $e) {
            \DB::rollback();
        }
        

    }

}
