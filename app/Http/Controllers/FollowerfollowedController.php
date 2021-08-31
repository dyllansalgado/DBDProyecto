<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Followerfollowed;

use Illuminate\Http\Request;

class FollowerfollowedController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $followerfollowed = Followerfollowed::all();
        if($followerfollowed  != NULL){
            return response()->json($followerfollowed );
        }
        return "No se han encontrado enlaces de followerfollowed ";
    
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        if(is_numeric($request->ID_Seguidor)){ //si el id es valido
            $userfollower = User::find($request->ID_Seguidor);
            if($userfollower == NULL){ //si el seguidor no existe
                return response()->json([
                    'message'=>'ID_Seguidor no existe.'
                ],500);
            }

        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        if(is_numeric($request->ID_Seguido)){//si el id es valido
            $userfollowed = User::find($request->ID_Seguido);
            if($userfollowed == NULL){//si el usuario seguido  no existe
                return response()->json([
                    'message'=>'ID_Seguido no existe.'
                ],500);
            }
        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        $followerfollowed = new Followerfollowed();
        $followerfollowed->ID_Seguidor = $request->ID_Seguidor;
        $followerfollowed->ID_Seguido = $request->ID_Seguido;
        $followerfollowed->save();
        return response()->json([
            'message' => 'Se ha creado una nueva relacion usuario seguidor seguido',
            'id' => $followerfollowed->id
        ], 202);
    }
    //Muestra una tupla especifica segun el ID ingresado por parametro. 
    public function show($id)
    {
        if(is_numeric($id)){
            $followerfollowed = Followerfollowed::find($id);
            if($followerfollowed != NULL){
                return response()->json($followerfollowed);
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
            $followerfollowed = Followerfollowed::find($id);
            if($followerfollowed != NULL){
                if(is_numeric($request->ID_Seguidor)){ //si el id es valido
                    $userfollower = User::find($request->ID_Seguidor);
                    if($userfollower !=NULL){ //si el userfollower existe
                        $followerfollowed->ID_Seguidor = $request->ID_Seguidor;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Seguidor no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],400);
                }
                if(is_numeric($request->ID_Seguido)){//si el id es valido
                    $userfollowed = User::find($request->ID_Seguido);
                    if($userfollowed !=NULL){//si usuario seguido existe
                        $followerfollowed->ID_Seguido = $request->ID_Seguido;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Seguido no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],500);
                }
                $followerfollowed->save();
                return response()->json([
                    'message' => 'La relacion seguidor seguido se ha actualizado exitosamente.',
                    'id' => $followerfollowed->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe una usuario Follower-followed con esa ID.'
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
            $followerfollowed = Followerfollowed::find($id);
            if($followerfollowed != NULL){
                $followerfollowed->delete();
                return response()->json([
                    "message"=>"Se ha borrado un follower-followed",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un follower-followed con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}