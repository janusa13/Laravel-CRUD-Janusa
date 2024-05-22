@extends('../dashboard')
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

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
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Search Student
                </div>
                <div class="float-end">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('student.showSearch') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="alumn_DNI" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[0-9]*" class="form-control @error('alumn_DNI') is-invalid @enderror" id="alumn_DNI" name="alumn_DNI">
                            @if ($errors->has('alumn_DNI'))
                                <span class="text-danger">{{ $errors->first('alumn_DNI') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Buscar Alumno">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection