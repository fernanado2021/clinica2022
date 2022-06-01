<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SecretariasController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->rol != "Administrador") {
            return redirect('Inicio');
        }

        $secretarias = Secretarias::all()->where('rol', 'Secretaria');
        return view('modulos.Secretarias')->with('secretarias', $secretarias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if (auth()->user()->rol != "Administrador") {
            return redirect('Inicio');
        }
        $secretarias = Secretarias::all()->where('rol', 'Secretaria');
        return view('modulos.Crear-Secretaria')->with('secretarias', $secretarias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $datos = request()->validate([
            'name' =>['required','string','max:255'],
            'documento' =>['required','string','max:255'],
            'telefono' =>['required','string','max:255'],
            'email' =>['required','string','max:255','email','unique:users'],
            'password' =>['required','string','min:8']
        ]);
        $secretarias = Secretarias::create([
            'name'=>$datos['name'],
            'id_consultorio'=>0,
            'email'=>$datos['email'],
            'password'=>Hash::make($datos['password']),
            'sexo'=>' ',
            'telefono'=>$datos['telefono'],
            'documento'=>$datos['documento'],
            'rol'=>'Secretaria',
        ]);
        return redirect('Secretarias')->with('SecretariaCreada','Si');
    }

     public function edit(Secretarias $id)
    {
        if (auth()->user()->rol != "Administrador") {
            return redirect('Inicio');
        }
        $secretarias= Secretarias::find($id->id);
        return view('modulos.Editar-Secretaria')->with('secretarias', $secretarias);
    }

        public function update(Request $request, Secretarias $secretaria)
    {
        // dd($paciente['id']);
        if ($secretaria["email"] != request('email') && request('passwordN') != "") {
            $datos = request()->validate([
                'name' =>['required'],
                'documento' =>['required'],
                'telefono' =>['required'],
                'passwordN' =>['required','string','min:8'],
                'email' =>['required','string','email','unique:users']
            ]);

            DB::table('users')->where('id',$secretaria["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"],'telefono' =>$datos["telefono"], 'password' => Hash::make($datos["passwordN"])]);

        }else if($secretaria["email"] != request('email') && request('passwordN') == ""){
                 $datos = request()->validate([
                    'name' =>['required'],
                    'documento' =>['required'],
                    'telefono' =>['required'],
                    'password' =>['required','string','min:8'],
                    'email' =>['required','string','email','unique:users']
                ]);

            DB::table('users')->where('id',$secretaria["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"], 'telefono' =>$datos["telefono"], 'password' => Hash::make($datos["password"])]);

        }else if($secretaria["email"] == request('email') && request('passwordN') != ""){
                 $datos = request()->validate([
                    'name' =>['required'],
                    'documento' =>['required'],
                    'telefono' =>['required'],
                    'passwordN' =>['required','string','min:8'],
                    'email' =>['required','string','email']
                ]);

            DB::table('users')->where('id',$secretaria["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"], 'telefono' =>$datos["telefono"],  'password' => Hash::make($datos["passwordN"])]);
        }else{
                 $datos = request()->validate([
                    'name' =>['required'],
                    'documento' =>['required'],
                    'telefono' =>['required'],
                    'password' =>['required','string','min:8'],
                    'email' =>['required','string','email']
                ]);

            DB::table('users')->where('id',$secretaria["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"],'telefono' =>$datos["telefono"],  'password' => Hash::make($datos["password"])]);
        }

        return redirect('Secretarias')->with('actualizadoS','Si');
    }

    public function destroy( $id)
    {
         Secretarias::destroy($id);
        return redirect('Secretarias')->with('SecretariaEliminada','Si');
    }
}
