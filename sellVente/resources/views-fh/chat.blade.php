@extends('layouts.app2')

@section('content')

        <!-- le content de mon layouts -->

        <div class="row d-flex justify-content-between mx-0">
            <div id="chat" class="col-lg-8 col-md-6 mb-5 mx-0">

                <!-- clavardage -->
                <div id="t-clavardage" class="row ml-0">
                    <h2 class="my-4">Messagerie</h2>
                    {{-- <span id="ret">&nbsp;</span> --}}

                    {{-- <div id="ta-clavardage" class="col-lg-10 mb-2 border_radius"> --}}
                    <div id="chat_window" class="col-lg-10 mb-2">
                        @foreach($element['messages'] as $post)
                            <p><span>{{$post->username_sender}}:</span>{{$post->message}}</p>
                        @endforeach
                    </div>

                    <form method="POST" action="/message/store" name="form-clavardage" class="form-group">
                        @csrf

                        {{-- <input type="hidden" name="user_id_ads" value="{{ $element["data"][0]->user_id }}"> --}}
                        {{-- <input type="hidden" name="user_id_ads" value="{{ $element["data"][0]->idAd }}"> --}}
                        
                        <input type="hidden" name="ad_id" value="{{ $element["data"][0]->idAd }}">
                        <input type="hidden" name="username_sender" value="{{ Auth::user()->username }}">
                        <input type="hidden" name="id_sender" value="{{ Auth::user()->id }}">
                        
                        <input type="hidden" name="id_buyer" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="id_seller" value="{{ $element["data"][0]->adsUser }}">
                        
                        <div class="row d-flex justify-content-between mx-0 my-0">
                            <div class="col-12 my-0">
                                <label for="chat_message" class="col col-form-label text-md-left">
                                    Texte à envoyer : 
                                </label>
                            </div>
                            <div class="col-12 my-0">
                                {{-- *** faire la valisation js de ce input *** --}}
                                <input type="text" 
                                    id="chat_message" 
                                    placeholder="Écrivez votre texte ici" 
                                    class="form-control" 
                                    name="message"
                                    {{-- *** dès qu'envoyé le message ci-dessous, retirer la valeur avec un code js *** --}}
                                    value="Bonjour, je suis intéressé." 
                                />
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-between mx-0 my-0">
                            <div class="col-12 mt-3 btn_envoyer">
                                <button type="submit" 
                                    class="btn btn-primary"
                                    id="btnEnvoyer" 
                                    class="btn btn-primary mt-4 col-12 btn_width">
                                    Envoyer 
                                </button>
                                <span id=chat_message_err></span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ./clavardage -->

                <!-- usager -->
                <div class="row ml-0">
                    <div class="card col-lg-10 col-md-12 mx-0 mt-5 border_radius">
                        <div class="card-body">
                            <h4 class="font-weight-normal">
                                {{-- Vous clavardez avec : <span class="font-weight-bold mb-1"> {{$li->username}} </span> --}}
                                Vous clavardez avec : <span class="font-weight-bold mb-1">username</span>
                            </h4>
                            <p class="font-weight-bold mb-1">
                                {{-- Nom : <span class="font-weight-normal"> {{$li->first_name}}&nbsp;{{$li->last_name}} </span> --}}
                                Nom : <span class="font-weight-normal">first_name&nbsp;last_name</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Compagnie : <span class="font-weight-normal"> {{$li->company_name}} </span> --}}
                                Compagnie : <span class="font-weight-normal">company_name</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- NEQ : <span class="font-weight-normal"> {{$li->company_nb}} </span> --}}
                                NEQ : <span class="font-weight-normal">company_nb</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Adresse : <span class="font-weight-normal"> {{$li->address}} </span> --}}
                                Adresse : <span class="font-weight-normal">address</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Téléphone : <span class="font-weight-normal"> {{$li->phone}} </span> --}}
                                Téléphone : <span class="font-weight-normal">phone</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Adresse courriel : <span class="font-weight-normal"> {{$li->email}} </span> --}}
                                Adresse courriel : <span class="font-weight-normal">email</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Joindre par : <span class="font-weight-normal"> {{$li->join_preference}} </span> --}}
                                Joindre par : <span class="font-weight-normal">join_preference</span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Site Web : <a href="{{$li->link_website}}"><span class="font-weight-normal"> {{$li->link_website}} </span></a> --}}
                                Site Web : <a href="#"><span class="font-weight-normal">link_website</span></a>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Facebook : <a href="{{$li->link_facebook}}"><span class="font-weight-normal"> {{$li->link_facebook}} </span></a> --}}
                                Facebook : <a href="#"><span class="font-weight-normal">link_facebook </span></a>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- LinkedIn : <a href="{{$li->link_linkedin}}"><span class="font-weight-normal"> {{$li->link_linkedin}} </span></a> --}}
                                LinkedIn : <a href="#"><span class="font-weight-normal">link_linkedin</span></a>
                            </p>
                        </div>
                        <!-- ./carte -->
                    </div>
                    <!-- ./col carte -->
                </div>
                <!-- ./usager -->

            </div>
            <!-- ./col clavardage et usager -->

            <!-- annonce -->
            <div class="col-lg-4 col-md-5 mb-5">
                <div class="row">

                    <div id="t-annonce" class="mx-0">
                        <h2 class="mt-4">Annonce</h2>
                        <span id="ret-annonce">&nbsp;</span>
                        <div class="card border_radius">
                            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="../../ad/{{$element['data'][0]->ad_id}}/show">{{$element['data'][0]->ad_name}}</a>
                                </h4>
                                <!-- *** faire la condition pour écrire budget pour un service et prix pour un produit *** -->
                                <h5>Budget ou Prix : {{$element['data'][0]->price}}&nbsp;$</h5>
                                <p class="font-weight-bold mb-1">
                                    Description : <span class="font-weight-normal">{{$element['data'][0]->description}}</span>
                                </p>
                                <p class="font-weight-bold mb-1">
                                    {{-- Catégorie : <span class="font-weight-normal">{{$element['data'][0]->category}}</span> --}}
                                    Catégorie : <span class="font-weight-normal">category</span>
                                </p>
                        
                                <!-- ces lignes ci-dessous ne s'affichent pas pour un produit -->
                                <p class="font-weight-bold mb-1">
                                    {{-- Lieu : <span class="font-weight-normal"> {{$element['data'][0]->realization_place}} </span> --}}
                                    Lieu : <span class="font-weight-normal">realization_place</span>
                                </p>
                                <p class="font-weight-bold mb-1">
                                    {{-- Durée : <span class="font-weight-normal"> {{$element['data'][0]->duration}} </span> --}}
                                    Durée : <span class="font-weight-normal">duration</span>
                                </p>
                                <!-- fin des données spécifiques aux services -->
                        
                                <!-- l'acheteur pourra accéder aux coordonner du vendeur après s’être identifié 
                                     et doit pouvoir envoyer « je suis intéressé » en cliquant sur un bouton pour initier la conversation -->
                                <p class="font-weight-bold mb-1">
                                    {{-- Vendeur : <span class="font-weight-normal"><a href="/users/{{$element['data'][0]->id}}/edit">{{$element['data'][0]->username}}</a></span> --}}
                                    Vendeur : <span class="font-weight-normal"><a href="/seller">{{$element['data'][0]->username}}</a></span>
                                </p>
                                <a href="/purchase" class="btn btn-success mt-2">Procéder à l'achat</a>
                            </div>
                            <div class="card-footer border_radius">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                <span class="mx-4 text-primary">3 950 notations</span>
                                <!-- système de notation des prestataires par les fournisseurs -->
                                <a href="/notation" class="btn btn-success btn-sm ml-4">&#9734;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./row -->
            </div>
            <!-- ./col annonce -->

            <!-- chargement de jquery et du traitement javascript -->
            <script src="/lib/jquery-3.4.1.min.js"></script>
            {{-- <script src="/js/main.js"></script> --}}
            
        </div>
        <!-- /.row fin de la vue -->

@endsection
