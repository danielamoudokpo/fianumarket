@extends('layouts.admin')

@section('titre')
<h3>CREER DE NOUVELLES TYPE D'EVENEMENT'.</h3>
<p>Créer de nouveaux type d'evenement</p>
@endsection

@section('content')
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

    <div class="col-sm-6 table-toolbar-left">
        <a href="{{route('admin.type_evenement.index')}}">
        <button class="btn btn-purple"><i class="demo-pli-arrow-left icon-fw"></i>Aller à la liste</button>
        </a>
    </div>
    <div class="col-sm-6 table-toolbar-right">
    <div class="btn-group">
        <a href="{{route('admin.type_evenement.create')}}">
            <button class="btn btn-info"><i class="demo-pli-refresh icon-lg"></i></button>
        </a>
    </div>
</div>

<div class="col-xs-12">
    <!-- Row selection (single row) -->
    <!--===================================================-->
<div class="panel">
    <div class="panel-body">
        <div class="fixed-fluid">
            <div class="fluid">
                <!-- COMPOSE Eblog -->
                <!--===================================================-->
                <!--Input form-->
                <form  class="form-horizontal" action="{{route('admin.type_evenement.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    
                    <div class="form-group">
                        <label class="col-lg-1 control-label text-left" for="inputSubject">Designation</label>
                        <div class="col-lg-11">
                            <input type="text" id="inputSubject" name="libelle" class="form-control">
                        </div>
                    </div>
                    <button style="float: right;" type="submit" id="blog-send-btn" type="button" class="btn btn-primary">
                        <i class="demo-psi-check icon-lg icon-fw"></i>Valider
                    </button>
                </form>


                <!--===================================================-->
                <!-- END COMPOSE Eblog -->
            </div>
        </div>
    </div>
</div>
{{-- //---- --}}
</div>
</div>
@endsection