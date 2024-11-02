<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCR Test Series </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
        .quiz-container body {
            background-color: #f5f5f5;

        }

        .quiz-container {
            background-color: #fff;
            padding: 20px;
            font-size: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }

        .quiz-container .question-number-list {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-bottom: 30px;

        }

        input[type="radio"] {
            width: 16px;
            height: 16px;
        }

        .quiz-container .question-number-list li {
            margin: 0 10px;
        }

        .question-number-list {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-bottom: 20px;
        }

        .question-number-list li {
            margin: 0 5px;
        }

        .question-number-list button {
            padding: 10px;
            border: none;
            border-radius: 10%;
            width: 40px;
            height: 40px;
            background-color: #a9adb0;
            color: #fff;
            cursor: pointer;
            border: 2px rgb(211, 211, 211) dotted;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .question-number-list button.active {
            background-color: #28A745;
        }

        .question-number-list button.reviewed {
            background-color: #826201 !important;
        }

        .quiz-container .question {
            margin-bottom: 20px;
        }

        .quiz-container .options {
            display: grid;
            gap: 10px;
        }

        .quiz-container .options button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .quiz-container .options button:hover {
            background-color: #e9e9e9;
        }

        .quiz-container .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .quiz-container .navigation button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .quiz-container .navigation button:hover {
            background-color: #0056b3;
        }

        .quiz-container .question-number-list {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-bottom: 30px;
            overflow-x: auto;
            flex-wrap: wrap;
            /* margin: 30px; */
        }

        .button {
            width: 220px;
            height: 50px;
            border: 2px rgb(211, 211, 211) dotted;
            border-radius: 5px;
        }

        .mark-review-btn {
            color: white;
            background-color: #826201;
        }

        #submit_test {
            background-color: #28A745;
            color: white;
        }

        #next {
            background-color: #0056b3;
            color: white;
        }


        @media screen and (max-width: 768px) {
            .quiz-container .question-number-list {
                list-style: none;
                display: flex;
                justify-content: center;
                padding: 0;
                margin-bottom: 30px;
                overflow-x: auto;
                flex-wrap: wrap;
            }

            .quiz-container .question-number-list li {
                width: 50px;
                margin: 5px;
            }

            .mark-review-btn {
                font-size: 18px;
                max-width:195px;
            }

            #submit_test {
                font-size: 18px;
                max-width: 124px;
                margin-bottom: 22px;
            }

            #next {
                font-size: 18px;
                max-width: 155px;
            }

        }

        .loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .spinner {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 4px solid #f3f3f3;
    border-radius: 50%;
    border-top: 4px solid #0f974c;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
}

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .question-number-list button.answered {
            background-color: darkgreen;
           /* border-radius: 50%; */
           padding: 10px;
        }

        /* Responsive adjustments for smaller screens */
        @media screen and (max-width: 600px) {
            .spinner {
                width: 60px;
                height: 60px;
                border-width: 8px;
            }
        }



    </style>
    @include('navbar')
   
    <br><br>

    {{-- <form action={{ route('submitquiz') }} method="post"> --}}
        {{-- @csrf --}}
        <div class="quiz-container">
            <style>
                #timer {
                    font-size: 24px;
                    margin: 20px 0;
                }
            </style>
       

            <div class="ch text-center" style="font-size: 2px;">
                <br>
                @php
                    $classname="";
                    if ($class=="class_4-5") {
                            $classname="Class 4-5";
                    }
                    else if ($class=="class_6-8") {
                        $classname="Class 6-8";
                    }
                    else if ($class=="class_9-10") {
                        $classname="Class 9-10";
                    }
                    else if ($class=="class_11-12") {
                        $classname="Class 11-12";
                    }

                    $testname="";
                    if($test=="test1"){
                        $testname="Test 1";
                    }
                    else if($test=="test2"){
                        $testname="Test 2";
                    }
                    else if($test=="test3"){
                        $testname="Test 3";
                    }
                         
                @endphp
                <h2><b>{{ $classname }} </b>| <b>{{ $testname }}</b></h2>
        <div id="timer">Timer: 1:00:00</div>

                <div class="loader" id="loader">
                    <div class="spinner"></div>
                </div>
              
            </div>
    <hr
                style=" border: 3px solid #2487ce;
            border-radius: 100%;
            border-top: 1px dotted #000000;">
           <ul class="question-number-list">
            <style>
                .answered {
                    color: black; 
                }
            </style>
            
            @foreach ($questions ?? [] as $key => $question)
                <li>
                    <button class="my-2 {{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }}" 
                            data-index="{{ $key }}" 
                            onclick="showQuestion({{ $key }})">
                        {{ $key + 1 }}
                    </button>
                </li>
            @endforeach
        </ul>
        
        <hr style="border: 3px solid #2487ce; border-radius: 100%; border-top: 1px dotted #000000;">
        <br>
        <div style="display: flex; justify-content: end;" class="mb-3">
            <button onclick="submitForm()" type="submit" class="button mx-2 {{ session('existingResult') ? 'disabled' : '' }}" id="submit_test">
                Submit Test
            </button>
        </div>
        
        <div class="question">
            @foreach ($questions ?? [] as $key => $question)
                <div class="question-block{{ $key === 0 ? ' active' : '' }}" id="question-{{ $question->id }}">
                    <h3><b>Question {{ $key + 1 }}.</b></h3>
                    <h4><b>{!! nl2br(e($question->question_title)) !!}</b></h4>
                    <hr>
                    <label><b>A. </b>
                        <input type="radio" id="question-{{ $question->id }}-a" name="results[{{ $question->id }}][user_answer]" value="a">
                        {{ $question->option_a }}
                    </label>
                    <hr>
                    <label><b>B. </b>
                        <input type="radio" id="question-{{ $question->id }}-b" name="results[{{ $question->id }}][user_answer]" value="b">
                        {{ $question->option_b }}
                    </label>
                    <hr>
                    <label><b>C. </b>
                        <input type="radio" id="question-{{ $question->id }}-c" name="results[{{ $question->id }}][user_answer]" value="c">
                        {{ $question->option_c }}
                    </label>
                    <hr>
                    <label><b>D. </b>
                        <input type="radio" id="question-{{ $question->id }}-d" name="results[{{ $question->id }}][user_answer]" value="d">
                        {{ $question->option_d }}
                    </label>
                    <input type="hidden" name="results[{{ $key }}][question_id]" value="{{ $question->id }}">
                    <input type="hidden" name="results[{{ $key }}][result_ans]" value="{{ $question->result_ans }}">
                    <hr><br><br>
                    <div class="marks">
                        <button class="mx-2 mark-review-btn button" data-index="{{ $key }}" onclick="toggleCheckbox(this)">
                            <input type="hidden" class="checkbox">
                            <span class="button-text">Mark for Review</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        


            {{-- {{ $existingResult ? 'Already Submitted' : 'Submit Test' }} --}}

            <div style="display: flex; justify-content: end;">
                {{-- <button id="previous">Previous</button> --}}

                <button id="next" class="button mx-2"
                    style="
                    position: relative;
                    top: -70px;">Save and Next</button>
            </div>


        </div>
    {{-- </form> --}}
    <script>
           
           async function loadSavedResponses(classId, testId) {
    try {
        // Fetch saved responses from the server
        const response = await fetch(`/get-saved-responses/${classId}/${testId}`);
        const data = await response.json();

        // Check if there are any saved responses
        if (data.savedResponses && data.savedResponses.length > 0) {
            data.savedResponses.forEach(response => {
                const questionId = response.question_id;
                const userAnswer = response.user_answer;
                console.log(questionId+" "+userAnswer)
                if (userAnswer) {
                    // Find the radio input by questionId and userAnswer
                    const radioInput = document.querySelector(`#question-${questionId}-${userAnswer}`);
                    console.log(radioInput)
                    if (radioInput) {
                        radioInput.checked = true;  // Set it as checked
                    }
                }
            });
        }
    } catch (error) {
        console.error('Error fetching saved responses:', error);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const fullUrl = window.location.href;
    const urlParts = fullUrl.split('/');
    const classId = urlParts[urlParts.length - 2];
    const testId = urlParts[urlParts.length - 1];

    loadSavedResponses(classId, testId);
});

            async function saveResponse(questionId, userAnswer, correctAnswer,classId,testId) {
                console.log(questionId+" "+userAnswer+" "+correctAnswer+" "+classId)
    try {
        const response = await fetch('/save-response', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ question_id: questionId, user_answer: userAnswer, correct_answer: correctAnswer,
                class_id:classId, test_id:testId
             })
        }) 
         .then(response => response.json())
    .then(data => {
        if (data.message === 'Test already submitted. No further responses can be added.') {
            alert(data.message); 
        } else {
            console.log(data.message); 
        }
    });
        console.log("first")
        if (!response.ok) throw new Error('Network response was not ok');

        const data = await response.json();
        console.log(data.message);
        markQuestionAnswered(questionId);
        showNextQuestion();
        loadSavedResponses(classId, testId);
    } catch (error) {
        console.error('Error:', error);
        alert("There was an error saving your answer. Please try again.");
    }
}
let currentQuestionIndex = 0; 
function showQuestion(index) {
    const questionBlocks = document.querySelectorAll('.question-block');

    if (currentQuestionIndex >= 0 && currentQuestionIndex < questionBlocks.length) {
        questionBlocks[currentQuestionIndex].classList.remove('active');
    }

    currentQuestionIndex = index;

    if (currentQuestionIndex >= 0 && currentQuestionIndex < questionBlocks.length) {
        questionBlocks[currentQuestionIndex].classList.add('active');

        document.querySelectorAll('.question-selection button').forEach((button, idx) => {
            if (idx === currentQuestionIndex) {
                button.classList.add('active');  
            } else {
                button.classList.remove('active');  
            }
        });
    } else {
        alert("You have reached the end of the questions.");
    }
}

