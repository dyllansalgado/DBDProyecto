<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;


class CountryController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $country = Country::all();
        if($country != NULL){
            return response()->json($country);
        }
        return response()->json([
            'message' => 'No se han encontrado países.',
        ], 404);
    }
     //Se crea una nueva tupla.
    public function store(Request $request)
    {
        $country = new Country();
        /*$validatedData = $request->validate([
            'Nombre_Pais' => ['required', 'max:64'],
        ]);*/
        if($request->Nombre_Pais != NULL){
            if(is_string($request->Nombre_Pais)){
                $country->Nombre_Pais = $request->Nombre_Pais;
                $country->save();
                return response()->json([
                    'message' => 'Se ha creado un nuevo pais.','id' => $country->id
                ], 202);
            }else{
                return response()->json([
                    'message' => 'El nombre del país debe contener solo caracteres.',
                ], 400);
            }
        }else{
            return response()->json([
                'message' => 'El nombre del país no puede estar vacío.',
            ], 400);
        }
    }
    //Muestra una tupla especifica segun el ID ingresado por parametro.
    public function show($id)
    {
        if(is_numeric($id)){
            $country = Country::find($id);
            if($country != NULL){
                return response()->json($country);
            }
            return response()->json([
                'message'=>'No se ha encontrado el país.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es válida.'
            ],500);
        }
    }
    //Actualiza el parámetro ingresado en la tupla que corresponda según ID
    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $country = Country::find($id);
            if($country != NULL){
                if($request->Nombre_Pais != NULL){
                    if(is_string($request->Nombre_Pais)){
                        $country->Nombre_Pais = $request->Nombre_Pais;
                        $country->save();
                        return response()->json([
                            'message' => 'El nombre de pais se ha actualizado exitosamente.',
                            'id' => $country->id
                        ], 202);
                    }else{
                        return response()->json([
                            'message' => 'El nombre del país debe contener solo caracteres.',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'El nombre del país no puede estar vacío.',
                    ], 400);
                }
            }else{
                return response()->json([
                    'message' => 'No se ha encontrado el país.',
                ], 400);
            }
        }else{
            return response()->json([
                'message'=>'La ID ingresada no es válida.'
            ],404);
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $country = Country::find($id);
            if($country != NULL){
                $country->delete();
                return response()->json([
                    "message"=>"Se ha borrado el país",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un país con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}
