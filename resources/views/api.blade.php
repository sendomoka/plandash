<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasks</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-mono tracking-wider flex justify-center items-center bg-neutral-900 text-white">
        <a class="fixed top-4 left-8 text-4xl" href="/">←</a>
        <div class="h-64 md:h-[44rem]"></div>
        <div class="text-center md:text-left">
            <a href="/api/tasks" class="hover:underline">GET /tasks</a><br>
            <a href="/api/tasks/1" class="hover:underline">GET /tasks/{id}</a><br>
            <a href="/api/tasks/completed" class="hover:underline">GET /tasks/completed</a><br>
            <a href="/api/tasks/incomplete" class="hover:underline">GET /tasks/incomplete</a><br>
        </div>
    </body>
</html>
