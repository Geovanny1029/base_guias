@extends('index')
@section('title','Agentes')
@section('panel','Lista de Agentes')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalag">Crear nuevo Agente</button>

@include('agentes.crear')

<table class="table table-striped" id="tablaagentes">
  <thead>
    <th>ID</th>
    <th>Nombre Agente</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($agente as $agent)
    <tr>

      <td> {{$agent->id}} </td>
      <td> {{$agent->nombre_agente}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalag" onclick="fun_editag('{{$agent->id}}')" id="editarag" value="{{route('agente.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('agentes.edit')
</table>





@endsection