@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Student
                </div>
                <div class="float-end">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('student.update', $student->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="alumn_DNI" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[0-9]*" class="form-control @error('alumn_DNI') is-invalid @enderror" id="alumn_DNI" name="alumn_DNI" value="{{ $student->alumn_DNI }}">
                            @if ($errors->has('alumn_DNI'))
                                <span class="text-danger">{{ $errors->first('alumn_DNI') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre"  class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[A-Za-z]+"  class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $student->nombre }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="apellido"  class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[A-Za-z]+" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ $student->apellido }}">
                            @if ($errors->has('apellido'))
                                <span class="text-danger">{{ $errors->first('apellido') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fecha_nac" class="col-md-4 col-form-label text-md-end text-start">Fecha de nacimiento</label>
                        <div class="col-md-6">
                          <input type="date" step="0.01" class="form-control @error('fecha_nac') is-invalid @enderror" id="fecha_nac" name="fecha_nac" value="{{ $student->fecha_nac }}">
                            @if ($errors->has('fecha_nac'))
                                <span class="text-danger">{{ $errors->first('fecha_nac') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="año" class="col-md-4 col-form-label text-md-end text-start">Año</label>
                        <div class="col-md-6">
                            <select name="año" class="form-control" required>
                                <option value="">Seleccionar año</option>
                                <option value="primero" {{ $student->año == 'primero' ? 'selected' : '' }}>Primero</option>
                                <option value="segundo" {{ $student->año == 'segundo' ? 'selected' : '' }}>Segundo</option>
                                <option value="tercero" {{ $student->año == 'tercero' ? 'selected' : '' }}>Tercero</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection