<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Serie;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlist = Playlist::all();
        if($playlist != NULL){
            return response()->json($playlist);
        }
        return response()->json([
            'message' => 'No se han encontrado listas de reproducción.',
        ], 404);
    }

    public function store(Request $request)
    {
        $playlist = new Playlist();
        /*$validatedData = $request->validate([
            'Nombre' => ['required', 'min:3', 'max:64'],
            'Descripcion' => ['required', 'min:3', 'max:64'],
            'ID_Serie' => ['required', 'numeric'],
        ]);*/
        if($request->ID_Serie != NULL){
            if(is_numeric($request->ID_Serie)){
                $serie = Serie::find($request->ID_Serie);
                if($serie != NULL){
                    if($request->Nombre != NULL){
                        if(is_string($request->Nombre)){
                            if($request->Descripcion != NULL){
                                if(is_string($request->Descripcion)){
                                    $playlist->Nombre = $request->Nombre;
                                    $playlist->Descripcion = $request->Descripcion;
                                    $playlist->ID_Serie = $request->ID_Serie;
                                    $playlist->save();
                                    return response()->json([
                                        'message' => 'Se ha creado una nueva lista de reproducción.',
                                        'id' => $playlist->id
                                    ], 202);
                                }else{
                                    return response()->json([
                                        'message' => 'La descripción debe ser solo texto.',
                                    ], 400);
                                }
                            }else{
                                return response()->json([
                                    'message' => 'Debe ingresar una descripción.',
                                ], 400);
                            }
                        }else{
                            return response()->json([
                                'message' => 'El nombre debe ser solo texto.',
                            ], 400);
                        }
                    }else{
                        return response()->json([
                            'message' => 'El nombre de la lista de reproducción no puede estar vacío.',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'No se encontró una serie asociada a la ID de serie ingresada.',
                    ], 404); 
                }
            }else{
                return response()->json([
                    'message' => 'La ID ingresada no es válida.',
                ], 400);
            }
        }else{
            return response()->json([
                'message' => 'Debe ingresar una ID de serie para continuar.',
            ], 400);
        }
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $playlist = Playlist::find($id);
            if($playlist != NULL){
                return response()->json($playlist);
            }
            return response()->json([
                'message'=>'No se ha encontrado la lista de reproducción.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es válida.'
            ],500);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $playlist = Playlist::find($id);
            if($playlist != NULL){
                if($request->Nombre != NULL){
                    if(is_string($request->Nombre)){
                        $playlist->Nombre = $request->Nombre;
                    }else{
                        return response()->json([
                            'message' => 'El nombre ingresado debe ser un string.'
                        ], 400);
                    }
                }
                if($request->Descripcion != NULL){
                    if(is_string($request->Descripcion)){
                        $playlist->Descripcion = $request->Descripcion;
                    }else{
                        return response()->json([
                            'message' => 'La descripción ingresada debe ser un string.'
                        ], 400);
                    }
                }
                if($request->ID_Serie != NULL){
                    if(is_numeric($request->ID_Serie)){
                        $serie = Serie::find($request->ID_Serie);
                        if($serie != NULL){
                            $playlist->ID_Serie = $request->ID_Serie;
                        }else{
                            return response()->json([
                                'message' => 'No existe una serie asociada a la ID de serie ingresada.'
                            ], 404);
                        }
                    }
                }
                $playlist->save();
                return response()->json([
                    'message' => 'La lista de reproducción se ha actualizado exitosamente.',
                    'id' => $playlist->id
                ], 202);
            }else{
                return response()->json([
                    'message' => 'No existe una lista de reprodcción asociada a la ID ingresada.'
                ], 404);
            }
        }else{
            return response()->json([
                'message' => 'La ID ingresada no es válida.'
            ], 400); 
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $playlist = Playlist::find($id);
            if($playlist != NULL){
                $playlist->delete();
                return response()->json([
                    "message"=>"Se ha borrado la lista de reproducción.",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe una lista de reproducción con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
