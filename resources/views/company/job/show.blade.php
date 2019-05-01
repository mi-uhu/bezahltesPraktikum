@extends('company.layout.app')

@section('content')

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

            <h2>Anschrift</h2>
            {{--{{ $company->name }}<br>--}}
            {{ $company->street }}<br>
            {{ $company->plz }}, {{ $company->city }}<br>
            <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>

            <br><br>

            <h2>Tags</h2>
            <ul>
                @foreach($tags as $tag)
                    <li>{{ $tag->tag }}</li>
                @endforeach
            </ul>

            <br>

        </div>
    </div>

@endsection