@extends('../layouts.app')

@section('content')

<div id="wizard2" class="container" style="padding-top: 5%">
    <h3>Information Personnelle</h3>
    <section>
      {{-- <p>Try the keyboard navigation by clicking arrow left or right!</p> --}}
      <div class="form-group wd-xs-300">
        <label class="form-control-label">Nom: <span class="tx-danger">*</span></label>
        <input id="nom" class="form-control" name="nom" placeholder="Entrer votre nom" type="text" required>
      </div><!-- form-group -->
      <div class="form-group wd-xs-300">
        <label class="form-control-label">Prénom: <span class="tx-danger">*</span></label>
        <input id="prenom" class="form-control" name="prenom" placeholder="Entrer votre prénom" type="text" required>
      </div><!-- form-group -->
      <div class="form-group wd-xs-300">
        <label class="form-control-label">Photo: <span class="tx-danger">*</span></label>
        <input id="image" class="form-control" name="image" type="file" required>
      </div>
      <div class="form-group wd-xs-300">
        <label class="rdiobox">
        <input id="sexe" name="sexe" value="Masculin"  type="radio">
        <span>M</span>
      </label>
      <label class="rdiobox">
      <input id="sexe"  name="sexe" value="Féminin" type="radio">
        <span>F</span>
      </label>
    </div>
    </section>
    <h3>Votre profil</h3>
    <section >
      
      <div class="form-group wd-xs-300">
        <label class="form-control-label">Domaine: <span class="tx-danger">*</span></label>
        <select class="domaine form-control select2" id="domaine" name="domaine" data-placeholder="Choose Browser">
          @if($domaines)
          @foreach($domaines as $rs)
          <option value="{{$rs->specialite}}">{{$rs->libele}}</option>
          @endforeach
          @endif
        </select>
      </div><!-- form-group -->
      <div class="form-group wd-xs-300">
        <label class="form-control-label">Spécialité: <span class="tx-danger">*</span></label>
        <select class="form-control select2" id="specialite" name="specialite" data-placeholder="Choose Browser">
           
        </select>
      </div><!-- form-group -->
    </section>
    <h3>Fin</h3>
    <section>
      <p>The next and previous buttons help you to navigate through your content.</p>
    </section>
  </div>


  @endsection