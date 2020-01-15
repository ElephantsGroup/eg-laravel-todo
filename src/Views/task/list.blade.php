@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <a class="btn btn-primary" href="{{ url('todo/task/create') }}">@lang('todo::all.New')</a>
    @foreach ($tasks as $task)
    <div class="card mb-2 mt-2">
        <div class="card-header">
            <h3 class="float-left"><a href="{{ url('todo/task/' . $task->id) }}">#{{ $task->id }} {{ $task->title }}</a></h3>
            <form class="btn-group mr-1 float-right" role="group" aria-label="" action="{{ url('todo/task/' . $task->id) }}" method="POST">
                <a class="btn btn-primary" role="button" href="{{ url('todo/task/' . $task->id . '/edit') }}">Edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" role="button" type="submit">Delete</button>
                @if ($task->done)
                <a class="btn btn-primary" role="button" href="{{ url('todo/task/' . $task->id . '/undone') }}">Undone</a>
                @else
                <a class="btn btn-primary" role="button" href="{{ url('todo/task/' . $task->id . '/done') }}">Done</a>
                @endif
            </form>
            <div class="btn-group mr-2 float-right" role="group">
                <a class="btn btn-info float-right" href="{{ url('todo/task/' . $task->id) }}">View</a>
            </div>
        </div>
        <div class="card-body"><p>description: {{ $task->description }}</p></div>
    </div>
    @endforeach
</div>
@endsection