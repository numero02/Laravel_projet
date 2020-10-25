@extends('layouts.app2')

@section('content')

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Inscription') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}" name="form">
              @csrf

              <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Pseudonyme :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="username" 
                    id="username" 
                    maxlength="100"
                    placeholder="Votre nom d'usager"
                    class="form-control @error('username') is-invalid @enderror"
                    value="{{ old('username') }}" 
                    required 
                    autocomplete="username"
                    autofocus
                  />
                  @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe :') }}</label>
                <div class="col-md-6">
                  <input type="password" 
                    name="password" 
                    id="password" 
                    maxlength="100"
                    placeholder="Votre mot de passe"
                    class="form-control @error('password') is-invalid @enderror"
                    required 
                    autocomplete="password"
                  />
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe :') }}</label>
                <div class="col-md-6">
                  <input type="password" 
                    name="password_confirmation" 
                    id="password-confirm" 
                    maxlength="100"
                    placeholder="Confirmez votre mot de passe"
                    class="form-control"
                    required 
                    autocomplete="new-password"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="name" 
                    id="name" 
                    maxlength="100"
                    placeholder="Votre nom"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    required 
                    autocomplete="name"
                    autofocus
                  />
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénom :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="first_name" 
                    id="first_name" 
                    maxlength="100"
                    placeholder="Votre prénom"
                    class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name') }}"
                    required 
                    autocomplete="first_name"
                    autofocus
                  />
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="last_name" 
                    id="last_name" 
                    maxlength="100"
                    placeholder="Votre nom"
                    class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name') }}"
                    required 
                    autocomplete="last_name"
                    autofocus
                  />
                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Nom d\'enterprise :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="company" 
                    id="company" 
                    maxlength="100"
                    placeholder="Votre nom de compagnie"
                    class="form-control @error('company') is-invalid @enderror"
                    value="{{ old('company') }}"
                    autocomplete="company"
                    autofocus
                  />
                  @error('company')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="company_nb" class="col-md-4 col-form-label text-md-right">{{ __('Numéro d\'enterprise :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="company_nb" 
                    id="company_nb" 
                    maxlength="100"
                    placeholder="Votre numéro d'entreprise"
                    class="form-control @error('company_nb') is-invalid @enderror"
                    value="{{ old('company_nb') }}"
                    autocomplete="company_nb"
                    autofocus
                  />
                  @error('company_nb')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresse civique :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="address" 
                    id="address" 
                    maxlength="100"
                    placeholder="Votre adresse civique"
                    class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address') }}"
                    autocomplete="address"
                    autofocus
                  />
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="phone" 
                    id="phone" 
                    maxlength="100"
                    placeholder="Votre numéro de téléphone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}"
                    required 
                    autocomplete="phone"
                    autofocus
                  />
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse courriel :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="email" 
                    id="email" 
                    maxlength="100"
                    placeholder="Votre adressse courriel"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required 
                    autocomplete="email"
                    autofocus
                  />
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="join_preference">Choisissez le meilleur moyen pour vous joindre&nbsp;:&nbsp;&nbsp;</label>
                <div class="custom-control custom-radio  custom-control-inline"> --}}
                  {{-- // email (0) phone (1) --}}
                  {{-- <input type="radio" 
                    name="join_preference" 
                    id="choice-phone" 
                    maxlength="100"
                    class="custom-control-input"
                    value="true"
                  />
                  <label class="custom-control-label" for="choice-phone">Téléphone</label>
                </div>
                <div class="custom-control custom-radio  custom-control-inline">
                  <input type="radio" 
                    name="join_preference" 
                    id="choice-email" 
                    maxlength="100"
                    class="custom-control-input"
                    value="false"
                  />
                  <label class="custom-control-label" for="choice-email">Adresse courriel</label>
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="link_website" class="col-md-4 col-form-label text-md-right">{{ __('Site web :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="link_website" 
                    id="link_website" 
                    maxlength="100"
                    placeholder="Votre lien de site Web"
                    class="form-control @error('link_website') is-invalid @enderror"
                    value="{{ old('link_website') }}"
                    autocomplete="link_website"
                    autofocus
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="link_facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="link_facebook" 
                    id="link_facebook" 
                    maxlength="100"
                    placeholder="Votre lien Facebook"
                    class="form-control @error('link_facebook') is-invalid @enderror"
                    value="{{ old('link_facebook') }}"
                    autocomplete="link_facebook"
                    autofocus
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="link_linkedin" class="col-md-4 col-form-label text-md-right">{{ __('LinkedIn :') }}</label>
                <div class="col-md-6">
                  <input type="text" 
                    name="link_linkedin" 
                    id="link_linkedin" 
                    maxlength="100"
                    placeholder="Votre lien LinkedIn"
                    class="form-control @error('link_linkedin') is-invalid @enderror"
                    value="{{ old('link_linkedin') }}"
                    autocomplete="link_linkedin"
                    autofocus
                  />
                </div>
              </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rôle :') }}</label>
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


              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Soumettre') }}
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- charger la class des controles js de validation des formulaires -->
      <script src="./js/ControlForms-register.js"></script>
      <!-- charger la liste des expressions régulières et leurs messages d'erreur associés de validation des formulaires -->
      <script src="./js/FormFieldsRegExp.js"></script>
      <!-- appel javascript pour valider les champs des formulaires -->
      <script>
        window.addEventListener("load", function () {
          new ControlerFormulaire(document.form, champsFormulaire);
        });
      </script>

    </div>
    <!-- /.row fin de la vue -->

@endsection
