@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Lessons
                </div>
                <div class="float-end">
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('lesson.add') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="lessons" class="col-md-4 col-form-label text-md-end text-start">Cantidad de Clases</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('lesson') is-invalid @enderror" id="lessons" name="lessons" value="{{ old('lessons') }}">
                            @if ($errors->has('lessons'))
                                <span class="text-danger">{{ $errors->first('lessons') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="promocion" class="col-md-4 col-form-label text-md-end text-start">Porcentaje minimo: Promocion</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('promocion') is-invalid @enderror" id="promocion" name="promocion" value="{{ old('promocion') }}">
                            @if ($errors->has('promocion'))
                                <span class="text-danger">{{ $errors->first('promocion') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="regular" class="col-md-4 col-form-label text-md-end text-start">Porcentaje minimo: Regular</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('regular') is-invalid @enderror" id="regular" name="regular" value="{{ old('regular') }}">
                            @if ($errors->has('regular'))
                                <span class="text-danger">{{ $errors->first('regular') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Lessons">
                    </div>
                                        <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Cantidad de clases:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $lesson->lessons }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Porcentaje min para promocionar:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $lesson->promocion }}%
                        </div>
                    </div>
                                                            <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Porcentaje min para regularizar:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $lesson->regular }}%
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>

@endsection