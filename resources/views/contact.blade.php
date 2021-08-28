@extends('layouts.ads')

@section('ads_content')
      <!-- Shop Starts-->
      <section class="contact-wrap sec-space-bottom">
        <div class="container rel-div pt-50">

            <div class="row">
                <div class="col-md-8">
                    {{-- <div class="contact-map">  <div id="map"></div> </div> --}}
                    <div class="pt-50 col-md-8 col-md-offset-2">
                        <h3 class="fsz-25 text-center"><strong>CONTACTEZ-NOUS </strong>  </h3> 
                        <h6 class="sub-title-1 text-center">FOREVER FBO</h6>
        
                        <div class="contact-form pt-50">
                        <form class="contact-form row" action="{{route('contact.store')}}" method="POST" id="contact-form">
                            @csrf

                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Nom" name="nom" id="nom" required="" type="text">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Adresse" name="adresse" id="adresse" required="" type="adresse">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Téléphone" name="telephone" id="telephone" type="text">
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control"  placeholder="Message" name="message" id="message" cols="12" rows="4"></textarea>
                                </div>
                                <div class="form-group col-sm-12 text-center pt-15">                                               
                                    <button class="theme-btn" type="submit"> <strong> Envoyer </strong> </button>                                            
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h3 class="fsz-25"><strong>Addresse </strong>  </h3> 
                        <h6 class="sub-title-1 pb-15">VOVOR EMANUEL</h6>

                        <h5 class="clr-txt fsz-12 pt-15">FOREVER FBO</h5>
                        <p>RUE.........</p>

                        <ul>
                            <li> <strong>Télephone:  </strong> <i>+228 ...</i> </li>
                            <li> <strong>Email: </strong> <i> <a href='#'>info@emvor.com</a> </i> </li>
                            <li> <strong>Whatsapp: </strong> <i> <a href='#'> +228.. </a> </i> </li>
                            <li> <strong>Facebook: </strong> <i>  <a href='#'> vovor </a> </i> </li>
                            <li> <strong>Twitter: </strong> <i>  <a href='#'> @vovor </a> </i> </li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="divider-full-1"></div>

        </div>                
    </section>
    <!-- / Shop Ends -->      

@endsection

@section('ads_script')
    
@endsection