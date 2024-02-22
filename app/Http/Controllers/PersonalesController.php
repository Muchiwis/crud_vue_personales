<?php

namespace App\Http\Controllers;

use App\Models\Personales;
use Illuminate\Http\Request;

class PersonalesController extends Controller
{
    public function index(){
        $allPersonales = Personales::all();

        return response()->json($allPersonales);
    }

    public function show($id){
        try {
            $Personal = Personales::find($id);
            if($Personal != null){
                return response()->json($Personal);
            }else{
                return response()->json([
                        "data" => "No se encontro personal"
                ]);
            }
            
        } catch (\Throwable $th) {
            return response()->json([
                "data" => "No se encontro personal"
            ]);
        }
        
    }
    public function store(Request $request){
        
        try {
            $personalCreado = Personales::create($request->all());
            return response()->json([
                "data" => ["creado satisfactoriamente", $personalCreado]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "data" => "Error al crear: ".$th
            ]);
        }
        
    }
    public function update(Request $request, $id){
        try {
            $personal = Personales::find($id);
            $personal->update($request->all());
            return response()->json([
                "data" => "actualizado correctamente a la persona: ".$personal->nombre
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "data" => "error al actualizar: ".$th
            ]);
        }
        

    }
    public function delete($id){
        try {
            Personales::find($id)->delete();
            return response()->json([
                "data" => "Personal elimado correctamente"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "data" => "Error al eliminar personal"
            ]);
        }
    }
}
