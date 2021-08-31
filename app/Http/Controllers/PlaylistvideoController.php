<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Video;
use App\Models\Playlistvideo;
class PlaylistvideoController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $playlistvideo = Playlistvideo::all();
        if($playlistvideo != NULL){
            return response()->json($playlistvideo);
        }
        return "No se han encontrado enlaces de playlistvideo ";
    
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        if(is_numeric($request->ID_Video)){ //si el id es valido
            $video = Video::find($request->ID_Video);
            if($video == NULL){ //si el video no existe
                return response()->json([
                    'message'=>'ID_Video no existe.'
                ],500);
            }

        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        if(is_numeric($request->ID_Playlist)){//si el id es valido
            $playlist = Playlist::find($request->ID_Playlist);
            if($playlist == NULL){//si la playlist no existe
                return response()->json([
                    'message'=>'ID_Playlist no existe.'
                ],500);
            }
        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        $playlistvideo = new Playlistvideo();
        $playlistvideo->ID_Video = $request->ID_Video;
        $playlistvideo->ID_Playlist = $request->ID_Playlist;
        $playlistvideo->save();
        return response()->json([
            'message' => 'Se ha creado una nueva relacion Playlist-video.',
            'id' => $playlistvideo->id
        ], 202);
    }
    //Muestra una tupla especifica segun el ID ingresado por parametro. 
    public function show($id)
    {
        if(is_numeric($id)){
            $playlistvideo = Playlistvideo::find($id);
            if($playlistvideo != NULL){
                return response()->json($playlistvideo);
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
            $playlistvideo = Playlistvideo::find($id);
            if($playlistvideo != NULL){
                if(is_numeric($request->ID_Video)){ //si el id es valido
                    $video = Video::find($request->ID_Video);
                    if($video !=NULL){ //si el video existe
                        $playlistvideo->ID_Video = $request->ID_Video;//continuar
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
                if(is_numeric($request->ID_Playlist)){//si el id es valido
                    $playlist = Playlist::find($request->ID_Playlist);
                    if($playlist !=NULL){//si la playlist existe
                        $playlistvideo->ID_Playlist = $request->ID_Playlist;//continuar
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
                $playlistvideo->save();
                return response()->json([
                    'message' => 'La playlist video se actualizo de forma exitosa',
                    'id' => $playlistvideo->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe una playlist video con esa ID.'
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
            $playlistvideo = Playlistvideo::find($id);
            if($playlistvideo != NULL){
                $playlistvideo->delete();
                return response()->json([
                    "message"=>"Se ha borrado la playlistvideo",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe una playlistvideo con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
