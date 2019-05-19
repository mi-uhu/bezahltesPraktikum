@extends('user.layout.app')

@section('content')
    <div class="card bg-light text-dark">
        <img class="card-img" src="/storage/picturesWebsite/dogAtWork.jpg" alt="Noch kein Praktikum? Jetzt suchen!">
        <div class="card-img-overlay">
            <form method="POST" action="/search" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="searchOverPicture">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <select name="what" id="what" class="form-control selectpicker" data-live-search="true"
                                    data-title="Was?" data-style="bg-white border" data-width="100%">
                               @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="where" id="where" class="form-control selectpicker" data-live-search="true"
                                    data-title="Wo?" data-style="bg-white border" data-width="100%">
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success" style="background-color: #057d00; width: 100%">Suche</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="whitespaceUnderPic"></div>
    <div class="row">
        <div class="col-md-4">
            <a href="/lebenslauf">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="/storage/picturesWebsite/lebenslauf.png">
                    <div class="card-body">
                        <p class="card-text">Tipps zum Lebenslauf</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/lebenslauf">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="/storage/picturesWebsite/lebenslauf.png">
                    <div class="card-body">
                        <p class="card-text">Tipps zum Lebenslauf</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/lebenslauf">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="/storage/picturesWebsite/lebenslauf.png">
                    <div class="card-body">
                        <p class="card-text">Tipps zum Lebenslauf</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
