<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
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
        $usuarios = User::where('estatus',1)->orderBy('id','ASC')->get();

        return view('user.index')->with('usuarios', $usuarios);
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
        $user = new User($request->all());
        $user->nombre=strtoupper($request->nombre);
        $user->name=strtoupper($request->name);
        $user->nivel=$request->nivel; 
        $user->email=$request->email;
        $user->estatus=$request->estatus;
        $user->backub_pass=$request->password;
        $user->password=bcrypt($request->password);
        $user->save();

        $notification = array(
        'message' => 'El Usuario se ha Guardado Exitosamente', 
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
                $info = User::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::where('id',$id)->first();
        if($users->estatus == 2){
            $users->estatus = 1;
            $users->save();

        $notification = array(
        'message' => 'El Usuario se ha Activado Exitosamente', 
        'alert-type' => 'success'
        );
            return redirect()->route('user.index')->with($notification);
        }else{
            $users->estatus = 2;
            $users->save();

        $notification = array(
        'message' => 'El Usuario ha sido dado de baja Exitosamente', 
        'alert-type' => 'error'
        );            
            return redirect()->route('user.index')->with($notification);
        }

    }

    public function actualiza(Request $request){

        $id = $request->edit_idu;
        $data= User::find($id);
        $data->nombre= strtoupper($request->edit_nombre);
        $data->nivel= $request->edit_nivel;
        $data->name=$request->edit_name;
        $data->backub_pass=$request->edit_password;
        $data->password=bcrypt($request->edit_password);
        $data->email=$request->edit_email;
        $data->estatus=$request->edit_estatus;
        $data->save();

        $notification = array(
        'message' => 'El Usuario se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }
}
