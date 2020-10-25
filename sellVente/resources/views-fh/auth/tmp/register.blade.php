@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- username ajouter --}}

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Pseudonyme') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- fin de de l'ajout --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse courriel') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- test
                            =================================================
                            --}}

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('company') }}</label>
    
                                <div class="col-md-6">
                                    <input id="company" type="text" class="form-control" name="company" required autocomplete="company">
                                    @error('compagny')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="company_nb" class="col-md-4 col-form-label text-md-right">{{ __('company_nb') }}</label>
    
                                <div class="col-md-6">
                                    <input id="company_nb" type="text" class="form-control" name="company_nb" required autocomplete="company_nb">
                                @error('company_nb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="link_website" class="col-md-4 col-form-label text-md-right">{{ __('link_website') }}</label>
    
                                <div class="col-md-6">
                                    <input id="link_website" type="text" class="form-control" name="link_website" required autocomplete="link_website">
                                @error('link_website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="link_facebook" class="col-md-4 col-form-label text-md-right">{{ __('link_facebook') }}</label>
    
                                <div class="col-md-6">
                                    <input id="link_facebook" type="text" class="form-control" name="link_facebook" required autocomplete="link_facebook">
                                @error('link_facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="link_linkedin" class="col-md-4 col-form-label text-md-right">{{ __('link_linkedin') }}</label>
    
                                <div class="col-md-6">
                                    <input id="link_linkedin" type="text" class="form-control" name="link_linkedin" required autocomplete="link_linkedin">
                                @error('link_linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rôle') }}</label>
    
                                <div class="col-md-6">
                                    <select name="role" id="role" class="form-control" required autocomplete="role">
                                        <option value="Fournisseur">Fournisseur</option>
                                        <option value="Acheteur">Acheteur</option>
                                    </select>
                                   
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                           

                        {{-- fin du test
                            =================================================
                            --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
