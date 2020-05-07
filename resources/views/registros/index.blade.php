@extends('index')
@section('title','Registros')
@section('panel','Lista de guias')
@section('content')

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">Crear nuevo Registro</button>

@include('registros.crear')

<table class="display compact" style="width: 100%" id="tablaregistros">
  <thead>
    <th>ID</th>
    <th>Aerolinea</th>
    <th>Guia</th>
    <th>Fecha_asignacion</th>
    <th>Agente</th>
    <th>Factura SCI</th>
    <th>Periodo Cass</th>
    <th>Referencia SCI</th>
    @if(Auth::User()->nivel == 1)
    <th>Accion</th>
    @else
    @endif
  </thead>
  <tbody>
    @foreach($registros as $reg)
    <tr>

      <td> {{$reg->id}} </td>
      <td> {{$reg->aerolinea->nombre_aerolinea}} </td>
      <td> {{$reg->guia}} </td>
      <td> {{$reg->fecha_asignacion}} </td>
      <td> {{$reg->agente->nombre_agente}}</td>
      <td> {{$reg->fact_sci}} </td>
      <td> {{$reg->periodo_cass}} </td>
      <td> {{$reg->ref_sci}} </td>
    
      @if(Auth::User()->nivel == 1)
      <td>

      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalr" onclick="fun_editr('{{$reg->id}}')"  id="editr" value="{{route('registro.view')}}"><i class="icon_pencil-edit"></i> </button>


      <a class="btn btn-danger" onclick="return confirm('¿Seguro que deseas Eliminar este Registro?')" alt="Eliminar" href="{{route('registro.destroy', $reg->id)}}" > 
          <i class="icon_trash_alt"></i>
      </a>

      </td>
      @elseif(Auth::User()->nivel == 2)
      <td>

      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalr" onclick="fun_editr('{{$reg->id}}')"  id="editr" value="{{route('registro.view')}}"><i class="icon_pencil-edit"></i> </button>

      </td>      
      @else
      @endif
    </tr>
    @endforeach
  </tbody>

  @include('registros.edit')
</table>





@endsection