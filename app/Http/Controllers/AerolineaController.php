<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aerolinea;
class AerolineaController extends Controller
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
        $aerolineas = Aerolinea::orderBy('id','ASC')->get();

        return view('aerolineas.index')->with('aerolineas', $aerolineas);
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
        $user = new Aerolinea($request->all());
        $user->nombre_aerolinea=strtoupper($request->aerolinea);
        $user->save();

        $notification = array(
        'message' => 'La Aerolinea se ha Guardado Exitosamente', 
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
                $info = Aerolinea::find($id);
                return response()->json($info);

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

        $id = $request->edit_ida;
        $data= Aerolinea::find($id);
        $data->nombre_aerolinea= strtoupper($request->edit_aerolinea);
        $data->save();

        $notification = array(
        'message' => 'La aerolinea se ha Actualizado Exitosamente', 
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
        //
    }
}
