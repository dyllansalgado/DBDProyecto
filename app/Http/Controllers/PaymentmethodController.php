<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paymentmethod;

class PaymentmethodController extends Controller
{
    public function index()
    {
        $paymentMethod = Paymentmethod::all();
        if($paymentMethod != NULL){
            return response()->json($paymentMethod);
        }
        return response()->json([
            'message' => 'No se han encontrado métodos de pago.',
        ], 404);
    }

    public function store(Request $request)
    {
        $paymentMethod = new Paymentmethod();
        if($request->Nombre_MedioPago != NULL){
            if(is_string($request->Nombre_MedioPago)){
                $paymentMethod->Nombre_MedioPago = $request->Nombre_MedioPago;
                $paymentMethod->save();
                return response()->json([
                    'message' => 'Se ha creado un nuevo metodo de pago',
                ], 202);
            }
            else{
                return response()->json([
                    'message' => 'El nombre del método de pago debe ser un string.',
                ], 400);
            }
        }
        else{
            return response()->json([
                'message' => 'El nombre del método de pago no puede estar vacío.',
            ], 400);
        }
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $paymentMethod = Paymentmethod::find($id);
            if($paymentMethod != NULL){
                return response()->json($paymentMethod);
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
            $paymentMethod= Paymentmethod::find($id);
            if($paymentMethod != NULL){
                if($request->Nombre_MedioPago != NULL){
                    if(is_string($request->Nombre_MedioPago)){
                        $paymentMethod->Nombre_MedioPago = $request->Nombre_MedioPago;
                        $paymentMethod->save();
                        return response()->json([
                            'message' => 'El metodo de pago se ha actualizado exitosamente.',
                            'id' => $paymentMethod->id
                        ], 202);
                    }else{
                        return response()->json([
                            'message' => 'El nombre del metodo de pago solo debe ser un string',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'message' => 'El nombre del medio de pago no puede estar vacío.',
                    ], 400);
                }
            }else{
                return response()->json([
                    'message' => 'No se ha encontrado el medio de pago',
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
            $paymentMethod = Paymentmethod::find($id);
            if($paymentMethod != NULL){
                $paymentMethod->delete();
                return response()->json([
                    "message"=>"Se ha borrado el método de pago.",
                    "id"=>$id
                ],201);
            }
            return response()->json([
                'message'=>'No existe un método de pago con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],404);
        }
    }
}