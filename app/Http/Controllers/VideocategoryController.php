<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videocategory;
use App\Models\Category;
use App\Models\Video;

class VideocategoryController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $videocategory = Videocategory::all();
        if($videocategory != NULL){
            return response()->json($videocategory);
        }
        return "No se han encontrado enlaces video-categoria.";
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        if(is_numeric($request->ID_Video)){ //si el id es valido
            $video = Video::find($request->ID_Video);
            if($video == NULL){ //si el video no existe
                return response()->json([
                    'message'=>'ID_Video no existe.'
                ],404);
            }

        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],400);
        }
        if(is_numeric($request->ID_Categoria)){//si el id es valido
            $category = Category::find($request->ID_Categoria);
            if($category == NULL){//si la categoria no existe
                return response()->json([
                    'message'=>'ID_categoria no existe.'
                ],404);
            }
        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],400);
        }
        $videocategory = new Videocategory();
        $videocategory->ID_Video = $request->ID_Video;
        $videocategory->ID_Categoria = $request->ID_Categoria;
        $videocategory->save();
        return response()->json([
            'message' => 'Se ha creado una nueva relacion video-categoria.',
            'id' => $videocategory->id
        ], 202);
    }

    //Muestra una tupla especifica segun el ID ingresado por parametro.
    public function show($id)
    {
        if(is_numeric($id)){
            $videocategory = Videocategory::find($id);
            if($videocategory != NULL){
                return response()->json($videocategory);
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
            $videocategory = Videocategory::find($id);
            if($videocategory != NULL){
                if(is_numeric($request->ID_Video)){ //si el id es valido
                    $video = Video::find($request->ID_Video);
                    if($video !=NULL){ //si el video existe
                        $videocategory->ID_Video = $request->ID_Video;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Video no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],400);
                }
                if(is_numeric($request->ID_Categoria)){//si el id es valido
                    $category = Category::find($request->ID_Categoria);
                    if($category !=NULL){//si la categoria existe
                        $videocategory->ID_Categoria = $request->ID_Categoria;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_categoria no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],500);
                }
                $videocategory->save();
                return response()->json([
                    'message' => 'La categoria del video se actualizo de forma exitosa',
                    'id' => $videocategory->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe una video categoria con esa ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],400);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy(Request $request, $id)
    {
        if(is_numeric($id)){
            $videocategory = Videocategory::find($id);
            if($videocategory != NULL){
                $videocategory->delete();
                return response()->json([
                    "message"=>"Se ha borrado el video categoria",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un video categoria con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
