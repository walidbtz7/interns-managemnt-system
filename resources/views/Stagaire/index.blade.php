@extends('layouts.master')

@section('content')


@if(session()->has('succes'))
    <script>
        $(document).ready(function(){
            $(document).click(demo.showNotificationAddStagaire('top','center'));
        });
    </script>
@endif

@if(session()->has('succesUp'))
    <script>
        $(document).ready(function(){
            $(document).click(demo.showNotificationupdateStagaire('top','center'));
        });
    </script>
@endif

<div class="row" id='app'>
    <div class="col-md-12">
    <div class="card">

        <div class="header">
        <h4 class="title">Liste Stagaires</h4>
            <div class="pull-right">
                <input v-model="cin" type="text" class="form-control border-input" name="cin" placeholder="Rechercher par CIN" value="" required="" style="border: 2px solid;margin-bottom: 15px;border-radius: 20px;background-color: white;" id='search' @keyup="getStagaire">
            </div>
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
                        <th>STATUT</th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="st in stagaires">

                        <td> <a v-bind:href="'stagaire/' + st.id">@{{ st.cin }}</a></td>
                        <td>@{{ st.nom }}</td>
                        <td>@{{ st.prenom }}</td>
                        <td>@{{ st.telephone }}</td>
                        <td>

                        <a v-bind:href="'mailto:' + st.email">@{{ st.email }}</a>
                        </td>

                        <td>
                            <p v-bind:class='st.statut' style="display: inline;">@{{ st.statut }}</p>
                        </td>

                    </tr>

                </tbody>


            </table>
        </div>

    </div>
</div>


<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>

<script>
    var app = new Vue({
        el : '#app' ,
        data : {
            stagaires : [],
            cin : '' ,
        },
        methods : {
            getStagaire: function()
            {
                if (this.cin.length == 0) {
                    // console.log('aucun');

                    axios.get(window.location.origin+'/allS')
                    .then(responce => {
                            //console.log(responce.data);
                            this.stagaires = responce.data;
                    })
                    .catch(error => {
                            console.log('error :', error);
                    })


                }
                else
                {

                    axios.get(window.location.origin+'/search/'+this.cin)
                    .then(responce => {
                            // console.log(responce.data);
                            this.stagaires = responce.data;
                    })
                    .catch(error => {
                            console.log('error :', error);
                    })


                }

            }
        },
         mounted:function(){
             this.getStagaire();
         }
    });



        $(document).ready(function(){

            $('#LStagaire').addClass('active');



        });







</script>



@endsection
