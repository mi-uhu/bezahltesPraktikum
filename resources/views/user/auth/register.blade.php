@extends('user.layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form role="form" method="POST" action="{{ url('/register') }}">

                <div class="form-group">
                    <h1>Jetzt Registrieren!</h1>
                </div>

                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>
                    <input id="name" type="text" class="form-control border" name="name" value="{{ old('name') }}"
                           autofocus>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail-Adresse</label>
                    <input id="email" type="email" class="form-control border" name="email"
                           value="{{ old('email') }}">
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
                        <button type="submit" class="btn btn-primary" style="background-color: #057d00; width: 100%">Registrieren</button>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
