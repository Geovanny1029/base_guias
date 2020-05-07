@extends('index')
@section('title','Aerolineas')
@section('panel','Lista de Aerolineas')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModala">Crear nueva Aerolinea</button>

@include('aerolineas.crear')

<table class="table table-striped" id="tablaaerolineas">
  <thead>
    <th>ID</th>
    <th>Nombre grupo</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($aerolineas as $aero)
    <tr>

      <td> {{$aero->id}} </td>
      <td> {{$aero->nombre_aerolinea}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModala" onclick="fun_edita('{{$aero->id}}')" id="editara" value="{{route('Aerolinea.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('aerolineas.edit')
</table>





@endsection