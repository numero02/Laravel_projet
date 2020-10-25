@extends('layouts.app2')

@section('content')

        <div class="row mt-5">

            <div class="col-lg-12">
                {{-- ce que tu as fait --}}
                <h1 class="text-center mb-4">Liste des catégories</h1>
                <div class="row">
                    @foreach($list as $li)
                        <div class="col-lg-4 col-md-6 mb-4">                            
                            <div class="card h-100">                
                                <div class="card-body">                                    
                                    <h4 class="card-title"></h4>
                                    <p class="font-weight-bold mb-1">
                                        Nom de catégorie : <span class="font-weight-normal">{{$li->name}}</span>
                                    </p>
                                    <a href="/category/{{ $li->id }}/edit" class="btn btn-primary mt-4">Modifier cette catégorie</a>
                                    <a href="/category/{{ $li->id }}/destroy" class="btn btn-danger mt-4">Supprimer cette catégorie</a>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>

                {{-- mon ajout pour te montrer, tiré de la page ads.blade.php --}}
                <div class="row mb-3">

                    <div class="col-lg-3">

                        <div class="list-group mb-5">
                            <a href="/category/create" class="btn btn-primary mt-4">Ajouter une catégorie</a>
                        </div>

                    </div>

                </div>
                <!-- /.row mb-3 -->
            </div>
            <!-- /.col-lg-3 -->
        </div>
        <!-- /.row fin de la vue -->

@endsection
