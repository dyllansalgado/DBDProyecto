<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use App\Models\Uservideo;

class UservideoController extends Controller
{
    public function index()
    {
        $uservideo = Uservideo::all();
        if($uservideo != NULL){
            return response()->json($uservideo);
        }
        return "No se han encontrado enlaces video-usuario";
    }

    public function store(Request $request)
    {
        if(is_numeric($request->ID_Video)){ //si el id es valido
            $video = User::find($request->ID_Video);
            if($video == NULL){ //si video no existe
                return response()->json([
                    'message'=>'ID_Video no existe.'
                ],500);
            }

        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        if(is_numeric($request->ID_Usuario)){//si el id es valido
            $usuario = User::find($request->ID_Usuario);
            if($usuario == NULL){//si la categoria no existe
                return response()->json([
                    'message'=>'ID_User no existe.'
                ],500);
            }
        }else{
            return response()->json([
                'message'=>'Datos ingresados incorrectamente.'
            ],500);
        }
        $uservideo = new Uservideo();
        $uservideo->ID_Video = $request->ID_Video;
        $uservideo->ID_Usuario = $request->ID_Usuario;
        $uservideo->save();
        return response()->json([
            'message' => 'Se ha creado una nueva relacion video-categoria.',
            'id' => $uservideo->id
        ], 202);
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $uservideo = Uservideo::find($id);
            if($uservideo != NULL){
                return response()->json($uservideo);
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

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $uservideo = Uservideo::find($id);
            if($uservideo != NULL){
                if(is_numeric($request->ID_Video)){ //si el id es valido
                    $video = Video::find($request->ID_Video);
                    if($video !=NULL){ //si el video existe
                        $uservideo->ID_Video = $request->ID_Video;//continuar
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
                if(is_numeric($request->ID_Usuario)){//si el id es valido
                    $user = User::find($request->ID_Usuario);
                    if($user !=NULL){//si el usuario no existe
                        $uservideo->ID_Usuario = $request->ID_Usuario;//continuar
                    }else{
                        return response()->json([
                            'message'=>'ID_Usuario no existe.'
                        ],404);
                    }
                }else{
                    return response()->json([
                        'message'=>'Datos ingresados incorrectamente.'
                    ],500);
                }
                $uservideo->save();
                return response()->json([
                    'message' => 'La relacion usuario-video se ha actualizado exitosamente.',
                    'id' => $uservideo->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe un user video con ese ID.'
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
            $uservideo = Uservideo::find($id);
            if($uservideo != NULL){
                $uservideo->delete();
                return response()->json([
                    "message"=>"Se ha borrado un Uservideo",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un Uservideo con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
