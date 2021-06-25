<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Stagaire;
use App\Absence;

use App\Exports\UsersExport;
use App\Exports\StagaireEnCoursExport;
use App\Exports\StagaireCompleteExport;
use App\Exports\StagaireRefusExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Http\Requests\stagaireRequest;

use Barryvdh\DomPDF\PDF;



use Illuminate\Database\Eloquent\ModelNotFoundException;
Use Exception;

class StagaireController extends Controller
{

    public function __construct()
    {
        $this ->middleware('auth');
    }


    public function dashb()
    {
        $countTotal = count(Stagaire::where('statut','attendre')->get());
        $countComplete = count(Stagaire::where('statut','complete')->get());
        $countRefuse = count(Stagaire::where('statut','refuse')->get());
        $countEnCours = count(Stagaire::where('statut','stage')->get());

        $listS = Stagaire::where('statut','stage')->get();
        return view('Stagaire.dashboard',[ 'Stagaires' => $listS,
                                            'countComplete' => $countComplete,
                                            'countRefuse' => $countRefuse,
                                            'countEnCours'=> $countEnCours,
                                            'countTotal'=>$countTotal ]);
    }
    public function showSta()
    {
        $listS = Stagaire::all();

        foreach ($listS as $s) {
            $datefin = $s -> dateFin;
            $today = date("Y-m-d");

            if ( strtotime($datefin) < strtotime($datefin) ) {
                $s -> statut = 'complete';
                $s -> save();
            }
        }

        $listS = Stagaire::all();
        return  response()->json($listS,200);
    }

    public function index()
    {
        $listS = Stagaire::all();

        foreach ($listS as $s) {
            $datefin = $s -> dateFin;
            $today = date("Y-m-d");

            if ( strtotime($datefin) < strtotime($datefin) ) {
                $s -> statut = 'complete';
                $s -> save();
            }
        }

        $listS = Stagaire::all();
        return view('Stagaire.index',[  'Stagaires' => $listS ] );
    }

    public function create()
    {
        return view('Stagaire.create');
    }

    public function store(stagaireRequest $request)
    {




        // ------------------------


        try {

            $request->all();
            $s =new Stagaire();

            $s -> cin = $request -> cin;
            $s -> nom = $request -> nom;
            $s -> prenom = $request -> prenom;
            $s -> telephone = $request -> tele;
            $s -> email = $request -> email;
            $s -> dateDebut = $request -> dd;
            $s -> dateFin = $request -> df;
            $s -> etablisement = $request -> etab;

            if (is_null($request -> Statut) === false ) {
                $s -> statut = $request -> Statut;
            }


            if ( $request -> hasFile('photo') ) {
                $s -> photo = $request -> photo ->store('image');
            }

            if ( $request -> hasFile('cv') ) {
                $s -> cv = $request -> cv ->store('cv');
            }

            if ( $request -> hasFile('motivation') ) {
                $s -> motivation = $request -> motivation ->store('motivation');
            }


            $s->save();
            session()->flash('succes','Le stagaire bien ajouter');

            return redirect('stagaire');



        } catch (Exception $exception) {

            if($exception->getCode() === '23000') {

                session()->flash('errorStagaire','CIN déja utiliser');
                return view('Stagaire.create');

            }

        }
    }

    public function edit($id)
    {
        $s = Stagaire::find($id);
        return view('Stagaire.edit',[ 'st' => $s ]);
    }

    public function update(stagaireRequest $request,$id)
    {

        try {

            $s = Stagaire::find($id);

            $s -> cin = $request ->input('cin');
            $s -> nom = $request ->input('nom') ;
            $s -> prenom = $request ->input('prenom') ;
            $s -> telephone = $request ->input('tele') ;
            $s -> email = $request ->input('email') ;
            $s -> dateDebut = $request ->input('dd') ;
            $s -> dateFin = $request ->input('df') ;
            $s -> etablisement = $request ->input('etab') ;
            $s -> statut = $request ->input('Statut');

            if ( $request -> hasFile('photo') ) {
                $s -> photo = $request -> photo ->store('image');
            }

            if ( $request -> hasFile('cv') ) {
                $s -> cv = $request -> cv ->store('cv');
            }


            if ( $request -> hasFile('motivation') ) {
                $s -> motivation = $request -> motivation ->store('motivation');
            }

            $s->save();
            session()->flash('succesUp','Le stagaire bien ajouter');
            return redirect('stagaire');


        } catch (Exception $exception) {

            if($exception->getCode() === '23000') {

                session()->flash('errorStagaire','CIN déja utiliser');

                $s = Stagaire::find($id);
                return view('Stagaire.edit',[ 'st' => $s ]);

            }

        }


    }

    public function destroy($id)
    {
        $s = Stagaire::find($id);

        $s ->delete();

        return redirect('stagaire');
    }

    public function show($id)
    {
        $s = Stagaire::where('id',$id)->get();
        $abs = Absence::where('id',$id)->orderBy('dateAbs', 'desc')->get();
        $countAbs = count($abs);
        return view('Stagaire.profil',[ 'st' => $s , 'abs' => $abs , 'count' => $countAbs]);

    }


    public function exportAll()
    {
        return Excel::download(new UsersExport , 'AllStagaire.xlsx');
        redirect('stagaire');
    }

    public function exportEc()
    {
        return Excel::download(new StagaireEnCoursExport , 'EnCourStage.xlsx');
        redirect('stagaire');
    }

    public function exportCom()
    {
        return Excel::download(new StagaireCompleteExport , 'CompleteStagaire.xlsx');
        redirect('stagaire');
    }

    public function exportRef()
    {
        return Excel::download(new StagaireRefusExport , 'RefuseStagaire.xlsx');
        redirect('stagaire');
    }


    public function attes($id)
    {
        $s = Stagaire::find($id);

        //return view('Stagaire.ATTESTATION',[ 's' => $s ]);

         $pdf = PDF::loadView('Stagaire.ATTESTATION',[ 's' => $s ]);
         return $pdf->download('invoice.pdf');
    }

    public function search($cin)
    {
        return Stagaire::where('cin','LIKE','%'.$cin."%")->get();
    }

    public function allStagaire()
    {
        return Stagaire::all();
    }



    public function addAbs(Request $request)
    {
        $idStagaire = $request-> stagairesID ;
        $date = $request-> date ;
        $duration =  $request-> Duration ;

        $abs = new Absence();


        $abs -> id = $idStagaire;
        $abs -> dateAbs = $date;
        $abs -> duree = $duration;

        $abs -> save();

        return response()->json(["ok"]);
    }

}
