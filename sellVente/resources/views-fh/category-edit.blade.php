@extends('layouts.app2')

@section('content')
              
    {{-- mon ajout pour mettre en page ton formulaire --}}
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Inscription') }}</div>

          <div class="card-body">

            {{-- ton formulaire --}}
            <form method="POST" action="/category/{{$data->id}}" name="form">
                  
              @csrf
              @method("PUT")

              <div class="form-group">
                <label for="name" class="font-weight-bold mt-4">Nom de catégorie : </label>
                <input type="text" class="form-control" value="{{$data->name}}" id="name" name="name" required>
              </div>
              
                <div>
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
              
            </form>

          </div>
        </div>
      </div>

    </div>
    <!-- /.row fin de la vue -->

@endsection
