<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropietarioRequest;
use App\Http\Requests\UpdatePropietarioRequest;
use App\Models\Propietario;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Propietario::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropietarioRequest $request)
    {
        $propietario = new Propietario();
        $propietario->dni = $request->dni;
        $propietario->nombre = $request->nombre;
        $propietario->apellidos = $request->apellidos;
        $propietario->direccion = $request->direccion;
        $propietario->iban = $request->iban;
        $propietario->telefono = $request->telefono;

        $propietario->save();

        return response([
            "error" => false,
            "mensaje" => "Propietario registrado",
            "data"=>$propietario,
            "code"=>201
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Propietario $propietario)
    {
        return $propietario;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propietario $propietario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropietarioRequest $request, Propietario $propietario)
    {
        $propietario->dni = $request->dni??$propietario->dni;
        $propietario->nombre = $request->nombre??$propietario->nombre;
        $propietario->apellidos = $request->apellidos??$propietario->apellidos;
        $propietario->direccion = $request->direccion??$propietario->direccion;
        $propietario->iban = $request->iban??$propietario->iban;
        $propietario->telefono = $request->telefono??$propietario->telefono;

        $propietario->save();

        return response([
            "error" => false,
            "mensaje" => "Propietario modificado".$propietario->id,
            "data"=>$propietario,
            "code"=>200
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {
        if (!$propietario->delete()){
            return response([
                "error"=>true,
                "message"=>"El propietario no se ha borrado correctamente.",
                "code"=>500
            ], 500);
        }else{
            return response([
                "error"=>false,
                "message"=>"El propietario se ha borrado correctamente.",
                "code"=>200
            ], 200);
        }
    }
}
