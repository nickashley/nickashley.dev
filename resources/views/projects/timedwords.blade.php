<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>TimedWords</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
</head>
<body class="relative" x-data="{}">
<div class="sticky top-0 w-full border-b border-orange-600 py-3 bg-white">
    <div class="max-w-5xl mx-auto flex justify-between items-center px-3">
        <h1 class="text-4xl font-semibold text-center"><span class="text-orange-600 font-extrabold">Timed</span>Words</h1>
        <div class="flex space-x-2">
            <h2 class="guesses font-semibold text-xl bg-gray-500 text-white p-2 m-1 rounded-lg">
                Guesses: <span x-text="$store.game.guesses - $store.game.currentAttempt"></span>
            </h2>
            <h2 class="score font-semibold text-xl bg-orange-500 text-white p-2 m-1 rounded-lg">
                Score:  <span x-text="$store.game.points"></span>
            </h2>

        </div>
    </div>
</div>
<div id="game-board" class="pt-3 max-w-5xl mx-auto h-108 overflow-scroll pb-80" x-data="{}">
    <template x-for="i in $store.game.guesses">
        <div class="letter-row flex justify-center">
            <div class="letter-box p-2 m-1 border-2 rounded border-gray-400 h-16 w-16 flex items-center justify-center uppercase text-xl font-semibold"></div>
            <div class="letter-box p-2 m-1 border-2 rounded border-gray-400 h-16 w-16 flex items-center justify-center uppercase text-xl font-semibold"></div>
            <div class="letter-box p-2 m-1 border-2 rounded border-gray-400 h-16 w-16 flex items-center justify-center uppercase text-xl font-semibold"></div>
            <div class="letter-box p-2 m-1 border-2 rounded border-gray-400 h-16 w-16 flex items-center justify-center uppercase text-xl font-semibold"></div>
            <div class="letter-box p-2 m-1 border-2 rounded border-gray-400 h-16 w-16 flex items-center justify-center uppercase text-xl font-semibold"></div>
        </div>
    </template>

</div>
<div class="fixed inset-x-0 bottom-0">
    <div class="bg-white bg-orange-50 bg-gradient-to-t from-orange-50 to-white">
        <div id="keyboard-cont" class="mx-auto max-w-5xl py-2 space-y-2">
            <div class="flex justify-center space-x-1 sm:space-x-2 px-1">
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">q</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">w</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">e</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">r</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">t</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">y</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">u</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">i</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">o</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">p</button>
            </div>
            <div class="flex justify-center space-x-1 sm:space-x-2 px-5">
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">a</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">s</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">d</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">f</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">g</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">h</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">j</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">k</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">l</button>
            </div>
            <div class="flex justify-center space-x-1 sm:space-x-2 px-1">
                <button class="flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">Enter</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">z</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">x</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">c</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">v</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">b</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">n</button>
                <button class="w-12 flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold">m</button>
                <button class="delete_button flex-1 sm:flex-none keyboard-button touch-manipulation uppercase border border-orange-500 bg-gray-200 rounded py-3 sm:text-lg px-2 sm:px-3 font-semibold flex items-center justify-center">
                    <svg id="del"  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 keyboard-button delete_button " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="/timedwords/words.js"></script>
<script src="/timedwords/guesses.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="/timedwords/script.js"></script>

</body>
</html>
