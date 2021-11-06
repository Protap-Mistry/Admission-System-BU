<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    }
}
