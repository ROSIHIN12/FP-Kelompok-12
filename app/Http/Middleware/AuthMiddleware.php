<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     $jwt = $request->bearerToken();

    //     if (is_null($jwt) || $jwt === '') {
    //         return response()->json([
    //             'msg' => 'Akses ditolak, token tidak memenuhi'
    //         ], 401);
    //     }

    //     try {
    //         $jwtDecoded = JWT::decode($jwt, new Key(env('JWT_SECRET_KEY'), 'HS256'));

    //         if ($jwtDecoded->role === $role) {
    //             return $next($request);
    //         }

    //         return response()->json([
    //             'msg' => 'Akses ditolak, token tidak memenuhi'
    //         ], 403);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'msg' => 'Akses ditolak, token tidak memenuhi'
    //         ], 401);
    //     }
    // }

    public function handle(Request $request, Closure $next)
    {
        try {
            $token = $request->bearerToken();
            if (!$token) {
                return response()->json(['message' => 'Token tidak ditemukan'], 401);
            }

            $credentials = JWT::decode($token, new Key(env('JWT_SECRET_KEY'), 'HS256'));
            $request->auth = $credentials;
        } catch (Exception $e) {
            return response()->json(['message' => 'Token tidak valid atau kadaluarsa', 'error' => $e->getMessage()], 401);
        }

        return $next($request);
    }
    
}
