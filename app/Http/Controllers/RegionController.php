<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Country;

class RegionController extends Controller
{

    public function index()
    {
        $region = Region::all();
        if($region != NULL){
            return response()->json($region);
        }
        return response()->json([
            'message' => 'No se han encontrado regiones.',
        ], 404);
    }

    public function store(Request $request)
    {
        $region = new Region();
        /*$validatedData = $request->validate([
            'Nombre_Region' => ['required', 'max:64'],
            'ID_Pais' => ['required', 'numeric'],
        ]);*/
        if(is_numeric($request->ID_Pais)){
            if($request->ID_Pais != NULL){
                $country = Country::find($request->ID_Pais);
                if($country != NULL){
                    if($request->Nombre_Region != NULL){
                        if(is_string($request->Nombre_Region)){
                            $region->Nombre_Region = $request->Nombre_Region;
                            $region->ID_Pais = $request->ID_Pais;
                            $region->save();
                            return response()->json([
                                'message' => 'Se ha creado una nueva región.',
                            ], 202);
                        }else{
                            return response()->json([
                                'message' => 'El nombre de la región debe contener solo caracteres.',
                            ], 400);
                        }
                    }else{
                        return response()->json([
                            'message' => 'El nombre de la región no puede estar vacío.',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'No se ha encontrado un país con la ID ingresada.',
                    ], 404);
                }
            }else{
                return response()->json([
                    'message' => 'Debe ingresar la ID de un país.',
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
            $region = Region::find($id);
            if($region != NULL){
                return response()->json($region);
            }
            return response()->json([
                'message'=>'No se ha encontrado la región.'
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
            $region = Region::find($id);
            if($region != NULL){
                if($request->Nombre_Region != NULL){
                    if(is_string($request->Nombre_Region)){
                        $region->Nombre_Region = $request->Nombre_Region;
                    }else{
                        return response()->json([
                            'message' => 'El nombre de la región debe contener solo caracteres.',
                        ], 400);
                    }
                }
                if($request->ID_Pais != NULL){
                    if(is_numeric($request->ID_Pais)){
                        $pais = Region::find($request->ID_Pais);
                        if($pais != NULL){
                            $region->ID_Pais = $request->ID_Pais;         
                        }else{
                            return response()->json([
                                'message' => 'No se ha encontrado un país con la ID ingresada.',
                            ], 404);
                        }
                    }else{
                        return response()->json([
                            'message' => 'La ID de país ingresada no es válida.',
                        ], 400);
                    }
                }
                $region->save();
                return response()->json([
                    'message' => 'La región se ha actualizado exitosamente.',
                    'id' => $region->id
                ], 202);
            }else{
                return response()->json([
                    'message' => 'No se ha encontrado una región con la ID ingresada.',
                ], 404);
            }   
        }else{
            return response()->json([
                'message'=>'La ID de región ingresada no es válida.'
            ],500);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $region = Region::find($id);
            if($region != NULL){
                $region->delete();
                return response()->json([
                    "message"=>"Se ha borrado la región.",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe una región con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
