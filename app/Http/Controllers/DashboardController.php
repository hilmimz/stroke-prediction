<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MeanSumm0Model;
use App\Models\MeanSumm1Model;
use App\Models\StdSumm0Model;
use App\Models\StdSumm1Model;

class DashboardController extends Controller
{
    public function index(Request $request){
        $mean0 = MeanSumm0Model::all()->toArray();
        $mean1 = MeanSumm1Model::all()->toArray();
        $std0 = StdSumm0Model::all()->toArray();
        $std1 = StdSumm1Model::all()->toArray();
        
        //request
        $age = $request->get('age');
        $hypertension = $request->get('hypertension');
        $heart_disease = $request->get('heart_disease');
        $avg_glucose_level = $request->get('avg_glucose_level');
        $bmi = $request->get('bmi');
        // $result = null;

        //calculate class 0
        $age0 = $this->gaussianPDF($mean0[0]['age'], $std0[0]['age'], $age);
        $hypertension0 = $this->gaussianPDF($mean0[0]['hypertension'], $std0[0]['hypertension'], $hypertension);
        $heart_disease0 = $this->gaussianPDF($mean0[0]['heart_disease'], $std0[0]['heart_disease'], $heart_disease);
        $avg_glucose_level0 = $this->gaussianPDF($mean0[0]['avg_glucose_level'], $std0[0]['avg_glucose_level'], $avg_glucose_level);
        $bmi0 = $this->gaussianPDF($mean0[0]['bmi'], $std0[0]['bmi'], $bmi);
        $class0 = $age0*$hypertension0*$heart_disease0*$avg_glucose_level0*$bmi0;

        //calculate class 1
        $age1 = $this->gaussianPDF($mean1[0]['age'], $std1[0]['age'], $age);
        $hypertension1 = $this->gaussianPDF($mean1[0]['hypertension'], $std1[0]['hypertension'], $hypertension);
        $heart_disease1 = $this->gaussianPDF($mean1[0]['heart_disease'], $std1[0]['heart_disease'], $heart_disease);
        $avg_glucose_level1 = $this->gaussianPDF($mean1[0]['avg_glucose_level'], $std1[0]['avg_glucose_level'], $avg_glucose_level);
        $bmi1 = $this->gaussianPDF($mean1[0]['bmi'], $std1[0]['bmi'], $bmi);
        $class1 = $age1*$hypertension1*$heart_disease1*$avg_glucose_level1*$bmi1;

        $result = $this->compare($class0, $class1);
        return view('dashboard',compact([
            'result',
            'age',
            'hypertension',
            'heart_disease',
            'avg_glucose_level',
            'bmi',
            'age0',
            'hypertension0',
            'heart_disease0',
            'avg_glucose_level0',
            'bmi0',
            'age1',
            'hypertension1',
            'heart_disease1',
            'avg_glucose_level1',
            'bmi1',
            'class0',
            'class1'
        ]));
    }

    public function reset(Request $request){
        $request->session()->flush();
        $request()->request->remove('age',
        'hypertension',
        'heart_disease',
        'avg_glucose_level',
        'bmi',);
        return redirect('/');
    }
    
    public function gaussianPDF($mean, $std, $x){
        $pi = pi();
        $exponent = exp(-(pow($x-$mean,2)/(2*pow($std,2))));
        $result = (1/(sqrt(2*$pi)*$std)*$exponent);
        return $result;
    }

    public function compare($val0, $val1){
        if ($val0 > $val1) {
            return 0;
        } else {
            return 1;
        }
    }
    
}
