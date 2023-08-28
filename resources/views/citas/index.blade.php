@extends('layouts.panel')

@section('content')



    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Reserva de Citas</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('/citas/create') }}"  class="btn btn-sm btn-primary">Nueva Reserva</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if(session('notification'))
            <div class="alert alert-success" role="alert">
                  {{ session('notification') }}
            </div>
        @endif
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Paciente</th>
              <th scope="col">Especialidad</th>
              <th scope="col">Doctor</th>
              <th scope="col">Horario</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Opciones</th>
             
            </tr>
          </thead>
          <tbody>
            @foreach($citas as $cita)
              <tr>
                  <th>
                      {{ $cita->paciente }}
                  </th>
                  <td>
                      {{ $cita->especialidad }}
                  </td>
                  <td>
                      {{ $cita->doctor }}
                  </td>
                  <td>
                      {{ $cita->horario }}
                  </td>
                  <td>
                      {{ $cita->description }}
                  </td>
                  <td>
                    <a href="" class="btn btn-sm btn-primary">Editar</a>
                    <a href="" class="btn btn-sm btn-danger">Cancelar</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>

@endsection
