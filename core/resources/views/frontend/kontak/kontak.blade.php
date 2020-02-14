@extends('frontend.layouts.master')
@section('content')
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h1 class="title">Kontak</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Kontak</li>
                                </ul>                   
                            </div>
                        </div><!-- /.page-title-captions --> 
                        
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /.page-title -->
        <section class="flat-row our-story pad-top0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="title"><strong>KONTAK</strong></h4><br>
                                <ul class="col-md-12">
                                        <p> Tel: 0123 456 789<br></p>
                                        <p>E-mail: a href="#">support@linethemes.com</p>
                            </div><!-- /.col-md-3 -->
                        </div><!-- /.row -->
                        <div class="flat-divider d50px"></div>
                    </div><!-- /.col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlq6Dpze8jslbWTAD3hzE-R3_CnR2p0s&callback=myMap"></script>


        @endsection