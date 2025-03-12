<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Limelight&family=Londrina+Sketch&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Vast+Shadow&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')

    </head>
    <body class="bg-slate-100 dark:bg-[#0a0a0a] text-[#1b1b18]  p-6 lg:p-8">

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

        <div class="[&_span]:inline-block my-10 font-[Limelight] font-[400] text-pretty leading-10 px-10  ">
            <h1 class=" text-8xl font-bold text-black border-dashed border-b-2 border-gray-400 pb-5 mb-10">Nick Ashley: </h1>
            <h1 class="inline text-5xl text-gray-950">
                <span class="underline">Technical Co-Founder,</span>
                <span>CTO,</span>
                <span>Senior Engineer,</span>
                <span>Developer,</span>
                <span>Programmer,</span>
                <span>Code-Monkey</span>
            </h1>
            <h1 class="inline text-4xl text-blue-800">
                <a href="#" class=" font-bold underline hover:bg-blue-100">Laravel,</a>
                <span>Livewire,</span>
                <span>AlpineJS,</span>
                <span>Tailwind,</span>
                <span>Bootstrap,</span>
                <span>Vue,</span>
                <span>jQuery,</span>
                <span>Wordpress,</span>
            </h1>
            <h1 class="inline text-4xl text-cyan-900">
                <span>MySQL,</span>
                <span>SQLite,</span>
                <span>Postgres,</span>
                <span>Redis,</span>
                <span>Memcache,</span>
                <span>Algolia,</span>
                <span>Meilisearch,</span>
            </h1>
            <h1 class="inline text-3xl text-sky-900">
                <span>Pest,</span>
                <span>PHPUnit,</span>
                <span>Pint,</span>
                <span>Vite,</span>
                <span>Webpack,</span>
                <span>Gulp,</span>
                <span>Git,</span>
                <span>NPM,</span>
                <span>Composer,</span>
            </h1>
            <h1 class="inline text-3xl text-indigo-900">
                <span>PHP,</span>
                <span>Ruby,</span>
                <span>Javascript,</span>
                <span>CSS,</span>
                <span>SQL,</span>
                <span>Java,</span>
                <span>Python,</span>
                <span>.NET,</span>
                <span>Java,</span>
                <span>C#,</span>
                <span>ASP,</span>
            </h1>
            <h1 class="inline text-3xl text-violet-900">
                <span>Linux,</span>
                <span>Nginx,</span>
                <span>Apache,</span>
                <span>AWS,</span>
                <span>Git,</span>
            </h1>
            <h1 class="inline text-3xl text-green-900">
                <span>Learner,</span>
                <span>Teacher,</span>
                <span>Communicator,</span>
                <span>Listener,</span>
                <span>Thinker,</span>
                <span>Self-Starter,</span>
            </h1>
            <h1 class="inline text-3xl text-emerald-900">
                <span>Intelligent,</span>
                <span>Kind,</span>
                <span>Thoughtful,</span>
                <span>Curious,</span>
                <span>Funny,</span>
                <span>Caring,</span>
                <span>Adventurous,</span>
                <span>Eager,</span>
            </h1>

            <h1 class="inline text-3xl text-orange-900">
                <span>Husband,</span>
                <span>Father,</span>
                <span>Son,</span>
                <span>Brother,</span>
                <span>Uncle,</span>
            </h1>
            <h1 class="inline text-3xl text-amber-950">
                <span>Rock Climber,</span>
                <span>Mountain Biker,</span>
                <span>Skier,</span>
                <span>Wakeboarder,</span>
                <span>Poker Player,</span>
                <span>Board Game Enthusist,</span>
            </h1>
        </div>

    </body>
</html>
