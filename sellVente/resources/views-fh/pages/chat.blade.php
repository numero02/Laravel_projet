@extends('layouts.app2')

@section('content')

    <div class="row">

      <div class="col-lg-8 col-md-8 mb-4">
        <h2 class="my-4">Messagerie</h2>
        <div id="chat_window"></div>

        <form method="POST" action="">
          <div class="form-group row">
            <label for="chat_message" class="col-md-4 col-form-label text-md-right">
              {{ __('Votre texte à envoyer à la zone de clavardage :') }}
            </label>
            <div class="col-md-6">
              <input id="chat_message" type="text" class="form-control" name="chat_message" value=" Bonjour, je suis intéressé. " />
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary"> Soumettre</button>
            </div>
          </div>
        </form>

      </div>
      <!-- /.col-lg-8 col-md-8 mb-4 -->

      <div class="col-lg-4 col-md-4 mb-5">
        <h2 class="my-4">Annonce</h2>
        <div class="card">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title"><a href="#">Item One</a></h4>
            <h5>$24.99</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            <h5>Vendeur</h5>
            <!-- l'acheteur pourra accéder aux coordonner du vendeur après s’être identifié 
              et doit pouvoir envoyer « je suis intéressé » en cliquant sur un bouton pour initier la conversation -->
            <p class="card-text"><a href="/seller">username du vendeur</a></p>
            <h5>Acheteur potentiel</h5>
            <p class="card-text">username de l'acheteur potentiel</p>
            <a href="/purchase" class="btn btn-success">Procéder à l'achat</a>
          </div>
          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            <span class="mx-4 text-primary">3 950 notations</span>
            <!-- système de notation des prestataires par les fournisseurs -->
            <a href="/notation" class="btn btn-success btn-sm ml-4">&#9734;</a>
          </div>
        </div>
      </div>
      <!-- /.col-lg-4 col-md-4 mb-4 -->

    </div>
    <!-- /.row fin de la vue -->

@endsection
