@extends('layouts.admin')

@section('titre')
<h3>MISE A JOUR </h3>
<p>Edition de l'èvenement sélectionné</p>
@endsection

@section('content')

<header class="content__title">
    <h1>evenement</h1>

    <div class="actions">
        <a href="{{route('admin.evenement.liste')}}" class="actions__item zwicon-back"></a>
        <a href="{{route('admin.evenement.edit', ['id' => $evenement->id])}}" class="actions__item zwicon-refresh-double"></a>

        {{-- <div class="dropdown actions__item">
            <i data-toggle="dropdown" class="zwicon-more-h"></i>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('admin.evenement.create')}}" class="dropdown-item">Refresh</a>
            <a href="{{route('admin.evenement.liste')}}" class="dropdown-item">Retour</a>
            </div>
        </div> --}}
    </div>
</header>

<div class="row">
    {{-- On test si l'action a été bien étffectuée --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible ">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- message --}}
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('erreur'))
        <div class="alert alert-danger">
        <p>{{ $message }}</p>
        </div>
    @endif
</div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Evenement</h4>
        <h6 class="card-subtitle">Ajout de nouveau evenement</h6>
        <form  class="form-horizontal" action="{{route('admin.evenement.update' , ['id' => $evenement->id])}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')

                    <div class="input-group mb-3" id="id_type_evenement">
                        <select class="select2 select2-hidden-accessible categorie form-control  @error('id_type_evenement') is-invalid @enderror" value="{{ old('id_type_evenement')}}"  data-placeholder="Type évenement" name="id_type_evenement" tabindex="-1" aria-hidden="true">
                            <option></option>
                            @foreach ($types as $categorie)
                                <option value="{{$categorie->id}}" {{$categorie->id == $evenement->id_type_evenement ?  'selected' : ''}}>{{$categorie->libelle}}</option>
                            @endforeach
                        </select>
                        @error('categorie_id')
                            <div class="invalid-feedback">
                              {{ $errors->first('categorie_id') }}
                              </div>
                          @enderror
                    </div>
            
                    <div class="input-group mb-3" id="designation">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Organisateur</span>
                        </div>
                        <input type="text" class="form-control  @error('organisateur') is-invalid @enderror" value="{{$evenement->organisateur}} {{old($evenement->organisateur)}}" name="organisateur">
                        @error('organisateur')
                        <div class="invalid-feedback">
                          {{ $errors->first('organisateur') }}
                          </div>
                      @enderror
                    </div>
            
                    <div class="input-group mb-3" id="designation">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nom évenement</span>
                        </div>
                        <input type="text" class="form-control  @error('nom') is-invalid @enderror" value="{{$evenement->nom}} {{ old('nom')}}" name="nom">
                        @error('nom')
                        <div class="invalid-feedback">
                          {{ $errors->first('nom') }}
                          </div>
                      @enderror
                    </div>
            
                    <div class="input-group mb-3" id="quantite">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Lieu</span>
                        </div>
                        <input type="text" class="form-control  @error('lieu') is-invalid @enderror" value="{{$evenement->lieu}} {{ old('lieu')}}" name="lieu">
                        @error('lieu')
                        <div class="invalid-feedback">
                        {{ $errors->first('lieu') }}
                        </div>
                    @enderror
                    </div>
            
                    <div class="input-group mb-3" id="quantite">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Exigence</span>
                        </div>
                        <input type="text" class="form-control  @error('exigence') is-invalid @enderror" value="{{$evenement->exigence}} {{ old('exigence')}}" name="exigence">
                        @error('exigence')
                        <div class="invalid-feedback">
                        {{ $errors->first('exigence') }}
                        </div>
                    @enderror
                    </div>
            
                    <div class="row">
                        <div class="input-group mb-3 col-sm" id="prix_achat">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ville</span>
                            </div>
                            <input type="text" class="form-control  @error('ville') is-invalid @enderror" value="{{$evenement->ville}} {{ old('ville')}}" name="ville">
                            @error('ville')
                            <div class="invalid-feedback">
                            {{ $errors->first('ville') }}
                            </div>
                        @enderror
                        </div>
            
                        <div class="input-group mb-3 col-sm" id="prix_vente">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pays</span>
                            </div>
                            <input type="text" min="1" class="form-control  @error('pays') is-invalid @enderror" value="{{$evenement->pays}} {{ old('pays')}}" name="pays">
                            @error('pays')
                            <div class="invalid-feedback">
                            {{ $errors->first('pays') }}
                            </div>
                            @enderror
                        </div>
                    </div>
                {{--  --}}
            
                {{--  --}}
                <div class="row">
                    <div class="input-group mb-3 col-sm" id="status">
                        <select class="form-control select2 select2-hidden-accessible status @error('status') is-invalid @enderror" value="{{ old('status')}}" data-placeholder="Status" name="status" tabindex="-1" aria-hidden="true">
                            <option></option>
                                <option value="{{$evenement->status}}" selected>{{$evenement->status}}</option>
                                <option value="Publier">Publier</option>
                                <option value="En attente">En attente</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                              {{ $errors->first('status') }}
                              </div>
                          @enderror
                    </div>
            
                    <div class="input-group mb-3 col-sm" id="sous_categorie" >
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Date-Heure</span>
                                </div>
                                <input type="text" name="date_time" class="form-control datetime-picker flatpickr-input active @error('date_time') is-invalid @enderror" value="{{$evenement->date_time}} {{ old('date_time')}}"  placeholder="Choisir la date  &amp; l'heure" >
                            </div>
                    </div>
                </div>
            
                <div class="input-group mb-3" id="contact">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contact</span>
                    </div>
                    <input type="text" class="form-control  @error('contact') is-invalid @enderror" value="{{$evenement->contact}} {{ old('contact')}}" name="contact">
                    @error('contact')
                    <div class="invalid-feedback">
                    {{ $errors->first('contact') }}
                    </div>
                @enderror
                </div>
                {{--  --}}
            
                <label for="description">Description</label>
                <div class="input-group mb-3" id="designation">
                        <textarea class="form-control @error('description') is-invalid @enderror" value="{{$evenement->description}} {{ old('description')}}" style="height: 100px;" id="description" name="description" placeholder="Entrer la description du evenements" required="">{{$evenement->description}}</textarea>
                        <div class="invalid-feedback">
                            Veillez saisir la description
                        </div>
                    @error('description')
                    <div class="invalid-feedback">
                      {{ $errors->first('description') }}
                      </div>
                  @enderror
                </div>
            
                    
            
                   
                    <div class="form-group">
                        <div class="col-lg-11">
                        <img src="{{ URL::to('/') }}/event_cover/{{ $evenement->photo }}" class="img-thumbnail" width="100" />
                            <input type="hidden" name="old_image" value="{{ $evenement->photo }}"/><br><br>
                        </div>
                            @error('photo')
                                <div class="invalid-feedback">
                                {{ $errors->first('photo') }}
                                </div>
                            @enderror

                    <div class="input-group mb-3" id="photo">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Changer la photo</label>
                        </div>
                        @error('photo')
                            <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                            </div>
                        @enderror
                    </div>
                    </div>

                    <button type="submit" class="btn btn-success btn--icon-text">
                        <i class="zwicon-checkmark-circle"></i>
                        Valider
                    </button>
                    <a href="{{route('admin.evenement.liste') }}">
                        <button type="button" class="btn btn-danger btn--icon-text">
                            <i class="zwicon-back"></i>
                            Annuler
                        </button>
                    </a>

                </form>


    </div>
</div>
{{-- //---- --}}

@endsection

@section('script')
    {{-- <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="{{asset('admin/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet') }}">


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="{{asset('admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet') }}"> --}}
@endsection