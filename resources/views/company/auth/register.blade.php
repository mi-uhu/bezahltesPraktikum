@extends('company.layout.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form role="form" method="POST" action="{{ url('/company/register') }}">

                    <div class="form-group">
                        <h1>Jetzt Registrieren!</h1>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Firmenname</label>
                        <input id="name" type="text" class="form-control border" name="name" value="{{ old('name') }}"
                               autofocus>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail-Adresse</label>
                        <input id="email" type="email" class="form-control border" name="email"
                               value="{{ old('email') }}">
                    </div>

                    <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                        <label for="street" class="control-label">Straße</label>
                        <input id="street" type="text" class="form-control border" name="street"
                               value="{{ old('street') }}">
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('plz') ? ' has-error' : '' }}">
                                <label for="plz" class="control-label">Postleitzahl</label>
                                <input id="plz" type="number" class="form-control border" name="plz"
                                       value="{{ old('plz') }}">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label for="district" class="control-label">Bezirk</label>
                            <select name="district" id="district" class="selectpicker" data-live-search="true"
                                    data-title="Bezirk auswählen..." data-style="bg-white border" data-width="100%">
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="control-label">Ort</label>
                        <input id="city" type="text" class="form-control border" name="city"
                               value="{{ old('city') }}">
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Passwort</label>
                        <input id="password" type="password" class="form-control border" name="password">
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Passwort bestätigen</label>
                        <input id="password-confirm" type="password" class="form-control border"
                               name="password_confirmation">
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary" style="background-color: #062265; width: 100%">Registrieren</button>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </form>

            </div>
        </div>
@endsection
