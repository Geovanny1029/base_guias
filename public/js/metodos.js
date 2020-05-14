$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});

//vista editar agente
function fun_editag(id)
    {
      var view_url = $("#editarag").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_agente").val(result.nombre_agente);
          $("#edit_idag").val(result.id);
        }
      });
    }

//vista editar usuarios
function fun_editg(id)
    {
      var view_url = $("#editaru").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre").val(result.nombre);
          $("#edit_nivel").val(result.nivel);
          $("#edit_name").val(result.name);
          $("#edit_password").val(result.backub_pass);
          $("#edit_email").val(result.email);
          $("#edit_estatus").val(result.estatus);
          $("#edit_idu").val(result.id);
        }
      });
    }

//vista editar aerolineas
function fun_edita(id)
    {
      var view_url = $("#editara").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_aerolinea").val(result.nombre_aerolinea);
          $("#edit_ida").val(result.id);
        }
      });
    }



//vista editar Registro
function fun_editr(id)
    {
      var view_url = $("#editr").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_aerolinea").val(result.aerolinea.nombre_aerolinea);
          $("#edit_guia").val(result.info.guia);
          $("#edit_fecha_asignacion").val(result.info.fecha_asignacion);
          $("#edit_agente").val(result.agente.nombre_agente);
          $("#edit_fact_sci").val(result.info.fact_sci);
          $("#edit_periodo_cass").val(result.info.periodo_cass);
          $("#edit_ref_sci").val(result.info.ref_sci);          
          $("#edit_idr").val(result.info.id);
        }
      });
    }

//vista editar Registro nivel usuario
function fun_editnu(id)
    {
      var view_url = $("#editnu").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          if(result.info.fact_sci == null || result.info.fact_sci == ""){
            $('#edit_fact_scinu').attr('readonly', false);
             $("#edit_fact_scinu").val(result.info.fact_sci);
          }else{
            $('#edit_fact_scinu').attr('readonly', true);
            $("#edit_fact_scinu").val(result.info.fact_sci);
          }

          if(result.info.periodo_cass == null || result.info.periodo_cass == ""){
            $('#edit_periodo_cassnu').attr('readonly', false);
            $("#edit_periodo_cassnu").val(result.info.periodo_cass);
          }else{
            $('#edit_periodo_cassnu').attr('readonly', true);
            $("#edit_periodo_cassnu").val(result.info.periodo_cass);
          }


          if(result.info.ref_sci == null || result.info.ref_sci == ""){
            $('#edit_ref_scinu').attr('readonly', false);
            $("#edit_ref_scinu").val(result.info.ref_sci); 
          }else{
            $('#edit_ref_scinu').attr('readonly', true);
            $("#edit_ref_scinu").val(result.info.ref_sci);          
          }
          
          
          
          $("#edit_idnu").val(result.info.id);
        }
      });
    }

$(document).ready(function(){
  $('#tablaregistros thead th').each( function () {
    var title = $(this).text();
    if (title != "Acciones") {
      $(this).html( '<input type="text" style="width:100%;" placeholder="'+title+'" />' );
    }           
  });

  var table = $('#tablaregistros').DataTable({
      "language": {
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
  },
  "oAria": {
    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  }
     }
   });
  table.columns().every( function () {
    var that = this;
    $( 'input', this.header() ).on( 'keyup change', function () {
      if ( that.search() !== this.value ) {
        that
          .search( this.value )
          .draw();
      }
    });
  } );
});

 $(document).ready(function() {
    $('#tablausuarios').DataTable()
    $('#tablaaerolineas').DataTable()
    $('#tablaagentes').DataTable()
  });
