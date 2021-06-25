@extends('layouts.master')

@section('content')

@if(count($errors))
    <div class="container">
        <div class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $message )
                <li>{{ $message }}</li>
                @endforeach
            </ul>

            
               


        </div>
    </div>
    @endif


    @if(session()->has('errorEmail'))
    <div class="container">
        <div class="alert alert-danger">
            <ul>
                <li>{{ session()-> get('errorEmail') }}</li>
            </ul>
        </div>
    </div>
    @endif

             




<div class="col-md-12">
<div class="card">

    <div class="header">
    <h4 class="title">Ajouter une utilisateur</h4>
    </div>

<div class="content">
    <form action="{{ url('user') }}" method='POST' >
    {{ csrf_field() }}

    <div class="row">

        <div class="col-md-5">
            <div class="form-group">
            <label>Nom Complete</label>
            <input type="text" class="form-control border-input" name='nom'  placeholder="Nom de utilisateur" value="{{ old('nom') }}" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control border-input" name='email' placeholder="Email de utilisateur" value="{{ old('email') }}" required>
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
            <label>TELEPHONE</label>           
            <input type="text" class="form-control border-input" name='tele' placeholder="Telephone de utilisateur" value="{{ old('tele') }}" required>
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
            <label>Mot de pass</label>
            <input type="password" class="form-control border-input" name='pass' placeholder="Mot de pass" value="{{ old('pass') }}" required>
            </div>
        </div>

    </div>

    <div class="row">



        <div class="col-md-4">
            <div class="form-group">
            <label>Role</label>
            <select class="form-control border-input" name="role" required>
                <option value="admin">admin</option>
                <option selected value="subAdmin">sub admin</option>
                <option value="normal">utilisateur Normal</option>
            </select>
            </div>
        </div>



    </div>


    <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd">Ajouter</button>
    </div>
    <div class="clearfix"></div>
    </form>
</div>
</div>
</div>



<script>

$(document).ready(function(){

    $('#Utilisateur').addClass('active');
        
        
    
});


</script>

@endsection
