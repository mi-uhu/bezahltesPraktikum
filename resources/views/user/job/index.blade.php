@extends('user.layout.app')

@section('content')

    @if( isset($showSearchAgent) && $showSearchAgent )
        <div class="row">
            <div class="col-md-9">
    @endif
    @if( isset($title) )
                <h1>{!! $title !!}</h1>
    @endif
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
    @if( isset($showSearchAgent) && $showSearchAgent == true )
            </div>

            <div class="col-md-3">
                @if (Auth::guard('user')->user())
                    <h3>Suchagent</h3>
                    <form method="POST" action="/searchagents">
                        {{ csrf_field() }}

                        <select name="what" id="what" class="form-control selectpicker" data-live-search="true"
                                data-title="Was?" data-style="bg-white border" data-width="100%">
                            @foreach($tags as $tag)
                                <option @if(isset($selectedTags) && \App\Tag::isTagPreselected( $selectedTags, $tag, 1)) selected @endif value="{{ $tag->id }}">
                                    {{ $tag->tag }}
                                </option>
                            @endforeach
                        </select>
                        <select name="where" id="where" class="form-control selectpicker" data-live-search="true"
                                data-title="Wo?" data-style="bg-white border" data-width="100%">
                            @foreach($districts as $district)
                                <option @if(isset($selectedTags) && \App\District::isDistrictPreselected( $selectedDistricts, $district, 1)) selected @endif value="{{ $district->id }}">
                                    {{ $district->district }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-dark" style="background: #057d00; width: 100%">Suchagent erstellen</button>
                    </form>
                @else
                    <div>
                        <h3>Jetzt anmelden um den Suchagenten zu nutzen!</h3>
                    </div>
                    <div>
                        <a href="/login">
                            <button class="btn btn-dark" style="background: #057d00">Anmelden</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection