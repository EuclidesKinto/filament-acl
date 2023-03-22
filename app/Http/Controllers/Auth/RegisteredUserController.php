<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
//     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => false,
            'password' => Hash::make($request->password),
        ]);

//        dd($user);
//        event(new Registered($user));
//
//        Auth::login($user);

        return response()->noContent();
    }
}
