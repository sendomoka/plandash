@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task | Edit</title>
</head>
@section('content')
    <p>[add-task]</p>
    <p class="pt-2">$ plandash edit task --id={{ $data->id }}</p>
    <form action="{{ url('tasks/' . $data->id) }}" method="post">
        @csrf
        @method('PUT')
        <table class="ml-4 mt-3 text-white">
            @if ($errors->any())
                <tr class="text-red-600">
                    <td>error<div class="size-5"></div></td>
                    <td>: Fill the form correctly!<div class="size-5"></div></td>
                </tr>
            @endif
            <tr>
                <td class="before:content-['*'] before:text-red-500">title</td>
                <td>:<input class="bg-neutral-900 border-b focus:outline-none" type="text" name="title" value="{{ $data->title }}"></td>
            </tr>
            <tr>
                <td class="before:content-['*'] before:text-red-500 translate-y-2">description</td>
                <td><div class="size-5"></div>:<textarea name="description" class="bg-neutral-900 border-b focus:outline-none" rows="1" cols="18">{{ $data->description }}</textarea></td>
            </tr>
        </table>
        <div class="pl-4 pt-3">
            <p class="text-yellow-600">> <a href="{{ route('tasks.index') }}" class="hover:underline">back</a></p>
            <p class="text-green-600">> <input type="submit" value="submit" name="create" class="hover:underline cursor-pointer"></p>
        </div>
    </form>
@endsection
