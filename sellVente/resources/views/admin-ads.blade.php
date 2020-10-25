@extends('layouts.app2')

@section('content')

        <!-- le content de mon layouts -->
        {{-- *** affichage des annonces d'un admin authentifié (accueil de l'admin authentifié) *** --}}
        
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

                    {{-- @if((Auth::user() !== null) && (Auth::user()->privilege !== "admin")) --}}
                    @if((Auth::user() !== null))

                        <a href="/messages/{{Auth::user()->id}}" class="btn btn-primary mt-4">Liste des Messages</a>
                        <a href="/request/purchase"  class="btn btn-primary mt-4">Liste des demandes d'achat</a>
                
                    @endif
                    
                    <a href="/ads/create" class="btn btn-primary mt-4">Ajouter une annonce</a>
                    <a href="/categories" class="btn btn-primary mt-4">Gestion des catégories</a>
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
                            <!-- annonce pour boucler (à étayer les noms de variables etc.) -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border_radius">
                                    <div class="align-self-center mb-1">
                                        <!-- toggle Approuver btn-outline-success : Désactiver btn-outline-danger -->
                                        {{-- <a href="/members/create"
                                            class="btn btn-outline-success btn-sm mx-3 my-1">Approuver</a> --}}
                                            <div class="row">
                                                
                                                <form action="/ads/{{ $li->id }}/approve" method="post">
                                                    @csrf
                                                    @method("PUT")
                                                    {{-- n'est pas demandé au devis de pouvoir approuver une annonce --}}
                                                    {{-- <button type="submit" class="btn btn-outline-success btn-sm mx-3 my-1">Approuver</button> --}}
                                                    
                                                </form>
                                                
                                                <!--supprimer une annonce-->
                                                <form method="POST" action="/ads/{{ $li->id }}/destroy" name="form">
                                                    @csrf
                                                    @method("DELETE")
                                
                                                    <button type="submit" class="btn btn-outline-danger btn-sm mt-1">Supprimer</button>
                                                
                                                </form>
                                            </div>
                                    </div>
                                    {{-- <a href="#"><img class="card-img-top admin_ads_img_top" src="http://placehold.it/700x400" alt=""></a> --}}
                                    
                                    
                                    {{-- REMPLACER --}}
                                    
                                    
                                    {{-- <a href="ad/{{$li->idAd}}/show"><img class="card-img-top admin_ads_img_top" src="/{{$li->link_picture_1}}" alt=""></a> --}}
                                    
                                    <a href="ad/{{$li->id}}/show"><img class="card-img-top admin_ads_img_top" src="/{{$li->link_picture_1}}" alt=""></a>
                                    
                                    
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/ad/{{$li->id}}/show">
                                                    {{$li->name}}
                                            </a>
                                        </h4>
                                        <!-- Budget pour un service et Prix pour un produit -->
                                        <!-- *** élaborer la condition pour afficher Budget ou Prix *** -->
                                        <h5>Budget ou Prix&nbsp;:&nbsp;{{$li->price}}&nbsp;$</h5>
                                        <p class="font-weight-bold mb-1">
                                            Description : <span
                                                class="font-weight-normal">
                                                {{$li->description}}
                                            </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Catégorie : <span class="font-weight-normal">
                                                {{$li->catName}}
                                            </span>
                                        </p>

                                        <!-- ces lignes ci-dessous ne s'affichent pas pour un produit -->
                                        <!-- *** élaborer la condition pour afficher Budget ou Prix *** -->
                                        <p class="font-weight-bold mb-1">
                                            Lieu : <span class="font-weight-normal"> 
                                                {{$li->realization_place}} 
                                            </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Durée : <span class="font-weight-normal"> 
                                                {{$li->duration}}
                                             </span>
                                        </p>
                                        <!-- fin des données spécifiques aux services -->

                                        {{-- <p class="font-weight-bold mb-1">
                                            <!-- toggle actif text-success : inactif btn-outline-info -->
                                            Statut : <span class="font-weight-normal text-info">
                                                {{$li->active}}
                                            </span>
                                        </p> --}}
                                        <p class="font-weight-bold mb-1">
                                            Créé le : <span class="font-weight-normal">
                                                {{$li->created_at}}
                                            </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Modifié le : <span class="font-weight-normal">
                                                {{$li->updated_at}}
                                            </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Vendeur : <span class="font-weight-normal"><a href="/members/ /edit">
                                                {{$li->username}}
                                            </a></span>
                                        </p>
                                        @if($li->article_state == 'Vendu')
                                            <p class="btn btn-success">VENDU</p>
                                        @endif
                                    </div>
                                    <!-- la façon d'afficher le nombre d'étoiles à étayer -->


                                    @php
                                    $el= array();
                                    $el['notes-count'] = \DB::table('scorings')
                                                    ->where([
                                                        // ['id_buyer','=',Auth::user()->id],
                                                        ['id_seller','=',$li->user_id]
                                                    ])
                                                    ->select('scorings.id_seller')
                                                    ->count();
                                

                                    $el['notes-list'] = \DB::table('scorings')
                                                    ->where([
                                                        // ['id_buyer','=',Auth::user()->id],
                                                        ['id_seller','=',$li->user_id]
                                                    ])
                                                    ->select('scorings.scoring')
                                                    ->get();
                                    if($el['notes-count'] !==0 ){
                                        $compt=0;
                                        foreach ( $el['notes-list'] as $key => $value) {

                                            $compt += $value->scoring;

                                        }

                                        $res = $compt / $el['notes-count'];
                                        $score = round($res,0);
                                        $el['score'] = $score;
                                        $el['score-verif'] = true;
                                        // dd($res);

                                    }else{
                                        
                                        $el['score-verif'] = false;
                                    
                                    }

                                    if($el['score-verif']){
                                        echo '<div class="card-footer border_radius">';
                                        echo '<small class="text-muted">';
                                            for ($i = 0; $i < $el['score']; $i++) {
                                                // echo "The number is: $i <br>";
                                                echo '&#9733;';
                                        }
                                        switch ($el['score']) {
                                            case '1':
                                                # code...
                                                echo '&#9734;&#9734;&#9734;&#9734;';
                                                break;
                                            case '2':
                                                echo '&#9734;&#9734;&#9734;';
                                            break;

                                            case '3':
                                                echo '&#9734;&#9734;';
                                            break;
                                            case '4':
                                                echo '&#9734;';
                                            break;
                                            
                                            default:
                                                # code...
                                                break;
                                        } 
                                        echo '<span class="mx-4 text-primary">'.$el['notes-count'] .' notations</span>';
                                        echo '</small>';
                                        echo '</div>';

                                    }else{
                                        echo ' <div class="card-footer border_radius">';
                                        echo '<small class="text-muted">';

                                            echo '<p>Ce Founisseur n\'a pas été noté encore</p>';
                                    
                                        echo '</small>';
                                        echo' </div>';
                                    }
                                    
                                    @endphp
                                    {{-- <div class="card-footer">
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        <span class="ml-4 text-primary">3 950 notations</span>
                                    </div> --}}
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
