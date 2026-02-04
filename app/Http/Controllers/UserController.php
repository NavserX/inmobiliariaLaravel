<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user=User::create($request->all('nombre','direccion','telefono','email','password'));
        if(!$user){
            return response([
                "error"=>true,
                "message"=>"No se pudo crear el usuario"
            ],500);
        }else{
            return response([
                "error"=>false,
                "message"=>"Se pudo crear el usuario",
                "data"=>$user
            ],201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowUserRequest $request, User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function verify(LoginUserRequest $request)
    {
        $autenticado=Auth::attempt([
            "email"=>$request->email,
            "password"=>$request->password
            ]);
        if(!$autenticado){
            return response([
                "error"=>true,
                "message"=>"No se ha podido autenticar al usuario de este servidor"
            ],401);

        }else{
            $user=Auth::user();
            $token=$user->createToken('auth-token')->plainTextToken;
            return response([
                "error"=>false,
                "message"=>"Se ha autenticado el usuario",
                "token"=>$token,
                "token_type"=>'Bearer'
            ],200);
        }
    }

    public function logout(Request $request)
    {
        $user=Auth::user();
        if(!$user->tokens()->delete()){
            return response([
                "error"=>true,
                "message"=>"No se ha podido deslogear al usuario",
            ],500);
        }else{
            return response([
                "error"=>false,
                "message"=>"Se ha podido deslogear al usuario",
            ],200);
        }
    }
}
