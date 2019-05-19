@extends('user.layout.app')

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
            {{ $company->name }}<br>
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

            @if (Auth::guard('user')->user())
                @if( isset($favourite) )
                    <form method="POST" action="/favourites/{{ $favourite->id}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-danger">Von Merkliste nehmen</button>
                    </form>
                @else
                    <form method="POST" action="/favourites" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input name="jobId" id="jobId" type="hidden" value="{{ $job->id }}"/>
                        <button class="btn btn-dark" type="submit" style="background: #057d00">Auf die Merkliste!
                        </button>
                    </form>
                @endif
            @else
                <div>
                    <h3>Jetzt anmelden um die Merkliste zu nutzen!</h3>
                </div>
                <div>
                    <a href="/login">
                        <button class="btn btn-dark" style="background: #057d00">Anmelden</button>
                    </a>
                </div>
            @endif
        </div>
    </div>

@endsection