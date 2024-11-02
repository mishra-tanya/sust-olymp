<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympiad Series</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            text-align: center;
            margin-top: 30px;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
            align-content: center;
            justify-items: center; 
        }
        .grid-item {
            text-align: center;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column; 
            justify-content: center; 
            align-items: center;
            min-height: 250px; 
        }
        .grid-item img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .grid-item p {
            margin-top: 10px;
            font-size: 1rem;
            font-weight: 500;
        }
        .grid-item a {
            text-decoration: none;
            color: inherit;
        }
        .grid-item:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 576px) {
            .grid-container {
                grid-template-columns: 1fr; 
            }
        }

        .grid-container {
            grid-template-rows: auto; 
        }
        .grid-container > :nth-last-child(1) {
            grid-column: 2; 
        }
        .wave {
    font-size: 1.5rem; /* Adjust the size as needed */
    display: inline-block;
    transform-origin: 70% 70%; /* Adjust pivot point for realistic waving */
    transition: transform 0.3s; /* Smooth zoom-out transition */
    animation: wave 2s ease-in-out ; /* Animation for the initial wave on page load */
}

@keyframes wave {
    0% { transform: rotate(0deg); }
    10% { transform: rotate(14deg); }
    20% { transform: rotate(-8deg); }
    30% { transform: rotate(14deg); }
    40% { transform: rotate(-4deg); }
    50% { transform: rotate(10deg); }
    60% { transform: rotate(0deg); }
    100% { transform: rotate(0deg); }
}

/* Animation on hover */
.wave:hover {
    transform: scale(1.2) rotate(12deg); /* Slightly zoom out and rotate */
}

    </style>
</head>
<body>

    <!-- Navbar -->
   @include('navbar')

    <!-- Main content -->
    <br><br>
    <br>
    <div class="container">
        <p><div class="wave">👋</div>
            Hi, <b>{{Auth::user()->name}}</b></p>
        <h1 class="title">Here's Olympiad Series <br>
            For Various Classes</h1>
        <hr><br>
        <!-- Grid for class series -->
        <div class="grid-container">
            @php
                $classData = [
                    ['name' => 'FOR CLASS 4-5', 'image' => 'assets/img/event-gallery/event-gallery-2.jpg', 'url' => 'olympiad/class_4-5'],
                    ['name' => 'FOR CLASS 6-8', 'image' => 'assets/img/event-gallery/event-gallery-3.jpg', 'url' => 'olympiad/class_6-8'],
                    ['name' => 'FOR CLASS 9-10', 'image' => 'assets/img/event-gallery/event-gallery-4.jpg', 'url' => 'olympiad/class_9-10'],
                    ['name' => 'FOR CLASS 11-12', 'image' => 'assets/img/event-gallery/event-gallery-5.jpg', 'url' => 'olympiad/class_11-12'],
                ];
            @endphp

            @foreach($classData as $class)
                <div class="grid-item">
                    <a href="{{ url($class['url']) }}">
                        <img src="{{ asset($class['image']) }}" alt="{{ $class['name'] }}">
                        <p>{{ $class['name'] }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
<br>@include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
