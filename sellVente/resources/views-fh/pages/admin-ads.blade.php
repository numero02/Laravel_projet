@extends('layouts.app')

@section('content')

        <!-- le content de mon layouts -->

        <!-- @yield('content') -->
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
                    <a href="/ads/create" class="btn btn-primary mt-4">Ajouter une annonce</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <!-- *** -->
                <div class="row mb-4">

                    <div class="col-lg-10">
                        <h2 class="my-4">Liste des annonces</h2>
                    </div>
                    <div class="col-lg-10 justify-content-between">
                        <a href="/ads/inactivated" class="btn btn-info mb-4 max_btn_ads_width">Afficher les annonces non
                            approuvées</a>
                        <!-- toggle sur le suivant -->
                        <!-- <a href="/members/inactivated" class="btn btn-success mb-4 ">Afficher toutes les annonces</a> -->
                        <a href="/members/admin" class="btn btn-primary mb-4 max_btn_ads_width">Afficher les usagers</a>
                        <!-- toggle sur le suivant -->
                        <!-- <a href="/ads/admin" class="btn btn-primary mb-4 max_btn_ads_width">Afficher les annonces</a> -->
                    </div>
                    <div class="col-lg-12">
                        <div class="row mt-2">

                        @foreach($list as $li)
                            <!-- annonce pour boucler (à étayer les noms de variables etc.) -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border_radius">
                                    <div class="align-self-center">
                                        <!-- toggle Approuver btn-outline-success : Désactiver btn-outline-danger -->
                                        <a href="/members/create"
                                            class="btn btn-outline-success btn-sm mx-3 my-1">Approuver</a>
                                        <a href="/members/create"
                                            class="btn btn-outline-danger btn-sm mx-3 my-1">Supprimer</a>
                                    </div>
                                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400"
                                            alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#">{{$li->name}}</a>
                                        </h4>
                                        <!-- Budget pour un service et Prix pour un produit -->
                                        <h5>Budget ou Prix: {{$li->price}} $</h5>
                                        <p class="font-weight-bold mb-1">
                                            Description : <span
                                                class="font-weight-normal">{{$li->description}}</span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Catégorie : <span class="font-weight-normal">{{$li->category}}</span>
                                        </p>

                                        <!-- ces lignes ci-dessous ne s'affichent pas pour un produit -->
                                        <p class="font-weight-bold mb-1">
                                            Lieu : <span class="font-weight-normal"> {{$li->realization_place}} </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Durée : <span class="font-weight-normal"> {{$li->duration}} </span>
                                        </p>
                                        <!-- fin des données spécifiques aux services -->

                                        <p class="font-weight-bold mb-1">
                                            <!-- toggle actif text-success : inactif btn-outline-info -->
                                            Statut : <span class="font-weight-normal text-info">{{$li->active}}</span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Créé le : <span class="font-weight-normal">{{$li->created_at}}</span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Modifié le : <span class="font-weight-normal">{{$li->updated_at}}</span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Vendeur : <span class="font-weight-normal"><a href="/members/{{$li->id}}/edit">{{$li->username}}</a></span>
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
