@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Tasks</title>
</head>
@section('content')
        @if (request()->routeIs('tasks.index') || request()->Is('tasks/completed') || request()->Is('tasks/incomplete'))
            <a href="{{ route('tasks.create') }}">[<span class="hover:underline">add-task</span>]</a>
            <div class="mx-50 mt-2 dark:text-white">
                @if (request()->Is('tasks/completed'))
                    <p>$ plandash i completed</p>
                @else
                    @if (request()->Is('tasks/incomplete'))
                        <p>$ plandash i incomplete</p>
                    @else
                        <p>$ plandash i tasks</p>
                    @endif
                @endif
                @if ($data->isEmpty())
                    <p class="text-red-600">No task found</p>
                @else
                    <p class="text-fuchsia-600">[</p>
                    @if (Session::has('success'))
                        <p class="text-green-600 pl-6">"status" : "{{ Session::get('success') }}",</p>
                    @endif
                    @foreach ($data as $item)
                        <div class="text-sky-500 pl-6">
                            <p>{</p>
                            <div class="pl-6">
                                <p>"id" : {{ $item->id }},</p>
                                <p>"title" : "{{ $item->title }}",</p>
                                <p>"description" : "{{ $item->description }}",</p>
                                <div class="inline-flex">
                                    <p>"urls" : [</p>
                                    <a href="{{ url('tasks/' . $item->id) }}">"<span class="hover:underline">detail</span>",</a>
                                    <form class="m-0" action="{{ url('tasks/' . $item->id . '/status') }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <select class="cursor-pointer appearance-none bg-transparent lowercase pl-2 hover:underline" name="status" id="status">
                                            <option class=" text-black" value="{{ $item->status }}">"{{ $item->status }}"</option>
                                            @if ($item->status == 'Incomplete')
                                                <option class=" text-black" value="Completed">"completed"</option>
                                            @else
                                                <option class=" text-black" value="Incomplete">"incomplete"</option>
                                            @endif
                                        </select>,
                                        <button type="submit" name="create" id='status'>"<span class="hover:underline">change</span>"]</button>
                                    </form>
                                </div>
                            </div>
                            <p>},</p>
                        </div>
                    @endforeach
                    <p class="text-fuchsia-600">]</p>
                @endif
                @elseif (!request()->Is('task/create'))
                    <p>[add-task]</p>
                    @foreach ($data as $item)
                        <p class="pt-2">$ plandash detail task --id={{ $item->id }}</p>
                        <div class="pl-6">
                            @if (Session::has('success'))
                                <div class="bg-green-200 px-2 py-0.5 mt-2 rounded-lg">
                                    <div class="m-5 text-green-600 font-semibold">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            @endif
                            <p>> <a class="hover:underline" href="{{ url('tasks') }}">back</a></p>
                            <form class="m-auto" onsubmit="return confirm('Are you sure?')" action="{{ url('tasks/' . $item->id) }}" method="POST">
                                <p class="text-yellow-600">> <a class="hover:underline" href="{{ url('tasks/' . $item->id . '/edit') }}">edit</a></p>
                                @csrf
                                @method('DELETE')
                                <p class="text-red-600">> <input type="submit" value="delete" name="submit" class="hover:underline cursor-pointer"></p>
                            </form>
                        </div>
                        <table class="ml-6 mt-2 border border-collapse text-left text-white">
                            <tr>
                                <th class="border p-2">key</th>
                                <th class="border p-2">value</th>
                            </tr>
                            <tr>
                                <td class="border p-2">title</td>
                                <td class="border p-2">{{ $item->title }}</td>
                            </tr>
                            <tr>
                                <td class="border p-2">description</td>
                                <td class="border p-2">{{ $item->description }}</td>
                            </tr>
                            <tr>
                                <td class="border p-2">status</td>
                                <td class="border p-2">
                                    <form class="m-0" action="{{ url('tasks/' . $item->id . '/status') }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <select class="cursor-pointer appearance-none bg-transparent lowercase hover:underline" name="status" id="status">
                                            <option class=" text-black" value="{{ $item->status }}">{{ $item->status }}</option>
                                            @if ($item->status == 'Incomplete')
                                                <option class=" text-black" value="Completed">completed</option>
                                            @else
                                                <option class=" text-black" value="Incomplete">incomplete</option>
                                            @endif
                                        </select>
                                        <button type="submit" name="create" id='status'>(<span class="hover:underline">change?</span>)</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    @endforeach
            @endif
        </div>
@endsection
