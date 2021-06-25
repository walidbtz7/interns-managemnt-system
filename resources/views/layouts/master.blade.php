<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('img/Logo.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Gestion Stage</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- <link href="https://bootswatch.com/4/flatly/bootstrap.min.css" rel="stylesheet" /> -->
    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

    <div class="sidebar" data-background-color="white" data-active-color="danger">



    	<div class="sidebar-wrapper" style="overflow: hidden;">
            <div class="logo">
                <a href="{{ url('dashboard') }}" class="simple-text">
                    GESTION STAGE
                </a>
            </div>

            <ul class="nav">

                <li  id='Dashboard'>
                    <a href="{{ url('dashboard') }}">
                        <i class="ti-panel"></i>
                        <p>tableau de bord</p>
                    </a>
                </li >

                <li id='Stagaire'>
                    <a href="{{ url('stagaire/create') }}">
                        <i class="ti-user"></i>
                        <p>Ajouter Stagaire</p>
                    </a>
                </li>

                <li id='LStagaire'>
                    <a href="{{ url('stagaire') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Liste Stagaires</p>
                    </a>
                </li>
                @if( Auth::user() -> role == 'admin')
                <li id='Utilisateur'>
                    <a href="{{ url('user') }}">
                        <i class="ti-text"></i>
                        <p>Utilisateur</p>
                    </a>
                </li>
                @endif

            </ul>
    	</div>

    </div>









    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="navbar-nav navbar-right" style="list-style: none; margin-top: 25px; margin-right: 10px;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                            <!-- bilal -->
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))

                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="padding: 10px; margin: 10px;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        deconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            @yield('content')

        </div>




    </div>
</div>



</body>

    <!--   Core JS Files   -->
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<!-- <script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script> -->

	<!--  Charts Plugin -->
	<script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/paper-dashboard.js') }}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{ asset('js/demo.js') }}"></script>

	<script type="text/javascript">
        $(document).ready(function(){



        var v=$('#statut').attr('v');
        $('#statut').val(v);

        var r=$('#role').attr('v');
        $('#role').val(r);



            $("#dAlert").click(function () {
                Swal.fire({
                    title: 'Êtes-vous sûr?',
                    text: "Vous ne pourrez pas revenir en arrière!",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimez-le!'
                    }).then((result) => {


                    if (result.value) {
                        Swal.fire(
                        'Supprimé!',
                        'Le Stagaire a été supprimé.',
                        'success'
                        )
                        $("#SAlert").submit();
                    }
                    })
            });


            $(".dAlert").click(function () {
                Swal.fire({
                    title: 'Êtes-vous sûr?',
                    text: "Vous ne pourrez pas revenir en arrière!",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimez-le!'
                    }).then((result) => {


                    if (result.value) {
                        Swal.fire(
                        'Supprimé!',
                        'Le Stagaire a été supprimé.',
                        'success'
                        )
                        $(".SAlert").submit();
                    }
                    })
            });


            // $('.st p').each(function() {

            //     var x = $(this).html();

            //         if (x === 'stage') {
            //             $(this).prev().addClass('fa fa-circle text-info');
            //         }

            //         if (x === 'attendre') {
            //             $(this).prev().addClass('fa fa-circle text-warning');
            //         }

            //         if (x === 'refuse') {
            //             $(this).prev().addClass('fa fa-circle text-danger');
            //         }

            //         if (x === 'complete') {
            //             $(this).prev().addClass('fa fa-circle text-Primary');
            //         }

            //     });


            $('.stage').addClass('fa fa-circle text-info');
            $('.attendre').addClass('fa fa-circle text-warning');
            $('.refuse').addClass('fa fa-circle text-danger');
            $('.complete').addClass('fa fa-circle text-Primary');




});



	</script>




</html>
