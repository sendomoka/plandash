<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasks</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-mono tracking-wider">
        <div class="p-4 min-h-screen bg-neutral-900 text-white">
            <div>
                <span class="text-green-600">user@DESKTOP</span>
                <span class="text-fuchsia-600">MINGW64</span>
                <span class="text-yellow-600">/d/laravel/plandash</span>
                <span class="text-sky-600">(main)</span>
            </div>
            <p>$ plandash help</p>
            <p class="opacity-50">
                Welcome to plandash! a simple task manager.<br>If you interested in contributing to this project, please visit my github <a class="underline" href="https://github.com/sendomoka/plandash">repository</a>.
                You can also access the API <a class="underline" href="/api">here</a>.
            </p>
            <div class="pt-2">
                $
                <a class="hover:underline transition-all ease-in-out duration-500"
            href="{{ url('tasks') }}">plandash run dev</a>
            </div>
            <a href="https://github.com/sendomoka/plandash">
                <div class="fixed bottom-6 left-6 border px-2 rounded-full scale-125 hover:bg-white hover:text-black">?</div>
            </a>
        </div>
    </body>
</html>
