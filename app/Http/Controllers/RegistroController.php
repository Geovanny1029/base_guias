<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Aerolinea;
use App\Agente;
use App\Registros;

class RegistroController extends Controller
{

    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registros::orderBy('id','ASC')->get();
        $registros->each(function($registros){
            $registros->aerolinea;
            $registros->agente;
        });

        $listaAero = Aerolinea::orderBY('id','ASC')->pluck('nombre_aerolinea','id');

        $listaAgent = Agente::orderBY('id','ASC')->pluck('nombre_agente','id');

        return view('registros.index')->with('registros',$registros)->with('listaAgent',$listaAgent)->with('listaAero',$listaAero);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $registro = new Registros($request->all());
        $registro->id_aerolinea=$request->aerolinea;
        $registro->guia=strtoupper($request->guia);
        $registro->fecha_asignacion=$request->fecha_asignacion;
        $registro->id_agente=$request->agente;
        $registro->fact_sci=strtoupper($request->fact_sci);
        $registro->periodo_cass=strtoupper($request->periodo_cass);
        $registro->ref_sci=strtoupper($request->ref_sci);
        $registro->id_usuario=Auth::User()->id;
        $registro->save();

        $notification = array(
        'message' => 'El Registro se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Registros::find($id);
                $aerolinea = Aerolinea::find($info->id_aerolinea);
                $agente = Agente::find($info->id_agente);
                return response()->json(array('info'=>$info,'aerolinea'=>$aerolinea,'agente'=>$agente));

            }
    }

    public function viewnu(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Registros::find($id);
                $aerolinea = Aerolinea::find($info->id_aerolinea);
                $agente = Agente::find($info->id_agente);
                return response()->json(array('info'=>$info,'aerolinea'=>$aerolinea,'agente'=>$agente));

            }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function actualiza(Request $request){

        $id = $request->edit_idr;
        $data= Registros::find($id);
        $data->id_aerolinea=$request->edit_aerolinea;
        $data->guia=strtoupper($request->edit_guia);
        $data->fecha_asignacion=$request->edit_fecha_asignacion;
        $data->id_agente=$request->edit_agente;
        $data->fact_sci=strtoupper($request->edit_fact_sci);
        $data->periodo_cass=strtoupper($request->edit_periodo_cass);
        $data->ref_sci=strtoupper($request->edit_ref_sci);
        $data->id_usuario=Auth::User()->id;
        $data->save();

        $notification = array(
        'message' => 'El Registro ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }


    public function actualizanu(Request $request){

        $id = $request->edit_idnu;
        $data= Registros::find($id);
        $data->fact_sci=strtoupper($request->edit_fact_scinu);
        $data->periodo_cass=strtoupper($request->edit_periodo_cassnu);
        $data->ref_sci=strtoupper($request->edit_ref_scinu);
        $data->id_usuario=Auth::User()->id;
        $data->save();

        $notification = array(
        'message' => 'El Registro ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $registro = Registros::find($id);
        $registro->delete();

        $notification = array(
        'message' => 'El Registro se elimino Exitosamente', 
        'alert-type' => 'error'
        );            
            return redirect()->route('registro.index')->with($notification);
               
    }
}
