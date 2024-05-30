@extends('../layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Actions List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#s</th>
                        <th scope="col">Ip</th>
                        <th scope="col">Name</th>
                        <th scope="col">accion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">hora</th>
                        <th scope="col">Navegador</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($registros as $registro)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>

                            <td>{{ $registro->ip }}</td>
                            <td>{{ $registro->user }}</td>
                            <td>{{ $registro->accion }}</td>
                            <td>{{ $registro->fecha}}</td>
                            <td>{{ $registro->hora}}</td>
                            <td>{{ $registro->navegador }}</td>
                            <td>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Actions Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $registros->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection
