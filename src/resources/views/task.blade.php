@extends('layouts.default')
@section('content')

    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50">
        <div>
            <h1>Title: {{ $task->title }}</h1>
            <p>Description: {{$task->description}}</p>
            <p>Creator: {{$task->creator}}</p>
            <p>Tester: {{$task->tester}}</p>
            <p>Executor: {{$task->executor}}</p>
            <p>Updated: {{$task->updated_at}}</p>
            <p>Created: {{$task->created_at}}</p>
        </div>

        @if($comments)
            <div class="scale-100 p-6 bg-gray">
                Comments:
                @foreach ($comments as $comment)
                    <h4>Author: {{$comment->user->name}} <span>{{$comment->user->created_at}}</span></h4>
                    <p>{{$comment->comment}}</p>
                @endforeach
            </div>
        @endif
    </div>
@stop
