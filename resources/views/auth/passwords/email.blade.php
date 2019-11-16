@extends('layouts.app')

@section('content')
<div class="email_container">
    <div class="row center-align">        
            <div id="email_form" class="card">
                <div class="card-header" style="margin:15px 0;">
                <i class="medium material-icons" style="color: rgb(209, 21, 46);">contact_mail</i>
                 <p>{{ __('Reset Password') }}</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row col s12">
                        <div class="input-field ">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"class="waves-effect waves-light btn btn-primary" style="background-color: rgb(209, 21, 46);">
                                    {{ __('Send Password Reset Link') }}
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
