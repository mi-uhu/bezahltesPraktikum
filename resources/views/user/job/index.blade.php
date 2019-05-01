@extends('user.layout.app')

@section('content')

    @if(sizeof($jobs) > 0)
        @if( isset($title) )
            <h1>{!! $title !!}</h1>
            <br>
        @endif
        <ul class="list-unstyled">
            @foreach($jobs as $job)
                <a href="/jobs/{{ $job->id }}">
                    <li class="media">
                        @if($job->logo != "noimage.jpg")
                            <img class="mr-3 jobLogo" src="/storage/logos/{{ $job->logo }}"
                                 alt="Generic placeholder image">
                        @endif
                        <div class="media-body">
                            <h3 class="mt-0 mb-1">{{ $job->title }}</h3>
                            {!! \App\Job::getShortJobDescription($job->description) !!}
                        </div>
                    </li>
                </a>
                <br>
            @endforeach
        </ul>
        {{ $jobs->links() }}
    @else
        {!! $emptyMessage !!}
    @endif

@endsection