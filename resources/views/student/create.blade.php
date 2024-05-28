@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Student
                </div>
                <div class="float-end">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                @if($errors->any())
                    <div class="alert alert-warning" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
                    <div class="mb-3 row">
                        <label for="DNI" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[0-9]*" class="form-control @error('dni') is-invalid @enderror" id="DNI" name="alumn_DNI" value="{{ old('alumn_DNI') }}">
                            @if ($errors->has('alumn_DNI'))
                                <span class="text-danger">{{ $errors->first('ALUMN_DNI') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[A-Za-z]+" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="apellido" pattern="[A-Za-z]+" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" step="0.01" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}">
                            @if ($errors->has('apellido'))
                                <span class="text-danger">{{ $errors->first('apellido') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fecha_nac" class="col-md-4 col-form-label text-md-end text-start">Fecha de nacimiento</label>
                        <div class="col-md-6">
                            <input type="date" step="0.01" class="form-control @error('fecha_nac') is-invalid @enderror" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac') }}">
                            @if ($errors->has('fecha_nac'))
                                <span class="text-danger">{{ $errors->first('fecha_nac') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="año" class="col-md-4 col-form-label text-md-end text-start">Año</label>
                        <div class="col-md-6">
                            <select name="año" class="form-control" required>
                                <option value="">Selecionar año </option>
                                <option value="primero">Primero</option>
                                <option value="segundo">Segundo</option>
                                <option value="tercero">Tercero</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Student">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection