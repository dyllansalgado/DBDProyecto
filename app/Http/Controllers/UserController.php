<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commune;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        if($user != NULL){
            return response()->json($user);
        }
        return response()->json([
            'message' => 'No se han encontrado usuarios.',
        ], 404);
    }

    public function store(Request $request)
    {
        $user = new User();
        
        if(($request->Username !=NULL) && (is_string($request->Username))){
            if($request->Pass !=NULL){
                if(($request->Edad !=NULL) && (is_numeric($request->Edad))){
                    if(($request->CorreoElectronico !=NULL) && (is_string($request->CorreoElectronico))){
                        if($request->FechaNacimiento !=NULL){
                            if(($request->ID_Comuna !=NULL) && (is_numeric($request->ID_Comuna))){
                                $commune= Commune::find($request->ID_Comuna);
                                if($commune != NULL){
                                    $user->Username = $request->Username;
                                    $user->Pass = $request->Pass;
                                    $user->Edad = $request->Edad;
                                    $user->CorreoElectronico = $request->CorreoElectronico;
                                    $user->FechaNacimiento = $request->FechaNacimiento;
                                    $user->ID_Comuna = $request->ID_Comuna;
                                    $user->save();
                                    return response()->json([
                                        'message' => 'Se ha registrado al usuario.',
                                        'id' => $user->id
                                    ],202);
                                }
                                return response()->json([
                                    'message' => 'No se encontró una comuna asociada al ID.',
                                ],404);
                            }
                            return response()->json([
                                'message' => 'El ID de comuna es inválido.',
                            ],400);
                        }
                        return response()->json([
                            'message' => 'La fecha ingresada no es válida.',
                        ],400);
                    }
                    return response()->json([
                        'message' => 'El mail ingresado no es válido.',
                    ],400);
                }
                return response()->json([
                    'message' => 'La edad ingresada no es válida.',
                ],400);
            }
            return response()->json([
                'message' => 'La contraseña no puede estar vacía.',
            ],400);
        }
        return response()->json([
            'message' => 'El nombre de usuario es inválido.',
        ],400);
    }

    public function show($id)
    {
        if(is_numeric($id)){
            $user = User::find($id);
            if($user != NULL){
                return response()->json($user);
            }
            return response()->json([
                'message'=>'No se ha encontrado el usuario.'
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
            $user = User::find($id);
            if($user != NULL){
                if($request->Username != NULL){
                    if(is_string($request->Username)){
                        $user->Username = $request->Username;
                    }else{
                        return response()->json([
                            'message' => 'El nombre de usuario debe ser un string.'
                        ], 400);
                    }
                }
                if($request->Pass != NULL){
                    if(is_string($request->Pass)){
                        $user->Pass = $request->Pass;
                    }else{
                        return response()->json([
                            'message' => 'La contraseña debe ser un string.'
                        ], 400);
                    }
                }
                if($request->Edad != NULL){
                    if(is_numeric($request->Edad)){
                        $user->Edad = $request->Edad;
                    }else{
                        return response()->json([
                            'message' => 'La contraseña debe ser un string.'
                        ], 400);
                    }
                }
                if($request->CorreoElectronico != NULL){
                    if(is_string($request->CorreoElectronico)){
                        $user->CorreoElectronico = $request->CorreoElectronico;
                    }else{
                        return response()->json([
                            'message' => 'El correo electrónico debe ser un string.'
                        ], 400);
                    }
                }
                if($request->FechaNacimiento != NULL){
                    $user->FechaNacimiento = $request->FechaNacimiento;
                }else{
                    return response()->json([
                        'message' => 'El formato de fecha no es correcto.'
                    ], 400);
                }
                if($request->ID_Comuna != NULL){
                    if(is_numeric($request->ID_Comuna)){
                        $commune = Commune::find($request->ID_Comuna);
                        if($commune != NULL){
                            $user->ID_Comuna = $request->ID_Comuna;
                        }else{
                            return response()->json([
                                'message' => 'No se encontró una comuna asociada a la ID ingresada.'
                            ], 404);
                        }
                    }else{
                        return response()->json([
                            'message' => 'La ID ingresada no es válida.'
                        ], 400);
                    }
                }
                $user->save();
                return response()->json([
                    'message' => 'El usuario se ha actualizado exitosamente.',
                    'id' => $user->id
                ], 202);
            }else{
                return response()->json([
                    'message' => 'No existe un usuario asociado a la ID ingresada.'
                ], 404);
            }
        }else{
            return response()->json([
                'message' => 'La ID ingresada no es válida.'
            ], 400); 
        }
    }
    //Soft delete de una tupla especificada por el ID
    public function destroy($id)
    {
        if(is_numeric($id)){
            $user = User::find($id);
            if($user != NULL){
                $user->delete();
                return response()->json([
                    "message"=>"Se ha borrado el usuario.",
                    "id"=>$id
                ],200);
            }
            return response()->json([
                'message'=>'No existe un usuario con ese ID.'
            ],404);
        }
        else{
            return response()->json([
                'message'=>'La ID ingresada no es valida.'
            ],400);
        }
    }
}
