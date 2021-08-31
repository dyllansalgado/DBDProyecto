<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        if($role != NULL){
            return response()->json($role);
        }
        return response()->json([
            'message' => 'No se han encontrado roles.',
        ], 404);
    }

    public function store(Request $request)
    {
        $role = new Role();
        if($request->Tipo != NULL){
            if(is_string($request->Tipo)){
                $role->Tipo = $request->Tipo;
                $role->save();
                return response()->json([
                    'message' => 'Se ha creado un nuevo rol.',
                ], 202);
            }
            else{
                return response()->json([
                    'message' => 'El tipo de rol debe ser un string.',
                ], 400);
            }
        }
        else{
            return response()->json([
                'message' => 'El tipo de rol no puede estar vacío.',
            ], 400);
        }
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $role = Role::find($id);
            if($role != NULL){
                return response()->json($role);
            }
            return response()->json([
                'message' => 'No se pudo encontrar la ID ingresada.'
            ], 404);
        }
        return response()->json([
            'message' => 'La ID ingresada no es valida.'
        ], 400);
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $role = Role::find($id);
            if($role != NULL){
                if($request->Tipo != NULL){
                    if(is_string($request->Tipo)){
                        $role->Tipo = $request->Tipo;
                        return response()->json([
                            'message' => 'Se actualizo de forma exitosa relacion video-categoria.',
                            'id' => $role->id
                        ], 202);
                    }else{
                        return response()->json([
                            'message' => 'El nombre del rol solo debe ser un string',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'El nombre del rol no puede estar vacío.',
                    ], 400);
                }
            }else{
                return response()->json([
                    'message' => 'No se ha encontrado el rol',
                ], 400);
            }
        }else{
            return response()->json([
                'message'=>'La ID ingresada no es válida.'
            ],404);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $role = Role::find($id);
            if($role != NULL){
                $role->delete();
                return response()->json([
                    "message"=>"Se ha borrado el rol.",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un rol con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}