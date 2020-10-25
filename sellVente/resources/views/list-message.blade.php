@extends('layouts.app2')

@section('content')

        <!-- le content de mon layouts -->
        
        <!-- Complément de styles pour le projet Web 2 du Collège de Maisonneuve -->
        <link href="/css/accordion.css" rel="stylesheet"/>

        <div class="row my-5">

            <div class="col-lg-12">
                <h1 class="text-center mb-4">Liste des messages</h1>
                <div class="row">

                    @if($list !== null)
                    @foreach ($list as $li)

                        <div class="col mb-4">
                            <div class="tabs">
                                <div class="tab border_radius">
                                    <input type="checkbox" id="chck{{$li->id_seller}}{{$li->id_buyer}}{{$li->ad_id}}" class="accordeon">
                                    <label class="tab-label font-weight-bold d-flex flex-wrap" for="chck{{$li->id_seller}}{{$li->id_buyer}}{{$li->ad_id}}">

                                        <div class="col-lg-4 col-md-4">                            
                                            Message de&nbsp;&nbsp;:&nbsp;&nbsp;
                                            <a href="/ad/{{$li->ad_id}}/show2/{{$li->id_seller}}/{{$li->id_buyer}}">
                                                <span class="btn btn-primary btn_small_height"> {{$li->pseudo}} </span>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 col-md-4">                            
                                            pour l'annonce&nbsp;&nbsp;:&nbsp;&nbsp;{{$li->name}}
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4">                            
                                            {{-- <a href="/message/{{ $li->message_id }}/destroy" class="btn btn-danger">Supprimer cette conversation</a> --}}
                                            <a href="/message/#/destroy" class="btn btn-danger btn_small_height">Supprimer cette conversation</a>
                                        </div>

                                    </label>
                                    <div class="tab-content">

                                        <!-- page chat -->
                                        <div class="row d-flex justify-content-between mx-0">
                                            <div id="chat" class="col-lg-8 col-md-6 mb-5 mx-0">

                                                <!-- clavardage -->
                                                <div id="t-clavardage" class="row ml-0">
                                                    <h2 class="my-4">Messagerie</h2>
                                                    <!-- {{-- <span id="ret">&nbsp;</span> --}} -->

                                                    <!-- {{-- <div id="ta-clavardage" class="col-lg-10 mb-2 border_radius"> --}} -->
                                                    <div id="chat_window" class="col-lg-10 mb-2 border_radius">
                                                        <!-- {{-- @foreach($element['messages'] as $post) -->
                                                        <p>
                                                            <span>{{$post->username}}:</span>{{$post->message}}
                                                        </p>
                                                        <!-- @endforeach --}} -->
                                                    </div>

                                                    <form method="POST" action="/message/store" name="form-clavardage"
                                                        class="form-group">
                                                        {{-- @csrf --}}

                                                        {{-- <input type="hidden" name="ad_id" value="{{ $li->ad_id }}">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                                                        <input type="hidden" name="buyer_id" value="{{ $li->buyer_id }}"> --}}

                                                        <div class="row d-flex justify-content-between mx-0 my-0">
                                                            <div class="col-12 my-0">
                                                                <label for="chat_message"
                                                                    class="col col-form-label text-md-left">
                                                                    Texte à envoyer :
                                                                </label>
                                                            </div>
                                                            <div class="col-12 my-0">
                                                                <input type="text" 
                                                                    id="chat_message"
                                                                    placeholder="Écrivez votre texte ici"
                                                                    class="form-control" name="message"
                                                                    value="Bonjour, je suis intéressé." 
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="form-group row d-flex justify-content-between mx-0 my-0">
                                                            <div class="col-12 mt-3 btn_envoyer">
                                                                <button type="submit" 
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
                                                <!-- pour chacun des messages de la liste des messages d'un usager authentifié -->
                                                <!-- la requête doit fournir en retour toutes les informations de l'usager avec qui on converse et l'annonce au sujet de laquelle on converse -->
                                                <div class="row ml-0">
                                                    <div class="card col-lg-10 col-md-12 mx-0 mt-5 border_radius">
                                                        <div class="card-body">
                                                            <h4 class="font-weight-normal">
                                                                {{-- Vous clavardez avec : <span class="font-weight-bold mb-1"> {{$li->buyer_username}} </span> --}}
                                                                Vous clavardez avec : <span class="font-weight-bold mb-1">username</span>
                                                            </h4>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Nom : <span class="font-weight-normal"> {{$li->buyer_first_name}}&nbsp;{{$li->buyer_last_name}} </span> --}}
                                                                Nom : <span class="font-weight-normal">first_name&nbsp;last_name</span>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Compagnie : <span class="font-weight-normal"> {{$li->buyer_company}} </span> --}}
                                                                Compagnie : <span class="font-weight-normal">company_name</span>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- NEQ : <span class="font-weight-normal"> {{$li->buyer_company_nb}} </span> --}}
                                                                Numéro d'entreprise : <span class="font-weight-normal">company_nb</span>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Adresse : <span class="font-weight-normal"> {{$li->buyer_address}} </span> --}}
                                                                Adresse civique : <span class="font-weight-normal">address</span>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Téléphone : <span class="font-weight-normal"> {{$li->buyer_phone}} </span> --}}
                                                                Téléphone : <span class="font-weight-normal">phone</span>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Adresse courriel : <span class="font-weight-normal"> {{$li->buyer_email}} </span> --}}
                                                                Adresse courriel : <span class="font-weight-normal">email</span>
                                                            </p>
    <!-- *** déboguer la condition pour courriel ou téléphone *** -->
                                                            {{-- // email (0) phone (1) --}}
                                                            {{-- @if({{$li->buyer_join_preference}} == 0) --}}
                                                                <p class="font-weight-bold mb-1">
                                                                    Joindre par : <span class="font-weight-normal">courriel</span>
                                                                </p>
                                                            {{-- @else
                                                                <p class="font-weight-bold mb-1">
                                                                    Joindre par : <span class="font-weight-normal">téléphone</span>
                                                                </p>
                                                            @endif --}}
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Site Web : <a href="{{$li->buyer_link_website}}"><span class="font-weight-normal"> {{$li->buyer_link_website}} </span></a> --}}
                                                                Site Web : <a href="#"><span class="font-weight-normal">link_website</span></a>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- Facebook : <a href="{{$li->buyer_link_facebook}}"><span class="font-weight-normal"> {{$li->buyer_link_facebook}} </span></a> --}}
                                                                Facebook : <a href="#"><span class="font-weight-normal">link_facebook</span></a>
                                                            </p>
                                                            <p class="font-weight-bold mb-1">
                                                                {{-- LinkedIn : <a href="{{$li->buyer_link_linkedin}}"><span class="font-weight-normal"> {{$li->buyer_link_linkedin}} </span></a> --}}
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
                                                            <a href="#"><img class="card-img-top"
                                                                    src="http://placehold.it/700x400" alt=""></a>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    {{-- <a href="../../ad/{{$li->ad_id}}/show">{{$li->ad_name}}</a> --}}
                                                                    <a href="#">ad_name</a>
                                                                </h4>
                                                                <!-- *** faire la condition pour écrire budget pour un service et prix pour un produit *** -->
                                                                {{-- <h5>Budget ou Prix : {{$li->price}}&nbsp;$</h5> --}}
                                                                <h5>Budget ou Prix : price&nbsp;$</h5>
                                                                <p class="font-weight-bold mb-1">
                                                                    {{-- Description : <span class="font-weight-normal">{{$li->description}}</span> --}}
                                                                    Description : <span class="font-weight-normal">description</span>
                                                                </p>
                                                                <p class="font-weight-bold mb-1">
                                                                    {{-- Catégorie : <span class="font-weight-normal">{{$li->category_name}}</span> --}}
                                                                    Catégorie : <span class="font-weight-normal">category</span>
                                                                </p>

                                                                <!-- ces lignes ci-dessous ne s'affichent pas pour un produit -->
                                                                <p class="font-weight-bold mb-1">
                                                                    {{-- Lieu : <span class="font-weight-normal"> {{$li->realization_place}} </span> --}}
                                                                    Lieu : <span class="font-weight-normal">realization_place</span>
                                                                </p>
                                                                <p class="font-weight-bold mb-1">
                                                                    {{-- Durée : <span class="font-weight-normal"> {{$li->duration}} </span> --}}
                                                                    Durée : <span class="font-weight-normal">duration</span>
                                                                </p>
                                                                <!-- fin des données spécifiques aux services -->

                                                                <!-- l'acheteur pourra accéder aux coordonner du vendeur après s’être identifié 
                                                                    et doit pouvoir envoyer « je suis intéressé » en cliquant sur un bouton pour initier la conversation -->
                                                                <p class="font-weight-bold mb-1">
                                                                    {{-- Vendeur : <span class="font-weight-normal"><a href="/users/{{$li->advertiser_id}}/show">{{$li->advertiser_username}}</a></span> --}}
                                                                    {{-- Vendeur : <span class="font-weight-normal"><a href="/seller">username</a></span> --}}
                                                                </p>


                                                                {{-- @if(Auth::user()->role == "Acheteur")
                                                                @if($element["verif"] == false)
                                                                    @if ($element['verif-user'] == true)
                                                                    <p class="btn btn-secondary mt-2">Déjà vendu</p>
                                                                    @else
                                                                    <form action="/purchase/store" method="POST">
                                                                        @csrf
                                                                        
                                                                        <input type="hidden" name="ad_id" value="{{$element['data'][0]->idAd}}">
                                                                        <input type="hidden" name="user_buyer" value="{{Auth::user()->id}}">
                                                                        <input type="hidden" name="user_seller" value="{{$element['data'][0]->user_id}}">
                                                                        <input type="hidden" name="state" value="Demande d'Achat Envoyé">
                                                                        
                                                                        <button type="submit" class="btn btn-success mt-2">Demande d'achat</button>
                                                                    </form>
                                                                    @endif
                                                                @elseif($element['reponse'] == "vendu à cet acheteur") --}}
                                                                    <p class="btn btn-secondary  mt-2">Veuillez contacter le fournisseur pour conclure la vente</p>
                                                                    {{-- <form action="" method="post"> <input type="text"> </form>   --}}
                                                                {{-- @elseif($element['reponse'] == 'vendu à un autre acheteur')
                                                                    <p class="btn btn-secondary  mt-2">Le produit ou service a été vendu à un autre acheteur</p>
                                                                @elseif($element['achat']->state == "Demande d'Achat Envoyé")
                                                                    <p class="btn btn-secondary  mt-2">Votre demande d'achat est envoyée</p>
                                                                @endif
                                                                @endif --}}
                                                                {{-- <a href="/purchase" class="btn btn-success  mt-2"></a> --}}


                                                            </div>
                                                            <div class="card-footer border_radius">
                                                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733;
                                                                    &#9734;</small>
                                                                <span class="mx-4 text-primary">3 950 notations</span>
                                                                <!-- système de notation des prestataires par les fournisseurs -->
                                                                <a href="/notation"
                                                                    class="btn btn-success btn-sm ml-4">&#9734;</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./row annonce -->
                                    </div>
                                    <!-- ./col annonce -->
                                </div>
                                <!-- ./fin page chat -->

                            </div>
                            <!-- fin du contenu d'un accordion -->
                        </div>
                        <!-- ./col fin d'un tab -->

                    @endforeach
                    @else

                    {{-- {{$list}} --}}

                    <!-- *** pourquoi ça n'affiche pas "Vous n'avez aucun message" lorsqu'il n'y a aucun message ??? *** -->
                    <!-- <div class="tabs">
                        <div class="tab">
                            <label class="tab-label" for="rd1">Vous n'avez aucun message.</label>
                        </div>
                    </div> -->

                    @endif

                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-lg-12 -->

            {{-- inclure jquery et ui --}}
            <script src="/lib/jquery-3.4.1.min.js"></script>
            <script src="/lib/jquery-ui.min.js"></script>
            <!-- charger la class des controles js de validation des formulaires -->
            <script src="/js/ControlForms-chat.js"></script>
            <!-- charger la liste des expressions régulières et leurs messages d'erreur associés de validation des formulaires -->
            <script src="/js/FormFieldsRegExp.js"></script>
            <!-- appel javascript pour valider les champs des formulaires -->
            <script>
              window.addEventListener("load", function () {
                new ControlerFormulaire(document.form, champsFormulaire);
              });
            </script>
            
        </div>
        <!-- /.row fin de la vue -->
        
@endsection
