<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\DummyUser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return ['test'];
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'username_email' => 'required',
            'password' => 'required'
        ]);

        $user                      = new DummyUser;
        $user->username_email      = $credentials['username_email'];
        $user->password            = $credentials['password'];
        $user->save();

        return [
            "status" => 1,
            "data" => '',
            "msg" => "User inserted successfully"
        ];

    
        //return redirect('/');
    }
}
