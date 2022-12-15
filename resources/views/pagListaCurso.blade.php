@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina lista Curso </h1>
@endsection

@section('cuerpo')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Curso.xRegistrarCurso') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('denCur')
            <div class="alert alert-danger">
                El nombre es requerido
            </div>
        @enderror
        
        @error('hrsCur')
            <div class="alert alert-danger">
                Las horas son requeridas
            </div>
        @enderror

        @if($errors ->has('creCur'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Los <strong>creditos</strong> son requeridos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <input type="text" name="denCur" placeholder="Nombre de curso" value="{{ old('denCur') }}" class="form-control mb-2">
        <input type="text" name="hrsCur" placeholder="Horas de curso" value="{{ old('hrsCur') }}" class="form-control mb-2">
        <input type="text" name="creCur" placeholder="Creditos de curso" value="{{ old('creCur') }}" class="form-control mb-2">
        <input type="text" name="plaCur" placeholder="Año de plan de estudios" value="{{ old('plaCur') }}" class="form-control mb-2">
        <select name="tipCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="Transversal">Transversal</option>
            <option value="Especialidad">Especialidad</option>
        </select>
        <select name="estCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <button class="btn btn-primary" type="submit">Agregar</button>

    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de Cursos</div>
    <table class="table table-success table-striped-columns table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col text-center">Id</th>
                <th scope="col">Nombre de curso</th>
                <th scope="col">Horas de curso</th>
                <th scope="col">Creditos de Curso</th>
                <th scope="col">Año</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($xCurso as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>
                    <a href="{{ route('Curso.xDetalleCurso', $item->id ) }}">
                        {{ $item->denCur}}
                    </a>
                </td>
                <td>{{ $item->hrsCur }}</td>
                <td>{{ $item->creCur }}</td>
                <td>{{ $item->plaCur }}</td>
                <td>{{ $item->tipCur }}</td>
                <td>{{ $item->estCur }}</td>
                <td>
                    <form action="{{ route('Curso.xEliminarCurso', $item->id)}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('Curso.xActualizarCurso', $item->id) }}">
                    A
                    </a>
                </td>    
            @endforeach
        </tbody>
    </table>
    {{ $xCurso->links()}}
@endsection  



