@extends('layouts.app')

@section('content')

    <div class="col-lg-9">

      <h3 class="text-center display-4">Modifier l'usager : {{$data->username}}</h3>

      <section>

        <form method="POST" action="/members/{{$data->id}}" name="form">

          @csrf
          @method("PUT")

          <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password" class="form-control" value="{{$data->password}}" id="password" name="password"
              required>
          </div>
          <div class="form-group">
            <label for="password_confirm">Reconfirmer le mot de passe : </label>
            <input type="password" class="form-control" value="{{$data->password}}" id="password_confirm"
              name="password_confirm" required>
          </div>
          <div class="form-group">
            <label for="first_name">Prénom : </label>
            <input type="text" class="form-control" value="{{$data->first_name}}" id="first_name" name="first_name"
              required>
          </div>
          <div class="form-group">
            <label for="last_name">Nom de famille : </label>
            <input type="text" class="form-control" value="{{$data->last_name}}" id="last_name" name="last_name"
              required>
          </div>

          <div class="form-group">
            <label for="company">Nom d'enterprise : </label>
            <input type="text" class="form-control" value="{{$data->company}}" id="company" name="company" required>
          </div>
          <div class="form-group">
            <label for="company_nb">Numéro d'enterprise : </label>
            <input type="text" class="form-control" value="{{$data->company_nb}}" id="company_nb" name="company_nb"
              required>
          </div>
          <div class="form-group">
            <label for="address">Adresse : </label>
            <input type="text" class="form-control" value="{{$data->address}}" id="address" name="address" required>
          </div>
          <div class="form-group">
            <label for="phone">Téléphone : </label>
            <input type="text" class="form-control" value="{{$data->phone}}" id="phone" name="phone" required>
          </div>
          <div class="form-group">
            <label for="email">Adresse courriel : </label>
            <input type="email" class="form-control" value="{{$data->email}}" id="email" name="email" required>
          </div>

          <p>Le meilleur moyen de joindre l'usager : </p>

          @if($data->join_preference == 'phone')
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" value="Téléphone" id="choice-phone" name="join_preference" class="custom-control-input"
              checked>
            <label class="custom-control-label" for="choice-phone">Téléphone</label>
          </div>
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" id="choice-email" value="Email" name="join_preference" class="custom-control-input">
            <label class="custom-control-label" for="choice-email">Adresse courriel</label>
          </div>
          @else
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" value="Téléphone" id="choice-phone" name="join_preference" class="custom-control-input">
            <label class="custom-control-label" for="choice-phone">Téléphone</label>
          </div>
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" id="choice-email" value="Email" name="join_preference" class="custom-control-input"
              checked>
            <label class="custom-control-label" for="choice-email">Adresse courriel</label>
          </div>
          @endif

          <div class="form-group">
            <label for="link_website">Site Web : </label>
            <input type="text" class="form-control" value="{{$data->link_website}}" id="link_website"
              name="link_website">
          </div>
          <div class="form-group">
            <label for="link_facebook">Facebook : </label>
            <input type="text" class="form-control" value="{{$data->link_facebook}}" id="link_facebook"
              name="link_facebook">
          </div>
          <div class="form-group">
            <label for="link_linkedin">Linkedin : </label>
            <input type="text" class="form-control" value="{{$data->link_linkedin}}" id="link_linkedin"
              name="link_linkedin">
          </div>



          <div class="form-group">
            <label for="role">Rôle : </label>
            <input type="text" class="form-control" value="{{$data->role}}" id="role" name="role" required>
          </div>


          @if($data->active == 'Oui')

          <p>Choississez l'état actif ou non de l'usager : </p>
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" value="Oui" id="active-yes" name="active" class="custom-control-input" checked>
            <label class="custom-control-label" for="active-yes">Oui</label>
          </div>
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" id="active-no" value="Non" name="active" class="custom-control-input">
            <label class="custom-control-label" for="active-no">Non</label>
          </div>

          @else

          <p>Choississez l'état actif ou non de l'usager : </p>
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" value="Oui" id="active-yes" name="active" class="custom-control-input">
            <label class="custom-control-label" for="active-yes">Oui</label>
          </div>
          <div class="custom-control custom-radio  custom-control-inline">
            <input type="radio" id="active-no" value="Non" name="active" class="custom-control-input" checked>
            <label class="custom-control-label" for="active-no">Non</label>
          </div>

          @endif
          <div>
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>

        </form>
      </section>

    </div>
    <!-- /.col-lg-9 -->

@endsection
