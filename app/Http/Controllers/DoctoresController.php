<?php

namespace App\Http\Controllers;
use App\Models\Doctores;
use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria") {
            return redirect('Inicio');
        }

        $consultorios = Consultorios::all();
        $doctores = Doctores::all();
        return view('modulos.Doctores',compact('consultorios','doctores'));  ///con compac enviamos varias variables
    }

     public function create()
    {
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria") {
            return redirect('Inicio');
        }
        $consultorios = Consultorios::all();
        $doctores = Doctores::all();
        return view('modulos.Crear-Doctor')->with('consultorios',$consultorios);
    }

    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' =>['required'],
            'sexo' =>['required'],
            'id_consultorio' =>['required'],
            'documento' =>['required'],
            'telefono' =>['required'],
            'password' =>['required','string','min:8'],
            'email' =>['required','string','email','unique:users']
        ]);
        Doctores::create([
            'name'=>$datos['name'],
            'id_consultorio'=>$datos['id_consultorio'],
            'email'=>$datos['email'],
            'sexo'=>$datos['sexo'],
            'documento'=>$datos['documento'],
            'telefono'=>$datos['telefono'],
            'rol'=>'Doctor',
            'password'=>Hash::make($datos['password'])
        ]);
        return redirect('Doctores')->with('registrado','Si');
    }

    public function edit(Doctores $id)
    {
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" ) {
            return redirect('Inicio');
        }
        $doctor= Doctores::find($id->id);
        return view('modulos.Editar-Doctor')->with('doctor', $doctor);
    }

        public function update(Request $request, Doctores $doctor)
    {
        // dd($paciente['id']);
        if ($doctor["email"] != request('email') && request('passwordN') != "") {
            $datos = request()->validate([
                'name' =>['required'],
                'documento' =>['required'],
                'telefono' =>['required'],
                'passwordN' =>['required','string','min:8'],
                'email' =>['required','string','email','unique:users']
            ]);

            DB::table('users')->where('id',$doctor["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"],'telefono' =>$datos["telefono"], 'password' => Hash::make($datos["passwordN"])]);

        }else if($doctor["email"] != request('email') && request('passwordN') == ""){
                 $datos = request()->validate([
                    'name' =>['required'],
                    'documento' =>['required'],
                    'telefono' =>['required'],
                    'password' =>['required','string','min:8'],
                    'email' =>['required','string','email','unique:users']
                ]);

            DB::table('users')->where('id',$doctor["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"], 'telefono' =>$datos["telefono"], 'password' => Hash::make($datos["password"])]);

        }else if($doctor["email"] == request('email') && request('passwordN') != ""){
                 $datos = request()->validate([
                    'name' =>['required'],
                    'documento' =>['required'],
                    'telefono' =>['required'],
                    'passwordN' =>['required','string','min:8'],
                    'email' =>['required','string','email']
                ]);

            DB::table('users')->where('id',$doctor["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"], 'telefono' =>$datos["telefono"],  'password' => Hash::make($datos["passwordN"])]);
        }else{
                 $datos = request()->validate([
                    'name' =>['required'],
                    'documento' =>['required'],
                    'telefono' =>['required'],
                    'password' =>['required','string','min:8'],
                    'email' =>['required','string','email']
                ]);

            DB::table('users')->where('id',$doctor["id"])->update(['name' =>$datos["name"], 'email' =>$datos["email"], 'documento' =>$datos["documento"],'telefono' =>$datos["telefono"],  'password' => Hash::make($datos["password"])]);
        }

        return redirect('Doctores')->with('actualizadoD','Si');
    }


    public function destroy($id)
    {
        DB::table('users')->whereId($id)->delete();
        return redirect ('Doctores')->with('Eliminado','Si');
    }

    public function VerDoctores($id)
    {
       $consultorio = Consultorios::find($id);
       $doctores = DB::select('SELECT  * FROM users WHERE id_consultorio = '.$id);
       $horarios = DB::select('SELECT * FROM horarios');
        return view ("modulos.Ver-Doctores", compact('consultorio','doctores','horarios'));
    }

}
