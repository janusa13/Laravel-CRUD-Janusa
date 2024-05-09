@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3" data-bs-theme="dark">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card" data-bs-theme="dark">
            <div class="card-header">Student List</div>
            <div class="card-body">
                <a href="{{ route('student.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-person-add"></i> Add New Student</a>
                <a href="{{ route('lesson.created') }}" class="btn btn-success btn-sm my-2"><i  class="bi bi-pencil-square""></i>Class options</a>
                <div class="mb-3 row">
                    <form action="{{ route('search.viewStudent') }}" method="post">
                        <div class="mb-3 row">
                            <label for="DNI" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="DNI" name="alumn_DNI" value="{{ old('alumn_DNI') }}">
                                    @if ($errors->has('alumn_DNI'))
                                        <span class="text-danger">{{ $errors->first('ALUMN_DNI') }}</span>
                                    @endif
                            </div>
                        </div>
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Student">
                    </form>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de nacimiento</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->alumn_DNI }}</td>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ $student->apellido }}</td>
                            <td>{{$student->fecha_nac}}</td>
                            <td>
                                <form action="{{ route('student.destroy', $student->id) }}" method="post" class="p-2">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-outline-warning"><i class="bi bi-file-earmark-person"></i> Show</a>

                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                                    
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                                <a href="{{ route('student.assists', ['id' => $student->id]) }}" class="btn btn-outline-info"><i class="bi bi-eye"></i> Asistencias</a>
                               <a href="{{ route('student.addAssists', ['id' => $student->id]) }}"  class="btn btn-outline-success"><i class="bi bi-check-lg"></i> Agregar asistencia</a> 
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Student Found!</strong>
                                </span>
                            </td>
                        @endforelse
                        {{ $students->links() }}
                    </tbody>
                  </table>
                

            </div>
        </div>
    </div>    
</div>
    
@endsection
