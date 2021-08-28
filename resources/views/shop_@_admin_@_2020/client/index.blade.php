@extends('layouts.admin')

@section('content')
<div class="content__inner">
    <header class="content__title">
        <h1>CLIENTS</h1>
        <div class="actions">
            <a href="{{route('admin.client.liste')}}" class="actions__item zwicon-refresh-double"></a>
            <a href="{{route('admin.client.show')}}" class="actions__item zwicon-eye"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.client.liste')}}" class="dropdown-item">Refresh</a>
                <a href="{{route('admin.client.show')}}" class="dropdown-item">Ajout</a>
                </div>
            </div>
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
            <span aria-hidden="true">×</span>
        </button>
    <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('erreur'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">X</span>
        </button>
    <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">clients</h4>
            <h6 class="card-subtitle">Liste des clients</h6>
            <div class="table-responsive data-table">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Presom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Pays</th>
                        <th>Ville</th>
                        <th>Details</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->nom}}</td>
                        <td>{{$client->prenom}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->telephone}}</td>
                        <td>{{$client->pays}}</td>
                        <td>{{$client->ville}}</td>
                        <td>
                            {{-- <a href="#"> --}}
                                <div class="action show_client" onclick="showClient()" id="{{$client->id}}">
                                    <button type="submit"  class="btn actions__item zwicon-eye bg-info "></button>
                                </div>
                            {{-- </a> --}}
                        </td>

                        <td>
                            <form action="{{route('admin.client.destroy',['id' => $client->id])}}" method="POST">
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
        <p>© Emvor Admin . Tout droit reservé.</p>

        {{-- <ul class="footer__nav">
            <a href="#">Homepage</a>
            <a href="#">Company</a>
            <a href="#">Support</a>
            <a href="#">News</a>
            <a href="#">Contacts</a>
        </ul> --}}
    </footer>
</div>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

@endsection

@section('script')

<script>
    function showClient() {
    $(document).ready(function () {
        $('.show_client').click(function () {
            let id = $(this).attr('id');
            $.ajax({
                url: "{{route('admin.client.show')}}",
                type: "GET",
                data: {"_token":"{{@csrf_token()}}",id:id},
            success: function (data){
                
                obj = jQuery.parseJSON(data);  
                console.log(data);
                // for (let i = 0; i < obj.length; i++) {
                $('#myModal').empty();
                $('#myModal').append(
                    '<div class="modal-dialog modal-sm bg-info">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '<h4 class="modal-title">Information-Client</h4>'+
                            '</div>'+
                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Nom</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.nom+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Prenom</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.prenom+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Email</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.email+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Téléphone</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.telephone+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Ville</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.ville+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Pays</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.pays+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class=" container row">'+
                                '<div class="col-sm">'+
                                    '<p>Date achat</p>'+
                                '</div>'+
                                '<div class="col-sm">'+
                                    '<p>'+obj.donnee.created_at+'</p>'+
                                '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-default bg-info" data-dismiss="modal">OK</button>'+
                            '</div>'+
                        '</div>'+
                   ' </div>');
                   $('#myModal').modal('show');

                    
                // }

            },
            error: function(data){
                console.log(data);
            }
            });
            return false
        });
    });
}
</script>

@endsection