<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;

class VideoController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $video = Video::all();
        if($video != NULL){
            return response()->json($video);
        }
        return response()->json([
            'message' => 'No se han encontrado videos.',
        ], 404);
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            //'Likes' => 'required|integer',
            'Descripcion' => ['required', 'min : 1', 'max : 240'],
            'Titulo' => ['required', 'min : 3', 'max : 64'],
            'Autor' => ['required', 'min : 3', 'max : 64'],
            'Restriccion'=> 'required',
            //'Cantidad_reproducciones'=>'required|integer',
            'FechaPublicacion'=>['required','date'],
            'Visibilidad'=>'required',
        ]);*/
        $video = new Video();
        if($request->Descripcion != NULL){
            if($request->Titulo != NULL){
                if($request->Restriccion != NULL){
                    if($request->Visibilidad != NULL){
                        if($request->FechaPublicacion != NULL){
                            $video->Likes = 0;
                            $video->Titulo = $request->Titulo;
                            $video->Descripcion = $request->Descripcion;
                            $video->Autor = $request->Autor;
                            $video->Cantidad_reproducciones = 0;
                            $video->FechaPublicacion = $request->FechaPublicacion;
                            $video->Visibilidad = $request->Visibilidad;
                            $video->Restriccion = $request->Restriccion;
                            $video->save();
                            return response()->json([
                                'message' => 'Se ha subido un video.',
                                'id' => $video->id
                            ], 202);
                        }
                        return response()->json([
                            'message' => 'La fecha tiene formato incorrecto'
                        ],400);
                    }
                    return response()->json([
                        'message' => 'La visibilidad no puede estar vacía.'
                    ],400);
                }
                return response()->json([
                    'message' => 'Se debe establecer si tiene restricción.'
                ],400);
            }
            return response()->json([
                'message' => 'Título inválido.'
            ],400);
        }
        return response()->json([
            'message' => 'Descripción inválida.'
        ],400);
    }

    //Muestra una tupla especifica segun el ID ingresado por parametro.
    public function show($id)
    {
        if(is_numeric($id)){
            $video = Video::find($id);
            if($video != NULL){
                return response()->json($video);
            }
            return response()->json([
                'message'=>'No se ha encontrado el video solicitado.'
            ],404);
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
            $video = Video::find($id);
            if($video != NULL){
                if($request->Likes != NULL){
                    if(is_numeric($request->Likes)){
                        $video->Likes = $request->Likes;
                    }else{
                        return response()->json([
                            'message' => 'El valor ingresado debe ser numérico.'
                        ], 400);
                    }         
                }else{
                    return response()->json([
                        'message' => 'El valor ingresado no puede ser nulo.'
                    ], 400);
                }
                if($request->Descripcion != NULL){
                    if(is_string($request->Descripcion)){
                        $video->Descripcion = $request->Descripcion;
                    }else{
                        return response()->json([
                            'message' => 'La descripción solo puede contener texto.'
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'La descripción no puede estar vacío.'
                    ], 400);
                }
                if($request->Titulo != NULL){
                    if(is_string($request->Titulo)){
                        $video->Titulo = $request->Titulo;
                    }else{
                        return response()->json([
                            'message' => 'El título solo puede contener texto.'
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'El título no puede estar vacío.'
                    ], 400);
                }
                if($request->Autor != NULL){
                    if(is_string($request->Autor)){
                        $video->Autor = $request->Autor;
                    }else{
                        return response()->json([
                            'message' => 'El nombre del autor solo puede contener texto.'
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'El nombre del autor no puede estar vacío.'
                    ], 400);
                }
                if($request->Restriccion != NULL){
                    if($request->Restriccion== true || $request->Restriccion== false){
                        $video->Restriccion = $request->Restriccion;
                    }else{
                        return response()->json([
                            'message' => 'La restricción debe ser un valor booleano.'
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'La restricción no puede ser nula.'
                    ], 400);
                }
                if($request->Cantidad_reproducciones != NULL){
                    if(is_numeric($request->Cantidad_reproducciones)){
                        $video->Cantidad_reproducciones = $request->Cantidad_reproducciones;
                    }else{
                        return response()->json([
                            'message' => 'La cantidad de reproducciones debe ser un número.'
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'La cantidad de reproducciones no puede ser nula.'
                    ], 400);
                }
                if($request->Visibilidad != NULL){
                    if($request->Visibilidad== true || $request->Visibildad== false){
                        $video->Visibilidad = $request->Visibilidad;
                    }else{
                        return response()->json([
                            'message' => 'La visibilidad debe ser un valor booleano.'
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'El valor de visibilidad no puede ser nulo.'
                    ], 400);
                }
                $video->save();
                return response()->json([
                    'message' => 'El video se ha actualizado exitosamente.',
                    'id' => $video->id
                ], 202); 
            }
            return response()->json([
                'message' => 'El video solicitado no existe.',
            ], 404); 
        }
        return response()->json([
            'message' => 'La ID ingresada no es válida.',
        ], 400); 
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $video = Video::find($id);
            if($video != NULL){
                $video->delete();
                return response()->json([
                    "message"=>"Se ha borrado el video",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un video con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
