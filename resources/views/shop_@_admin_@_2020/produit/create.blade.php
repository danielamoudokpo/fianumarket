@extends('layouts.admin')

@section('content')

<header class="content__title">
    <h1>PRODUIT</h1>

    <div class="actions">
        <a href="{{route('admin.produit.liste')}}" class="actions__item zwicon-back"></a>
        <a href="{{route('admin.produit.create')}}" class="actions__item zwicon-refresh-double"></a>

        {{-- <div class="dropdown actions__item">
            <i data-toggle="dropdown" class="zwicon-more-h"></i>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('admin.produit.create')}}" class="dropdown-item">Refresh</a>
            <a href="{{route('admin.produit.liste')}}" class="dropdown-item">Retour</a>
            </div>
        </div> --}}
    </div>
</header>
            {{-- On test si l'action a été bien étffectuée --}}
            @if($errors->any())
            <div class="alert alert-success alert-dismissible fade show">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif

            {{-- message --}}
            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            <p>{{ $message }}</p>
            </div>
            @elseif($message = Session::get('erreur'))
            <div class="alert alert-danger">
            <p>{{ $message }}</p>
            </div>
            @elseif($message = Session::get('erreur_ref'))
            <div class="alert alert-danger">
            <p>{{ $message }}</p>
            </div>

            @endif

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Produit</h4>
        <h6 class="card-subtitle">Ajout de nouveau produit</h6>

        <form action="{{route('admin.produit.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3" id="designation">
            <div class="input-group-prepend">
                <span class="input-group-text">Réference</span>
            </div>
            <input type="text" class="form-control  @error('reference') is-invalid @enderror" value="{{ old('reference')}}" name="reference">
            @error('reference')
            <div class="invalid-feedback">
              {{ $errors->first('reference') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3 " id="fournisseur">
            <select class="select2 select2-hidden-accessible fournisseur" data-placeholder="Fournisseurs" name="id_fournisseur" tabindex="-1" aria-hidden="true">
                <option></option>
                @foreach ($fournisseurs as $fournisseur)
                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}} / {{$fournisseur->societe}}</option>
                @endforeach
            </select>
            @error('id_fournisseur')
                <div class="invalid-feedback">
                  {{ $errors->first('id_fournisseur') }}
                  </div>
              @enderror
        </div>

        <div class="input-group mb-3" id="designation">
            <div class="input-group-prepend">
                <span class="input-group-text">Désignation</span>
            </div>
            <input type="text" class="form-control  @error('designation') is-invalid @enderror" value="{{ old('designation')}}" name="designation">
            @error('designation')
            <div class="invalid-feedback">
              {{ $errors->first('designation') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3" id="quantite">
            <div class="input-group-prepend">
                <span class="input-group-text">Quantité</span>
            </div>
            <input type="number" class="form-control  @error('quantite') is-invalid @enderror" value="{{ old('quantite')}}" name="quantite">
            @error('quantite')
            <div class="invalid-feedback">
            {{ $errors->first('quantite') }}
            </div>
        @enderror
        </div>

        <div class="row">
            <div class="input-group mb-3 col-sm" id="prix_achat">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prix Achat</span>
                </div>
                <input type="number" class="form-control  @error('prix_achat') is-invalid @enderror" value="{{ old('prix_achat')}}" name="prix_achat">
                @error('prix_achat')
                <div class="invalid-feedback">
                {{ $errors->first('prix_achat') }}
                </div>
            @enderror
            </div>

            <div class="input-group mb-3 col-sm" id="prix_vente">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prix de vente</span>
                </div>
                <input type="number" min="1" class="form-control  @error('prix_vente') is-invalid @enderror" value="{{ old('prix_vente')}}" name="prix_vente">
                @error('prix_vente')
                <div class="invalid-feedback">
                {{ $errors->first('prix_vente') }}
                </div>
                @enderror
            </div>
        </div>
    {{--  --}}

    {{--  --}}
    <div class="row">
        <div class="input-group mb-3 col-sm" id="categorie">
            <select class="select2 select2-hidden-accessible categorie" data-placeholder="Categorie" name="categorie_id" tabindex="-1" aria-hidden="true">
                <option></option>
                @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->designation}}</option>
                @endforeach
            </select>
            @error('categorie_id')
                <div class="invalid-feedback">
                  {{ $errors->first('categorie_id') }}
                  </div>
              @enderror
        </div>

        <div class="input-group mb-3 col-sm" id="sous_categorie" style="display: none">
            <select class="select2 select2-hidden-accessible sous_categorie" data-placeholder="Sous catégorie" name="sous_categorie_id" tabindex="-1" aria-hidden="true">
                {{-- <option></option>
                @foreach ($sous_categories as $sous_categorie)
                    <option value="{{$sous_categorie->id}}">{{$sous_categorie->designation}}</option>
                @endforeach --}}
            </select>
            @error('sous_categorie_id')
                <div class="invalid-feedback">
                  {{ $errors->first('sous_categorie_id') }}
                  </div>
              @enderror
        </div>
    </div>
    {{--  --}}

    <div class="input-group mb-3 " id="status">
        <select class="select2 select2-hidden-accessible status" data-placeholder="status" name="status" tabindex="-1" aria-hidden="true">
            <option selected>Selectionner le status de ce produit</option>
                <option value="Publier">Publier</option>
                <option value="En attente">En attente</option>
        </select>
        @error('status')
            <div class="invalid-feedback">
              {{ $errors->first('status') }}
              </div>
          @enderror
    </div>

    <label for="description">Description</label>
    <div class="input-group mb-3" id="designation">
            <textarea class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" style="height: 100px;" id="description" name="description" placeholder="Entrer la description du produits" required=""></textarea>
            <div class="invalid-feedback">
                Veillez saisir la description
            </div>
        @error('description')
        <div class="invalid-feedback">
          {{ $errors->first('description') }}
          </div>
      @enderror
    </div>

        <div class="input-group mb-3" id="photo">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo">
                <label class="custom-file-label" for="photo">Choisir une photo</label>
            </div>
            @error('photo')
                <div class="invalid-feedback">
                {{ $errors->first('photo') }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success btn--icon-text">
            <i class="zwicon-checkmark-circle"></i>
            Valider
        </button>
        <a href="{{route('admin.produit.liste') }}">
            <button type="button" class="btn btn-danger btn--icon-text">
                <i class="zwicon-back"></i>
                Annuler
            </button>
        </a>
    </form>

    </div>
</div>

@endsection

@section('script')


<script>
    $(document).ready(function () {
        $("#produit option").filter(':selected', function () {
            $('#designation').hide();
        }) 
    })

$(document).ready(function(){
  $('#categorie ').change(function(){
    var categorie_id = $('.categorie option').filter(':selected').val();
    console.log(categorie_id);
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "{{route('admin.produit.fetch_sous_categorie')}}",
        method:"post",
        data:{"_token": "{{ csrf_token() }}" , categorie_id:categorie_id},

        success:function(response){
            var obj = jQuery.parseJSON(response);
            console.log(obj);
            if (obj != "") {
                $('#sous_categorie').show();
                $('.sous_categorie').empty();
               for (let i = 0; i < obj.length; i++) {
                   $('.sous_categorie').append('<option value="'+obj[i].id+'" required>'+obj[i].designation+'</option>');
               }
            } else{
            $('#sous_categorie').hide();
            $('.sous_categorie').empty();
            }

            },
            error:function (response) {
                console.log(response);
            }
    })
  });
});
</script>
@endsection