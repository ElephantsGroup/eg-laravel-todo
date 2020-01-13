@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <a href="{{ url('todo/task/create') }}">New</a>
    @foreach ($tasks as $task)
    <div class="card">
        <div class="card-header">
            <h3 style="float: left"><a href="{{ url('todo/task/' . $task->id) }}">#{{ $task->id }} {{ $task->title }}</a></h3>
            <a style="float: right"  href="{{ url('todo/task/' . $task->id . '/edit') }}">Edit</a>
            <form action="{{ url('todo/task/' . $task->id) }}" method="POST" style="float: right">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        <div class="card-body"><p>description: {{ $task->description }}</p></div>
    </div>
    @endforeach
</div>
@endsection