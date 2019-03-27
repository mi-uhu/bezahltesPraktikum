@extends('user.layout.app')

@section('content')

    @if(sizeof($jobs) > 0)
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
                            {!! \App\Job::getShortJobDescription($job->description) !!}
                        </div>
                    </li>
                </a>
                <br>
            @endforeach
        </ul>
        {{ $jobs->links() }}
    @else
        <h3>Es sind keine eine Inserate mit den gewünschten Kriterien vorhanden.</h3>
    @endif

@endsection