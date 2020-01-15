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
            <div class="btn-group mr-2 float-right" role="group">
                <a class="btn btn-info float-right" href="{{ url('todo/task/' . $task->id) }}">View</a>
                <a class="btn btn-info float-right" href="{{ url('todo/task') }}">List</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('todo/task/' . $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input name="title" class="form-control" value="{{ $task->title }}" />
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection