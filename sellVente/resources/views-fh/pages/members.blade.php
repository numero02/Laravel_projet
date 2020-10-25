@extends('layouts.app')

@section('content')

    <div class="row mb-4">

      <div class="col-lg-2">
        <h1 class="my-4"></h1>
      </div>
      <div class="col-lg-10">
        <h1 class="my-4">Liste des usagers</h1>
      </div>
      <div class="col-lg-2">
        <p></p>
      </div>
      <div class="col-lg-10 justify-content-between">
        <!-- <div class="list-group max_width"> -->
        <a href="/members/create" class="btn btn-primary mb-4 max_width">Ajouter un usager</a>
        <a href="/members/inactivated" class="btn btn-info mb-4 max_width">Afficher les usagers non approuvés</a>
        <!-- toggle sur le suivant -->
        <!-- <a href="/members/inactivated" class="btn btn-success mb-4 max_width">Afficher les usagers approuvés</a> -->
        <a href="/members/admins" class="btn btn-warning mb-4 max_width">Afficher les administrateurs</a>
        <!-- toggle sur le suivant -->
        <!-- <a href="/members/users" class="btn btn-primary mb-4 max_width">Afficher les usagers</a> -->
        <!-- </div> -->
      </div>
      <div class="col-lg-12">
        <div class="row justify-content-end">

          <!-- carte pour boucler l'affichage -->
          @foreach($list as $li)
            <div class="card col-lg-5 col-md-4 mx-2 my-2 border_radius">
              <div>
                <form action="/members/{{$li->id}}/state" method="POST">
                  @csrf
                  @method("PUT")
                  @if ( $li->active === 'Non')
                  <button type="submit" class="btn btn-outline-success btn-sm mt-1 mx-3">Approuver</button>
                  @elseif($li->active === 'Oui')
                  <button type="submit" class="btn btn-outline-danger btn-sm mt-1 mx-3">Désactiver</button>
                  @endif
                  @if ( $li->role === 'user')
                  <button type="submit" class="btn btn-outline-warning btn-sm mt-1 mr-3">Donner les droits
                    administrateur</button>
                  @elseif($li->role === 'administrator')
                  <button type="submit" class="btn btn-outline-success btn-sm mt-1 mr-3">Retirer les droits
                    administrateur</button>
                  @endif
                </form>
                <form method="POST" action="/members/{{$li->id}}/destroy" name="form">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-outline-danger btn-sm mt-1">Supprimer</button>
                </form>
              </div>
              <div class="card-body">
                <h4 class="card-title">
                  <p> Usager :
                    <span class="font-weight-normal">
                      <a href="/members/{{$li->id}}/edit">username</a>
                    </span>
                  </p>
                </h4>
                <p class="font-weight-bold mb-1">
                  Nom : <span class="font-weight-normal">first_name last_name</span>
                </p>
                <p class="font-weight-bold mb-1">
                  Compagnie : <span class="font-weight-normal">company_name</span>
                </p>
                <p class="font-weight-bold mb-1">
                  NEQ : <span class="font-weight-normal">company_nb</span>
                </p>
                <p class="font-weight-bold mb-1">
                  Adresse : <span class="font-weight-normal">address</span>
                </p>
                <p class="font-weight-bold mb-1">
                  Téléphone : <span class="font-weight-normal">phone</span>
                </p>
                <p class="font-weight-bold mb-1">
                  Adresse courriel : <span class="font-weight-normal">email</span>
                </p>
                <p class="font-weight-bold mb-1">
                  Joindre par : <span class="font-weight-normal">join_preference</span>
                </p>
                <p class="font-weight-bold mb-1">
                  Site Web : <a href="{{$li->link_website}}"><span class="font-weight-normal"> {{$li->link_website}}
                    </span></a>
                </p>
                <p class="font-weight-bold mb-1">
                  Facebook : <a href="{{$li->link_facebook}}"><span class="font-weight-normal"> {{$li->link_facebook}}
                    </span></a>
                </p>
                <p class="font-weight-bold mb-1">
                  LinkedIn : <a href="{{$li->link_linkedin}}"><span class="font-weight-normal"> {{$li->link_linkedin}}
                    </span></a>
                </p>
                <p class="font-weight-bold mb-1">
                  Rôle : <span class="font-weight-normal"> {{$li->role}} </span>
                </p>
                <p class="font-weight-bold mb-1">
                  <!-- success pour actif et info pour inactif -->
                  Statut : <span class="font-weight-normal text-success"> {{$li->active}} </span>
                </p>
              </div>
            </div>
            <!-- fin de la carte pour boucler -->
          @endforeach

        </div>
        <!-- /.row justify-content-end -->
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row fin de la vue -->

@endsection
