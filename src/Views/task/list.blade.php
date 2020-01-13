@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($tasks as $task)
    <div class="card">
        <div class="card-header">
            <h3 style="float: left"><a href="{{ url('todo/task/' . $task->id) }}">{{ $task->title }}</a></h3>
            <form action="{{ url('todo/task/' . $task->id) }}" method="POST" style="float: right">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        <div class="card-body"><p>{{ $task->description }}</p></div>
    </div>
    @endforeach
</div>
@endsection