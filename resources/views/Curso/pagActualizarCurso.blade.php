@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina actualizar </h1>
@endsection

@section('cuerpo')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif
    
    <form action="{{ route('Curso.xUpdateCurso', $xActCurso) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('denCur')
            <div class="alert alert-danger">
                El nombre de curso es requerido
            </div>
        @enderror
        
        @error('hrsCur')
            <div class="alert alert-danger">
                Las horas de curso son requeridas
            </div>
        @enderror

        @if($errors ->has('creCur'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Los <strong>creditos de curso</strong> Son requeridos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <input type="text" name="denCur" placeholder="Nombre de curso" value="{{ $xActCurso->denCur }}" class="form-control mb-2">
        <input type="text" name="hrsCur" placeholder="Horas de curso" value="{{ $xActCurso->hrsCur }}" class="form-control mb-2">
        <input type="text" name="creCur" placeholder="Creditos de curso" value="{{ $xActCurso->creCur }}" class="form-control mb-2">
        <input type="text" name="plaCur" placeholder="Año de plan de curso" value="{{ $xActCurso->plaCur }}" class="form-control mb-2">
        <select name="tipCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActCurso->tipCur == 1) {{ "SELECTED" }} @endif>Transversal(1)</option>
            <option value="1" @if ($xActCurso->tipCur == 2) {{ "SELECTED" }} @endif>Especialidad(2)</option>
            
        
        <input type="text" name="estCur" placeholder="Fecha de nacimiento" value="{{ $xActCurso->estCur }}" class="form-control mb-2">

        
        <button class="btn btn-primary" type="submit">actualizar</button>

    </form>         
@endsection  