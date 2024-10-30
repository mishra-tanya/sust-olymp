<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QuestionPaper;

class TestSeriesController extends Controller
{
    protected $classSeriesData = [
       
        'class_4-5' => [
            ['name' => 'TEST SERIES 1', 'status' => 'ATTEMPTED', 'url' => 'test-series/class_4-5/test1'],
            ['name' => 'TEST SERIES 2', 'status' => 'ATTEMPTED', 'url' => 'test-series/class_4-5/test2'],
            ['name' => 'TEST SERIES 3', 'status' => 'ATTEMPTED', 'url' => 'test-series/class_4-5/test3'],
        ],
        'class_6-8' => [
            ['name' => 'TEST SERIES 4', 'status' => 'NOT ATTEMPTED', 'url' => 'test-series/class_6-8/test1'],
            ['name' => 'TEST SERIES 5', 'status' => 'ATTEMPTED', 'url' => 'test-series/class_6-8/test2'],
            ['name' => 'TEST SERIES 6', 'status' => 'NOT ATTEMPTED', 'url' => 'test-series/class_6-8/test3'],
        ],
        'class_9-10' => [
            ['name' => 'TEST SERIES 7', 'status' => 'NOT ATTEMPTED', 'url' => 'test-series/class_9-10/test1'],
            ['name' => 'TEST SERIES 8', 'status' => 'ATTEMPTED', 'url' => 'test-series/class_9-10/test2'],
            ['name' => 'TEST SERIES 9', 'status' => 'NOT ATTEMPTED', 'url' => 'test-series/class_9-10/test3'],
        ],
        'class_11-12' => [
            ['name' => 'TEST SERIES 10', 'status' => 'NOT ATTEMPTED', 'url' => 'test-series/class_9-10/test1'],
            ['name' => 'TEST SERIES 11', 'status' => 'ATTEMPTED', 'url' => 'test-series/class_9-10/test2'],
            ['name' => 'TEST SERIES 12', 'status' => 'NOT ATTEMPTED', 'url' => 'test-series/class_9-10/test3'],
        ],
    ];

    public function show($classSlug)
    {
        if (!array_key_exists($classSlug, $this->classSeriesData)) {
            abort(404); 
        }

        $classData = $this->classSeriesData[$classSlug];
        return view('series.test-series', compact('classData', 'classSlug'));
    }

    public function questions($class, $test)
    {
        $questions = QuestionPaper::where('chapter_id', $class)
            ->where('test', $test)
            ->get();

            // dd($questions);
        return view('series.questions', compact('questions', 'class', 'test'));
    }
}
