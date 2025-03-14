<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/favicon.png" />

    <title>{{$title?:'Nick Ashley'}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Limelight&family=Londrina+Sketch&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Vast+Shadow&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles

</head>
<body class="bg-slate-100 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">



    <div class="font-[Coda] flex flex-col sm:flex-row space-y-4 sm:space-y-0 items-center justify-between space-x-4 border-dashed border-b-2 border-gray-400 py-4 ">
        <div class="flex items-center justify-center">
            <a href="/" class="flex-1 flex justify-center items-center ring-2 ring-slate-500 rounded-full">
                <div class="rounded-full size-20 sm:size-12 md:size-18 lg:size-20 xl:size-32 overflow-hidden ring-slate-500 ring-2 shadow-lg ">
                    <img src="https://media.licdn.com/dms/image/v2/D4E03AQGa39qprhp9lQ/profile-displayphoto-shrink_800_800/B4EZVyt5doGgAc-/0/1741386389825?e=1747267200&v=beta&t=I9Jb1_XgW55I4ko_EM9WV3bri7UJQI7A27ed-D9_mwI" alt="" class="object-cover">
                </div>
                <div class="flex-1 pl-5 pr-10 py-2 text-3xl sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-[900] text-gray-700 hover:text-gray-700">Nick Ashley</div>
            </a>
        </div>
        <div class="uppercase">
            <nav class="flex flex-1 justify-between text-center space-x-8" aria-label="Tabs">
                <a href="/resume" class=" rounded-md px-3 py-2 text-lg sm:text-xl md:text-2xl lg:text-3xl  font-[900] text-gray-700 hover:text-gray-700">Resume</a>
                <a href="/projects" class=" rounded-md bg-gray-100 px-3 py-2 text-lg sm:text-xl md:text-2xl lg:text-3xl  font-[900] text-gray-700" aria-current="page">Projects</a>
            </nav>
        </div>
    </div>
    {{ $slot }}

    @livewireScripts
    @vite(['resources/js/app.js'])
</body>
</html>
