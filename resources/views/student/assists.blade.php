@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3" data-bs-theme="dark">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Asistencias.
                </div>
                <div class="float-end">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $student->nombre }}
                    </div>
                </div>

                <div class="row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Apellido:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $student->apellido }}
                    </div>
                </div>
                                                <div class="row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Cantidad de asistencias:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $asist }}
                    </div>

                <div class="row">
                    <label for="assists" class="col-md-4 col-form-label text-md-end text-start"><strong>Porcentaje de asistencias:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $cant }}%
                    </div>
                </div>
                                <div class="row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Condicion:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $condicion }}
                    </div>
                </div>
                <div class="row">
                <label for="assists" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de Asistencias:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                @foreach ($assists as $assist)
                <li>Fecha:  {{ $assist->created_at->format('d-m-Y')}}</li>
                @endforeach
                </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection


