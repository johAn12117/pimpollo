@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina Detalle </h1>
@endsection

@section('cuerpo')
    <h3>Detalle estudiante</h3>
    <p>Id:                      {{ $xDetAlumnos->id }}</p>
    <p>Codigo:                  {{ $xDetAlumnos->codEst }}</p>
    <p>Apellidos y Nombres:     {{ $xDetAlumnos->apeEst }}, {{ $xDetAlumnos->nomEst }}</p>
    <p>Fecha de nacimiento:     {{ $xDetAlumnos->fnaEst }}</p>
    <p>Turno:                   {{ $xDetAlumnos->turEst }}</p>
    <p>Semestre:                {{ $xDetAlumnos->semEst }}</p>
    <p>Estado de matricula:     {{ $xDetAlumnos->estEst }}</p>

@endsection  



