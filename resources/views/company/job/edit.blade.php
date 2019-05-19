@extends('company.layout.app')

@section('content')

    <h1>Inserat bearbeiten:</h1>

    <form method="POST" action="/company/jobs/{{ $job->id }}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label class="col-form-label-lg" for="title">Titel</label>
        <input class="form-control" type="text" name="title" placeholder="Titel"
               class="input{{ $errors->has('title') ? ' is-danger' : ''}}" required value="{{ isset($job) ? $job->title : old('title') }}">
        <br>
        <label class="col-form-label-lg" for="description">Beschreibung</label>
        <textarea class="form-control" id="description" name="description"
                  class="textarea{{ $errors->has('description') ? ' is-danger' : ''}}" required>
            {{ isset($job) ? $job->description : old('description') }}
        </textarea>

        <br>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <label for="tag1" class="control-label">Tag 1</label>
                <select name="tag1" id="tag1" class="form-control selectpicker" data-live-search="true"
                        data-title="Tag 1" data-style="bg-white border" data-width="100%">
                    @foreach($tags as $tag)
                        <option @if(\App\Tag::isTagPreselected( $setTags, $tag, 1)) selected @endif value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="tag2" class="control-label">Tag 2 (nicht verpflichtend)</label>
                <select name="tag2" id="tag2" class="form-control selectpicker" data-live-search="true"
                        data-title="Tag 2" data-style="bg-white border" data-width="100%">
                    <option value="-1">Leer</option>
                    @foreach($tags as $tag)
                        <option @if(\App\Tag::isTagPreselected( $setTags, $tag, 2)) selected @endif value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="tag3" class="control-label">Tag 3 (nicht verpflichtend)</label>
                <select name="tag3" id="tag3" class="form-control selectpicker" data-live-search="true"
                        data-title="Tag 3" data-style="bg-white border" data-width="100%">
                    <option value="-1">Leer</option>
                    @foreach($tags as $tag)
                        <option @if(\App\Tag::isTagPreselected( $setTags, $tag, 3)) selected @endif value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <label for="logo" class="col-form-label">Firmenlogo (nur bei einer Änderung des Logos neu hochladen)</label>
                <input name="logo" class="form-control-file" type="file" value="{{ old('logo') }}">
            </div>
            {{--<div class="col-md-5">--}}
                {{--<label for="titlePicture" class="col-form-label">Titelbild (nicht verpflichtend)</label>--}}
                {{--<input name="titlePicture" class="form-control-file" type="file" value="{{ old('titlePicture') }}">--}}
            {{--</div>--}}
            <div class="col-md-2">
                <br>
                <button class="btn btn-dark" type="submit" style="width: 100%; background: #062265">Speichern</button>
            </div>
        </div>
    </form>

@endsection