@extends('layouts.app2')

@section('content')

  <!-- le content de mon layouts -->
  

        <div class="row">

            <div class="col-lg-3">

                <h2 class="my-4">Catégories</h2>
                <div class="list-group">
                    <select class="list-group-item" id="categories" name="category">
                        <option value="">Aucune sélectionnée</option>
                        <option value="category1_id">Category 1</option>
                        <option value="category2_id">Category 2</option>
                        <option value="category3_id">Category 3</option>
                        <option value="category4_id">Category 4</option>
                        <option value="category5_id">Category 5</option>
                    </select>
                    
                    @if((Auth::user() !== null)&& (Auth::user()->privilege !== "admin") && (Auth::user()->role == "Fournisseur"))
                        <a href="/messages/{{Auth::user()->id}}" class="btn btn-primary mt-4">Liste des Messages</a>
                        <a href="/request/purchase"  class="btn btn-primary mt-4">Liste des demandes d'achat</a>
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
                            {{-- <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide"> --}}
                            <img class="d-block img-fluid" src="/image/bugatti_chirron-1-900-350.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            {{-- <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide"> --}}
                            <img class="d-block img-fluid" src="/image/energetique-2-900-350.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            {{-- <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide"> --}}
                            <img class="d-block img-fluid" src="/image/yoga-1-900-350.jpg" alt="Third slide">
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
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="row mt-1">

                        @foreach($list as $li)
                            <!-- annonce pour boucler -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border_radius">
                                    
                                   {{-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> --}}
                                    <a href="ad/{{$li->idAd}}/show"><img class="card-img-top" src="/{{$li->link_picture_1}}" alt=""></a>
                                    
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">
                                            @if((Auth::user() !== null) && (Auth::user()->role == "Acheteur" ))
                                                <a href="ad/{{$li->idAd}}/show"> {{$li->adsName}} </a>
                                            @elseif((Auth::user() !== null) && (Auth::user()->role == "Fournisseur"))
                                                <a href="ad/{{$li->idAd}}/edit"> {{$li->adsName}} </a>
                                            @elseif(Auth::user() == null)
                                                <a href="ad/{{$li->idAd}}/show"> {{$li->adsName}} </a>
                                            @endif
                                        </h5>
                                        {{-- Budget pour un service et Prix pour un produit --}}
                                        
                                            <h5>Prix&nbsp;:&nbsp;{{$li->price}}&nbsp;$</h5>
                                        {{-- @else
                                            <h5>Budget&nbsp;:&nbsp;{{$li->price}}&nbsp;$</h5>
                                        @endif --}}
                                        <p class="font-weight-bold mb-1">
                                            Description : <span class="font-weight-normal"> {{$li->description}} </span>
                                        </p>
                                        <p class="font-weight-bold mb-1">
                                            Catégorie : <span class="font-weight-normal"> {{$li->nameCategory}} </span>
                                        </p>

                                        <!-- ces lignes ci-dessous ne s'affichent pas pour un produit -->
                                        
                                        @if (($li->realization_place !== null) || ($li->duration !== null))
                                            <p class="font-weight-bold mb-1">
                                                Lieu : <span class="font-weight-normal"> {{$li->realization_place}} </span>
                                            </p>
                                            <p class="font-weight-bold mb-1">
                                                Durée : <span class="font-weight-normal"> {{$li->duration}} </span>
                                            </p>
                                        @endif
                                        
                                        
                                        <!-- fin des données spécifiques aux services -->

                                        <!-- données spécifiques pour un admin -->
                                        
                                        <p class="font-weight-bold mb-1">
                                            {{-- Vendeur : <span class="font-weight-normal"><a href="/members/{{$li->user_id}}/edit"> {{$li->username}} </a></span> --}}
                                            Vendeur : <span class="font-weight-normal"><a href="/members/{{$li->user_id}}/show"> {{$li->username}} </a></span>
                                        </p>
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
