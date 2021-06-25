@extends('layouts.master')

@section('content')


@if(session()->has('succesUser'))
    <script>
        $(document).ready(function(){
            $(document).click(demo.showNotificationAddUser('top','center'));
        });
    </script>
@endif

@if(session()->has('succesUserUp'))
    <script>
        $(document).ready(function(){
            $(document).click(demo.showNotificationupdateUser('top','center'));
        });
    </script>
@endif

<script src="{{ asset('js/swetteAlert.min.js') }}"></script>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Utilisateur</h4>
                <a href="{{ url('user/create') }}" class="btn btn-success pull-right">Noveau Utilisateur</a>



                

            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom complete</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{ $u -> id }}</td>
                                <td>{{ $u -> name }}</td>
                                <td>{{ $u -> telephone }}</td>
                                <td>{{ $u -> email }}</td>
                                <td>{{ $u -> role }}</td>
                                <td>
                                    <a href="user/{{ $u -> id }}/edit" class="btn btn-info">modifier</a>

                                    <form action="{{ url('user/'. $u -> id) }}" method="post" style="display: inline;" class="SAlert">

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{ method_field('DELETE') }}

                                            <input type="button" value="Suprimer" class="dAlert btn btn-danger" style="margin-top: 0;">    
                                    </form>  

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>




</div>

<script>

$(document).ready(function(){

    $('#Utilisateur').addClass('active');
        
        
    
});


</script>




@endsection
