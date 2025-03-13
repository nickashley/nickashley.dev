<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5x5 Slide Puzzle with Rows to Solve</title>
    <link rel="stylesheet" href="styles.css">
    @vite(['resources/css/tetrashift.css', 'resources/js/tetrashift.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">

</head>
<body>
<div id="instructions-modal" class="modal fixed z-10 inset-0 h-full w-full">
    <div class="modal-content">
        <h2 class="text-2xl border-b">How to Play</h2>
        <p>Move the puzzle pieces to match the 'goal row'. Goal can be anywhere in the puzzle.</p>
        <p>Click on tiles to move them. Tiles can move horizontally or vertically towards the empty space.</p>
        <p>You have 2 minutes to clear 8 goals. Good luck!</p>
        <button id="start-button" class="px-3 py-2 border rounded bg-gray-100">Start</button>
    </div>
</div>

<!-- Results Modal -->
<div id="results-modal" class="modal fixed z-10 inset-0 h-full w-full hidden">
    <div class="modal-content">
        <p id="game-result"></p>

        <h3>Game Statistics</h3>
        <p id="games-played"></p>
        <p id="win-streak"></p>
        <ul id="row-achievements"></ul>

        <button id="play-again-button">Play Again</button>
    </div>
</div>

<div class="container mx-auto max-w-sm">
    <div class="honk text-center text-5xl mt-10">TETRASHIFT</div>
    <div class="flex justify-between my-10">
        <div class="bg-gray-100 p-3 rounded-xl">Score: <span id="score"></span></div>
        <div class="bg-gray-100 p-3 rounded-xl" id="timer">Time Remaining: 120s</div>
    </div>

    <div class="flex justify-center mb-10 ">
        <div id="rows-container" class="border">
        </div>
    </div>

    <div id="puzzle-container" class="grid grid-cols-5 aspect-square gap-2 max-w-[400px]">
    </div>
</div>
@vite('resources/css/app.css')
<script src="/.js"></script>
</body>
</html>
