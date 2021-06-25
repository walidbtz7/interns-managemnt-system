<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;

use Illuminate\Support\Facades\Hash;
use App\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;  
Use Exception;


class UsersController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth');
    }
    
    
    public function index()
    {
        $this->authorize('ge-user');
        $listuser = User::all();
        return view('User.listUser', [ 'users' => $listuser ]  );

    }

    public function create()
    {
        $this->authorize('ge-user');
        return view('User.create');
    }

    public function store(userRequest $request)
    {
        

        try {

            $this->authorize('ge-user');
            $request->all();
            $s =new User();
            $s -> name = $request -> nom;
            $s -> email = $request -> email;
            $s -> telephone = $request -> tele;
            $s -> email = $request -> email;
            $s -> role = $request -> role;
            $s -> password = Hash::make($request -> pass) ;

            



            $s->save();

            session()->flash('succesUser','User bien ajouter');

            return redirect('user');


        } catch (Exception $exception) {
            if($exception->getCode() === '23000') {

            session()->flash('errorEmail','email déja utiliser');
            return view('User.create');

            }
            
        }

        
    }

    public function edit($id)
    {
        $this->authorize('ge-user');
        $s = User::find($id);
        return view('User.edit',[ 'user' => $s ]);
    }


    public function update(userRequest $request,$id)
    {
        try {

            $this->authorize('ge-user');
            $s = User::find($id);
            $s -> name = $request -> nom;
            $s -> email = $request -> email;
            $s -> telephone = $request -> tele;
            $s -> email = $request -> email;
            $s -> role = $request -> role;
            $s -> password = Hash::make($request -> pass) ;
    
            $s->save();
    
            session()->flash('succesUserUp','User bien modifier');
            
            return redirect('user');

        } catch (Exception $exception) {

            if($exception->getCode() === '23000') {

            session()->flash('errorEmail','email déja utiliser');
            $this->authorize('ge-user');
            $s = User::find($id);
            return view('User.edit',[ 'user' => $s ]);
            
        }
            
        }
        
        
    }

    public function destroy($id)
    {
        $this->authorize('ge-user');
        $u = User::find($id);

        $u ->delete();

        $listuser = User::all();
        return view('User.listUser', [ 'users' => $listuser ]  );
    }

}
