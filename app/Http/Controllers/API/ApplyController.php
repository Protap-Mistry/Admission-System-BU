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
            'gst_unit' => 'required',
            'hsc_roll' => 'required|digits:6|integer',
            'hsc_board' => 'required',
            'hsc_passing_year' => 'required|digits:4|integer',
        ]);
        if ($validator->fails()) 
        {
            return response()->json($validator->errors(), 422); //unprocessable entity code (semantic errors)
        }
        //validations end

        //  $rules= [
        //          'gst_roll' => 'required',
        //         'gst_unit' => 'required',
        //         'hsc_roll' => 'required|digits:6|integer',
        //         'hsc_board' => 'required',
        //         'hsc_passing_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
        //     ];
        //     $customMessages= [
        //         'gst_roll.required' => 'GST roll is required',
        //         'gst_unit.required' => 'GST unit is required',
        //         'hsc_roll.digits' => '',
        //         'hsc_roll.required' => 'HSC roll is required',
        //         'hsc_board.required' => 'HSC board already exist',
        //         'hsc_passing_year.required' => 'HSC passing year is required'
        //     ];    

            // $academic_info= DB::table('academic_infos')->where('hsc_roll', $request->hsc_roll)
            //                                         ->where('hsc_board', $request->hsc_board)
            //                                         ->where('hsc_passing_year', $request->hsc_passing_year)->first();

            // $gst_info= DB::table('gst_infos')->where('gst_roll', $request->gst_roll)->where('gst_unit', $request->gst_unit)->first();

            // $validator= Validator::make($academic_info, $gst_info, $rules, $customMessages);

            // if($validator->fails())
            // {
            //     return response()->json($validator->errors(), 422); //422 is the unprocessable entity code when validation failed
            // }
        
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

        $gst_info= DB::table('gst_infos')->where('gst_roll', $request->gst_roll)->where('gst_unit', $request->gst_unit)->first();
        if(empty($gst_info))
        {
            return response()->json([
                'message' => "Whoops!!! Your GST info not matched.",
                'gst_info' => $request['gst_info'],
            ], 422);
        }



        $subjects= new EligibleSubjects();

        $eligible_subjects= $subjects->checker($gst_info,$academic_info, $unit_chng);
        return response()->json([
            'Data' => $eligible_subjects,
        ]);
         //not eligible for any subject
        if(count($request['subj'])==null)
        {
            return response()->json(['message' => "Whoops!!! you are not eligible for any subject."], 200); //'OK' code
        }

        //eligible for any subject
        return response()->json([
            'message' => "Your eligible subject(s) for University of Barishal are listed below: ",
            'subj' => $request['subj'],
        ], 200);

    }
}
