<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\EligibleSubjectsHelper\EligibleSubjects;
use DB;

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

        $eligible_subjects= $subjects->checker($gst_info, $academic_info, $unit_chng);
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
            'phone' => 'required|regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/',
            'email' => 'required|email',
            'image' => 'nullable|mimes:png,jpg',
            'present_address' => 'required',
            'permanent_address' => 'required',
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

        $user= new User();
        $user->name= $academic_info->name;
        $user->father_name= $academic_info->father_name;
        $user->mother_name= $request->mother_name;
        $user->image= $request->image;
        $user->address= $request->address;
        $user->division= $request->division;
        $user->email= $request->email;
        $user->password= bycrpt('123456');
        $user->phone= $request->phone;
        $user->code= $request->code;
        $user->gst_roll= $gst_info->gst_roll;
        $user->gst_unit= $gst_info->gst_unit;
        $user->gst_position= $gst_info->gst_position;
        $user->hsc_roll= $gst_info->hsc_roll;
        $user->has_unit_change= $request->has_unit_change;


    }
}
