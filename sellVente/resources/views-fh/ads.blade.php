@extends('layouts.app2')

@section('content')

  <!-- le content de mon layouts -->
  {{-- *** affichage des annonces d'un usager authentifié *** --}}

        <div class="row">

            <div class="col-lg-3">

                <h2 class="my-4">Catégories</h2>
                <div class="list-group">
                    <select class="list-group-item" id="categories" name="category">
                        <option value="">Aucune sélectionnée</option>
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                        <option value="category3">Category 3</option>
                        <option value="category4">Category 4</option>
                        <option value="category5">Category 5</option>
                    </select>
                    
                    @if((Auth::user() !== null)&& (Auth::user()->privilege !== "admin") && (Auth::user()->role == "Fournisseur"))
                        <a href="/messages/{{Auth::user()->id}}" class="btn btn-primary mt-4">Liste des Messages</a>
                        <a href="/request/purchase"  class="btn btn-primary">Listes des demandes d'achats</a>
                    @endif
                    
                    @if(Auth::user() !== null )
                        <a href="/ads/create" class="btn btn-primary mt-4">Ajouter une annonce</a>
                    @endif

                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                {{-- début caroussel --}}


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
                {{-- fin du caroussel --}}

                <!-- *** -->
                <div class="row mb-4">
                    <div class="col-lg-10">
                        <h2 class="my-4">Liste des annonces</h2>
                    </div>
                    
                    <div class="col-lg-10 justify-content-between">
                        {{-- <a href="/ads/inactivated" class="btn btn-info mb-4 max_btn_ads_width">Afficher les annonces non approuvées</a> --}}
                        <!-- toggle sur le suivant -->
                        <!-- <a href="/members/inactivated" class="btn btn-success mb-4 ">Afficher toutes les annonces</a> -->
                        {{-- <a href="/home" class="btn btn-primary mb-4 max_btn_ads_width">Afficher les usagers</a> --}}
                        <!-- toggle sur le suivant -->
                        <!-- <a href="/ads/admin" class="btn btn-primary mb-4 max_btn_ads_width">Afficher les annonces</a> -->
                    </div>
                    <div class="col-lg-12">
                        <div class="row mt-1">

                        @foreach($list as $li)
                            <!-- annonce pour boucler -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border_radius">
                                    
                                   <a href="#"><img class="card-img-top" src="http://placehold.it/700x400"
                                            alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            @if((Auth::user() !== null)&&(Auth::user()->role == "Acheteur" ))
                                                <a href="ad/{{$li->idAd}}/show"> {{$li->adsName}} </a>
                                            @elseif((Auth::user() !== null)&&(Auth::user()->role == "Fournisseur"))
                                                <a href="ad/{{$li->idAd}}/edit"> {{$li->adsName}} </a>
                                            @elseif(Auth::user() == null)
                                                <a href="ad/{{$li->idAd}}/show"> {{$li->adsName}} </a>
                                            @endif
                                        </h4>
                                        <!-- Budget pour un service et Prix pour un produit -->
                                        <!-- *** élaborer la condition pour afficher Prix ou Budget *** -->
                                        <h5>Budget ou Prix&nbsp;:&nbsp;{{$li->price}}&nbsp;$</h5>
                                        <p class="font-weight-bold mb-1">
                                            Description : <span class="font-weight-normal"> {{$li->description}} </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Catégorie : <span class="font-weight-normal"> {{$li->nameCategory}} </span>
                                        </p>

                                        <!-- ces lignes ci-dessous ne s'affichent pas pour un produit -->
                                        <!-- *** élaborer la condition pour afficher ssi c'est un service *** -->
                                        <p class="font-weight-bold mb-1">
                                            Lieu : <span class="font-weight-normal"> {{$li->realization_place}} </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Durée : <span class="font-weight-normal"> {{$li->duration}} </span>
                                        </p>
                                        <!-- fin des données spécifiques aux services -->

                                        <!-- données spécifiques pour un admin -->
                                        {{-- 
                                        <p class="font-weight-bold mb-1">
                                            <!-- toggle actif text-success : inactif btn-outline-info -->
                                            Statut : <span class="font-weight-normal text-info"> {{$li->active}} </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Créé le : <span class="font-weight-normal"> {{$li->created_at}} </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Modifié le : <span class="font-weight-normal"> {{$li->updated_at}} </span>
                                        </p> 
                                        --}}
                                        <p class="font-weight-bold mb-1">
                                            {{-- Vendeur : <span class="font-weight-normal"><a href="/members/{{$li->user_id}}/edit"> {{$li->username}} </a></span> --}}
                                            Vendeur : <span class="font-weight-normal"><a href="/members/#/edit"> {{$li->username}} </a></span>
                                        </p>
                                    </div>
                                    <!-- la façon d'afficher le nombre d'étoiles à étayer -->
                                    <div class="card-footer">
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        <span class="ml-4 text-primary">3 950 notations</span>
                                    </div>
                                </div>
                            </div>
                            <!-- fin de l'annonce pour boucler -->
                        @endforeach

                        </div>
                        <!-- /.row mt-2 -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row mb-4 -->
            </div>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row fin de la vue -->
    
@endsection
