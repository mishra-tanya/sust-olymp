<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TestModel;

class TestController extends Controller
{
    public function saveResponse(Request $request)
{
    $data = $request->validate([
        'question_id' => 'required|integer',
        'user_answer' => 'nullable|string',
        'correct_answer' => 'required|string',
        'test_id'=>'required|string',
        'class_id'=>'required|string'
    ]);
    $data['user_answer'] = $data['user_answer'] ?? '';

    $answerData = [
        'question_id' => $data['question_id'],
        'user_answer' => $data['user_answer'],
        'correct_answer' => $data['correct_answer'],
    ];

    $record = TestModel::where('user_id', auth()->id())
    ->where('test_id', $data['test_id'])
    ->where('class_id', $data['class_id'])
    ->first();

if ($record && $record->status === 'completed') {
    return response()->json(['message' => 'Test already submitted. No further responses can be added.']);
}

    if ($record && $record->status === 'attempted') {
        $results = json_decode($record->results, true) ?? [];

        $found = false;
        foreach ($results as &$result) {
            if ($result['question_id'] === $data['question_id']) {
                $result['user_answer'] = $data['user_answer'];
                $result['correct_answer'] = $data['correct_answer'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $results[] = $answerData;
        }

        $record->update(['results' => json_encode($results)]);
    } else {
        TestModel::create([
            'user_id' => auth()->id(),
            'test_id' => $data['test_id'],
            'class_id'=>$data['class_id'],
            'status' => 'attempted',
            'results' => json_encode([$answerData]),
        ]);
    }

    return response()->json(['message' => 'Saved successfully']);
}

    
public function getSavedResponses(Request $request, $class_id, $test_id)
{
    $record = TestModel::where('user_id', auth()->id())
        ->where('class_id', $class_id)
        ->where('test_id', $test_id)
        ->where('status', 'attempted')
        ->first();

    if ($record) {
        $savedResponses = json_decode($record->results, true);
        return response()->json(['savedResponses' => $savedResponses]);
    }

    return response()->json(['savedResponses' => []]);
}

    
        public function submitTest(Request $request)
        {
            $data = $request->validate([
                'test_id'=>'required|string',
                'class_id'=>'required|string'
            ]);
            TestModel::where('user_id', auth()->id())
                ->where('test_id', $data['test_id']) 
                ->where('class_id',$data['class_id'])
                ->update(['status' => 'completed']);
        
            return response()->json(['message' => 'Test submitted successfully']);
        }
        
}
