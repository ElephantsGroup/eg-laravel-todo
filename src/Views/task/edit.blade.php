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
            <h3 style="float: left">Edit task #{{ $task->id }}</h3>
            <a style="float: right" href="{{ url('todo/task') }}">List</a>
        </div>
        <div class="card-body">
            <form action="{{ url('todo/task/' . $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input name="title" class="form-control" value="{{ $task->title }}" />
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection