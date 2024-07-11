<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        
        try{
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('LaravelSanctumAuth')->plainTextToken;
    
                $retorno = $token;
            } else {
                $retorno = "Erro de Login";
            }
        }catch(\Throwable $th){
            $retorno = $th->getMessage(); 
        }finally{
            return $retorno;
        }
    }
}
