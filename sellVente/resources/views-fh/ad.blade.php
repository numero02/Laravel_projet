
@extends('layouts.app')

@section('content')

    <!-- le content de mon layouts -->
    {{-- *** affichage d'une seule annonce d'un usager authentifié *** --}}
    {{-- *** c'est de cette page-ci que l'on accède à la messagerie lorsqu'intéressé par le produit *** --}}
    {{-- *** et non pas de ads.blade.php (annonces pour un usager authentifié) 
             ni de admin-ads.blade.php (annonces pour un admin authentifié) 
             ni de home.blade.php (annonces pour un usager non authentifié) *** --}}

        <div class="row">

            <div class="col-lg-3">

                <!-- remplir dynamiquement le sélect option -->
                <h2 class="my-4">Catégorie</h2>
                <div class="list-group">
                    <div class="category">Category</div>
                    <a href="/ad/create" class="btn btn-primary mt-4">Ajouter une annonce</a>

                    <!-- afficher si l'usager authentifié est propriétaire de cete annonce ou admin -->
                        <a href="/ad/edit" class="btn btn-success mt-4">Modifier cette annonce</a>
                        <a href="/ad/destroy" class="btn btn-danger mt-4">Supprimer cette annonce</a>
                    <!-- ./si l'usager authentifié est propriétaire de cete annonce ou admin -->

                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="col-lg-12">
                    <div class="row mt-3">

                        <!-- annonce statique pour visualiser la maquette -->
                        <div class="col-lg-12 col-md-6 d-flex justify-content-between my-4 mx-0">
                            <div class="col-lg-6 col-md-6 ml-0">
                                <div class="card border_radius border-white">
                                    <a href="#"><img class="card-img-top big-img" src="http://placehold.it/700x400" alt=""></a>
                                    <div class="card-body border-none d-flex justify-content-between px-0">
                                        <a href="#"><img class="card-img-top complementary_img ml-0" src="http://placehold.it/100x100" alt=""></a>
                                        <a href="#"><img class="card-img-top complementary_img ml-0" src="http://placehold.it/100x100" alt=""></a>
                                        <a href="#"><img class="card-img-top complementary_img ml-0" src="http://placehold.it/100x100" alt=""></a>
                                        <a href="#"><img class="card-img-top complementary_img ml-0" src="http://placehold.it/100x100" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 d-flex justify-content-start mb-4 mr-0">
                                <div class="mr-0 px-0">
                                        <h4 class="card-title">
                                            <a href="#">Produit un</a>
                                        </h4>
                                        <h5 class="text-right text-orange">25.00 $</h5>
                                        <div class="my-4">
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                            <span class="ml-2 text-primary">3 950 notations</span>
                                        </div>
                                        <p class="font-weight-bold mb-1">
                                            Description
                                        </p>
                                        <p class="font-weight-normal mb-1">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.
                                        </p>
                                        <p class="font-weight-bold mt-3 mb-1">
                                            Catégorie
                                        </p>
                                        <p class="font-weight-normal mb-1">
                                            Catégorie : <span class="font-weight-normal">category</span>
                                        </p>

                                        <!-- afficher si service -->
                                            <p class="font-weight-bold mt-3 mb-1">
                                                Lieu
                                            </p>
                                            <p class="font-weight-normal mb-1">
                                                {{$li->realization_place}}
                                            </p>
                                            <p class="font-weight-bold mt-3 mb-1">
                                                Durée : <span class="font-weight-normal">si service {{$li->duration}}</span>
                                            </p>
                                            <p class="font-weight-normal mb-1">
                                                {{$li->duration}}
                                            </p>
                                        <!-- ./afficher si service -->

                                        <p class="font-weight-bold mt-3 mb-1">
                                            Vendeur
                                        </p>
                                        <p class="font-weight-normal mb-1">
                                            <span class="font-weight-normal"><a href="#">François Hétu</a>
                                        </p>
{{-- *** c'est du bouton ci-dessous que l'on accède à la messagerie lorsqu'intéressé par le produit *** --}}
                                        <a href="/ad/message" class="btn btn-primary mt-4 px-5 btn_width">Je suis intéressé</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin de l'annonce statique pour visualiser la maquette -->


                    </div>
                    <!-- /.row mt-3 -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row mb-4 -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row fin de la vue -->

@endsection
