<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TestModel;

class ResultController extends Controller
{
    public function showResults($class_id, $test_id)
    {
        $userTest = TestModel::where('class_id', $class_id)
            ->where('test_id', $test_id)
            ->where('status', 'completed') 
            ->first();
// dd($userTest);
        if (!$userTest) {
            echo "hi";
            return view('results.no_result'); 
        }

        $results = json_decode($userTest->results, true); 
        $score = 0;
        $totalQuestions = 50;

        foreach ($results as $result) {
            if (strtolower($result['user_answer']) === strtolower($result['correct_answer'])) {
                $score++;
            }
        }

        $resultData = [
            'score' => $score,
            'totalQuestions' => $totalQuestions,
            'percentage' => ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0,
        ];

        return view('series.result', compact('resultData'));
    }
}
