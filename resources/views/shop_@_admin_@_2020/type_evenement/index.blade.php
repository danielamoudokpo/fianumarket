@extends('layouts.admin')

@section('titre')
<h3>Les types evement</h3>
<p>Liste de tous les types evement</p>
@endsection


@section('content')
        <div class="content__inner">
            <header class="content__title">
                <h1>SERVICES</h1>
                <div class="actions">
                    <a href="{{route('admin.type_evenement.liste')}}" class="actions__item zwicon-refresh-double"></a>
                    <a href="{{route('admin.type_evenement.create')}}" class="actions__item zwicon-plus"></a>
        
                    <div class="dropdown actions__item">
                        <i data-toggle="dropdown" class="zwicon-more-h"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('admin.type_evenement.liste')}}" class="dropdown-item">Refresh</a>
                        <a href="{{route('admin.type_evenement.create')}}" class="dropdown-item">Ajout</a>
                        </div>
                    </div>
                </div>
            </header>
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

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Catégorie évènement</h4>
        <h6 class="card-subtitle">Liste </h6>
        <div class="table-responsive data-table">
            <table id="data-table" class="table">
                <thead>
            <tr>
                <th>ID</th>
                <th>Designation</th>
                <th class="min-tablet">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($type as $types)
                <tr>
                    <td>{{$types->id}}</td>
                    <td>{{$types->libelle}}</td>
                    <td>
                        <form action="{{route('admin.type_evenement.delete',['id' => $types->id])}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="action">
                                <button type="submit" class="btn actions__item zwicon-trash bg-danger"></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

<footer class="footer d-none d-sm-block">
<p>© Super Admin Responsive. All rights reserved.</p>

<ul class="footer__nav">
<a href="#">Homepage</a>
<a href="#">Company</a>
<a href="#">Support</a>
<a href="#">News</a>
<a href="#">Contacts</a>
</ul>
</footer>
</div>
@endsection

@section('script')

@endsection