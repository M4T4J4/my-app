<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    } 
    public function existEmail()
    {
        $email = $this->request->input("email");

        $user = User::where("email","=", $email)
            ->first();

        $response = '';
        ($user) ? $reponse = "exist" : $reponse = "no_exist";

        return response()->json([
            'response' => $response
        ]);
    }
}
