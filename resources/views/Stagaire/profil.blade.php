@extends('layouts.master')

@section('content')
<script src="{{ asset('js/swetteAlert.min.js') }}"></script>

<div class="col-lg-8 col-md-8"  style="margin-left: 17%;">
@foreach($st as $s)
                        <div class="card card-user">
                            <div class="image">
                                <img src="{{ asset('storage/'.$s->photo) }}" alt="back-photo">
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="{{ asset('storage/'.$s->photo) }}" alt="profil-photo">

                                  <h4 class="title">{{ $s -> nom }} {{ $s -> prenom }}<br>
                                     <span><small>{{ $s -> statut }}</small></span>
                                  </h4>
                                </div>


                                <div class="profile-detail" >
									<div class="profile-info">
										<h4 class="heading">Les Infomations</h4>

                                        <table>
                                            <tr class=''>
                                                <td class="text-success">CIN</td>
                                                <td>{{$s -> cin}}</td>
                                            </tr>

                                            <tr class=''>
                                                <td class="text-success">Telephone</td>
                                                <td>{{$s -> telephone}}</td>
                                            </tr>

                                            <tr class=''>
                                                <td class="text-success">Email</td>
                                                <td>{{$s -> email}}</td>
                                            </tr>

                                            <tr class=''>
                                                <td class="text-success">Etablisement &nbsp;&nbsp;</td>
                                                <td>{{$s -> etablisement}}</td>
                                            </tr>

                                            <tr class=''>
                                                <td class="text-success">date debut &nbsp;&nbsp;</td>
                                                <td>{{$s -> dateDebut}}</td>
                                            </tr>

                                            <tr class=''>
                                                <td class="text-success">date fin &nbsp;&nbsp;</td>
                                                <td>{{$s -> dateFin}}</td>
                                            </tr>

                                            <tr class=''>
                                                <td class="text-success">Nombre absence &nbsp;&nbsp;</td>
                                                <td class="">{{ $count }} &nbsp;&nbsp;</td>
                                                <td>
                                                    <!-- <button id='showAbs'></button> -->
                                                    <button id='showAbs' class="btn btn-sm btn-success btn-icon"><i class="fa ti-eye"></i></button>
                                                </td>
                                            </tr>


                                        </table>

									</div>
								</div>
                            </div>

                            <hr>

                            <div class="text-center" style="padding-bottom: 10px;">
                                <div class="row" >

                                    @if( Auth::user() -> role == 'admin' || Auth::user() -> role == 'subAdmin')
                                    <div class="col-md-3 col-md-offset-1">
                                        <a href="{{ $s -> id }}/edit" class="btn btn-warning" style="margin-top: 10px;">Modifier</a>
                                    </div>
                                    @endif


                                    @if( Auth::user() -> role == 'admin')
                                    <div class="col-md-4">

                                        <form action="{{ url('stagaire/'. $s -> id) }}" method="post" id="SAlert">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{ method_field('DELETE') }}


                                            <button type="submit" id="" style="display: none;">Delete</button>
                                            <input type="button" value="Suprimer" id="dAlert" class="btn btn-danger" style="margin-top: 10px;">

                                        </form>

                                    </div>
                                    @endif


                                    <div class="col-md-3">
                                        <a href="{{ asset('storage/'.$s->cv) }}" class="btn btn-success" style="margin-top: 10px;">CV</a>
                                    </div>

                                    <div class="col-md-6 text-centre">
                                        <a href="{{ asset('storage/'.$s->motivation) }}" class="btn btn-success" style="margin-top: 10px;">Lettre motivation</a>
                                    </div>


                                </div>
                            </div>

                        </div>
@endforeach
                    </div>



    <div class="bg-modal" style="height: 100vh; left: 0;">
	    <div class="modal-contents" >

		    <div class="close">+</div>
            <h4 class="card-title">Les absences de {{ $s -> nom }} {{ $s -> prenom }}</h4>
            <hr>
            <div style="overflow: scroll;height: 230px;overflow-x: hidden; ">
            <div class="content table-responsive table-full-width" >
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;color: red;font-weight: bold;">DATE</th>
                                <th style="text-align: center;color: red;font-weight: bold;">DURATION</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($abs as $ab)
                        <tr>
                            <td>{{ $ab -> dateAbs }}</td>
                            <td>{{ $ab -> duree }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- ---------- -->
            </div>

        </div>

    </div>




<script>

$(document).ready(function(){

    $('#LStagaire').addClass('active');

    $("#showAbs").click(function () {

        $('.bg-modal').css('display','flex');

    });


    $('.close').click(function () {

            $('.bg-modal').css('display','none');


        });



});


</script>


@endsection
