@extends('company.layout.app')

@section('content')

    <h1>{{ $job->title }}</h1>
    {!! $job->description !!}

@endsection