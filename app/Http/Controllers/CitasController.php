<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Pacientes;
use App\Models\Doctores;
use App\Models\User;
use App\Models\Consultorios;
use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        if (auth()->user()->rol == "Doctor" && $id != auth()->user()->id) {
            return redirect('Inicio');
        }

        $horarios = DB::select('SELECT * FROM horarios WHERE id_doctor = '.$id);
        $pacientes = Pacientes::all();
        $citas = Citas::all()->where('id_doctor', $id);
        $doctor =   Doctores::find($id);

        return view('modulos.Citas',compact('horarios', 'pacientes','citas','doctor'));
    }


    public function HorarioDoctor(Request $request)
    {
        $datos = request();
        DB::table('horarios')->insert(['id_doctor' => auth()->user()->id, 'horaInicio' => $datos ["horaInicio"], 'horaFin' => $datos["horaFin"]]);
        return redirect('Citas/'.auth()->user()->id);
    }

     public function EditarHorario(Request $request)
    {
        $datos = request();
        // dd($datos['id']);
        DB::table('horarios')->where('id',$datos['id'])->update(['horaInicio' => $datos["horaInicioE"], 'horaFin' => $datos["horaFinE"]]);
        return redirect('Citas/'.auth()->user()->id);
    }

    public function CrearCitas(Request $id_doctor)
    {
        Citas::create(['id_doctor' => request('id_doctor'), 'id_paciente' => request('id_paciente'), 'FyHinicio' => request('FyHinicio'),  'FyHfinal' => request('FyHfinal')]);
        return redirect('Citas/'.request('id_doctor'))->with('Registrado','Si');
    }

    public function destroy(Citas $citas)
    {
        DB::table('citas')->whereId(request('idCita'))->delete();
        return redirect('Citas/'.request('idDoctor'))->with('Cancelar','No');
    }

    public function historial()
    {
        if(auth()->user()->rol != "Paciente"){
            return view('modulos.Inicio');
        }else{
            $citas = Citas::all()->where('id_paciente',auth()->user()->id);
            $doctores = User::all()->where('rol', 'Doctor');
            $consultorios = Consultorios::all();
            return view('modulos.Historial', compact('citas','doctores','consultorios'));
        }
    }


    public function reporte()
    {
        $citas = Citas::all()->where('id_paciente',auth()->user()->id);
        $paciente =Pacientes::all()->where('id',auth()->user()->id);
        $consultorios = Consultorios::all();
        view()->share('Reporte.pdf',$citas);
        $pdf = PDF::loadView('modulos.Reporte', ['citas' => $citas],['paciente' => $paciente],);
        return $pdf->download('Reporte.pdf');
    }

    public function reportecitas(Request $request)
    {
       //  $data=$request->all();
       //  $desde=date('Y-m-d');
       //  $hasta=date('Y-m-d');
       // if (isset($data['desde'])) {
       //      $desde=$data['desde'];
       //      $hasta=$data['hasta'];
       //  }
        $citas = Citas::all();
        $doctores = User::all()->where('rol', 'Doctor');
        $pacientes = User::all()->where('rol', 'Paciente');
        return view('modulos.ReporteCitas',compact('citas','doctores','pacientes'));
    }

    public function descarga(Request $request)
    {
        $citas=DB::select("SELECT c.*,d.name AS doctor,p.name AS paciente 
                            FROM citas c join users d on d.id=c.id_doctor
                            JOIN users p ON p.id=c.id_paciente ");
        view()->share('Descarga.pdf',$citas);
        $pdf = PDF::loadView('modulos.Descarga', ['citas' => $citas]);
        return $pdf->download('Reporte.pdf');
    }
}
