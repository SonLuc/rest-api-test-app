<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
	// Función para hacer login y validar que el usuario tenga autorización
	public function login(LoginRequest $req)
	{
		if(Auth::attempt($req->only(['email', 'password'])))
		{
			return response()->json([
				'token' => $req->user()->createToken($req->name)->plainTextToken,
				'message' => 'Success',
				'status' => true
			]);
		}

		// Si no tiene autorización, retornamos un error 401, que significa que no está autorizado
		return response()->json([
			'message' => 'Unauthorized',
			'status' => false
		], Response::HTTP_UNAUTHORIZED);
	}
}
