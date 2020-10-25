@extends('layouts.app2')

@section('content')

  <!-- le content de mon layouts -->
  {{-- *** 
       
       home.blade.php ça devrait être l'affichage des annonces d'un usager non authentifié, 
       si authentifié, la vue est ads.blade.php
       si admin authentifié, la page d'accueil d'un admin est l'affichage des annonces et la vue est admin-ads.blade.php
       la liste des usagers pour un admin authentifié est admin-users.blade.php, accessible via le menu d'entête d'un admin authentifié 
       
       alors le contenue ci-dessous devait être celui de la page admin-users.blade.php
       merci de revoir en conséquence les routes et les vues appelées dans les controllers
       
       *** --}}

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

        {{-- @if((Auth::user()->role == "Fournisseur") || (Auth::user()->privilege == "admin") ) 
          <div class="col-lg-10 justify-content-between">
            <a href="./ads" class="btn btn-primary mb-4 max_width">Liste des produits et services</a>
          </div>
        @endif --}}
        
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

    @else

      {{-- 
        =============================================
        =============================================
                            SIMPLE USER 
        =============================================
        =============================================
      --}}

      {{-- <p>Vous êtes authentifié, usager : {{}}</p> 

      <div class="row">

          <div class="col-lg-3">

            <!-- à remplir dynamiquement le sélect option des catégories -->
            <h2 class="my-4">Catégories</h2>
            <div class="list-group">
                <select class="list-group-item" id="categories">
                    <option value="">Aucune sélectionnée</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <option value="category3">Category 3</option>
                    <option value="category4">Category 4</option>
                    <option value="category5">Category 5</option>
                </select>
                <!-- Ajouter une annonce affiché que si authentifié -->
                <a href="/ads/create" class="btn btn-primary mt-4">Ajouter une annonce</a>
              </div>
              
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

              <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                      <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>    


              <div class="row">

                <!-- annonce statique pour visualiser la maquette -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border_radius">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Produit un</a>
                            </h4>
                            <h5>Prix : 25.00 $</h5>
                            <p class="font-weight-bold mb-1">
                                Description : <span class="font-weight-normal">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor
                                    sit amet.</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Catégorie : <span class="font-weight-normal">category</span>
                            </p>
                            <!-- les lignes ci-dessous ne s'affichent pas pour un produit -->

                            <!-- <p class="font-weight-bold mb-1">
                                Lieu : <span class="font-weight-normal">realization_place</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Durée : <span class="font-weight-normal">duration</span>
                            </p> -->

                            <p class="font-weight-bold mb-1">
                                Vendeur : <span class="font-weight-normal"><a
                                        href="#">François Hétu</a></span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            <span class="ml-2 text-primary">3 950 notations</span>
                        </div>
                    </div>
                </div>
                <!-- fin de l'annonce statique pour visualiser la maquette -->

                <!-- annonce statique pour visualiser la maquette -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border_radius">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Service deux</a>
                            </h4>
                            <h5>Budget : 30 000.00 $</h5>
                            <p class="font-weight-bold mb-1">
                                Description : <span class="font-weight-normal">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor
                                    sit amet.</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Catégorie : <span class="font-weight-normal">category</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Lieu : <span class="font-weight-normal">Montréal</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Durée : <span class="font-weight-normal">30 jours</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Fournisseur : <span class="font-weight-normal"><a
                                        href="#">Walid Drihem</a></span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            <span class="ml-2 text-primary">3 950 notations</span>
                        </div>
                    </div>
                </div>
                <!-- fin de l'annonce statique pour visualiser (maquette) -->

                <!-- annonce statique pour visualiser la maquette -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border_radius">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Produit trois</a>
                            </h4>
                            <h5>Prix : 25.00 $</h5>
                            <p class="font-weight-bold mb-1">
                                Description : <span class="font-weight-normal">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor
                                    sit amet.</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Catégorie : <span class="font-weight-normal">category</span>
                            </p>
                            <!-- les lignes ci-dessous ne s'affichent pas pour un produit -->

                            <!-- <p class="font-weight-bold mb-1">
                                Lieu : <span class="font-weight-normal">realization_place</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Durée : <span class="font-weight-normal">duration</span>
                            </p> -->

                            <p class="font-weight-bold mb-1">
                                Vendeur : <span class="font-weight-normal"><a
                                        href="#">François Hétu</a></span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            <span class="ml-2 text-primary">3 950 notations</span>
                        </div>
                    </div>
                </div>
                <!-- fin de l'annonce statique pour visualiser la maquette -->
                <!-- annonce statique pour visualiser la maquette -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border_radius">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Produit quatre</a>
                            </h4>
                            <h5>Prix : 25.00 $</h5>
                            <p class="font-weight-bold mb-1">
                                Description : <span class="font-weight-normal">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor
                                    sit amet.</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Catégorie : <span class="font-weight-normal">category</span>
                            </p>
                            <!-- les lignes ci-dessous ne s'affichent pas pour un produit -->

                            <!-- <p class="font-weight-bold mb-1">
                                Lieu : <span class="font-weight-normal">realization_place</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Durée : <span class="font-weight-normal">duration</span>
                            </p> -->

                            <p class="font-weight-bold mb-1">
                                Vendeur : <span class="font-weight-normal"><a
                                        href="#">François Hétu</a></span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            <span class="ml-2 text-primary">3 950 notations</span>
                        </div>
                    </div>
                </div>
                <!-- fin de l'annonce statique pour visualiser la maquette -->

                <!-- annonce statique pour visualiser la maquette -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border_radius">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Produit cinq</a>
                            </h4>
                            <h5>Prix : 25.00 $</h5>
                            <p class="font-weight-bold mb-1">
                                Description : <span class="font-weight-normal">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor
                                    sit amet.</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Catégorie : <span class="font-weight-normal">category</span>
                            </p>
                            <!-- les lignes ci-dessous ne s'affichent pas pour un produit -->

                            <!-- <p class="font-weight-bold mb-1">
                                Lieu : <span class="font-weight-normal">realization_place</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Durée : <span class="font-weight-normal">duration</span>
                            </p> -->

                            <p class="font-weight-bold mb-1">
                                Vendeur : <span class="font-weight-normal"><a
                                        href="#">François Hétu</a></span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            <span class="ml-2 text-primary">3 950 notations</span>
                        </div>
                    </div>
                </div>
                <!-- fin de l'annonce statique pour visualiser la maquette -->

                <!-- annonce statique pour visualiser la maquette -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border_radius">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Service six</a>
                            </h4>
                            <h5>Budget : 30 000.00 $</h5>
                            <p class="font-weight-bold mb-1">
                                Description : <span class="font-weight-normal">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor
                                    sit amet.</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Catégorie : <span class="font-weight-normal">category</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Lieu : <span class="font-weight-normal">Montréal</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Durée : <span class="font-weight-normal">30 jours</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Fournisseur : <span class="font-weight-normal"><a
                                        href="#">Walid
                                        Drihem</a></span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            <span class="ml-2 text-primary">3 950 notations</span>
                        </div>
                    </div>
                </div>
                <!-- fin de l'annonce statique pour visualiser (maquette) -->

              </div>
              <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

          </div> --}}

    @endif

@endsection
