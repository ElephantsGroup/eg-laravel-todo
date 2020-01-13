@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3 style="float: left">#{{ $task->id }} {{ $task->title }}</h3>
        <a style="float: right"  href="{{ url('todo/task') }}">List</a>
        <a style="float: right"  href="{{ url('todo/task/' . $task->id . '/edit') }}">Edit</a>
        <form action="{{ url('todo/task/' . $task->id . '/edit') }}" method="POST" style="float: right">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
        <div class="card-body"><p>{{ $task->description }}</p></div>
    </div>
</div>
@endsection