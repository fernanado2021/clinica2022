<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultoriosController extends Controller
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
        return view('modulos.Consultorios')->with('consultorios',$consultorios);
    }

    public function store(Request $request)
    {
        Consultorios::create(['consultorio'=>request('consultorio')]);
        return redirect('Consultorios')->with('crearC','Si');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd(Request('id'));
        DB::table('consultorios')->where('id',request('id'))->update(['consultorio' =>request('consultorioE')]);
        return redirect('Consultorios')->with('actualizarC','Si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor=DB::select("SELECT * FROM users WHERE id_consultorio=$id");
        // dd($doctor);
        if (empty($doctor)) {
            DB::table('consultorios')->whereId($id)->delete();
            return redirect('Consultorios')->with('BorrarC','BC');
        }else{
            return redirect('Consultorios')->with('Nborrar','Nb');
        }
    }

    public function verConsultorios()
    {
        $consultorios = Consultorios::all();
        return view('modulos.Ver-Consultorios')->with('consultorios',$consultorios);
    }
}
