@extends('layouts.panel')

@section('content')



    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Nueva Reserva</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('/citas') }}" class="btn btn-sm btn-success">
            <i class="fas fa-chevron-left"></i>    
            Regresar</a>
          </div>
        </div>
      </div>

<div class="card-body">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle">  </i>
                <strong>Por favor!!</strong> {{ $error }}
          </div>
        @endforeach
    @endif

<form action="{{ url('/citas') }}" method="POST">
    @csrf
<div class="form-group">
<label for="name">Nombre del Paciente</label>
<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
</div>

<div class="form-group">
<label for="especialty">Especialidad</label>
<input type="text" name="especialty" class="form-control" value="{{ old('name') }}" required>
</div>
<div class="form-group">
<label for="doctor">Doctor</label>
<input type="text" name="doctor" class="form-control" value="{{ old('name') }}" required>
</div>
<div class="form-group">
<label for="hours">Horario</label>
<input type="text" name="hours" class="form-control" value="{{ old('name') }}" required>
</div>

<div class="form-group">
<label for="description">Descripcion </label>
<input type="text" name="description" class="form-control" value="{{ old('description') }}">
</div>

<button type="submit" class="btn btn-sm btn-primary">Crear Reserva</button>

</form>
</div>
    </div>

@endsection