function showNextQuestion() {
    if (currentQuestionIndex + 1 < document.querySelectorAll('.question-block').length) {
        showQuestion(currentQuestionIndex + 1);
        const fullUrl = window.location.href;
    const urlParts = fullUrl.split('/');
    const classId = urlParts[urlParts.length - 2];
    const testId = urlParts[urlParts.length - 1];

        loadSavedResponses(classId, testId);
    } else {
        alert("You have reached the end of the questions.");
    }
}

function showPreviousQuestion() {
    if (currentQuestionIndex - 1 >= 0) {
        showQuestion(currentQuestionIndex - 1);
    } else {
        alert("You are at the first question.");
    }
}

function showRandomQuestion() {
    const totalQuestions = document.querySelectorAll('.question-block').length;
    const randomIndex = Math.floor(Math.random() * totalQuestions);
    showQuestion(randomIndex);
}

function markQuestionAnswered(questionId) {
    const questionButton = document.querySelector(`[data-index="${questionId}"]`);
    if (questionButton) {
        questionButton.classList.add('answered'); 
    }
}
        
        document.getElementById('next').addEventListener('click', async function(event) {
            event.preventDefault();
                        
            const fullUrl = window.location.href;
            const urlParts = fullUrl.split('/');
            const classId = urlParts[urlParts.length - 2];
            const testId = urlParts[urlParts.length - 1]; 

            const questionBlock = document.querySelector('.question-block.active');
            const questionId = questionBlock.querySelector('input[name^="results"][name$="[question_id]"]').value;
            const correctAnswer = questionBlock.querySelector('input[name^="results"][name$="[result_ans]"]').value;
            const userAnswer = questionBlock.querySelector('input[name^="results"][name$="[user_answer]"]:checked')
                              ? questionBlock.querySelector('input[name^="results"][name$="[user_answer]"]:checked').value : '';
        
                            console.log(questionBlock)
            this.disabled = true; 
        
            await saveResponse(questionId, userAnswer, correctAnswer,classId,testId);
            
            this.disabled = false; 
        });
        
        document.getElementById('submit_test').addEventListener('click', async function(event) {
            event.preventDefault();
                        
                        const fullUrl = window.location.href;
                        const urlParts = fullUrl.split('/');
                        const classId = urlParts[urlParts.length - 2];
                        const testId = urlParts[urlParts.length - 1]; 
                        console.log(classId+" "+testId+"fre")
            try {
                const response = await fetch('/submit-test', {
                    method: 'POST',
                    headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                class_id: classId,
                test_id: testId
            })
                });
        
                if (!response.ok) throw new Error('Network response was not ok');
                
                const data = await response.json();
                alert("Test submitted successfully!");
                window.location.href = `/result/${classId}/${testId}`;
            } catch (error) {
                console.error('Error:', error);
            }
        });

     
        </script>
        
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.question-block');
            const questionButtons = document.querySelectorAll('.question-number-list button');
            const nextButton = document.getElementById('next');
            const submit_test = document.getElementById('submit_test');
            let currentQuestionIndex = 0;

            function showQuestion(index) {
                questions.forEach(question => {
                    question.style.display = 'none';
                });
                questions[index].style.display = 'block';
                currentQuestionIndex = index;
                updateQuestionNumberButtonColors();
                updateNavigationButtons();
            }

            function updateQuestionNumberButtonColors() {
                questionButtons.forEach((button, index) => {
                    button.classList.remove('active');
                    button.classList.remove('reviewed');
                    if (index === currentQuestionIndex) {
                        button.classList.add('active');
                    } else if (questions[index].classList.contains('reviewed')) {
                        button.classList.add('reviewed');
                    }
                });
            }


            function updateNavigationButtons() {
                if (currentQuestionIndex === questions.length ) {
                    nextButton.style.display = 'none';
                    // submit_test.style.display='block';
                } else {
                    nextButton.textContent = 'Save and Next';
                    nextButton.style.display = 'block';
                    // submit_test.style.display='none';
                }
            }

            showQuestion(currentQuestionIndex);

            questionButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    event.preventDefault();
                    showQuestion(index);
                });
            });

            // document.getElementById('previous').addEventListener('click', () => {
            //     if (currentQuestionIndex > 0) {
            //         showQuestion(currentQuestionIndex - 1);
            //     }
            // });

            nextButton.addEventListener('click', () => {
                event.preventDefault();
                if (currentQuestionIndex < questions.length - 1) {
                    showQuestion(currentQuestionIndex + 1);
                } else {
                    console.log('Submitting...');
                }
            });

            document.querySelectorAll('.mark-review-btn').forEach(button => {
                button.addEventListener('click', () => {
                    event.preventDefault();
                    button.classList.toggle('reviewed');
                    questions[currentQuestionIndex].classList.toggle('reviewed');
                    updateQuestionNumberButtonColors();
                });
            });

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const questionIndex = parseInt(this.id.split('-')[1]);
                    questionButtons[questionIndex].classList.add('answered');
                    updateQuestionNumberButtonColors();
                });
            });

        });

        function toggleCheckbox(button) {
            var checkbox = button.querySelector('.checkbox');
            var buttonText = button.querySelector('.button-text');
            checkbox.value = checkbox.value === "1" ? "0" : "1";

            if (checkbox.value === "1") {
                buttonText.innerText = 'Remove from Review';
            } else {
                buttonText.innerText = 'Mark for Review';
            }
        }
    </script>
    <script>
      
        function submitForm() {
            document.getElementById('loader').style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loader').style.display = 'none';
        });
    </script>
