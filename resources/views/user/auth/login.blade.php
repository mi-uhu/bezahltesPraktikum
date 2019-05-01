@extends('user.layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <form role="form" method="POST" action="{{ url('/login') }}">

                    <div class="form-group">
                        <h1>Einloggen!</h1>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Adresse</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               autofocus>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Passwort</label>
                        <input id="password" type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                            <label class="custom-control-label"  for="customCheck">Eingeloggt bleiben</label>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary" style="background-color: #057d00; width: 100%">
                                Login
                            </button>
                        </div>
                        <div class="form-group col-md-6">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Passwort vergessen?
                        </a>
                        </div>

                        <div class="form-group col-md-12">
                        <a class="btn btn-link" href="{{ url('/register') }}">
                            Noch kein Konto? Jetzt Registrieren!
                        </a>
                        </div>
                    </div>

                    @if(session('url'))
                        <input id="url" name="url" type="hidden" value="{{ session('url') }}">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
