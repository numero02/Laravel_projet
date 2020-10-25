
@extends('layouts.app2')

@section('content')

    <!-- Page Content Nouvelle annonce -->

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ __('Nouvelle annonce') }}</div>

            <div class="card-body">
              <form method="POST" action="/ad/store" name="form" class="myForm">
                
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                
                {{-- radios pour si c'est un service, on affiche pas realisation_place et duration --}}
                {{-- *** important de rendre nullable realisation_place et duration $table->string('realization_place')->nullable(); et $table->integer('duration')->nullable(); *** --}}
                <div class="form-group row">

                  {{-- il n'est pas demandé de faire approuver les annonces par l'admin, nous avons tout de même gardé cette possibilité dans le code --}}
                  {{-- <input type="hidden" name="active" value="1"/> --}}

                  <label for="type" class="col-md-4 col-form-label text-md-right mt-3 mr-3">{{ __('Une annonce pour un :') }}</label>
                  <div class="custom-control custom-radio  custom-control-inline">
                    <input type="radio" 
                      name="type" 
                      id="choice-product" 
                      class="custom-control-input mt-4"
                      value="true"
                    />
                    <label class="custom-control-label mt-4 mr-3" for="choice-product">Produit</label>
                  </div>
                  <div class="custom-control custom-radio  custom-control-inline">
                    <input type="radio" 
                      name="type" 
                      id="choice-service" 
                      class="custom-control-input mt-4"
                      value="false"
                    />
                    <label class="custom-control-label mt-4" for="choice-service">Service</label>
                  </div>
                </div>
                {{-- ./radios pour si c'est un service, on affiche pas realisation_place et duration --}}

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom de l\'annonce :') }}</label>

                  <div class="col-md-6">
                    <input type="text" 
                      name="name" 
                      id="name" 
                      maxlength="100"
                      placeholder="Nom du produit ou du service"
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

                <div class="form-group row">
                  <label for="description"
                    class="col-md-4 col-form-label text-md-right">{{ __('Description :') }}</label>
                  <div class="col-md-6">
                    <textarea 
                      name="description" 
                      id="description" 
                      placeholder="Description du produit ou du service"
                      class="form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"
                      cols="30" rows="10" 
                      required 
                      autocomplete="description"
                      autofocus
                    ></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                {{--  --}}
                <div class="form-group row parent_label">
                  <label id="price" for="price_produit" class="col-md-4 col-form-label text-md-right if_sercive_hide">{{ __('Prix :') }}</label>
                  <div class="col-md-6 parent_input_price">
                    <input type="text" 
                      name="price" 
                      id="price_produit" 
                      maxlength="100"
                      placeholder="Prix du produit"
                      class="price form-control @error('price') is-invalid @enderror"
                      value="{{ old('price') }}"
                      autocomplete="price"
                    />
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <!-- si coché produit ci-haut on affiche pas lieu et durée ci-dessous -->
                {{-- il avait été convenu d'avoir le type d'annonce pour de faire --}}
                {{-- dans la table ads $table->string('type')->default('Service'); --}}
                  <div class="form-group row if_product_hide_slow" >
                    <label for="realization_place" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de réalisation :') }}</label>
                    <div class="col-md-6">
                      <input type="text" 
                        name="realization_place" 
                        id="realization_place" 
                        maxlength="100"
                        placeholder="Lieu de réalisatioin du service"
                        class="form-control @error('realization_place') is-invalid @enderror"
                        value="{{ old('realization_place') }}"
                        autocomplete="realization_place"
                      />
                      @error('realization_place')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row if_product_hide_slow">
                    <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Durée :') }}</label>
                    <div class="col-md-6">
                      <input type="text" 
                        name="duration" 
                        id="duration" 
                        maxlength="100"
                        placeholder="Durée estimée du service en nombre de jours"
                        class="form-control @error('duration') is-invalid @enderror"
                        value="{{ old('duration') }}"
                        autocomplete="duration"
                      />
                      @error('duration')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                <!-- ./lieu et durée -->

                {{-- sélecteur des catégories --}}
                <div class="form-group row">
                  <label for="category_id" class="col-md-4 col-form-label text-md-right mr-3">{{ __('Catégorie :') }}</label>
                  <select  class="select_width_ad_new list-group-item select_categories_new_edit"  id="category_id"  name="category_id">
                    <option value="">Aucune sélectionnée</option>
                    <!-- sélect option rempli dynamiquement -->
                    @foreach($categorie as $cat)
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                {{-- ./sélecteur des catégories --}}
                
                {{-- si on veut pouvoir créer une nouvelle catégorie en même temps qu'une nouvelle annonce --}}
                {{-- <div class="form-group row">
                  <label for="category "
                    class="col-md-4 col-form-label text-md-right">{{ __('Ou une nouvelle catégorie :') }}</label>
                  <div class="col-md-6">
                    <input type="text" 
                      name="category" 
                      id="category" 
                      maxlength="100"
                      placeholder="Nom d'une nouvelle catégorie"
                      class="form-control @error('category') is-invalid @enderror"
                      value="{{ old('category') }}"
                      required 
                      autocomplete="category"
                      autofocus
                    />
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div> --}}

                <!-- sélecteur navigateur pour télécharger les fichiers image, il faut pouvoir télécharger 5 images et sauvegarder les 5 chemins réseaux -->
                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image à télécharger :') }}
                  </label>
                  <div class="col-md-6">

                    <input type="file" name="image" id="image"> 
                    @error('image')
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
      </div>

      {{-- inclure jquery et ui --}}
      <script src="/lib/jquery-3.4.1.min.js"></script>
      <script src="/lib/jquery-ui.min.js"></script>
      <!-- charger la class des controles js de validation des formulaires -->
      <script src="/js/ControlForms-ad-new.js"></script>
      <!-- charger la liste des expressions régulières et leurs messages d'erreur associés de validation des formulaires -->
      <script src="/js/FormFieldsRegExp.js"></script>
      <!-- appel javascript pour valider les champs des formulaires -->
      <script>
        window.addEventListener("load", function () {
          new ControlerFormulaire(document.form, champsFormulaire);
        });
      </script>

    </div>
    <!-- /.row fin de la vue -->

@endsection