<script>

const timerElement = document.getElementById('timer');
const totalTime = 3600; 
let remainingTime;
let timerInterval;

const userId = @json(auth()->id());

function getTimerKey() {
    return `timer_${userId}_${window.location.pathname}`;
}

function startTimer() {
    const timerKey = getTimerKey();
    const savedTime = localStorage.getItem(timerKey);

    remainingTime = savedTime ? parseInt(savedTime) : totalTime;

    updateTimerDisplay();

    timerInterval = setInterval(() => {
        remainingTime--;

        localStorage.setItem(timerKey, remainingTime);

        if (remainingTime <= 0) {
            clearInterval(timerInterval);
            submitTest();
        } else {
            updateTimerDisplay();
        }
    }, 1000);
}

function updateTimerDisplay() {
    const hours = Math.floor(remainingTime / 3600);
    const minutes = Math.floor((remainingTime % 3600) / 60);
    const seconds = remainingTime % 60;

    timerElement.textContent = `Timer: ${hours}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}
function getTestIdAndClassId() {
    const fullUrl = window.location.href;
    const urlParts = fullUrl.split('/');
    const classId = urlParts[urlParts.length - 2];
    const testId = urlParts[urlParts.length - 1]; 
    // console.log(testId,classId)s
    return { testId, classId };
}
function submitTest() {
    clearInterval(timerInterval);
    alert("Time's up! Submitting the test.");

    localStorage.removeItem(getTimerKey());
    const { testId, classId } = getTestIdAndClassId();

    const theData = {
        test_id: testId,
        class_id: classId,
    };

    fetch('/submit-test', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token for Laravel
        },
        body: JSON.stringify(theData)
    })
    .then(response => {
        if (response.ok) {
            return response.json(); 
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        console.log(data);
        alert("Test submitted successfully!");
    })
    .catch(error => {
        console.error('There was a problem with the submission:', error);
        alert("Failed to submit the test.");
    });
}

window.onload = startTimer;

window.onbeforeunload = function () {
    if (remainingTime > 0) {
        localStorage.setItem(getTimerKey(), remainingTime);
    } else {
        localStorage.removeItem(getTimerKey());
    }
};

</script>
</body>

</html>