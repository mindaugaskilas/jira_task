@extends('layouts.default')
@section('content')

    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50">
        <div class="flex justify-center sm:items-center ">
            <a class="btn btn-xs btn-info pull-right" href="{{ route('task.list') }}"><--Task List</a>
        </div>

        <div>
            <p>Type: {{ $task->type }}</p>
            <p>Status: {{ $task->status }}</p>
            <p><b>Title: {{ $task->title }}</b></p>
            <p>Description: {{$task->description}}</p>
            <p>Creator: {{$task->creator->name}}</p>
            <p>Tester: {{$task->tester->name}}</p>
            <p>Executor: {{$task->executor->name}}</p>
            <p>Updated: {{$task->updated_at}}</p>
            <p>Created: {{$task->created_at}}</p>
            <duv class="flex justify-center sm:items-center ">
                <a class="btn btn-xs btn-info pull-right" href="{{ route('task.edit', ['id' => $task->id]) }}">Task edit</a>
            </duv>
        </div>

        @if($comments)
            <div class="scale-100 p-6 bg-gray">
                Comments:
                <a class="btn btn-xs btn-info pull-right" href="{{ route('comment.create', ['id' => $task->id]) }}">Add Comment</a>
                @foreach ($comments as $comment)
                    <div class="mt-4 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h4>Author: {{$comment->user->name}} <span>{{$comment->user->created_at}}</span></h4>

                            <a href="{{ route('comment.edit', ['id' => $task->id,'commentId' => $comment->id]) }}" class="btn btn-xs btn-info pull-right">Edit</a>
                        </div>
                        <div>
                            <p>{{$comment->comment}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@stop
