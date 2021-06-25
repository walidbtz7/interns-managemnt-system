@extends('layouts.master')

@section('content')

<div id="app2">


    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">

                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-reload"></i>
                                </div>
                            </div>

                            <div class="col-xs-7">
                                <div class="numbers">
                                    {{ $countEnCours }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-user"></i> En cours
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-medall-alt"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                {{ $countComplete }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-user"></i> Completes
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-close"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                {{ $countRefuse }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-user"></i> Refuser
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <i class="ti-help"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                {{ $countTotal }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-user"></i> en attendant
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Export Listes stagaires</h4>
                    <hr>
                </div>

                <div class="content">
                    <div class="row" style="margin-bottom: 15px;">

                        <div class="col-md-3 text-center">
                            <a href="{{ url('/downoladAll') }}" class="btn btn-success">Tout les Stagaires</a>
                        </div>

                        <div class="col-md-3 text-center">
                            <a href="{{ url('/downoladEnCours') }}" class="btn btn-success">Stagaires en cours</a>
                        </div>

                        <div class="col-md-3 text-center">
                            <a href="{{ url('/downoladCom') }}" class="btn btn-success">Stagaire completes</a>
                        </div>

                        <div class="col-md-3 text-center">
                            <a href="{{ url('/downoladRef') }}" class="btn btn-success">Stagaires Refuse</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="header">
                <h4 class="title">Stagaires En cours</h4>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>CIN</th>
                                <th>NOM</th>
                                <th>PRENOM</th>
                                <th>TELEPHONE</th>
                                <th>EMAIL</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($Stagaires as $s)
                        <tr>
                            <td> <a href="stagaire/{{ $s -> id }}">{{ $s -> cin }}</a></td>
                            <td>{{ $s -> nom }}</td>
                            <td>{{ $s -> prenom }}</td>
                            <td>{{ $s -> telephone }}</td>
                            <td>
                            <a href="mailto:{{ $s -> email }}">{{ $s -> email }}</a>

                            </td>
                            <td>
                                <!-- <button class='abs' v="{{ $s -> id }}">riyab</button> -->
                                <button class="btn btn-info btn-fill btn-wd abs" v="{{ $s -> id }}">l&apos;absence</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

        </div>















    </div>



    <div class="bg-modal">
	    <div class="modal-contents">

		    <div class="close">+</div>
            <h4 class="card-title">Ajouter l&apos;absence</h4>
            <hr>

            <div class="row">




                <div class="col-md-4">
                    <div class="form-group">
                        <label>Numero de Stagaire</label>
                        <input type="text" value="" class="stagaireId" id="sss" disabled>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label>Date d&apos;absence</label>
                        <input type="date" class="form-control border-input" name="inp_date" id="inp_date" required="" v-model="date" >
                    </div>
                </div>

                <div class="col-md-5 pull-left"  style="text-align: left;">
                    <div class="form-group">
                        <div class="">
                            <input type="radio"  id="jour" name="jour" value="jour" v-model="Duration" style="display: inline-block;" @click="updateInfo" >
                            <label for="radio1">Jour</label>
                            <br>
                            <input type="radio"  id="demi" name="demi" value="demi" v-model="Duration" style="display: inline-block;" @click="updateInfo">
                            <label for="radio1">Demi Jour</label>
                        </div>
                    </div>
                </div>




                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-warning btn-fill btn-wd" id="btn_ajouter" @click="addAbs">Ajouter</button>
                    </div>
                </div>




            </div>

        </div>

    </div>







</div>






<script>

$   (document).ready(function(){

        $('#Dashboard').addClass('active');

        $('.abs').click(function () {


            var x = $(document).scrollTop();
            console.log(x);

            $('.bg-modal').css('display','flex');
            $('.modal-contents').css('margin-top',x+100+'px');




            var s = $(this).attr('v');
            console.log(s);
            $('#sss').val(s);

            $('#btn_ajouter').attr('disabled', '');
            check();

        });

        $('.close').click(function () {

            $('.bg-modal').css('display','none');
            jQuery("#jour").prop('checked', false);
            jQuery("#demi").prop('checked', false);
            $("#inp_date").val('Y-m-j');

        });


        function check() {

            if ( ($("#inp_date").val()) && ( jQuery("#jour").prop('checked') === true ||  jQuery("#demi").prop('checked') === true )  ) {

                return true;
            }
        }

         $("#inp_date").change(function () {

            if (check()) {
                $("#btn_ajouter").removeAttr('disabled');
            }

         });

         $("#demi").change(function () {

             if (check()) {
                 $("#btn_ajouter").removeAttr('disabled');
             }

          });

          $("#jour").change(function () {

             if (check()) {
                 $("#btn_ajouter").removeAttr('disabled');
             }

          });







    });


</script>


<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>


<script>

var app = new Vue({
                el : '#app2' ,
                data : {

                            stagairesID : 0,
                            date : '' ,
                            Duration : '',


                },
                methods : {
                    addAbs: function()
                    {

                        axios.post(window.location.origin+'/addAbs',{
                            stagairesID : this.stagairesID ,
                            date : this.date ,
                            Duration : this.Duration ,

                        })
                            .then(responce => {
                                console.log('responce :', responce.data.length);
                                if (responce.data.length == 1) {


                                    setTimeout(function(){
                                        $('.bg-modal').css('display','none');
                                        jQuery("#jour").prop('checked', false);
                                        jQuery("#demi").prop('checked', false);
                                        console.log('ferme');
                                    }, 1000);


                                }
                            })
                            .catch(error => {
                                    console.log('error :', error);
                        })

                    },
                    updateInfo : function()
                    {
                        this.stagairesID = $('#sss').val();
                    }


                }

            });

</script>


@endsection
