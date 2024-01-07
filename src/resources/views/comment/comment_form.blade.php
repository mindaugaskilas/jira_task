@extends('layouts.default')

@section('content')
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-form action="{{ route('comment.store', ['id' => $task_id]) }}" method="POST" >
            @csrf
            <x-form-textarea class="border border-slate-300 hover:border-indigo-300" name="comment" label="Description" />

            <x-form-input type="hidden" class="border border-slate-300 hover:border-indigo-300" name="task_id" value="{{ $task_id }}" />

            <x-form-input type="hidden" class="border border-slate-300 hover:border-indigo-300" name="user_id" value="{{ $user_id }}" />

            <x-form-submit class="btn btn-xs btn-info" />
        </x-form>
    </div>
@stop
