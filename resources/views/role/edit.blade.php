@extends('template')

@section('title', 'Editar rol')

@push('css')

@endpush


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Editar Rol</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">Editar Rol</li>
        </ol>


        <div class="container w-50 float-start">
            <form action='{{ route('roles.update', ['role' => $role]) }}' method="POST">
                @method('PATCH')
                @csrf
                <div class="row g-3">
                    {{-- Nombre del rol --}}
                    <div class="row mb-4 mt-4">
                        <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}">
                        </div>
                        <div class="col-sm-6">
                            @error('name')
                                <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- Permisos --}}
                    <div class="col-12 mb-4">
                        <label for="" class="form-label">Permisos para el rol:</label>
                        @foreach ($permisosModificados as $item)
                            @if ( in_array($item->id, $role->permissions->pluck('id')->toArray()))
                                <div class="form-check mb-2">
                                    <input checked type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                    <label for="{{$item->id}}" class="form-check-label">{{ $item->id.' : '.$item->name }}</label>
                                </div>
                            @else
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                    <label for="{{$item->id}}" class="form-check-label">{{ $item->id.' : '.$item->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @error('permission')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" id="Cargar" name="Cargar" title="Cargar">Actualizar</button>
                    <button type="reset" class="btn btn-secondary bg-danger text-white" title="Cancelar" data-bs-dismiss="modal">Limpiar</button>
                </div>
            </form>
        </div>

    </div>

@endsection


@push('js')

@endpush