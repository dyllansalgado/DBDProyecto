<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\User;
use App\Models\Video;
use App\Models\Paymentmethod;

class DonationController extends Controller
{
    public function index()
    {
        $donation = Donation::all();
        if($donation != NULL){
            return response()->json($donation);
        }
        return response()->json([
            'message' => 'No se han encontrado donaciones.',
        ], 404);
    }

    public function store(Request $request)
    {
        $donation = new Donation();
        if($request->Fecha_Donacion!=NULL){
            if(($request->Valor_Donacion!=NULL) && ($request->Valor_Donacion > 0)){
                if($request->ID_Medio_Pago!=NULL){
                    $paymentmethod=Paymentmethod::find($request->ID_Medio_Pago);
                    if($paymentmethod!=NULL){
                        if($request->ID_Usuario!=NULL){
                            $usuario=User::find($request->ID_Usuario);
                            if($usuario!=NULL){
                                if($request->ID_Video!=NULL){
                                    $video=Video::find($request->ID_Video);
                                    if($video!=NULL){
                                        $donation->Fecha_Donacion = $request->Fecha_Donacion;
                                        $donation->Valor_Donacion = $request->Valor_Donacion;
                                        $donation->ID_Medio_Pago = $request->ID_Medio_Pago;
                                        $donation->ID_Usuario = $request->ID_Usuario;
                                        $donation->ID_Video = $request->ID_Video;
                                        $donation->save();
                                        return response()->json([
                                            'message' => 'Se ha registrado la donación',
                                            'id' => $donation->id
                                        ],201);
                                    }
                                    return response()->json([
                                        'message' => 'No se encontró un video asociado al ID.',
                                    ],404);
                                }
                                return response()->json([
                                    'message' => 'Video inválido.',
                                ],400);
                            }
                            return response()->json([
                                'message' => 'No se encontró un usuario asociado al ID.',
                            ],404);
                        }
                        return response()->json([
                            'message' => 'Usuario inválido.',
                        ],400);
                    }
                    return response()->json([
                        'message' => 'No se encontró el medio de pago.',
                    ],404);
                }
                return response()->json([
                    'message' => 'Método de pago inválido.',
                ],400);
            }
            return response()->json([
                'message' => 'Donación inválida.',
            ],400);
        }
        return response()->json([
            'message' => 'Fecha inválida.',
        ],400);
    }

    
    public function show($id)
    {
        if(is_numeric($id)){
            $donation = Donation::find($id);
            if($donation != NULL){
                return response()->json($donation);
            }
            return response()->json([
                'message'=>'No se ha encontrado la donación.'
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
            $donation= Donation::find($id);
            if($donation!=NULL){
                if($request->Valor_Donacion != NULL){
                    if(is_numeric($request->Valor_Donacion)){
                        $donation->Valor_Donacion = $request->Valor_Donacion;
                    }else{
                        return response()->json([
                            'message' => 'El valor de la donacion tiene un formato errado'
                        ], 400);
                    }
                }
                if($request->ID_Medio_Pago!= NULL){
                    if(is_numeric($request->ID_Medio_Pago)){
                        $mediopago = Paymentmethod::find($request->ID_Medio_Pago);
                        if($mediopago != NULL){
                            $donation->ID_Medio_Pago = $request->ID_Medio_Pago;
                        }else{
                            return response()->json([
                                'message' => 'No se encontró el medio de pago asociada a la ID ingresada.'
                            ], 404);
                        }
                    }else{
                        return response()->json([
                            'message' => 'La ID del metodo de pago no es válida.'
                        ], 400);
                    }
                }
                $donation->save();
                return response()->json([
                    'message' => 'La donacion se actualizo de forma exitosa',
                    'id' => $donation->id
                ], 202);
            }
            else{
                return response()->json([
                    'message' => 'no se encontro la donacion'
                ], 404);
            }
        }
        else{
            return response()->json([
                'message' => 'La ID ingresada no es válida.'
            ], 400); 
        } 
    }   
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $donation = Donation::find($id);
            if($donation != NULL){
                $donation->delete();
                return response()->json([
                    "message"=>"Se ha borrado la donación",
                    "id"=>$id
                ],200);
            }
            return response()->json([
                'message'=>'No existe una donación con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],400);
        }
    }
}
