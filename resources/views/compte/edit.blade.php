@extends('layouts.usercompte')

@section('content')

<div class="container">

    <div class="vd_content-wrapper">
      <!-- <div class="vd_container"> -->
        <div class="vd_content clearfix">
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Modification des données</h1>
              <small class="subtitle">Utilisateur</small> </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-12">
                      <div class="panel widget light-widget">
                        <div class="panel-heading no-title"> </div>
                      <form class="form-horizontal" action="{{route('user.editer')}}" id="form-add-user" role="form" method="post">
                            {{ csrf_field() }}
                          <div  class="panel-body">
                          <div class="row">
                            {{-- <div class="col-sm-3 mgbt-xs-20">
                              <div class="form-group">
                                
                          </div>
                        </div> --}}
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$userinfos->name}}{{ old($userinfos->name)}}" placeholder="Entrer le nom">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Prénom</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{$userinfos->prenom}}{{ old($userinfos->prenom)}}" placeholder="Entrer le prénom">
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prenom') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$userinfos->email}}{{ old($userinfos->email)}}" placeholder="Entrer l'email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>


                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Nouveau mot de passe (Laisser vide si vous ne voulez pas le changer)</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Entrer le nom">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Confirmation</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="cpassword"  name="password_confirmation"  placeholder="Confirmer le mot de  passe que vous avez entré">
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="pd-20">
                                <button type="submit" class="btn vd_btn vd_bg-green col-md-offset-3"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Valider</button>
                                <button type="cancel" class="btn vd_btn vd_bg-red col-md-offset-3"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Annuler</button>
                            </div>
                          <hr />
                          
                        </div>
                        <!-- col-sm-12 --> 
                      </div>
                      <!-- row --> 
                      
                    </div>
                    <!-- panel-body -->
                    
                  </form>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-sm-12--> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        <!-- </div> -->
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
  </div>

@endsection