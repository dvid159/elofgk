@extends('layouts.app')

@section('content')
<div class="login_container">    
        <div id="login" class="row center-align">
            <div id="login_form" class="card ">
                <div class="card-header" style="margin:15px 0;">
                <i class="large material-icons" style="color: rgb(209, 21, 46);">account_circle</i>
                <!-- <img class="responsive-img" src="../img/user_round.png"> -->
                
                   <p> {{ __('Inicia sesión con tu cuenta') }}</p>
                </div>

                <div id="card_form" class="row">
                    <form  class="col s12" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row col s12">
                            <div class="input-field ">
                                <i class="material-icons prefix">person</i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror validate" name="name"   value="{{ old('name') }}" required autocomplete="off"  autofocus>
                                <label for="name" class="col-md-4 col-form-label text-md-righ"> {{ __('Usuario') }}</label>                        
                            

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col s12">
                            <div class="input-field">
                                    <i class="material-icons prefix">lock</i>                           
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror validate" name="password" required>
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="waves-effect waves-light btn btn-primary" style="background-color: rgb(209, 21, 46);"><i class="material-icons right">send</i>
                                    {{ __('Login') }}
                                </button>
                                
                            </div>
                            <div class="divider" style="margin: 20px 0;"></div>
                        </div>
                       
                    </form>
                   
                </div>
            </div>
        </div>
    
</div>
@endsection
