<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Muestra todas las tuplas de un modelo.
    public function index()
    {
        $category = Category::all();
        if($category != NULL){
            return response()->json($category);
        }
        return response()->json([
            'message' => 'No se han encontrado categorias.',
        ], 404);
    }
    //Se crea una nueva tupla.
    public function store(Request $request)
    {
        $category = new Category();
        /*$validatedData = $request->validate([
            'Nombre' => ['required' , 'min:4' , 'max:64'],
        ]);*/
        $category->Nombre = $request->Nombre;
        $category->save();
        return response()->json([
            'message' => 'Se ha creado una nueva categoria.',
            'id' => $category->id
        ], 202);
    }

    //Muestra una tupla especifica segun el ID ingresado por parametro.
    public function show($id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if($category != NULL){
                return response()->json($category);
            }
            return response()->json([
                'message'=>'No se ha encontrado la categoria.'
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
            $category = Category::find($id);
            if($category != NULL){
                if($request->Nombre != NULL){
                    $category->Nombre = $request->Nombre;
                }
                $category->save();
                return response()->json([
                    'message' => 'La categoria se actualizo de forma exitosa',
                    'id' => $category->id
                ], 202);
            }
            return response()->json([
                'message'=>'No existe una categoria con esa ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }

    //Soft delete de una tupla especificada por el ID
    public function destroy(Request $request, $id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if($category != NULL){
                $category->delete();
                return response()->json([
                    "message"=>"Se ha borrado la categoria",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe una categoria con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
    
    //Elimina suavemente (soft-delete) una tupla especificada por el ID, 
//public function  softdelete($id)
    /*if(is_numeric($id)){
        $category = Category;::find($id);
        if($category != NULL){
            $category->delete();
            return response()->json([
                "message"=>"Se ha borrado la categoria",
                "id"=>$id
            ],201);
        }
        return "No existe una categoria con ese ID.";
    }
    else{
        return response()->json([
            'message'=>'La ID ingresada no es valida.'
        ],404);
    }*/
}
