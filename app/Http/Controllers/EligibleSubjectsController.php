<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Arr;
    use App\designPattern\Mathematics;
    use App\designPattern\Chemistry;
    use App\designPattern\Physics;
    use App\designPattern\Geology_and_Mining;
    use App\designPattern\Computer_Science_and_Engineering;
    use App\designPattern\Statistics;
    use App\designPattern\SES;
    use App\designPattern\Botany;
    use App\designPattern\CSDM;
    use App\designPattern\BB;

    class EligibleSubjectsController extends Controller
    {
        public function yourLuck(Request $r)
        {
            //validations start
            $validator = Validator::make($r->all(),[
                'hsc_mathematics_subj' => 'required|boolean',
                'hsc_biology_subj' => 'required|boolean',
                'admission_mathematics_marks' => 'required|numeric',
                'admission_physics_marks' => 'required|numeric',
                'admission_chemistry_marks' => 'required|numeric',
                'admission_biology_marks' => 'required|numeric',
            ]);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors(), 422);
            }
            //validations end
            //instance create start
            $m= new Mathematics();
            $c= new Chemistry();
            $p= new Physics();
            $gm= new Geology_and_Mining();
            $cse= new Computer_Science_and_Engineering();
            $s= new Statistics();
            $ses= new SES();
            $b= new Botany();
            $csdm= new CSDM();
            $bb= new BB();
            //instance create end

            //chain dp start
            $m->yourNextStoppage($c);

            $c->yourNextStoppage($p);
            $p->yourNextStoppage($gm);
            $gm->yourNextStoppage($cse);
            $cse->yourNextStoppage($s);
            $s->yourNextStoppage($ses);
            $ses->yourNextStoppage($b);
            $b->yourNextStoppage($csdm);
            $csdm->yourNextStoppage($bb);

            $m->process($r); //it goes to the Request portion
            //chain dp end

            //not eligible for any subject
            if(count($r['subj'])==0)
            {
                return response()->json(['message' => "Whoops!!! you are not eligible for any subject."], 200);
            }

            //eligible for any subject
            return response()->json([
                'message' => "Your eligible subject(s) for 'A' unit of University of Barishal.",
                'subj' => $r['subj'],
            ], 200);
        }
    }
