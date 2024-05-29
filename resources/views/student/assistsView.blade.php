@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3" data-bs-theme="dark">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add Manual Assist
                </div>
                <div class="float-end">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('student.addAssists') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="alumn_DNI" class="col-md-4 col-form-label text-md-end text-start">DNI del alumnno</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('alumn_DNI') is-invalid @enderror" id="alumn_DNI" name="alumn_DNI" value="{{ old('alumn_DNI') }}">
                           
                        </div>
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Assist">
                    </div>
                    </form>
            </div>
        </div>
    </div>    
</div>

@endsection