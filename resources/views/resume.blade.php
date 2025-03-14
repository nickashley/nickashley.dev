<x-layouts.main title="NA : Resume">
    <div class=" mt-10">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-4xl font-bold">Nick Ashley</h1>
            <p class="mt-2 text-lg">
                <a href="mailto:nick@nickashley.dev" class="text-blue-600 hover:underline">nick@nickashley.dev</a>
                <span class="mx-2">•</span>
                319.594.3668
            </p>
        </header>

        <!-- Work History -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold border-b-2 border-gray-200 pb-2 mb-4">Work History</h2>
            <div class="mb-6">
                <h3 class="text-xl font-bold">Technical Co-Founder / Lead Software Engineer</h3>
                <p class="text-gray-600">NurseRecruiter.com | 2008 - Present (17 Years)</p>
                <ul class="list-disc mt-4 space-y-2 ml-10">
                    <li>Built and scaled a job board and lead generation platform for the travel nursing industry, driving product strategy from MVP to long-term growth. Responsible for all infrastructure and technology decisions. Company has been fully remote since inception.</li>
                    <li>Built the initial application using a custom-built PHP framework, then rebuilt it on Laravel 5 in 2015. The codebase has been kept up to date with the latest version of Laravel to reduce technical debt.</li>
                    <li>Optimized database performance through query tuning, indexing, and caching strategies, improving load times and minimizing infrastructure costs.</li>
                    <li>Designed and maintained cloud infrastructure on AWS, leveraging EC2, S3, RDS Aurora, and Route53 for DNS management.</li>
                    <li>Implemented core features including subscription payments via Stripe, data integrations with client systems, scheduled tasks and queues for async processing, Slack notifications, live chat, and complex job recommendation queries.</li>
                    <li>Designed and developed a responsive front-end using TailwindUI, with Livewire and AlpineJS for interactivity.</li>
                    <li>Mentored junior developers on MVC architecture, Laravel best practices, and how to write testable and maintainable code.</li>
                </ul>
            </div>
        </section>

        <!-- Skills / Experience -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold border-b-2 border-gray-200 pb-2 mb-4">Experience</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6">
                <!-- Languages -->
                <div>
                    <h3 class="text-lg font-bold">Languages</h3>
                    <ul class="list-disc ml-10 mt-2">
                        <li>PHP</li>
                        <li>Ruby</li>
                        <li>Javascript</li>
                        <li>CSS</li>
                        <li>SQL</li>
                        <li>Java</li>
                        <li>Python</li>
                    </ul>
                </div>
                <!-- Frameworks/Libraries -->
                <div>
                    <h3 class="text-lg font-bold">Frameworks / Libraries</h3>
                    <ul class="list-disc ml-10 mt-2">
                        <li>Laravel</li>
                        <li>Livewire</li>
                        <li>Alpine.js</li>
                        <li>Tailwind</li>
                        <li>Bootstrap</li>
                        <li>Vue</li>
                        <li>jQuery</li>
                        <li>Wordpress</li>
                    </ul>
                </div>
                <!-- Build Tools -->
                <div>
                    <h3 class="text-lg font-bold">Build Tools</h3>
                    <ul class="list-disc ml-10 mt-2">
                        <li>NPM</li>
                        <li>Vite</li>
                        <li>Webpack</li>
                        <li>Pint</li>
                        <li>Pest</li>
                        <li>PHPUnit</li>
                    </ul>
                </div>
                <!-- Database / Search -->
                <div>
                    <h3 class="text-lg font-bold">Database / Search</h3>
                    <ul class="list-disc ml-10 mt-2">
                        <li>MySQL</li>
                        <li>SQLite</li>
                        <li>Postgres</li>
                        <li>Redis</li>
                        <li>Memcache</li>
                        <li>Algolia</li>
                        <li>Meilisearch</li>
                    </ul>
                </div>
                <!-- Infrastructure -->
                <div class="">
                    <h3 class="text-lg font-bold">Infrastructure</h3>
                    <ul class="list-disc ml-10 mt-2">
                        <li>Linux</li>
                        <li>Nginx</li>
                        <li>Apache</li>
                        <li>AWS</li>
                        <li>Git</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Education -->
        <section>
            <h2 class="text-2xl font-semibold border-b-2 border-gray-200 pb-2 mb-4">Education</h2>
            <p>Bachelor of Arts in Computer Science - University of Iowa, 2005</p>
        </section>
    </div>
</x-layouts.main>
