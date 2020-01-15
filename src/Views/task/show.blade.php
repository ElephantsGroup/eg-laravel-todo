@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 style="float: left">#{{ $task->id }} {{ $task->title }}</h3>
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
                <a class="btn btn-info float-right" href="{{ url('todo/task') }}">List</a>
            </div>
        </div>
        <div class="card-body"><p>{{ $task->description }}</p></div>
    </div>
</div>
@endsection