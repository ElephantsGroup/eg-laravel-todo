@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header"><h3>{{ $task->title }}</h3></div>
        <div class="card-body"><p>{{ $task->description }}</p></div>
    </div>
</div>
@endsection