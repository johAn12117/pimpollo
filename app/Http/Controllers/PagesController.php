<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Models\Estudiante;

class PagesController extends Controller
{
    public function  fnIndex () {
        return view('welcome');
    }

    public function fnRegistrar (Request $request){
        //return $request;

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required',

        ]);
        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->codEst =$request->codEst;
        $nuevoEstudiante->nomEst =$request->nomEst;
        $nuevoEstudiante->apeEst =$request->apeEst;
        $nuevoEstudiante->fnaEst =$request->fnaEst;
        $nuevoEstudiante->turMat =$request->turMat;
        $nuevoEstudiante->semMat =$request->semMat;
        $nuevoEstudiante->estMat =$request->estMat;

        $nuevoEstudiante->save();
        return back() -> with('msj','Se registro con éxito...');
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();

        return back()->with('msj','Se actualizo con exito...');
    }

    public function  fnEstDetalle($id) {
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back() -> with('msj','Se elimino con éxito...');
    }

    public function  fnLista() {
        $xAlumnos = Estudiante::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }

    public function  fnGaleria  ($numero=0) {
        //return view('foto de Codigo');
        $valor=$numero;
        $otro=24;
        return view('pagGaleria',compact('valor', 'otro'));
    }
}
Route::middleware([
    'auth:sactum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
