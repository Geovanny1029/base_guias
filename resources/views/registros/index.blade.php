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
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($registros as $reg)
    <tr>

      <td> {{$reg->id}} </td>
      <td> {{$reg->aerolinea->nombre_aerolinea}} </td>
      <td> {{$reg->guia}} </td>
      <td> {{$reg->fecha_asignacion}} </td>
      <td> {{$reg->agente->nombre_agente}}</td>
      <td>
        @if($reg->fact_sci == null || $reg->fact_sci == "")
          <span class="label label-danger">VACIO</span>
        @else
          {{$reg->fact_sci}}
        @endif
      </td>
      <td> 
        @if($reg->periodo_cass == null || $reg->periodo_cass == "")
          <span class="label label-danger">VACIO</span>
        @else
          {{$reg->periodo_cass}}
        @endif 
      </td>
      <td> 
        @if($reg->ref_sci == null or $reg->ref_sci == "")
          <span class="label label-danger">VACIO</span>
        @else
          {{$reg->ref_sci}}
        @endif 
      </td>
    
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
        @if($reg->fact_sci != null && $reg->periodo_cass != null && $reg->ref_sci != null )
        <td>
          <span class="label label-success">COMPLETO</span>
        </td>
        @else
      <td>
        <button class="btn btn-warning" data-toggle="modal" data-target="#editModalNU" onclick="fun_editnu('{{$reg->id}}')"  id="editnu" value="{{route('registro.viewnu')}}"><i class="icon_pencil-edit"></i> </button>
      </td>
        @endif
      @endif
    </tr>
    @endforeach
  </tbody>

  @include('registros.edit')
  @include('registros.editnu')
</table>





@endsection