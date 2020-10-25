@extends('layouts.app2')

@section('content')
              
    {{-- mon ajout pour mettre en page ton formulaire --}}
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Nouvelle catégorie') }}</div>

          <div class="card-body">

            {{-- ton formulaire --}}
            <form method="POST" action="/category" name="form">
                    
                @csrf
                
                <div class="form-group">
                  <label for="name" class="font-weight-bold mt-4">Nouvelle catégorie : </label>
                  <input type="text" class="form-control" placeholder="nom de catégorie " id="name" name="name" required>
                </div> 

                <div>
                  <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>

              </form>

          </div>
        </div>
      </div>

      <!-- charger la class des controles js de validation des formulaires -->
      <script src="./js/ControlForms.js"></script>
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
