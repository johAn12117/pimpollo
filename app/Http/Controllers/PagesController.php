<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Models\Estudiante;
use App\Models\Curso;

class PagesController extends Controller
{
    
    public function fnIndex () {
        return view('welcome');
    }

    //////////////////////////CURSO////////////////
    public function fnRegistrarCurso (Request $request){
        //return $request;

        $request -> validate([
            'denCur'=>'required',
            'hrsCur'=>'required',
            'creCur'=>'required',
            'plaCur'=>'required',
            'tipCur'=>'required',
            'estCur'=>'required',

        ]);
        $nuevoCurso = new Curso;
        $nuevoCurso->denCur =$request->denCur;
        $nuevoCurso->hrsCur =$request->hrsCur;
        $nuevoCurso->creCur =$request->creCur;
        $nuevoCurso->plaCur =$request->plaCur;
        $nuevoCurso->tipCur =$request->tipCur;
        $nuevoCurso->estCur =$request->estCur;

        $nuevoCurso->save();
        return back() -> with('msj','Se registro CURSO con éxito...');
    }

    public function fnEstActualizarCurso($id){
        $xActCurso = Curso::findOrFail($id);
        return view('Curso.pagActualizarCurso', compact('xActCurso'));
    }

    public function fnUpdateCurso(Request $request, $id){

        $xUpdateCurso = Curso::findOrFail($id);

        $xUpdateCurso -> denCur = $request -> denCur;
        $xUpdateCurso -> hrsCur = $request -> hrsCur;
        $xUpdateCurso -> creCur = $request -> creCur;
        $xUpdateCurso -> plaCur = $request -> plaCur;
        $xUpdateCurso -> tipCur = $request -> tipCur;
        $xUpdateCurso -> estCur = $request -> estCur;
    
        $xUpdateCurso -> save();

        return back()->with('msj','Se actualizo con exito...');
    }



    public function  fnEstDetalleCurso($id) { 
        $xDetCurso = Curso::findOrFail($id);
        return view('Curso.pagDetalleCurso', compact('xDetCurso'));
    }

    public function  fnListaCurso() {
        $xCurso = Curso::paginate(3);
        return view('pagListaCurso', compact('xCurso'));
    }

    public function fnEliminarCurso($id){
        $deleteCurso = Curso::findOrFail($id);
        $deleteCurso->delete();
        return back() -> with('msj','Se elimino CURSO con éxito...');
    }

    



    //////////////////////////ESTUDIANTE////////////////

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
