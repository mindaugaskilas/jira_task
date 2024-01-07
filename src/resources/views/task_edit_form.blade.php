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

        <x-form action="{{ route('task.update', ['id' => $task->id]) }}" method="POST" >
            @csrf
            @php ( $class = 'border border-slate-300 hover:border-indigo-300' )
            <x-form-input class="{{$class}}" name="title" label="Title" :bind="$task" />
            <x-form-textarea class="{{$class}}" name="description" placeholder="Description" label="Description" :bind="$task" />

            <x-form-select class="{{$class}}" name="creator" label="Creator">
                @foreach ($creators as $creator)
                    <option value="{{$creator}}" {{$creator == $task->creator ? "selected" : ""}} >{{$creator}}</option>
                @endforeach
            </x-form-select>

            <x-form-select class="{{$class}}" name="tester" label="Tester">
                @foreach ($testers as $tester)
                    <option value="{{$tester}}" {{$tester == $task->tester ? "selected" : ""}} >{{$tester}}</option>
                @endforeach
            </x-form-select>

            <x-form-select class="{{$class}}" name="executor" label="Executor">
                @foreach ($executors as $executor)
                    <option value="{{$executor}}" {{$executor == $task->executor ? "selected" : ""}} >{{$executor}}</option>
                @endforeach
            </x-form-select>

            <x-form-select class="{{$class}}" name="status" label="Status">
                @foreach ($statuses as $status)
                    <option value="{{$status}}" {{$status == $task->status->value ? "selected" : ""}} >{{$status}}</option>
                @endforeach
            </x-form-select>

            <x-form-select class="{{$class}}" name="type" label="Type">
                @foreach ($taskTypes as $type)
                    <option value="{{$type}}" {{$type == $task->type->value ? "selected" : ""}} >{{$type}}</option>
                @endforeach
            </x-form-select>

            <x-form-submit class="btn btn-xs btn-info" />
        </x-form>
    </div>
@stop

