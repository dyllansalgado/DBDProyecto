<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\User;

class SerieController extends Controller
{

    public function index()
    {
        $serie = Serie::all();
        if($serie != NULL){
            return response()->json($serie);
        }
        return response()->json([
            'message' => 'No se han encontrado series.',
        ], 404);
    }

    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            'Titulo' => ['required', 'min:3', 'max:64'],
            'Descripcion' => ['required', 'min:3', 'max:64'],
            'ID_Usuario' => ['required', 'numeric'],
        ]);*/
        $serie = new Serie();
        if($request->Titulo != NULL){
            if(is_string($request->Titulo)){
                if($request->Descripcion != NULL){
                    if(is_string($request->Descripcion)){
                        if($request->ID_Usuario != NULL){
                            if(is_numeric($request->ID_Usuario)){
                                $user = User::find($request->ID_Usuario);
                                if($user != NULL){
                                    $serie->ID_Usuario = $request->ID_Usuario;
                                    $serie->Titulo = $request->Titulo;
                                    $serie->Descripcion = $request->Descripcion;
                                    $serie->save();
                                    return response()->json([
                                        'message' => 'Se ha creado una nueva serie.',
                                        'id' => $serie->id
                                    ], 202);
                                }else{
                                    return response()->json([
                                        'message' => 'No se encontrĂ³ un usuario asociado a la ID ingresada.',
                                    ], 404);
                                }
                            }else{
                                return response()->json([
                                    'message' => 'La ID de usuario ingresada no es vĂ¡lida.',
                                ], 400);
                            }
                        }else{
                            return response()->json([
                                'message' => 'Debe ingresar una ID de usuario.',
                            ], 400);
                        }
                    }else{
                        return response()->json([
                            'message' => 'La descripciĂ³n debe ser un string.',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'La descripciĂ³n no puede estar vacĂ­a.',
                    ], 400);
                }
            }else{
                return response()->json([
                    'message' => 'El tĂ­tulo debe ser un string.',
                ], 400);
            }
        }else{
            return response()->json([
                'message' => 'El tĂ­tulo no puede estar vacĂ­o.',
            ], 400);
        }
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $serie = Serie::find($id);
            if($serie != NULL){
                return response()->json($serie);
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
            $serie = Serie::find($id);
            if($serie != NULL){
                if($request->Titulo != NULL){
                    if(is_string($request->Titulo)){
                        $serie->Titulo = $request->Titulo;
                    }else{
                        return response()->json([
                            'message' => 'El tĂ­tulo ingresado debe ser un string.'
                        ], 400);
                    }
                }
                if($request->Descripcion != NULL){
                    if(is_string($request->Descripcion)){
                        $serie->Descripcion = $request->Descripcion;
                    }else{
                        return response()->json([
                            'message' => 'La descripciĂ³n ingresada debe ser un string.'
                        ], 400);
                    }
                }
                if($request->ID_Usuario != NULL){
                    if(is_numeric($request->ID_Usuario)){
                        $user = User::find($request->ID_Usuario);
                        if($user != NULL){
                            $serie->ID_Usuario = $request->ID_Usuario;
                        }else{
                            return response()->json([
                                'message' => 'No existe un usuario asociada a la ID de usuario ingresada.'
                            ], 404);
                        }
                    }else{
                        return response()->json([
                            'message' => 'La ID de usuario ingresada no es vĂ¡lida.'
                        ], 400);
                    }
                }
                $serie->save();
                return response()->json([
                    'message' => 'La serie se ha actualizado exitosamente.',
                    'id' => $serie->id
                ], 202);
            }else{
                return response()->json([
                    'message' => 'No existe una serie asociada a la ID ingresada.'
                ], 404);
            }
        }else{
            return response()->json([
                'message' => 'La ID ingresada no es vĂ¡lida.'
            ], 400); 
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $serie = Serie::find($id);
            if($serie != NULL){
                $serie->delete();
                return response()->json([
                    "message"=>"Se ha borrado la serie.",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe una serie con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
