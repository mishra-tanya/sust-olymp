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
        .grid-item button {
            width: 150px;
            height: 50px;
            background: black;
            color: white;
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
        
    </style>
</head>
<body>

    <!-- Navbar -->
   @include('navbar')

    <!-- Main content -->
    <br><br>
    <br>
    <div class="container">
        <h1 class="title">Olympiad For</h1>
        <h1 class="title">{{ ucfirst(str_replace('-', ' ', $classSlug)) }} Test Series</h1>
        <hr>

        <!-- Grid for class series -->
        <div class="grid-container">
            @foreach($classData as $class)
                <div class="grid-item">
                    <a href="{{ url($class['url']) }}">
                        <p class="mb-4">{{ $class['name'] }}</p>
                        <button>{{ $class['status'] }}</button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
<br>@include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
