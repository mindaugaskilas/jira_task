@extends('layouts.default')
@section('content')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <a class="btn btn-xs btn-info" href="{{url('/task/create')}}">Add Task</a>
        @foreach ($tasks as $task)
            <a href="{{url('/task', $task->id)}}">
                <div class="mt-4 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <div class="h-5 w-100 ">
                            <div class="h-5 w-100">
                                {{$task->type->name}}
                            </div>
                            <div class="h-5 w-100">
                                Status: {{$task->status}}
                            </div>
                        </div>
                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $task->title }}
                        </h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            {{ $task->description }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@stop
