@extends('layouts.app2')

@section('content')

        <div class="row mt-5">

            <div class="col-lg-12">
                <h1 class="text-center mb-4">Liste des messages</h1>
                <div class="row">

                    @if($list !== null)
                        @foreach ($list as $li)

                            <div class="col-lg-4 col-md-6 mb-4">                            
                                <div class="card h-100">                
                                    <div class="card-body">                                    
                                        <h4 class="card-title"></h4>
                                        <p class="font-weight-bold mb-1">
                                            Message de : 
                                            <a href="/ad/{{$li->ad_id}}/show"><span class="font-weight-normal"> {{$li->username}} </span></a>
                                        </p>
                                        <a href="/messages/{{ $li->message_id }}/destroy" class="btn btn-danger mt-4">Supprimer cette conversation</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @else

                    {{$list}}

                        {{-- *** pourquoi ça n'affiche pas "Vous n'avez aucun message" lorsqu'il n'y a aucun message ??? *** --}}
                        <div class="col-lg-4 col-md-6 mb-4">                            
                            <div class="card h-100">                
                                <div class="card-body">                                    
                                    <h4 class="card-title"></h4>
                                    <p class="font-weight-bold mb-1">
                                        Vous n'avez aucun message. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    @endif

                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row fin de la vue -->

@endsection
