@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina Detalle </h1>
@endsection

@section('cuerpo')
    <h3>Detalle estudiante</h3>
    <p>Id:                      {{ $xDetCurso->id }}</p>
    <p>Denominacion de Curso:   {{ $xDetCurso->denCur }}</p>
    <p>Horas de curso:          {{ $xDetCurso->hrsCur }}</p>
    <p>Creditos del Curso:      {{ $xDetCurso->creCur }}</p>
    <p>Año de plan de estudiios:{{ $xDetCurso->plaCur }}</p>
    <p>Transervsar/Especialidad:{{ $xDetCurso->tipCur }}</p>
    <p>Estado de Curso:         {{ $xDetCurso->estCur }}</p>

@endsection  



