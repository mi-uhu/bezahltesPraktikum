@extends('user.layout.app')

@section('content')

    <h3>Neuer Suchagent</h3>
    <form method="POST" action="/searchagents">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <select name="what" id="what" class="form-control selectpicker" data-live-search="true"
                        data-title="Was?" data-style="bg-white border" data-width="100%">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->tag }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="where" id="where" class="form-control selectpicker" data-live-search="true"
                        data-title="Wo?" data-style="bg-white border" data-width="100%">
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">
                            {{ $district->district }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark" style="background: #057d00; width: 100%">
                    Erstellen
                </button>
            </div>
        </div>
    </form>

    <br>

    <h3>Bestehende Suchagenten</h3>
    @foreach($searchAgents as $searchAgent)

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-control">{{ \App\Tag::getNameFromId( $searchAgent->tag_id ) }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-control">{{ \App\District::getNameFromId( $searchAgent->district_id ) }}</div>
                    </div>
                    <div class="col-md-2">
                        <form method="POST" action="/searchagents/{{ $searchAgent->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger" style="width: 100%">Löschen</button>
                        </form>
                    </div>
                </div>
        <br>

    @endforeach

@endsection