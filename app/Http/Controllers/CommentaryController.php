<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentary;
use App\Models\Video;
use App\Models\User;

class CommentaryController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $commentary = Commentary::all();
        if($commentary != NULL){
            return response()->json($commentary);
        }
        return response()->json([
            'message' => 'No se han encontrado comentarios.',
        ], 404);
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            'Autor' => ['required', 'min : 3', 'max : 64'],
            'Contenido' => ['required', 'min : 1', 'max : 240'],
        ]);*/
        $commentary = new Commentary();
        if($request->Autor != NULL){
            if($request->Contenido != NULL){
                if(is_numeric($request->ID_Video)){
                    $video = Video::find($request->ID_Video);
                    if($video != NULL){
                        if(is_numeric($request->ID_Usuario)){
                            $usuario = User::find($request->ID_Usuario);
                            if($usuario != NULL){
                                if(strcmp($usuario->Username,$request->Autor) === 0){
                                    $commentary->Autor = $request->Autor;
                                    $commentary->Contenido = $request->Contenido;
                                    $commentary->ID_Video = $request->ID_Video;
                                    $commentary->ID_Usuario = $request->ID_Usuario;
                                    $commentary->save();
                                    return response()->json([
                                        'message' => 'Se ha creado el nuevo comentario.',
                                        'id' => $commentary->id
                                    ], 202);
                                }
                                return response()->json([
                                    'message' => 'El nombre del autor no coincide con el nombre del usuario de la ID ingresada.'
                                ], 500);
                            }
                            return response()->json([
                                'message' => 'No existe un usuario cuya ID corresponda a la ingresada.'
                            ], 500);
                        }
                        return response()->json([
                            'message' => 'La ID de usuario ingresada no es válida.'
                        ], 500);
                    }
                    return response()->json([
                        'message' => 'No existe un video cuya ID corresponda a la ingresada.'
                    ], 500);
                }
                return response()->json([
                    'message' => 'La ID video no es válido.'
                ], 500);
            }
            return response()->json([
                'message' => 'El contenido del comentario no puede estar vacío.'
            ], 400);
        }
        return response()->json([
            'message' => 'El nombre de usuario no es válido.'
        ], 500);       
    }
    //Muestra una tupla especifica segun el ID ingresado por parametro.
    public function show($id)
    {
        $commentary = Commentary::find($id);
        if(is_numeric($id)){
            if($commentary != NULL){
                return response()->json($commentary);
            }
            return response()->json([
                'message' => 'No se pudo encontrar la ID ingresada.'
            ], 404);
        }
        return response()->json([
            'message' => 'La ID ingresada no es valida.'
        ], 400);
    }
    //Actualiza el parámetro ingresado en la tupla que corresponda según ID
    public function update(Request $request, $id)
    {    
        if(is_numeric($id)){
            $commentary = Commentary::find($id);
            //Despues verificar si el rol del usuario es administrador o no.
            if($commentary != NULL){
                if($request->Autor != NULL){
                    $commentary->Autor = $request->Autor;
                }else{
                    return response()->json([
                        'message' => 'El nombre ingresado no es valido.'
                    ], 400);
                }
                if($request->Contenido != NULL){
                    if(is_string($request->Contenido)){
                        $commentary->Contenido = $request->Contenido;
                    }else{
                        return response()->json([
                            'message' => 'El contenido debe ser un string.'
                        ], 400);
                    }
                }
                if(is_numeric($request->ID_Video)){
                    $video = Video::find($request->ID_Video);
                    if($video != NULL){
                        $commentary->ID_Video = $request->ID_Video;
                    }else{
                        return response()->json([
                            'message' => 'No existe un video cuya ID corresponda a la ingresada.'
                        ], 500);
                    }
                }
                //Si se ingresa un String en vez de un entero se muestra el sgte mensaje, si no se ingresa un id video, queda el antiguo.
                if(is_string($request->ID_Video)){
                    return response()->json([
                        'message' => 'El formato del ID Video es incorrecto.'
                    ], 500);
                }
                if(is_numeric($request->ID_Usuario)){
                    $usuario = User::find($request->ID_Usuario);
                    if($usuario != NULL){
                        if(strcmp($usuario->Username,$commentary->Autor) == 0){
                            $commentary->ID_Usuario = $request->ID_Usuario;
                        }else{
                            return response()->json([
                                'message' => 'El autor no coincide con el ID usuario.'
                            ], 500);
                        }
                    }else{
                        return response()->json([
                            'message' => 'No existe un usuario cuya ID corresponda a la ingresada.'
                        ], 500);
                    }
                }
                //Si se ingresa un String en vez de un entero se muestra el sgte mensaje.si no se ingresa un id usuario, queda el antiguo.
                if(is_string($request->ID_Usuario)){
                    return response()->json([
                        'message' => 'El formato del ID Usuario es incorrecto'
                    ], 500);
                }
                $commentary->save();
                return response()->json([
                    'message' => 'El comentario se ha actualizado exitosamente.',
                    'id' => $commentary->id
                ], 202); 
            }else{
                return response()->json([
                    'message' => 'No existe un comentario con la ID ingresada.'
                ], 500);
            }
        }else{
            return response()->json([
                'message' => 'La ID ingresada no es valida.'
            ], 500);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $commentary = Commentary::find($id);
            if($commentary != NULL){
                $commentary->delete();
                return response()->json([
                    "message"=>"Se ha borrado el comentario",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un comentario con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
