@extends('layouts.app')

@section('content')
<!-- BEGIN CONTENT -->
  <div class="container-fluid">
  
  <div class="header-section row">
    <div class="col-sm-12">
      
    </div>
  </div>

  <div class="row">

    <div class="col-sm-5 leftBar">
      @include('auth.login')
      @include('auth.register')
      @include('auth.passwords.recover')
    </div>

    <div class="col-sm-7 rightBar">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/ODTuekcrtlQ" frameborder="0" allowfullscreen></iframe>
      <br>
      <div class="advertisement"> Advertisement comes here </div>

      <div class="row about-section">
        <div class="col-sm-12">
          <h2 class="text-center">About Us</h2>
          <br>
        </div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs aos-init aos-animate">
              <figure><img src="{{ asset('images/product05.jpg') }}" alt=""></figure>
            </div>
            <div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs aos-init aos-animate">
              <p>A highly secured private social media hereafter content site. Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut labor. Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent accullignis lomnus.</p>
              <p>Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor remped modis</p>
            </div>
          </div>
        </div>
        <div class="clearfix">
          <br> <br>
        </div>
      </div>
    </div>

    <div class="col-sm-5 leftBar">
       @include('layouts.footer')
    </div>

  </div>
  
  
</div>
<!-- END CONTENT -->
@endsection