@extends('company.layout.app')

@section('content')

    <h1>Neues Inserat erstellen</h1>

    <form method="POST" action="/company/jobs" enctype="multipart/form-data">
        {{ csrf_field() }}

        <label class="col-form-label-lg" for="title">Titel</label>
        <input class="form-control" type="text" name="title" placeholder="Titel"
               class="input{{ $errors->has('title') ? ' is-danger' : ''}}" required value="{{ old('title') }}">
        <br>
        <label class="col-form-label-lg" for="description">Beschreibung</label>
        <textarea class="form-control" id="description" name="description"
                  class="textarea{{ $errors->has('title') ? ' is-danger' : ''}}"
                  placeholder="{{ old('description') }}" required> </textarea>

        <div class="row justify-content-center">

            <div class="col-md-6">
                <label for="logo" class="col-form-label">Firmenlogo</label>
                <input name="logo" class="form-control-file" type="file">
            </div>
            <div class="col-md-6">
                <label for="titlePicture" class="col-form-label">Titelbild (nicht verpflichtend)</label>
                <input name="titlePicture" class="form-control-file" type="file">
            </div>

        </div>
        <br>
        <button class="btn" type="submit">Speichern</button>
    </form>

@endsection