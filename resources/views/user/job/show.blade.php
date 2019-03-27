@extends('user.layout.app')

@section('content')

    <br>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <li class="media">
                @if($job->logo != "noimage.jpg")
                    <img class="mr-3 jobLogo" src="/storage/logos/{{ $job->logo }}"
                         alt="Generic placeholder image">
                @endif
                <div class="media-body">
                    <h1>{{ $job->title }}</h1>
                    {!! $job->description !!}
                </div>
            </li>

        </div>
        <div class="col-md-3">
            <ul>
                <h2>Anschrift</h2>
                {{ $company->name }}<br>
                {{ $company->street }}<br>
                {{ $company->plz }}, {{ $company->city }}<br>
                <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
            </ul>
        </div>
    </div>

@endsection