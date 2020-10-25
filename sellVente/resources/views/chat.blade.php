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
                            <p class="font-weight-bold mb-1">
                                {{$post->username_sender}}&nbsp;:<span class="font-weight-normal">&nbsp;{{$post->message}}</span>
                            </p>
                        @endforeach
                    </div>

                    {{-- <form method="POST" action="/message/store" name="form-clavardage" class="form-group"> --}}
                    
                        <form method="POST" action="/message/store" name="form" class="form-group">
                        @csrf

                      
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
                            <div class="col-10 my-0">
                                <input type="text" 
                                    id="chat_message" 
                                    placeholder="Écrivez votre texte ici" 
                                    class="form-control" 
                                    name="message"
                                />
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-between mx-0 my-0">
                            <div class="col-12 mt-3 btn_envoyer">
                                <button type="submit" 
                                    class="btn btn-primary"
                                    id="btnEnvoyer" 
                                    class="btn btn-primary mt-4 btn_width">
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
                            
                            {{-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> --}}
                            <a href="../../ad/{{$element['data'][0]->idAd}}/show"><img class="card-img-top" src="/{{$element['data'][0]->link_picture_1}}" alt=""></a>                            
                            <div class="card-body">
                                <h4 class="card-title">
                                  <a href="../../ad/{{$element['data'][0]->idAd}}/show">{{$element['data'][0]->adsName}}</a>
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
                                  @elseif($element['reponse'] == "vendu à cet acheteur")
                                    <p class="btn btn-secondary  mt-2">Veuillez contacter le fournisseur pour conclure la vente</p>
                                    <form action="" method="post"> <input type="text"> </form>   
                                  @elseif($element['reponse'] == 'vendu à un autre acheteur')
                                      <p class="btn btn-secondary  mt-2">Le produit ou service a été vendu à un autre acheteur</p>
                                  @elseif($element['achat']->state == "Demande d'Achat Envoyé")
                                    <p class="btn btn-secondary  mt-2">Votre demande d'achat est envoyée</p>
                                  @endif
                                @endif --}}


                                
                                @if(Auth::user()->role == "Acheteur")
                                @if($element["verif"] == false)
                                @if ($element['verif-user'] == true)
                                    
                                    <h2>Message :</h2>

                                    <p class="btn btn-secondary">Produit déjà vendu</p>
                                
                                @else
                                    
                                    <form action="/purchase/store" method="POST">

                                    @csrf
                                    
                                    <input type="hidden" name="ad_id" value="{{$element['data'][0]->idAd}}">
                                    <input type="hidden" name="user_buyer" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="user_seller" value="{{$element['data'][0]->user_id}}">
                                    <input type="hidden" name="state" value="Demande d'Achat Envoyé">
                                    
                                    <button type="submit" class="btn btn-success">Demander l'Achat</button>
                                    </form>

                                @endif
                                
                                @elseif($element['reponse'] == "vendu à cet acheteur")
                                
                                <h2>Message :</h2>
                                <p class="btn btn-secondary">Achat Accepté: Veuillez contacter le fournisseur pour conclure la vente</p>
                                
                                @if($element['notes-verif'] == null)

                                    <h2>Noter le fournisseur:</h2>
                                    <form action="/scoring/store" method="post">
                                        @csrf
                                        <select name="scoring" class="form-control">

                                            <option value="1">1 Étoile</option>
                                            <option value="2">2 Étoiles</option>
                                            <option value="3">3 Étoiles</option>
                                            <option value="4">4 Étoiles</option>
                                            <option value="5">5 Étoiles</option>
                                        
                                        </select>

                                        <input type="hidden" name="id_buyer" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="id_seller" value="{{$element['data'][0]->user_id}}">
                                        
                                        <input type="submit" class="btn btn-success" value="Noter">
                                    
                                    </form>

                                @endif
                                
                                

                                @elseif($element['reponse'] == 'vendu à un autre acheteur')
                                    <h2>Message :</h2>
                                    <p class="btn btn-secondary">Le produit ou service a été vendu un autre acheteur</p>
                                @elseif($element['achat']->state == "Demande d'Achat Envoyé")
                                <h2>Message :</h2>
                                <p class="btn btn-secondary">Votre demande d'achat est Envoyé</p>
                                @endif

                            @endif
                            {{------------------------------------------------------------------------------
                                Fin des conditions
                                ----------------------------------------------------------------------------
                            --}}



                                {{-- <a href="/purchase" class="btn btn-success  mt-2"></a> --}}

                            </div>



                            @if($element['score-verif'])
                            <div class="card-footer border_radius">
                                <small class="text-muted">
                                    @php
                                        // $element['score']
                                        for ($i = 0; $i < $element['score']; $i++) {
                                                // echo "The number is: $i <br>";
                                                echo '&#9733;';
                                        }
                                        switch ($element['score']) {
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
                                    @endphp
                                </small>
                                {{-- @foreach ($collection as $item)

                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                    
                                @endforeach --}}
                                
                                <span class="mx-4 text-primary">{{ $element['notes-count'] }} notations</span>
                                <!-- système de notation des prestataires par les fournisseurs -->
                                {{-- <a href="/notation" class="btn btn-success btn-sm ml-4">&#9734;</a> --}}
                            
                            </div>    
                        @else
                            <div class="card-footer border_radius">
                                <small class="text-muted">

                                    <p>Ce Founisseur n'a pas été noté encore</p>
                                
                                </small>
                            </div>
                        @endif
                        
                            {{-- <div class="card-footer border_radius">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                <span class="mx-4 text-primary">3 950 notations</span>
                                <!-- système de notation des prestataires par les fournisseurs -->
                                <a href="/notation" class="btn btn-success btn-sm ml-4">&#9734;</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- ./row -->
            </div>
            <!-- ./col annonce -->

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
