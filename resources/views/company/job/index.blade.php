@extends('company.layout.app')

@section('content')

    @if(isset($jobs))
        <ul class="list-unstyled">
            @foreach($jobs as $job)
                <a href="/company/jobs/{{ $job->id }}">
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
                <form method="POST" action="/company/jobs/{{ $job->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="btn-group" @if($job->logo != "noimage.jpg")
                        style="margin-left: 96px"
                                @endif>
                        <a class="btn btn-outline-secondary" href="/company/jobs/{{ $job->id }}/edit">Bearbeiten</a>
                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Sind Sie sicher, dass Sie dieses Inserat löschen möchten?')">Löschen</button>
                    </div>
                </form>

                <br>
            @endforeach
        </ul>
        {{ $jobs->links() }}
    @else
        <h1>Sie haben noch keine Inserate erstellt.</h1>
    @endif

@endsection