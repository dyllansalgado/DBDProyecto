<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Region;


class CommuneController extends Controller
{
    public function index()
    {
        $commune = Commune::all();
        if($commune != NULL){
            return response()->json($commune);
        }
        return response()->json([
            'message' => 'No se han encontrado comunas.',
        ], 404);
    }

    public function store(Request $request)
    {
        $commune = new Commune();
        /*$validatedData = $request->validate([
            'Nombre_Comuna' => ['required', 'max:64'],
            'ID_Region' => ['required', 'numeric'],
        ]);*/
        if(is_numeric($request->ID_Region)){
            if($request->ID_Region != NULL){
                $region = Region::find($request->ID_Region);
                if($region != NULL){
                    if($request->Nombre_Comuna != NULL){
                        if(is_string($request->Nombre_Comuna)){
                            $commune->Nombre_Comuna = $request->Nombre_Comuna;
                            $commune->ID_Region = $request->ID_Region;
                            $commune->save();
                            return response()->json([
                                'message' => 'Se ha creado una nueva comuna.',
                            ], 202);
                        }else{
                            return response()->json([
                                'message' => 'El nombre de la comuna debe contener solo caracteres.',
                            ], 400);
                        }
                    }else{
                        return response()->json([
                            'message' => 'El nombre de la comuna no puede estar vacío.',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'No se ha encontrado una región con la ID ingresada.',
                    ], 404);
                }
            }else{
                return response()->json([
                    'message' => 'Debe ingresar la ID de una región.',
                ], 400);
            }
        }else{
            return response()->json([
                'message' => 'La ID de país ingresada no es válida.',
            ], 400);
        }  
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $commune = Commune::find($id);
            if($commune != NULL){
                return response()->json($commune);
            }
            return response()->json([
                'message'=>'No se ha encontrado la comuna.'
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
            $commune = Commune::find($id);
            if($commune != NULL){
                if($request->Nombre_Comuna != NULL){
                    if(is_string($request->Nombre_Comuna)){
                        $commune->Nombre_Comuna = $request->Nombre_Comuna;
                    }else{
                        return response()->json([
                            'message' => 'El nombre de la comuna debe contener solo caracteres.',
                        ], 400);
                    }
                }
                if($request->ID_Region != NULL){
                    if(is_numeric($request->ID_Region)){
                        $region = Region::find($request->ID_Region);
                        if($region != NULL){
                            $commune->ID_Region = $request->ID_Region;         
                        }else{
                            return response()->json([
                                'message' => 'No se ha encontrado una región con la ID ingresada.',
                            ], 404);
                        }
                    }else{
                        return response()->json([
                            'message' => 'La ID de región ingresada no es válida.',
                        ], 400);
                    }
                }
                $commune->save();
                return response()->json([
                    'message' => 'La comuna se ha actualizado exitosamente.',
                    'id' => $commune->id
                ], 202);
            }else{
                return response()->json([
                    'message' => 'No se ha encontrado una comuna con la ID ingresada.',
                ], 404);
            }   
        }else{
            return response()->json([
                'message'=>'La ID de comuna ingresada no es válida.'
            ],500);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $commune = Commune::find($id);
            if($commune != NULL){
                $commune->delete();
                return response()->json([
                    "message"=>"Se ha borrado la comuna.",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe una comuna con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
