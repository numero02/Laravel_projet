@extends('layouts.app2')

@section('content')

  <!-- le content de mon layouts -->

    @if($element)
        
    @endif

    <div class="row my-5">

        <div class="col-lg-12">

            <h1 class="text-center mb-4">Liste des demandes d'achat</h1>
            
            <div class="row">
                
                <!-- carte pour boucler l'affichage -->
                @foreach ($element as $li)
                
                    <div class="card col-lg-4 col-md-4 mx-2 my-2 border_radius">
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
                            {{-- <p class="font-weight-bold mb-1">
                                Compagnie : <span class="font-weight-normal"> {{ $li->company }} </span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Numéro d'entreprise : <span class="font-weight-normal"> {{ $li->company_nb }} </span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Adresse : <span class="font-weight-normal"> {{ $li->address }} </span>
                            </p> --}}
                            <p class="font-weight-bold mb-1">
                                Téléphone : <span class="font-weight-normal"> {{ $li->phone }} </span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                Adresse courriel : <span class="font-weight-normal"> {{ $li->email }} </span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                {{-- Joindre par : <span class="font-weight-normal"> {{ $li->join_preference }} </span> --}}
                                Joindre par : <span class="font-weight-normal">join_preference</span>
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
                            {{-- <p class="font-weight-bold mb-1">
                                Rôle : <span class="font-weight-normal"> {{ $li->role }} </span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                <!-- success pour actif et info pour inactif -->
                                Utilisateur active : <span class="font-weight-normal text-success"> {{ $li->active }} </span>
                            </p>
                            <p class="font-weight-bold mb-1">
                                <!-- success pour actif et info pour inactif -->
                                Niveau de privilège : <span class="font-weight-normal text-success"> {{ $li->privilege }} </span>
                            </p> --}}

                            @if ($li->state == "Demande d'Achat Envoyé")
                                <p class="pt-md-2 pl-md-3">Désir acheter</p>
                                
                                <form action="/purchase/state/modify" method="POST">
                                
                                    @csrf
                                    @method('PUT')
                                    
                                    <input type="hidden" name="id_buyer" value="{{$li->id_buyer}}">
                                    <input type="hidden" name="id_seller" value="{{$li->id_seller}}">
                                    <input type="hidden" name="ad_id" value="{{$li->ad_id}}"> 
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Approuver la vente</button>
                                
                                </form> 

                            @elseif($li->state == 'vendu à cet acheteur')

                            <p class="font-weight-bold mt-3 mb-1">
                                Compte rendu : <span class="font-weight-normal"> {{ $li->state }} </span>
                            </p>
                            
                            @elseif($li->state == 'vendu à un autre acheteur')

                            <p class="font-weight-bold mt-3 mb-1">
                                Compte rendu : <span class="font-weight-normal">vendu à quelqu'un d'autre</span>
                            </p>
                            
                            @endif
            
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

@endsection
