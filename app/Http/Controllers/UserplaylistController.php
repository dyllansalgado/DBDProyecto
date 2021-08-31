<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Userplaylist;

class UserplaylistController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $userplaylist = Userplaylist::all();
        if($userplaylist != NULL){
            return response()->json($userplaylist);
        }
        return "No se han encontrado enlaces usuario-playlist";
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        if(is_numeric($request->ID_Usuario)){ //si el id es valido
            $user = User::find($request->ID_Usuario);
            if($user == NULL){ //si el usuario no existe
                return response()->json([
                    'message'=>'ID_Usuario no existe.'
                ],404);
            }

        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],400);
        }
        if(is_numeric($request->ID_Playlist)){//si el id es valido
            $playlist = Playlist::find($request->ID_Playlist);
            if($playlist == NULL){//si la playlist no existe
                return response()->json([
                    'message'=>'ID_Playlist no existe.'
                ],404);
            }
        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],400);
        }
        $userplaylist = new Userplaylist();
        $userplaylist->ID_Usuario = $request->ID_Usuario;
        $userplaylist->ID_Playlist = $request->ID_Playlist;
        $userplaylist->save();
        return response()->json([
            'message' => 'Se ha creado una nueva relacion user-playlist.',
            'id' => $userplaylist->id
        ], 202);
    }
    //Muestra una tupla especifica segun el ID ingresado por parametro.
    public function show($id)
    {
        if(is_numeric($id)){
            $userplaylist = Userplaylist::find($id);
            if($userplaylist != NULL){
                return response()->json($userplaylist);
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
            $userplaylist = Userplaylist::find($id);
            if($userplaylist != NULL){
                if(is_numeric($request->ID_Usuario)){ //si el id es valido
                    $user = User::find($request->ID_Usuario);
                    if($user !=NULL){ //si el user existe
                        $userplaylist->ID_Usuario = $request->ID_Usuario;//continuar
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
                if(is_numeric($request->ID_Playlist)){//si el id es valido
                    $playlist = Playlist::find($request->ID_Playlist);
                    if($playlist !=NULL){//si la playlist existe
                        $userplaylist->ID_Playlist = $request->ID_Playlist;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Playlist no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],500);
                }
                $userplaylist->save();
                return response()->json([
                    'message' => 'Se actualizo de forma exitosa relacion usuario playlist',
                    'id' => $userplaylist->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe un usuario playlist con esa ID.'
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
            $userplaylist = Userplaylist::find($id);
            if($userplaylist != NULL){
                $userplaylist->delete();
                return response()->json([
                    "message"=>"Se ha borrado un usuario playlist",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe el usuario playlist con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}

