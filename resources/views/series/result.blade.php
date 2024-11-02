<!-- resources/views/results/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Results</title>
</head>
<body>
    <h1>Your Test Results</h1>
    <p>Total Questions: {{ $resultData['totalQuestions'] }}</p>
    <p>Correct Answers: {{ $resultData['score'] }}</p>
    <p>Percentage: {{ number_format($resultData['percentage'], 2) }}%</p>

    @if($resultData['percentage'] >= 50)
        <p style="color: green;">Congratulations! You passed!</p>
    @else
        <p style="color: red;">Unfortunately, you did not pass.</p>
    @endif
</body>
</html>
