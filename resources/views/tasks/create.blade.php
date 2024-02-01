@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task | Create</title>
</head>
@section('content')
    <p>[add-task]</p>
    <p class="pt-2">$ plandash add task</p>
    <form action="{{ url('tasks') }}" method="post">
        @csrf
        <table class="ml-4 mt-3 text-white">
            @if ($errors->any())
                <tr class="text-red-600">
                    <td>error<div class="size-5"></div></td>
                    <td>: Fill the form correctly!<div class="size-5"></div></td>
                </tr>
            @endif
            <tr>
                <td class="before:content-['*'] before:text-red-500">title</td>
                <td>:<input class="bg-neutral-900 border-b focus:outline-none" type="text" name="title"></td>
            </tr>
            <tr>
                <td class="before:content-['*'] before:text-red-500 translate-y-2">description</td>
                <td>:<textarea name="description" class="bg-neutral-900 border-b focus:outline-none" rows="1" cols="18"></textarea></td>
            </tr>
        </table>
        <div class="pl-4 pt-3">
            <p class="text-yellow-600">> <a href="{{ route('tasks.index') }}" class="hover:underline">back</a></p>
            <p class="text-green-600">> <input type="submit" value="submit" name="create" class="hover:underline cursor-pointer"></p>
        </div>
    </form>
@endsection
