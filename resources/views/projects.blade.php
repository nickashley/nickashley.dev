<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NickAshley.com - CTO Mindset. Developer Skillset.</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Limelight&family=Londrina+Sketch&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Vast+Shadow&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles

</head>
<body class="bg-slate-50 dark:bg-[#0a0a0a] text-[#1b1b18]  p-6 lg:p-8">

<header class="flex items-stretch justify-center w-full space-x-2 ">
    <div class="bg-white/50 font-[Doto] rounded-l-full border shadow px-10 py-4 text-xl font-bold text-green-900">
        NICK ASHLEY
    </div>
    <nav class="bg-white/50 flex items-center text-center w-full max-w-lg rounded-r-full border shadow divide-x divide-gray-200">
        <a class="flex-1 min-w-0 px-4 py-4" href="/">Home</a>
        <a class="flex-1 min-w-0 px-4 py-4" href="/resume">Resume</a>
        <a class="flex-1 min-w-0 px-4 py-4" href="/projects">Projects</a>
    </nav>
</header>

@include('partials.header-bar')

<ul role="list" class="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8 mt-20">
    <li class="overflow-hidden rounded-xl border border-gray-200">
        <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-blue-50 p-6">
            <div class="rounded-lg bg-yellow-50 size-12 ring-1 ring-gray-900/10 flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" flex-none  object-cover size-8 text-fuchsia-500">
                    <path d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                </svg>
            </div>
            <div class="text-sm/6 font-medium text-gray-900">Tetrashift</div>
        </div>
        <div class="px-6 py-4 text-sm/6 bg-white">
            <p>Tetrashift is a javscript game, inspired by the board game Rubiks Race. It is a slide puzzle
                game, in which the user must manipulate Rubiks Cube colored tiles in order to match the
                target sequence, which can be found anywhere in the board.</p>
            <div class="flex justify-end border-t pt-5 mt-5">
                <a href="/projects/tetrashift">Play Tetrashift</a>
            </div>
        </div>
    </li>
    <li class="overflow-hidden rounded-xl border border-gray-200">
        <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-blue-50 p-6">
            <div class="rounded-lg bg-emerald-50 size-12 ring-1 ring-gray-900/10 flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" flex-none  object-cover size-8 text-emerald-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
                </svg>
            </div>

            <div class="text-sm/6 font-medium text-gray-900">Setlist</div>
        </div>
        <div class="px-6 py-4 text-sm/6 bg-white">
            <p>My wife is a fitness instructor, and often creates playlists that have to adhere to certain
                tempos, to help guide students effort throughout the class. SetList uses the Spotify API
                to find songs by duration and tempo, making creating these playlists easy.</p>
            <div class="flex justify-end border-t pt-5 mt-5">
                <a href="https://setlist.nickashley.dev">Launch App</a>
            </div>
        </div>
    </li>
    <li class="overflow-hidden rounded-xl border border-gray-200">
        <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-blue-50 p-6">
            <div class="rounded-lg bg-orange-50 size-12 ring-1 ring-gray-900/10 flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class=" flex-none  object-cover size-8 text-amber-700">
                    <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                    <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                    <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                </svg>

            </div>
            <div class="text-sm/6 font-medium text-gray-900">LoadBoard</div>
        </div>
        <div class="px-6 py-4 text-sm/6 bg-white">
            <p>A friend runs a Logistics/Trucking company, and wanted live notifications when return
                legs for his drivers were available. I reverse engineered an internal load board's API
                in order to create automated searches, with SMS notifications.</p>
            <div class="flex justify-end border-t pt-5 mt-5">
                <a href="https://loadboard.nickashley.dev">View Splashpage</a>
            </div>
        </div>
    </li>
</ul>

@livewireScripts
@vite(['resources/js/app.js'])
</body>
</html>
