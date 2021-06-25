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

    @if(session()->has('errorStagaire'))
    <div class="container">
        <div class="alert alert-danger">
            <ul>
                <li>{{ session()-> get('errorStagaire') }}</li>
            </ul>
        </div>
    </div>
    @endif

<div class="col-md-12">
<div class="card">

    <div class="header">
    <h4 class="title">Modifier stagaire</h4>
    </div>

<div class="content">
    <form action="{{ url('stagaire/'.$st -> id) }}" method='POST' enctype='multipart/form-data'>

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">

        <div class="col-md-5">
            <div class="form-group">
            <label>CIN</label>
            <input type="text" class="form-control border-input" name="cin" placeholder="CIN de Stagaire" value="{{ $st -> cin }}" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label>NOM</label>
            <input type="text" class="form-control border-input" name="nom" placeholder="NOM" value="{{ $st -> nom }}" >
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>PRENOM</label>
            <input type="text" class="form-control border-input" name="prenom" placeholder="PRENOM" value='{{ $st -> prenom }}' >
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
            <label>TELEPHONE</label>           
            <input type="text" class="form-control border-input" name="tele" placeholder="TELEPHONE" value="{{ $st -> telephone }}" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control border-input" name="email" placeholder="Email" value="{{ $st -> email }}" >
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
            <label>Etablisement</label>
            <input type="text" class="form-control border-input" name="etab" placeholder="Etablisement" value="{{ $st -> etablisement }}" >
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
            <label>Date Debut</label>
            <input type="date" class="form-control border-input" name="dd" value="{{ $st -> dateDebut }}" >
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Date Fin</label>
            <input type="date" class="form-control border-input"  name="df" value="{{ $st -> dateFin }}">
            </div>
        </div>
        @if( Auth::user() -> role == 'admin')
        <div class="col-md-4">
            <div class="form-group">
            <label style="margin-bottom: 20px;">Satut</label>
            <select class="form-control border-input" name="Statut" v='{{ $st -> statut }}' id='statut'>

                <option value="stage">stage</option>
                <option selected value="attendre">attendre</option>
                <option value="refuse">refuse</option>
                <option value="complete">complete</option>
            </select>
            </div>
        </div>
        @endif
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
            <label>Photo</label>
            <input type="file" name='photo' class="form-control border-input" value='{{ $st -> photo }}'>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Curriculum Vitae</label>
            <input type="file" name='cv' class="form-control border-input" value='{{ $st -> cv }}'>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Lettre motivation</label>
            <input type="file" name='motivation' class="form-control border-input">
            </div>
        </div>

    </div>




    <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd">Modifier</button>
    </div>
    <div class="clearfix"></div>
    </form>
</div>
</div>
</div>




<script>

$(document).ready(function(){

    $('#LStagaire').addClass('active');
        
        
    
});


</script>


@endsection
