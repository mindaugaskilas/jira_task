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

        <x-form action="/task/store" method="POST" >
            @csrf
            @php ( $class = 'border border-slate-300 hover:border-indigo-300' )
            <x-form-input class="{{$class}}" name="title" label="Title" />
            <x-form-textarea class="{{$class}}" name="description" placeholder="Description" label="Description" />
            <x-form-select class="{{$class}}" name="creator" label="Creator" :options="$creators" />
            <x-form-select class="{{$class}}" name="tester" label="Tester" :options="$testers" />
            <x-form-select class="{{$class}}" name="executor" label="Executor" :options="$executors" />
            <x-form-select class="{{$class}}" name="type" label="Type" :options="$taskTypes" />
            <x-form-select class="{{$class}}" name="status" label="Status" :options="$statuses" />

            <x-form-submit class="btn btn-xs btn-info" />
        </x-form>
    </div>
@stop
