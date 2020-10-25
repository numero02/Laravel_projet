@extends('layouts.app2')

@section('content')

  <!-- le content de mon layouts -->

  {{-- *** 
    

    home.blade.php ça devrait être l'affichage des annonces d'un usager non authentifié, 
    si authentifié, la vue devrait être ads.blade.php
    si admin authentifié, la page d'accueil d'un admin est l'affichage des annonces et la vue devrait être admin-ads.blade.php
    la liste des usagers pour un admin authentifié est admin-users.blade.php, accessible via le menu "Liste des usagers" en entête d'un admin authentifié 
    
    alors le contenue ci-dessous devait être celui de la page admin-users.blade.php
    du moins c'est ce qui avait été convenu lors de la préparation du MPD et du diagramme de class
       
  *** --}}

        @if (session('status'))
            <div class="alert alert-success" id='' role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if($list['privilege'] == "admin")

          <div class="row my-5">

            <div class="col-lg-12">

              <h1 class="text-center mb-4">Liste des usagers</h1>

              {{-- @if((Auth::user()->role == "Fournisseur") || (Auth::user()->privilege == "admin") ) 
                <div class="col-lg-10 justify-content-between">
                  <a href="./ads" class="btn btn-primary mb-4 max_width">Liste des produits et services</a>
                </div>
              @endif --}}
              
              <div class="row d-inline-flex justify-content-around">
                  
                  <!-- carte pour boucler l'affichage -->
                  @foreach($list['data'] as $li)

                    <div class="card col-lg-5 col-md-10 mx-2 my-2 border_radius">
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
                            <button type="submit" class="btn btn-outline-success btn-sm mt-1">Donner les droits administrateur</button>
                          @elseif($li->privilege == "admin")
                            <button type="submit" class="btn btn-outline-primary btn-sm mt-1">Retirer les droits administrateur</button>
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
                            Nom du demandeur : <span class="font-weight-normal"> {{ $li->name }} </span>
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
                            Utilisateur actif : <span class="font-weight-normal text-success"> {{ $li->active }} </span>
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
              <!-- /.row -->
            </div>
            <!-- /.col-lg-3 -->
          </div>
          <!-- /.row fin de la vue -->

        @endif

@endsection
