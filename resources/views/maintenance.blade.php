@extends('layout')
@section('content')
    @foreach($logs as $log)
        <h1>Log ID: {{ $log->id }}</h1>
        <h4>User ID: {{ $log->user_id }}</h4>
        <h4>ON/OFF: {{ $log->toggle }}</h4>
        <h4>Time: {{ $log->created_at }}</h4>
    @endforeach
@endsection
