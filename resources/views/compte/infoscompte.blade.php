@extends('layouts.usercompte')

@section('content')
{{-- <div class="row"> --}}
{{-- <div class="col-sm-9"> --}}
        @if($message = Session::get('success'))
                <div class="alert alert-success">
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
<div class="tabs widget">
    <ul class="nav nav-tabs widget">
      <li class="active"> <a data-toggle="tab" href="#profile-tab">Profile connecté <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
      <!-- <li> <a data-toggle="tab" href="#photos-tab"> Photos <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
      <li> <a data-toggle="tab" href="#friends-tab"> Friends <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
      <li> <a data-toggle="tab" href="#groups-tab"> Groups <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li> -->
    </ul>     
    <div class="tab-content">

  <div id="profile-tab" class="tab-pane active">    
  <div class="pd-20">
  <div class="vd_info tr"> <a href="{{route('user.show.edit')}}" class="btn vd_btn btn-xs vd_bg-yellow"> <i class="fa fa-pencil append-icon"></i> Mettre à jour </a> </div>      
<h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon text-success"></i> A propos</h3>
<div class="row">
  <div class="col-sm-6">
    <div class="row mgbt-xs-0">
      <label class="col-xs-5 control-label">Nom & prénom:</label>
      <div class="col-xs-7 controls">{{$userinfos->name}}</div>
      <!-- col-sm-10 --> 
    </div>
  </div>
  <div class="col-sm-6">
    {{-- <div class="row mgbt-xs-0">
      <label class="col-xs-5 control-label">Prénom:</label>
      <div class="col-xs-7 controls">{{$userinfos->prenom}}</div>
      <!-- col-sm-10 --> 
    </div> --}}
  </div>
  <div class="col-sm-6">
    <div class="row mgbt-xs-0">
      <label class="col-xs-5 control-label">Email:</label>
      <div class="col-xs-7 controls">{{$userinfos->email}}</div>
      <!-- col-sm-10 --> 
    </div>
  </div>

  <div class="col-sm-6">
    <div class="row mgbt-xs-0">
      <label class="col-xs-5 control-label">Prénom:</label>
      <div class="col-xs-7 controls">{{$userinfos->prenom}}</div>
      <!-- col-sm-10 --> 
    </div>
  </div>

  <div class="col-sm-6">
    <div class="row mgbt-xs-0">
      <label class="col-xs-5 control-label">Date Inscription:</label>
    <div class="col-xs-7 controls">{{$userinfos->created_at}}</div>
      <!-- col-sm-10 --> 
    </div>
  </div>
</div>
<hr class="pd-10"  />
</div>
<!-- pd-20 --> 
</div>
<!-- home-tab -->

</div>
<!-- tab-content --> 
</div>
<!-- tabs-widget -->              
{{-- </div> --}}
{{-- </div> --}}

@endsection
