<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Userrole;
use Illuminate\Http\Request;

class UserroleController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $userrole = Userrole::all();
        if($userrole != NULL){
            return response()->json($userrole);
        }
        return "No se han encontrado enlaces de userrole ";
    
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        if(is_numeric($request->ID_Usuario)){ //si el id es valido
            $user = User::find($request->ID_Usuario);
            if($user == NULL){ //si el usuario no existe
                return response()->json([
                    'message'=>'ID_Usuario no existe.'
                ],500);
            }

        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        if(is_numeric($request->ID_Rol)){//si el id es valido
            $rol = Role::find($request->ID_Rol);
            if($rol == NULL){//si el rol  no existe
                return response()->json([
                    'message'=>'ID_Rol no existe.'
                ],500);
            }
        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        $userrole = new Userrole();
        $userrole->ID_Usuario = $request->ID_Usuario;
        $userrole->ID_Rol = $request->ID_Rol;
        $userrole->save();
        return response()->json([
            'message' => 'Se ha creado una nueva relacion Usuario-rol',
            'id' => $userrole->id
        ], 202);
    }
    //Muestra una tupla especifica segun el ID ingresado por parametro. 
    public function show($id)
    {
        if(is_numeric($id)){
            $userrole = Userrole::find($id);
            if($userrole != NULL){
                return response()->json($userrole);
            }
            return response()->json([
                'message' => 'No se ha encontrado la relacion.'
            ], 404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],500);
        }
    }
    //Actualiza el parámetro ingresado en la tupla que corresponda según ID
    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $userrole = Userrole::find($id);
            if($userrole != NULL){
                if(is_numeric($request->ID_Usuario)){ //si el id es valido
                    $user = User::find($request->ID_Usuario);
                    if($user !=NULL){ //si el usuario existe
                        $userrole->ID_Usuario = $request->ID_Usuario;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Usuario no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],400);
                }
                if(is_numeric($request->ID_Rol)){//si el id es valido
                    $rol = Role::find($request->ID_Rol);
                    if($rol !=NULL){//si el rol existe
                        $userrole->ID_Rol = $request->ID_Rol;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Rol no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],500);
                }
                $userrole->save();
                return response()->json([
                    'message' => 'Se actualizo de forma exitosa relacion video-categoria.',
                    'id' => $userrole->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe una usuario rol con esa ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],400);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $userrole = Userrole::find($id);
            if($userrole != NULL){
                $userrole->delete();
                return response()->json([
                    "message"=>"Se ha borrado un userrole",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un userrole con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
