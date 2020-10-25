@extends('layouts.app2')

@section('content')

      <!-- le content de mon layouts -->
      {{-- *** affichage des usagers pour un admin authentifié (via le lien "Liste des usages" de l'entête de l'admin authentifié) *** --}}

    @if (session('status'))
        <div class="alert alert-success" id='' role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if($list['privilege'] == "admin")

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

        <div class="col-lg-12">
          <div class="row justify-content-end">

            <!-- carte pour boucler l'affichage -->
            @foreach($list['data'] as $li)
            
              <div class="card col-lg-5 col-md-4 mx-2 my-2 border_radius">
                <div class="d-inline-flex justify-content-around">
                  <!-- Modifier l'état active ou non d'un utilisateur -->
                  <form action="/users/{{$li->id}}/state" method="POST">
                    
                    @csrf
                    @method("PUT")   
                    @if( $li->active === 'Non')
                      <button type="submit" class="btn btn-outline-success btn-sm mt-1">Approuver</button>
                    @elseif($li->active === 'Oui')
                      <button type="submit" class="btn btn-outline-danger btn-sm mt-1">Désactiver</button>
                    @endif
                    
                  </form>
                  <!--modifier les droits d'un usager-->
                  <form action="/users/{{$li->id}}/rights" method="POST">
                    
                    @csrf
                    @method("PUT")

                    @if(!($li->privilege == "admin"))
                      <button type="submit" class="btn btn-outline-warning btn-sm mt-1 ml-4">Donner les droits administrateur</button>
                    @elseif($li->privilege == "admin")
                      <button type="submit" class="btn btn-outline-success btn-sm mt-1 ml-4">Retirer les droits administrateur</button>
                    @endif

                  </form>
                  <!--Supprimer un usager-->
                  <form method="POST" action="/users/{{ $li->id }}/destroy" name="form">
                    @csrf

                    @method("DELETE")

                    <button type="submit" class="btn btn-outline-danger btn-sm mt-1">Supprimer</button>
                  
                  </form>
                </div>

                <div class="card-body">
                  <h4 class="card-title">
                    <p> Usager :
                      <span class="font-weight-normal">
                        <a href="/members/{{ $li->id }}/edit"> {{ $li->username }} </a>
                      </span>
                    </p>
                  </h4>
                  <p class="font-weight-bold mb-1">
                    Nom : <span class="font-weight-normal"> {{ $li->name }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Compagnie : <span class="font-weight-normal"> {{ $li->company }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Numéro d'entreprise : <span class="font-weight-normal"> {{ $li->company_nb }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Adresse : <span class="font-weight-normal"> {{ $li->address }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Téléphone : <span class="font-weight-normal"> {{ $li->phone }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Adresse courriel : <span class="font-weight-normal"> {{ $li->email }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Joindre par : <span class="font-weight-normal"> {{ $li->join_preference }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Site Web : <a href="{{ $li->link_website }}"><span class="font-weight-normal"> {{ $li->link_website }} </span></a>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Facebook : <a href="{{ $li->link_facebook }}"><span class="font-weight-normal"> {{ $li->link_facebook }} </span></a>
                  </p>
                  <p class="font-weight-bold mb-1">
                    LinkedIn : <a href="{{ $li->link_linkedin }}"><span class="font-weight-normal"> {{$li->link_linkedin}} </span></a>
                  </p>
                  <p class="font-weight-bold mb-1">
                    Rôle : <span class="font-weight-normal"> {{ $li->role }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    <!-- success pour actif et info pour inactif -->
                    Utilisateur active : <span class="font-weight-normal text-success"> {{ $li->active }} </span>
                  </p>
                  <p class="font-weight-bold mb-1">
                    <!-- success pour actif et info pour inactif -->
                    Niveau de privilège : <span class="font-weight-normal text-success"> {{ $li->privilege }} </span>
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

    @endif

@endsection
