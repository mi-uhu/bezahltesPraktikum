<?php
function printJobDescription($description)
{
    if (strlen($description) > 350) {
        $description = substr($description, 0, 300) . "...";
    }
    return $description;
}

?>

@extends('user.layout.app')

@section('content')

    @if(isset($jobs))
        <ul class="list-unstyled">
            @foreach($jobs as $job)
                <a href="/jobs/{{ $job->id }}">
                    <li class="media">
                        @if($job->logo != "noimage.jpg")
                            <img class="mr-3 jobLogo" src="/storage/logos/{{ $job->logo }}"
                                 alt="Generic placeholder image">
                        @endif
                        <div class="media-body">
                            <h4 class="mt-0 mb-1">{{ $job->title }}</h4>
                            {!! printJobDescription( $job->description ) !!}
                        </div>
                    </li>
                </a>
                <br>
            @endforeach
        </ul>

    @else
        <h1>Sie haben noch keine Inserate erstellt.</h1>
    @endif

@endsection