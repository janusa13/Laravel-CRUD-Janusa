@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3" data-bs-theme="dark">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
         @if($errors->any())
            <div class="alert alert-warning" role="alert">
                {{$errors->first()}}
            </div>
        @endif
      <form action="{{ route('exportDataInExcel') }}" method="GET">
    <label>Export Students data in Excel File</label>
    <div class="input-group mt-2">
        <select name="type" class="form-control" required>
            <option value="">Select Excel Format</option>
            <option value="xlsx">XLSX</option>
            <option value="csv">CSV</option>
            <option value="xls">XLS</option>
        </select>
        <button type="submit" class="btn btn-success">Export</button>
    </div>
</form>
        <div class="card" data-bs-theme="dark">
            <div class="card-header p-2">Student List</div>
            <form action="{{route ('student.index')}}" method="GET" class="mb-3 row">
                <label>Filter student for years</label>
                <div class="input-group">
                    <select name="año" class="form-control" required>
                        <option value="">Seleccionar Año</option>
                        <option value="primero">Primero</option>
                        <option value="segundo">Segundo</option>
                        <option value="tercero">Tercero</option>
                    </select>
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </form>
                    <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scpoe="col">Año</th>
                        <th scope="col">Asistencias:</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->alumn_DNI }}</td>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ $student->apellido }}</td>
                            <td>{{$student->fecha_nac}}
                            @if (\Carbon\Carbon::parse($student->fecha_nac)->format('m-d') === \Carbon\Carbon::now()->format('m-d'))
                             We're celebrating a birthday!   🎈
                            @endif
                            </td>
                            <td>{{ $student->año }}</td>
                             <td>{{ $student->assists->count() }}</td>
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